<?php
declare(strict_types=1);
namespace Routes;

class Router {
    private $routes = [];

    public function add(string $method, string $path, $callback, array $middlewares = []): void {
        if (!is_callable($callback) && !(is_array($callback) && count($callback) == 2 && is_string($callback[0]) && is_string($callback[1]))) {
            throw new \InvalidArgumentException("Le callback n'est pas valide.");
        }

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
            'middlewares' => $middlewares
        ];
    }

    public function dispatch(string $method, string $uri): void {
        $uri = $this->normalizeUri(parse_url($uri, PHP_URL_PATH)); // Nettoyer et normaliser l'URI

        foreach ($this->routes as $route) {
            $pattern = $this->createPattern($route['path']);

            if ($method === $route['method'] && preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Exécuter les middlewares
                foreach ($route['middlewares'] as $middleware) {
                    $this->handleMiddleware($middleware);
                }

                // Exécuter le callback du routeur
                $this->handleCallback($route['callback'], $params);
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }

    private function normalizeUri(string $uri): string {
        return rtrim($uri, '/'); // Supprimer la barre oblique finale
    }

    private function createPattern(string $path): string {
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '(?P<$1>[a-zA-Z0-9_\-]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private function handleCallback($callback, array $params): void {
        if (is_callable($callback)) {
            call_user_func($callback, $params);
        } elseif (is_array($callback) && count($callback) == 2 && is_string($callback[0]) && is_string($callback[1])) {
            $className = $callback[0];
            $methodName = $callback[1];

            if (!class_exists($className)) {
                throw new \InvalidArgumentException("Classe de contrôleur non trouvée: $className");
            }

            $controller = new $className();

            if (!method_exists($controller, $methodName)) {
                throw new \InvalidArgumentException("Méthode de contrôleur non trouvée: $methodName");
            }

            $controller->$methodName($params);
        } else {
            throw new \InvalidArgumentException("Le callback n'est pas valide.");
        }
    }

    private function handleMiddleware(string $middleware): void {
        if (!class_exists($middleware)) {
            throw new \InvalidArgumentException("Middleware non trouvé: $middleware");
        }

        // Instancier le middleware et appeler la méthode handle()
        $middlewareInstance = new $middleware();

        $middlewareInstance->handle($_REQUEST, function ($request) {
            return $request;
        });
    }
}
?>

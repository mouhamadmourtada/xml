<?php
// Middleware/AuthMiddleware.php

namespace Middleware;

class AuthMiddleware {

    public static function handle($request, $next) {
        // Vérifier si l'utilisateur est authentifié
        if (!isset($_SESSION['user_id'])) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            header('Location: http://localhost/xml/auth/login');
            exit;
        }

        // L'utilisateur est authentifié, appeler la prochaine étape du middleware (passer la requête au contrôleur)
        return $next($request);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- j'ai des messages dans les cookies qu'il faut afficher et supprimer des cookies -->
    <div>
        <?php
        if (isset($_COOKIE['flash'])) {
            $type = $_COOKIE['flash']['type'];
            $message = $_COOKIE['flash']['message'];
            echo '<div class="bg-' . $type . '-500">' . $message . '</div>';
            setcookie('flash[type]', '', time() - 3600, '/');
            setcookie('flash[message]', '', time() - 3600, '/');
        }
        ?>
    </div>
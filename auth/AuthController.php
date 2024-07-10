<?php
namespace auth;

use models\Domaine\User;
use controllers\Controller;

class AuthController extends Controller{
    

    public function login() {
        return $this->view('auth/login');
    }

    public function loginProcess() {
    // Vérifier si le formulaire de connexion est soumis
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Vérifier les informations d'identification dans la base de données
        // $user = User::findByUsername($username);
        
        // if ($user && password_verify($password, $user->getPassword())) {
        if(true){
            // Authentification réussie
            // $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_id'] = 1;
            // Rediriger vers une page sécurisée
            $this->redirect('');
            exit;
        } else {
            // Authentification échouée
            $error = "Identifiants incorrects";
            return $this->view('login', ['error' => $error]);
            
        }
        
    }
    
    public function logout() {
        // Déconnexion : supprimer la session
        session_destroy();
        // Rediriger vers la page de connexion
        $this->redirect('auth/login');
        exit;
    }
    
    // Autres méthodes pour la gestion des utilisateurs : inscription, récupération de mot de passe, etc.
    
}
?>

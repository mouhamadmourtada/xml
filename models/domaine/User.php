<?php

namespace Models\Domaine;

use models\domaine\Model;

class User extends Model{
    private $id;
    private $username;
    private $password;
    private $email;
    private $role;

    public function __construct($id, $username, $password, $email, $role){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

   
    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getRole(){
        return $this->role;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public static function all(){

    }

    public static function find($id){

    }

    public function save(){

    }

    public function update(){

    }

    public function delete(){

    }

    public static function findByUsername($username){
        return new User(1, "admin", password_hash("admin", PASSWORD_DEFAULT), "mourtada@gmail.com", "admin");
    }
}
<?php

namespace models\dao;
// use config\Connection;

abstract class ModelDao {


    public function __construct(){
    }

    public abstract function save();
    public abstract function delete();
    public abstract static function all();
    public abstract static function find($id);
    public abstract function update();
    

}
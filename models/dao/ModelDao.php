<?php

namespace models\dao;

use models\domaine\Model;

// use config\Connection;

abstract class ModelDao {


    public function __construct(){
    }

    public abstract function save(Model $entity);
    public abstract function delete(Model $entity);
    public abstract static function all();
    public abstract static function find($id);
    public abstract function update(Model $entity);
    

}
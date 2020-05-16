<?php

abstract class Model
{
    private static $_bdd;
    private $_pagine;

    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host='.DATABASE_HOST.
                              ';dbname='.DATABASE_NAME.
                              ';charset='.DATABASE_ENCODAGE.'', 
                              ''.DATABASE_USER.
                              '',DATABASE_PASSWORD
                            );
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if(self::$_bdd == null)
            $this->setBdd();
        return self::$_bdd;
    } 

    public function getOne($table, $obj, $id)
    {
        $var = []; 
        // debug(self::$_bdd);
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' WHERE '.$id.' = '.$_GET['id']);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        // debug($var);
        return $var;
    }

    public function getCategoriesByPost($list)
    {
        $categories = [];

        $req = $this->getBdd()->prepare(
            "SELECT c.*, pc.post_id
                FROM post_category pc
                    JOIN categories c ON c.id_cat = pc.category_id
                        WHERE pc.post_id IN (".$list.")");
        // debug($req);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {   
            // debug($data);
            $categories[] = new Category($data);
        }

        return $categories;
    }

    public function getPosts($query, $queryCount)
    {
        $this->_pagine = new Pagination($query, $queryCount);
        $data = $this->_pagine->getItems($_GET['id']);

        return $data;
    }

    public function getPrevious($link)
    {
       $prev = $this->_pagine->previousLink(URL.$link);
       return $prev;
    }
    public function getNext($link)
    {
        $next = $this->_pagine->nextLink(URL.$link);
        return $next;
    }

    public function Delete($id, $table)
    {
        $req = $this->getBdd()->prepare(
            "DELETE FROM {$table} WHERE $id = ".$_GET['id']);
            // debug($req);
        $ok = $req->execute();
        // debug($ok);
        if($ok === false)
        {
            throw new \Exception("Impossible de supprimer cet enregistrement");
        }
    }
    
}
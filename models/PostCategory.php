<?php


class PostCategory{

    public $_post_id;
    public $_category_id;


    public function __construct(array $data)
    {
        foreach($data as $key => $value)
        {
            $setter = 'set'.ucfirst($key);

            if(method_exists($this, $setter)){

                $this->$setter($value);
            }
        }
    }

    //Les getters
    public function post_id(){

       return $this->_post_id;
    }

    public function category_id(){

        return $this->_category_id;
     }    

    //Creation des Setters
    public function setPostId($nomvalue)
    {
        //On verifie qu'il s'agit bien d'un integer
        $valeur = (int) $nomvalue;
        if(is_int($valeur))
            $this->_post_id = $valeur;
        
    }

    public function setCategoryId($nomvalue)
    {
        //On verifie qu'il s'agit bien d'un integer
        $valeur = (int) $nomvalue;
        if(is_int($valeur))
            $this->_category_id = $valeur;
        
    }

}
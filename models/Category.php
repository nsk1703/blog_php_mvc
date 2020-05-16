<?php


class Category
{

    private $_id_cat;
    private $_name;
    private $_slug;
    public $_post_id;
    

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
    public function id_cat(){

       return $this->_id_cat;
    }

    public function name(){

        return $this->_name;
    }

    public function slug(){

        return $this->_slug;
    }

    public function postID()
    {
        return $this->_post_id;
    }

    //Creation des Setters
    public function setId_cat($nomvalue)
    {
        $valeur = (int)$nomvalue;
        if(is_int($valeur))
            $this->_id_cat = $valeur;
    }
 
    public function setName($nomvalue)
    {
        if(is_string($nomvalue))
            $this->_name = $nomvalue;
    }

    public function setSlug($nomvalue)
    {
        if(is_string($nomvalue))
            $this->_slug = $nomvalue;
    }
 
    public function setPost_id($nomvalue)
    {
        $valeur = (int)$nomvalue;
        if(is_int($valeur))
            $this->_post_id = $valeur;
    }

}
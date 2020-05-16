<?php

class Post{

    private $_id_post;
    private $_name;
    private $_slug;
    private $_content;
    private $_created_at;
    public $_categories = [];

    
    public function __construct(array $data)

    {   foreach($data as $key => $value)
        {
            $setter = 'set'.ucfirst($key);

            if(method_exists($this, $setter))
                $this->$setter($value);
        }
    }

   
    //Les getters
    public function id_post(){

       return $this->_id_post;
    }

    public function name(): string
    {
        return $this->_name;
    }

    public function slug()
    {
        return $this->_slug;
    }

    public function content()
    {
        return $this->_content;
    }

    public function createdAt(): \DateTime
    {
        return new \DateTime($this->_created_at);
    } 

    /**
     * @return Category[]
     */
    public function categories(): array
    {
        return $this->_categories;
    }

    //Creation des Setters
    public function setId_post($nomvalue)
    {
        $valeur = (int) $nomvalue;
        if(is_int($valeur))
            $this->_id_post = $valeur;
        
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

    public function setContent($nomvalue)
    {
        if(is_string($nomvalue))
            $this->_content = $nomvalue;
    }

    public function setCreatedAt($nomvalue)
    {
        $this->_created_at = $nomvalue;
    }

    public function setCategories($nomvalue)
    {
        if(is_array($nomvalue))
            $this->_categories = $nomvalue;
    }

    public function addCategory(Category $category)
    {
        $this->_categories[] = $category;
    }
}

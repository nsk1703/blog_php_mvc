<?php

class CategoryController
{
    private $_catManager;
    private $_view;

    public function __construct($page)
    {
        if(isset($page) && count($pages) > 1)
            throw new \Exception("Page Introuvable");
        else
            $this->posts();
            $this->prev();
            $this->next();

    }

    private function posts()
    {
        $this->_catManager = new CategoryManager();
        $category = $this->_catManager->getOneCategory();
        $posts = $this->_catManager->categoriesPosts();

        // debug($posts);        
        $this->_view = new View('Category');
        $this->_view->generate(array('category' => $category,'posts' => $posts));
    }


    private function prev()
    {
        $previous = $this->_catManager->previous();
        echo $previous;
    }
    private function next()
    {
        $next = $this->_catManager->next();
        echo $next;
    }
}
<?php

class AccueilController
{ 
    private $_postManager;
    private $_view;

    public function __construct($page)
    {
        if(!isset($page) && count($pages) < 1)
            throw new \Exception("Page Introuvable");
        else
            $this->posts();
            $this->prev();
            $this->next();

    }

    private function posts()
    {
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->postsCategories();

        $this->_view = new View('Accueil');
        $this->_view->generate(array('posts' => $posts));
    }


    private function prev()
    {
        $previous = $this->_postManager->previous();
        echo $previous;
    }
    
    private function next()
    {
        $next = $this->_postManager->next();
        echo $next;
    }
}
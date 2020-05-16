<?php

class PostController
{
    private $_postManager;
    private $_view;

    public function __construct($pages)
    {   
        if(isset($page) && count($pages) > 1)
            throw new \Exception("Page Introuvable");
        else
            $this->post();
            $this->postEdit();

    }

    private function post()
    {
        $this->_postManager = new PostManager();
        $post = $this->_postManager->getOnePost();
        $category = $this->_postManager->postCategory(); 

        // debug($categories);
        // debug($post);
        $this->_view = new View('Post');
        $this->_view->generate(array('post' => $post, 'category' => $category));

    }

    private function postEdit()
    {
        $post = $this->_postManager->getOnePost();
        $this->_view = new View('Edit');
        debug($this->_view);
        $this->_view->generate(array('post' => $post));
    }

    
}
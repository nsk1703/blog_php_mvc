<?php

class AdminController
{
    private $_postManager;
    private $_view;

    public function __construct($page)
    {
        if(isset($page) && count($pages) > 1)
            throw new \Exception("Page Introuvable");
        else
            $this->posts();
            $this->prev();
            $this->next();
            $this->delete();

    }

    private function posts()
    {
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->postsCategories();

        $this->_view = new View('Admin');
        // debug($this->_view);
        $this->_view->generate(array('posts' => $posts));
    }

    private function prev()
    {
        $previous = $this->_postManager->dirPrev();
        echo $previous;
    }
    
    private function next()
    {
        $next = $this->_postManager->dirNext();
        echo $next;
    }

    public function delete()
    {
        
        if(isset($_GET['action']) && $_GET['action'] == 'delete_post')
        {
            $this->_postManager = new PostManager();
            // $delete = $this->_postManager->del();
            echo "<div class='alert alert-success'>
                    L'enregistrement a ete bien supprime!
                </div>";
        }
        
    }
}
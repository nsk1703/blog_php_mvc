<?php


// class PostCategoryController
// {

//     private $_postCatManager; 
//     // private $_view;

//     public function __construct($page)
//     {
//         if(!isset($page) && count($page) < 1)
//             throw new Exception("Page Introuvable");
//         else
//             // $this->post();
//             debug($this->catPosts($_GET['id']));
//             // debug($this->catPosts());
//     }

//     private function catPosts($id)
//     {
//         if(!isset($id))
//         {   
//             throw new \Exception('Article inexistant!!'); 
//         }else{

//             $this->_postCatManager = new PostCategoryManager();
//             $catPosts = $this->_postCatManager->listCat($id);

//             $this->_view = new View();
//             $this->_view->generate(array('catPosts' => $catPosts));
//         }

//         // debug($catPosts);
//         // $this->_view->generate(array('catPosts' => $catPosts));
//         // return $catPosts;
//     }

// }
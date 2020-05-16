<?php

class PostManager extends Model
{

    public function getOnePost()
    {   
        return $this->getOne('post', 'Post', 'id_post');
    }

    /**
     * Permet de recuperer les categories pour chaque article dans la page d'accueil
     * @return $posts
     */
    public function postsCategories()
    {
        $postsByID = [];
        
        $posts = $this->getPosts(
            "SELECT * 
                FROM post 
                    ORDER BY id_post",
            "SELECT COUNT(id_post) 
                FROM post"); 

        foreach($posts as $post)
        { 
            $postsByID[$post->id_post()] = $post;  
        }
        $listPostID = implode(',', array_keys($postsByID));
        $categories = $this->getCategoriesByPost($listPostID);

        foreach($categories as $category)
        {
            $postsByID[$category->postID()]->addCategory($category) ;
        }

        return $posts;
    }

    /**
     * Permet de recuperer les categories pour un article dans la page post
     * @return $category
     */
    public function postCategory()
    {
        $category = [];

        $req = $this->getBdd()->prepare(
                    "SELECT c.id_cat, c.slug, c.name
                        FROM post_category pc 
                            JOIN  categories c ON pc.category_id = c.id_cat 
                                WHERE pc.post_id = ".$_GET['id']);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $category[] = new Category($data);
        }
        return $category;
    }

    public function del()
    {
        return $this->Delete('id_post','post');
    }
    
    public function previous()
    {
       return $this->getPrevious('?pg=');
    }

    public function next()
    {
        return $this->getNext('?pg=');
    }
    
    public function dirPrev()
    {
        return $this->getPrevious('?page=admin&pg=');
    }

    public function dirNext()
    {
        return $this->getNext('?page=admin&pg=');
    }
    
    
}
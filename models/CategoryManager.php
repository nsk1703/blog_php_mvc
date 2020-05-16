<?php


class CategoryManager extends Model
{

    public function getOneCategory()
    {
        return $this->getOne('categories', 'Category', 'id_cat');
    }


    public function categoriesPosts()
    {
        $postsByID = [];
        $categories = [];

        $posts = $this->getPosts(
            "SELECT p.* 
                FROM post p
                    JOIN post_category pc ON pc.post_id = p.id_post
                        WHERE pc.category_id = ".$_GET['id']."
                        ORDER BY created_at DESC ",
            "SELECT COUNT(category_id) 
                    FROM post_category 
                        WHERE category_id = ".$_GET['id']); 


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

    public function previous()
    {
        return $this->getPrevious("?page=category&id=".$_GET['id']."&slug=".$_GET['slug']."&pg=");
    }

    public function next()
    {
        return $this->getNext("?page=category&id=".$_GET['id']."&slug=".$_GET['slug']."&pg=");
    }

}
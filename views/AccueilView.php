<?php include_once 'controller/AccueilController.php';?>

<?php $this->_t = "Mon BLog";?>
    <h1>Mon Blog</h1>
        <div class="container my-5">
            <div class="row">
                <?php foreach($posts as $post):?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                            <?php //debug($post->categories())?>
                                <h5 class="card-title"><?=$post->name()?></h5>
                                
                                <p class="text-muted"> <?= date_format(date_create($post->createdAt())) ?> </p> 
                                <ul>
                                <?php if(empty($post->categories())){?>
                                <p>Aucune categorie pour cet article</p>
                                <?php }else{?>
                                    <?php foreach($post->categories() as $category):?>
                                    <li>
                                        <a href="?page=category&id=<?=$category->id_cat()?>&slug<?=$category->slug()?>"><?=$category->name()?></a>
                                    </li>
                                <?php endforeach?>
                                <?php }?>
                                </ul>
                                <p> <?= getExcerpt($post->content())?></p>
                                <p>
                                    <a href="?page=post&id=<?=$post->id_post()?>&slug=<?=$post->slug()?>" class="btn btn-primary ">Voir Plus</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class='d-flex justify-content-between my-4'>
                <?= $previous?>
                    
                <?= $next ?>
     
         
                                
            

             
        
           
        

            

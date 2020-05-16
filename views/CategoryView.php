
<?php foreach($category as $cat){
    $this->_t = "Categorie - ".$cat->name() ;
}?>
        <div class="container my-5">
        <?php foreach($category as $cat):?>
            <h1>Categorie - <?=$cat->name()?></h1>
        <?php endforeach;?>
            <div class="row mt-4">
                <?php foreach($posts as $post):?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?=$post->name()?></h5>
                                
                                <p class="text-muted"> <?= date_format(date_create($post->createdAt())) ?> </p> 
                                <ul>
                                <?php foreach($post->categories() as $category):?>
                                    <li>
                                        <a href="?page=category&id=<?=$category->id_cat()?>&slug<?=$category->slug()?>"><?=$category->name()?></a>
                                    </li>
                                <?php endforeach?>
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
     
         
                                
            

             
        
           
        

            

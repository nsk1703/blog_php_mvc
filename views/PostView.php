<?php foreach($post as $pt){
    $this->_t = "Article - ". $pt->name() ;
}?>

    <div class="container my-5">
        <div class="row">
        <?php //debug($post)?>
        <?php foreach($post as $pt): ?>
            <div class="col-md-12">
                <h2> Article - <?= $pt->name() ?></h2>
                <p class="text-muted"> <?= date_format(date_create($pt->createdAt()), 'd F Y') ?></p>
                <h5>Liste de Categories Correspondantes</h5>
                <ul>
                <?php //debug($categories )?>
                    <?php foreach($category as $cat):?>
                        <li>
                            <a href="?page=category&id=<?=$cat->id_cat()?>&slug=<?=$cat->slug()?>"><?=$cat->name()?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
                <h5>Description</h5>
                <p> <?= nl2br($pt->content()) ?> </p>
            </div>
        <?php endforeach ?>
        </div>
    </div>









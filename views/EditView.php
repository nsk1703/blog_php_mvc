


<div class="container my-5">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 bg-danger py-3">
    <h2>Edition de l'article <?=$_GET['id']?></h2>
        <form action="" method="POST">
            <div class="form-group">
                <?php //debug($post);?>
                <label for="name">Titre</label>
                <?php foreach($post as $pt):?>
                    <input type="text" class="form-control" name="name" value="<?=$pt->name()?>">
                <?php endforeach;?>
            </div>
            <button class='btn btn-primary m-auto'>Modifier</button>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</div>

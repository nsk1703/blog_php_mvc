<?php $this->_t = " Administration - Blog";?>

<div class="container my-5">
    <table class="table my-2 mx-5">
    <thead>
        <th>#ID</th>
        <th>Titre</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($posts as $post):?>
            <tr>
                <td>#<?=$post->id_post()?> </td>
                <td><?=$post->name()?></td>
                <td>
                    <a href="?page=post&id=<?=$post->id_post()?>&action=modify-post" class="btn btn-primary"> Editer</a>

                    <a href="?page=admin&id=<?=$post->id_post()?>&action=delete_post" class="btn btn-danger"
                    onclick="return confirm('Voulez-vous vraiment effectuer cette action?')"> 
                    Supprimer</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<div class='d-flex justify-content-between my-4 mr-4'>
    <?= $previous?>
        
    <?= $next ?>


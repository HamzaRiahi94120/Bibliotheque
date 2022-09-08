<?php ob_start(); ?>
<?php
while ($data = $category->fetch()){
	?>
<li><a href="index.php?action=selectCategory&amp;id=<?= $data['ID'] ?>"><?= $data['category'] ?></a></li>
<?php
} 
?>
<?php $genre = ob_get_clean(); ?>
<?php ob_start(); ?>
<h1>Ajouter une catégorie</h1>
<form action="index.php?action=addCategory" method="post">
    <table>
        <tr>
            <th><label for="name">Nom de la catégorie: </label></th>
            <th><input type="text" name="name" id="name"></th>
        </tr>
        <tr>
            <th></th>
            <th><input type="submit" value="Confirmer"></th>
        </tr>
    </table>
</form>
<?php $body = ob_get_clean();?>
<?php require('template.php'); ?>
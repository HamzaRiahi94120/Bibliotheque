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
<?php
if (isset($_GET['id'])){
	?>
<h1>Modifié un tome de <?= $nameManga['name'] ?></h1>
<form action="index.php?action=editTome" method="post">
    <table>
        <tr>
            <th><label for="name">Selectionner le livre : </label></th>
            <th>
                <select name="name" id="name">
                    <?php 
						while ($data = $nameTome->fetch()){
							?>
                    <option value="<?= $data['ID'] ?>"><?= $data['name'] ?></option>
                    <?php
						}
						?>
                </select>
            </th>
        </tr>
        <tr>
            <th><label for="newName">Nouveau nom : </label></th>
            <th><input type="text" name="newName" id="newName"></th>
        </tr>
        <tr>
            <th><label for="newPicture">Nouvelle image : </label></th>
            <th><input type="file" name="newPicture" id="newPicture"></th>
        </tr>
        <tr>
            <th><label for="newAmount">Quantité :</label></th>
            <th><input type="text" name="newAmount" id="newAmount"></th>
        </tr>
        <tr>
            <th></th>
            <th><input type="submit" value="Confirmer"></th>
        </tr>
    </table>
</form>
<?php
}
else{
?>
<h1>Selectionné le manga aux quels le Tome appartient :</h1>
<div id="selectPicture">
    <?php
while ($data = $nameManga->fetch()){
	?>
    <a href="index.php?action=updateTome&amp;id=<?= $data['ID'] ?>"><img src="public/image/<?= $data['picture'] ?>"
            class="thumbnail"></a>
    <?php
}
?>
</div>
<?php
}
?>
<?php $body = ob_get_clean(); ?>
<?php require('view/frontend/template.php') ?>
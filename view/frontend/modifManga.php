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
<h1>Modifié le livre</h1>
<form action="index.php?action=editManga" method="post">
    <table>
        <tr>
            <th><label for="name">Selectionner le livre : </label></th>
            <th>
                <select name="name" id="name">
                    <?php 
					while ($data = $nameManga->fetch()){
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
            <th><label for="newCategory">Selectionner la categorie : </label></th>
            <th>
                <select name="newCategory" id="newPicture">
                    <?php
					while ($data = $nameCategory->fetch()){
						?>
                    <option value="<?= $data['ID'] ?>"><?= $data['category'] ?></option>
                    <?php
					}
					?>
                </select>
            </th>
        </tr>
        <tr>
            <th></th>
            <th><input type="submit" value="Confirmer"></th>
        </tr>
    </table>
</form>
<?php $body = ob_get_clean(); ?>
<?php require('view/frontend/template.php') ?>
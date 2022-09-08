<?php ob_start(); ?>
<?php
while ($data = $category->fetch()) {
?>
    <li><a href="index.php?action=selectCategory&amp;id=<?= $data['ID'] ?>"><?= $data['category'] ?></a></li>
<?php
}
?>
<?php $genre = ob_get_clean(); ?>
<?php ob_start(); ?>
<h1>Supprimer un Tome ou un livre</h1>
<br><br><br>
<p class="update">
    <a href="index.php?action=supprimerManga">Un livre</a>
    <a href="index.php?action=supprimerTome">Un Tome</a>
</p>
<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
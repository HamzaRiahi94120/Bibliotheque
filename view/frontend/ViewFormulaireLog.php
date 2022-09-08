<?php ob_start(); ?>
<?php
while ($data = $category->fetch()) {
    ?>
<li><a href="index.php?action=selectCategory&amp;id=<?= $data['ID'] ?>"><?= $data['category'] ?></a></li>
<?php
}
?>
<?php $genre = ob_get_clean(); ?>
<?php ob_start();?>
<h1> connection </h1>
<form action="index.php?action=login " method="post">
    <label for="username">nom d'utilisateur</label>
    <input type="text" name="identifiant" id="username">
    <label for="password">mot de passe</label>
    <input type="password" name="mot_de_passe" id="password">
    <button class="connection" type="submit" id="connection">
        connection
    </button>
</form>
<?php $body = ob_get_clean();
include('template.php') ?>
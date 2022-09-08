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
<?php

?>
<h1>Voici le livre</h1>
<table>
    <?php
    foreach ($search as $manga) {
        $name = nameCategory($manga['category']);

    ?>
        <tr>
            <th><a href="index.php?action=tome&amp;id=<?= $manga['ID'] ?>"><img src="public/image/<?= $manga['picture'] ?>" class="thumbnail"></a></th>
            <th>
                <p>Nom : <?= $manga['name']; ?></p>
                <p>Categorie : <?= $name['category']; ?></p>
            </th>
        </tr>
    <?php
    }
    ?>
</table>
<?php $body = ob_get_clean(); ?>
<?php require('view/frontend/template.php') ?>
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
<h1>Les Tomes de <?= $nameManga['name'] ?></h1>
<table>
    <?php
    while ($tomes = $tome->fetch()) {
    ?>
        <tr>
            <th>
                <?php
                if ($tomes['quantite'] > 0) {
                ?>
                    <img src="public/image/<?= $nameManga['name'] ?>/<?= $tomes['picture']; ?>" class="thumbnail">
                <?php
                } else {
                ?>
                    <img src="public/image/<?= $nameManga['name'] ?>/<?= $tomes['picture']; ?>" class="thumbnail" style="-webkit-filter: white(100%);-webkit-filter: white(100%);">
                <?php
                }
                ?>
            </th>
            <th>
                <p>Nom : <?= $tomes['name'] ?></p>
            </th>
            <th>
                <p>Quantité : <?= $tomes['quantite']; ?></p>
            </th>
        </tr>
    <?php
    }
    ?>
    <tr>
</table>
<p class="paginage">
    <?php
    for ($i = 1; $i <= $numberPage; $i++) {
        if ($i == $pageCourante) {
            echo '<span class="active">' . $i . '</span> ';
        } else {
            echo '<a href="index.php?pageTome=' . $i . '&amp;id=' . $id . '">' . $i . '</a>';
        }
    }
    ?>
</p>

<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
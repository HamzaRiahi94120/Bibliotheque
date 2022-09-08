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
<h1>Les livres de la catégorie : <?php $nameCategory = nameCategory($_GET['id']); echo $nameCategory['category']; ?>
</h1>
<table>
    <?php
	while ($data = $selectCategory->fetch()){
		$name = nameCategory($data['category']);
		?>
    <tr>
        <th><a href="index.php?action=tome&amp;id=<?= $data['ID'] ?>"><img src="public/image/<?= $data['picture'] ?>"
                    class="thumbnail"></a></th>
        <th>
            <p>Nom : <?= $data['name']; ?></p>
            <p>Category : <?= $name['category']; ?></p>
        </th>
    </tr>
    <?php
	}
	?>
</table>
<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
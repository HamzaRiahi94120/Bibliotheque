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
<h1>Les livres</h1>
<table>
    <?php
	while ($data = $manga->fetch()){
		$name = nameCategory($data['category']);
		$numberTome = numberTome($data['ID']);
		?>
    <tr>
        <th><a href="index.php?action=tome&amp;id=<?= $data['ID'] ?>"><img src="public/image/<?= $data['picture'] ?>"
                    class="thumbnail"></a></th>
        <th>
            <p>Nom : <?= $data['name']; ?></p>
            <p>Category : <?= $name['category']; ?></p>
            <p>Nombre de Tome : <?= $numberTome ?></p>
        </th>
    </tr>
    <?php
	}
	?>
    <tr>
</table>
<p class="paginage">
    <?php 
		for ($i=1;$i<=$numberPage;$i++){
			if($i == $pageCourante){
				echo '<span class="active">'.$i.'</span> ';
			}else{
				echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
			}
		}
	?>
</p>

<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
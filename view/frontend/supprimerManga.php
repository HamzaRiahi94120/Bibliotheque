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
<h1>Modifié le livre</h1>
<form action="index.php?action=deleteManga" method="post">
    <table>
        <tr>
            <th><label for="idmanga">Selectionner le livre : </label></th>
            <th>
                <select name="idmanga" id="name">
                    <?php
                    while ($data = $nameManga->fetch()) {
                        ?>
                    <option value="<?= $data['ID'] ?>"><?= $data['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </th>
        </tr>
        <tr>
            <th>
                <input type="submit" value="supprimer">
            </th>
        </tr>
    </table>

</form>
<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
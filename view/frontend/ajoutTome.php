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
<h1>Ajouter un tome</h1>
<form action="index.php?action=addTome" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th><label for="mangaID">Nom du livre :</label></th>
            <th>
                <select name="mangaID" id="mangaID">
                    <?php
                    while ($data = $manga->fetch()) {
                    ?>
                        <option value="<?= $data['ID'] ?>"><?= $data['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </th>
        </tr>
        <tr>
            <th><label for="number">Nombre de tome :</label></th>
            <th><input type="text" name="number" id="number"></th>
        </tr>
        <tr>
            <th><label for="name">Nom du tome :</label></th>
            <th><input type="text" name="name" id="name"></th>
        </tr>
        <tr>
            <th><label for="picture">Image :</label></th>
            <th><input type="file" accept="image/*" name="picture" id="picture"></th>
        </tr>
        <tr>
            <th><label for="amount">Quantité :</label></th>
            <th><input type="text" name="amount" id="amount"></th>
        </tr>
        <tr>
            <th></th>
            <th><input type="submit" value="Confirmer"></th>
        </tr>
    </table>
</form>
<?php $body = ob_get_clean(); ?>
<?php require('template.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Mes livres</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>

                <?php
                if (isset($_SESSION['user'])) { ?>
                    <li><a href="index.php?action=formtome">Ajouter un Tome</a></li>
                    <li><a href="index.php?action=formmanga">Ajouter un livre</a></li>
                    <li><a href="index.php?action=formcategory">Ajouter une Catégorie</a></li>
                    <li><a href="index.php?action=update">Modification</a></li>
                    <li><a href="index.php?action=deconnexion">deconnexion</a></li>
                    <li><a href=" index.php?action=supprimer">supprimer</a></li>
                <?php } else { ?>

                    <li><a href="index.php?action=login">connection</a></li>
                <?php
                } ?>
            </ul>
            <form action="index.php?action=search" method="post">
                <input type="text" name="search" placeholder="rechercher">
                <input type="submit" value="OK">
            </form>
        </nav>
    </header>

    <section>
        <div id="menu">
            <h2>Categories</h2>
            <ul>
                <?= $genre ?>
            </ul>
        </div>

        <div>
            <?= $body ?>
        </div>
    </section>
</body>

</html>
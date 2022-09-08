<?php

require_once('model/ViewManager.php');
require_once('model/InsertManager.php');
require_once('model/DeleteManager.php');
require_once('model/userManager.php');

function listMangaNext($page)
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $pageCourante = $_GET['page'];
    $start = ($pageCourante-1)*5;
    $numberPage = $viewManager->numberPageManga(5);
    $manga = $viewManager->displayManga($start, 5);

    require('view/frontend/listMangaView.php');
}

function listManga()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $pageCourante = 1;
    $start = ($pageCourante-1)*5;
    $numberPage = $viewManager->numberPageManga(5);
    $manga = $viewManager->displayManga($start, 5);

    require('view/frontend/listMangaView.php');
}

function tome($id)
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $pageCourante = 1;
    $start = ($pageCourante-1)*10;
    $numberPage = $viewManager->numberPageTome(10, $id);
    $tome = $viewManager->displayTome($id, $start, 10);
    $nameManga = $viewManager->selectManga($id);

    require('view/frontend/tomeView.php');
}

function tomeNext($id, $page)
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $pageCourante = $_GET['pageTome'];
    $start = ($pageCourante-1)*10;
    $numberPage = $viewManager->numberPageTome(10, $id);
    $tome = $viewManager->displayTome($id, $start, 10);
    $nameManga = $viewManager->selectManga($id);

    require('view/frontend/tomeView.php');
}

function addTome($mangaID, $nameTome, $picture, $amount, $number)
{
    if (!empty($_POST['number'])) {
            $viewManager = new ViewManager();
            $nameManga = $viewManager->selectManga($mangaID);
            mkdir('public/image/'.$nameManga["name"]);
            $tmpname=$picture['tmp_name'];
            $name_file=$picture['name'];
            $chemin='public/image/'.$nameManga["name"].'/'.$name_file;
            move_uploaded_file($tmpname, $chemin);
            $insertManager = new InsertManager();
            $newTome = $insertManager->insertTome($mangaID, $nameTome, $name_file, $amount);
         
        header('Location: index.php?action=tome&id='.$mangaID);
    } elseif (empty($_POST['number'])) {
        $insertManager = new InsertManager();
        $newTome = $insertManager->insertTome($mangaID, $nameTome, $picture, $amount);

        if ($newTome === false) {
            throw new Exception("Impossible d'ajouter le tome !");
        } else {
            header('Location: index.php?action=tome&id='.$mangaID);
        }
    }
}

function formTome()
{
    $viewManager = new ViewManager();
    $manga = $viewManager->getManga();
    $category = $viewManager->category();

    require('view/frontend/ajoutTome.php');
}

function addManga($name, $category, $file)
{
    $tmpname=$file['tmp_name'];
    $name_file=$file['name'];
    $chemin='public/image/'.$name_file;
    move_uploaded_file($tmpname, $chemin);
    $insertManager = new InsertManager();
    $newManga = $insertManager->insertManga($name, $name_file, $category);
    
    if ($newManga === false) {
        throw new Exception("Impossible d'ajouter le manga !");
    } else {
        header('Location: index.php');
    }
}

function formManga()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $category2 = $viewManager->category();

    require('view/frontend/ajoutManga.php');
}

function addCategory($name)
{
    $insertManager = new InsertManager();
    $newCategory = $insertManager->insertCategory($name);

    if ($newCategory === false) {
        throw new Exception("Impossible d'ajouter la catégory");
    } else {
        header('Location: index.php');
    }
}

function formCategory()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    require('view/frontend/ajoutCategory.php');
}

function selectCategory()
{
    $viewManager = new ViewManager();
    $selectCategory = $viewManager->displayCategory($_GET['id']);
    $category = $viewManager->category();

    require('view/frontend/categoryView.php');
}

function nameCategory($ID)
{
    $viewManager = new ViewManager();
    $name = $viewManager->nameCategory($ID);
    return $name;
}

function numberTome($id)
{
    $viewManager = new ViewManager();
    $numberTome = $viewManager->numberTome($id);
    return $numberTome;
}

function selectUpdate()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();

    require('view/frontend/modif.php');
}

function updateManga()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $nameCategory = $viewManager->category();
    $nameManga = $viewManager->getManga();

    require('view/frontend/modifManga.php');
}

function selectManga()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $nameManga = $viewManager->getManga();

    require('view/frontend/modifTome.php');
}

function updateTome($ID)
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $nameManga = $viewManager->selectManga($ID);
    $nameTome = $viewManager->listTome($ID);

    require('view/frontend/modifTome.php');
}

function editManga($ID, $newName, $newPicture, $newCategory)
{
    $insertManager = new InsertManager();
    $viewManager = new ViewManager();
    $origin = $viewManager->selectManga($ID);
    if (empty($_POST['newName'])) {
        $newName = $origin['name'];
    }
    if (empty($_POST['newPicture'])) {
        $newPicture = $origin['picture'];
    }
    $update = $insertManager->insertUpdateManga($ID, $newName, $newPicture, $newCategory);

    if ($newManga === false) {
        throw new Exception("Impossible de mettre a jour le manga !");
    } else {
        header('Location: index.php');
    }
}

function editTome($ID, $newName, $newPicture, $newAmount)
{
    $insertManager = new InsertManager();
    $viewManager = new ViewManager();
    $origin = $viewManager->selectTome($ID);
    if (empty($_POST['newName'])) {
        $newName = $origin['name'];
    }
    if (empty($_POST['newPicture'])) {
        $newPicture = $origin['picture'];
    }
    if ($_POST['newAmount'] > '0' or $_POST['newAmount'] == '0') {
        $newAmount = $_POST['newAmount'];
    } else {
        $newAmount = $origin['quantite'];
    }
    $update = $insertManager->insertUpdateTome($ID, $newName, $newPicture, $newAmount);

    if ($newManga === false) {
        throw new Exception("Impossible de mettre a jour le tome !");
    } else {
        header('Location: index.php');
    }
}

function search($name)
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $search = $viewManager->searchManga($name);
    
    require('view/frontend/resultView.php');
}
function supprimerFullTome($IDmanga)
{
    $deleteManager = new DeleteManager();
    $deleteManager -> deleteTome($IDmanga);
}

function supprimerManga($IDmanga)
{
    $deleteManager = new DeleteManager();
    supprimerFullTome($IDmanga);
    $deleteManager -> deleteManga($IDmanga);
    header('Location: index.php');
}
function selectSupprimer()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();

    require('view/frontend/supprimerMangaTome.php');
}
function supprimerMangaView()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    $nameCategory = $viewManager->category();
    $nameManga = $viewManager->getManga();

    require('view/frontend/supprimerManga.php');
}
function user()
{
    $viewManager = new ViewManager();
    $category = $viewManager->category();
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
        $userManager = new UserManager();
        $username = $_POST['identifiant'];
        $user = $userManager -> getUserByUserName($username);
        if ($user) {
            $MDP = $_POST ['mot_de_passe'];
            if (password_verify($MDP, $user -> getPassword())) {
                $_SESSION['user'] = serialize($user) ;
                header('Location: index.php');
            }
        }
    }
    
    require('view/frontend/ViewFormulaireLog.php');
}
    function deconnexion(){
        session_destroy();
        session_write_close();
        header('Location: index.php');
    }
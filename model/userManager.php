<?php
require_once('Manager.php');
require_once('./entity/User.php');


class UserManager extends Manager
{
    public function getUserByUserName($UserName)
    {
        $db = $this->dbConnect();
        $req = 'SELECT * FROM `user` WHERE username= :username';
        $state= $db ->prepare($req);
        $state ->bindParam('username', $UserName);
        $state ->execute();
        $state ->setFetchMode(PDO::FETCH_CLASS |PDO::FETCH_PROPS_LATE, 'User');
        return  $state -> fetch();
    }
}
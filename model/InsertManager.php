<?php
require_once('Manager.php');

class InsertManager extends Manager{

	public function insertTome($mangaID, $nameTome, $picture, $amount){
		$db = $this->dbConnect();
		$add = $db->prepare('INSERT INTO tome (name, manga, picture, quantite) VALUES (?, ?, ?, ?)');

		$newTome = $add->execute(array($nameTome, $mangaID, $picture, $amount));

		return $newTome;
	}

	public function insertManga($name, $picture, $category){
		$db = $this->dbConnect();
		$add = $db->prepare('INSERT INTO manga (name, picture, category) VALUES (?, ?, ?)');
		$newManga = $add->execute(array($name, $picture, $category));

		return $newManga;
	}

	public function insertCategory($name){
		$db = $this->dbConnect();
		$add = $db->prepare('INSERT INTO category (category) VALUES (?)');
		$newCategory = $add->execute(array($name));

		return $newCategory;
	}

	public function insertUpdateManga($ID, $newName, $newPicture, $newCategory){
		$db = $this->dbConnect();
		$update = $db->prepare('UPDATE manga SET name = :newName, picture = :newPicture, category = :newCategory WHERE ID = :id');
		$updateFinish = $update->execute(array(
			'id' => $ID,
			'newName' => $newName,
			'newPicture' => $newPicture,
			'newCategory' => $newCategory,
		));

		return $updateFinish;
	}

	public function insertUpdateTome($ID, $newName, $newPicture, $newAmount){
		$db = $this->dbConnect();
		$update = $db->prepare('UPDATE tome SET name = :newName, picture = :newPicture, quantite = :newquantite WHERE ID = :id');
		$updateFinish = $update->execute(array(
			'id' => $ID,
			'newName' => $newName,
			'newPicture' => $newPicture,
			'newquantite' => $newAmount,
		));

		return $updateFinish;
	}

}
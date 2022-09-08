<?php
require_once('Manager.php');

class ViewManager extends Manager{

	public function category(){
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM category ORDER BY category');
		return $req;
	}

	public function displayCategory($categoryID){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM manga WHERE category = ? ORDER BY name');
		$req->execute(array($categoryID));
		return $req;
	}

	public function nameCategory($ID){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT category FROM category WHERE ID = ?');
		$req->execute(array($ID));
		$name = $req->fetch();
		return $name;
	}

	public function numberPageManga($numberLine){
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM manga');
		$numberLineTotal = $req->rowCount();
		$numberPage = ceil($numberLineTotal/$numberLine);
		return $numberPage;
	}

	public function numberPageTome($numberLine, $id){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM tome WHERE manga = ?');
		$req->execute(array($id));
		$numberLineTotal = $req->rowCount();
		$numberPage = ceil($numberLineTotal/$numberLine);
		return $numberPage;
	}

	public function displayManga($start, $numberLine){
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM manga ORDER BY ID DESC LIMIT '.$start.','.$numberLine);
		return $req;
	}

	public function displayTome($id, $start, $numberLine){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM tome WHERE manga = ? LIMIT '.$start.','.$numberLine);
		$req->execute(array($id));
		return $req;
	}

	public function getManga(){
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM manga ORDER BY name');
		return $req;
	}

	public function listTome($mangaID){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM tome WHERE manga = ? ');
		$req->execute(array($mangaID));
		return $req;
	}	

	public function numberTome($mangaID){
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM tome WHERE manga = '.$mangaID);
		$numberTome = $req->rowCount();
		return $numberTome;
	}

	public function selectManga($ID){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM manga WHERE ID = ?');
		$req->execute(array($ID));
		$origin = $req->fetch();
		return $origin;
	}

	public function searchManga($name){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM manga WHERE name  LIKE "%":name"%"');
		$req->bindParam('name', $name); 
		$req->execute();
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$origin = $req->fetchAll();
		return $origin;
	}

	public function selectTome($ID){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM tome WHERE ID = ?');
		$req->execute(array($ID));
		$origin = $req->fetch();
		return $origin;
	}

}
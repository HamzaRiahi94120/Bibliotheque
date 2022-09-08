<?php
require_once('Manager.php');
class DeleteManager extends Manager
{
    public function deleteManga($mangaID)
    {
        $db = $this->dbConnect();
        $state = $db->prepare('DELETE  FROM `manga` WHERE ID = :manga ');
        $state->bindParam('manga', $mangaID);
        $state->execute();
    }
    public function deleteTome($mangaID)
    {
        $db = $this->dbConnect();
        $state = $db->prepare('DELETE  FROM `tome` WHERE manga = :manga ');
        $state->bindParam('manga', $mangaID);
        $state->execute();
    }
}
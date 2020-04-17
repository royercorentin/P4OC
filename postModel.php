<?php
require_once "models/DbModel.php";

class PostModel extends DbModel
{
    public function createPost($newPostTitle, $newPost)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("INSERT INTO billets (titre,billet) VALUE (?,?)");
        $requete->execute([htmlspecialchars($newPostTitle), htmlspecialchars($newPost)]);
    }

    public function getPostList(){
        $bdd = $this->dbConnect();
        $requete = $bdd->query("SELECT * FROM billets");
        return $requete;
    }

    public function getPost($postID){
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT * FROM billets WHERE postID = ?");
        $requete->execute([$postID]);
        return $requete;
    }

    public function updatePost($updateTitle, $updatePost,$postID)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("UPDATE billets SET titre= ?, billet=? WHERE postID = ? ");
        $requete->execute([htmlspecialchars($updateTitle), htmlspecialchars($updatePost),htmlspecialchars($postID)]);
    }

    public function deletePost($postID){

        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("DELETE FROM billets WHERE ID = ? ");
        $requete->execute([$postID]);
    }

    public function sendComment($postID, $pseudo, $comment)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("INSERT INTO commentaires (postID,pseudo,comment) VALUE (?,?,?)");
        $requete->execute([$postID,$pseudo,$comment]);
    }

    public function getComments($postID)
    {
        $bdd = $this->dbConnect();
        $requete = $bdd->prepare("SELECT * FROM commentaires WHERE postID = ? ");
        $requete->execute([$postID]);
        return $requete;
    }
}

?>
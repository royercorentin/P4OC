<?php
require "models/UserModel.php";

function inscription()
{
    if(isset($_SESSION['pseudo'])) {
        include("views/inscription.php");
    } else {
        $errorCode = "404";
        $errorMessage = " Cette page n'existe pas";
        include ("views/error.php");
    }
}

function saveInscription()
{
    $model = new UserModel();
    $model->createUser($_POST['pseudo'], $_POST['password']);
    include("views/confirmInscription.php");
}

function login()
{
    include("views/login.php");
}

function loginTry()
{
        $model = new UserModel();
        $model->loginUser($_POST['pseudo'], $_POST['password']);
        adminPanel();
}

function deconnexion(){
    session_destroy();
    include("views/deconnexionConfirm.php");

}

function adminPanel(){
    if(isset($_SESSION['pseudo'])){
        include("views/adminPanel.php");
    } else {
        $errorCode = "404";
        $errorMessage = " Cette page n'existe pas";
        include ("views/error.php");
    }

}

?>
<?php session_start();
$action = $_GET["action"];

if($action=="accueil"){
    include("homepage.php");
}

require "controllers/userController.php";
$action = $_GET["action"];

if ($action=="inscription"){
    inscription();
}

if ($action=="saveInscription"){
    saveInscription();
}

if ($action=="login"){
    login();
}
if ($action=="loginCheck"){
    loginTry();
}

if($action=="deconnexion"){
    deconnexion();
}
if($action=="adminPanel"){
    adminPanel();
}

require "postController.php";

if ($action=="newPost"){
    newPost();
}

if ($action=="sendNewPost"){
    sendPost();
}

if($action=="getPostList"){
    postList();
}

if($action=="getPost"){
    getPostController();
}

if($action=="editPost"){
    getPostUpdate();
}

if($action=="updatePost"){
    updatePost();
}

if($action=="deletePost"){
    deletePost();
}

if($action=="writeComment"){
    writeCommentController();
}

if($action=="sendComment"){
    sendCommentController();
}
if($action=="getPostWithComments"){
    getPostWithComments();
}

if($action=="reportComment"){
    reportComment();
}

if($action=="getReportedComments"){
    getReportedComments();
}

if($action=="approveComment"){
    approveComment();
}

if($action=="deleteComment"){
    deleteComment();
}
?>
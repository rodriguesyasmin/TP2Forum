<?php
function AfficherForum()
{
    //require_once('lib/checkSession.php');
    render('/user/forum.php');
}
function afficherFormArticle()
{
    require_once('lib/checkSession.php');
    render('/forum/formArticle.php');
}

function creerArticle()
{

    // error_log('chegou no controller' . $_POST);
    require('models/forum.php');
    ajouterArticle();
    header('location: ?controller=forum&function=AfficherForum');
}

function logout()
{
    session_destroy();
    render('/user/login.php');
}

function deleterArticle($request)
{
    require('models/forum.php');
    deleter($request);
    echo "apagou";
}
function afficherEditer($request)
{
    require('models/forum.php');
    $postArticle = afficherFormEditer($request);
    render('/forum/editFormArticle.php', $postArticle);
}

function editer()
{
    require('models/forum.php');
    updatePost();
    header('location: ?controller=forum&function=AfficherForum');
}

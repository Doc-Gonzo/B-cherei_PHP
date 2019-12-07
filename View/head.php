<?php

    require_once "model/global_functions.php";
    echo '
        <html>
        <head>
            <title>Bücherei-Manager</title>
            <link rel="stylesheet" type="text/css" href="view/main.css">
        </head>
        <body>
        <div class="wrapper">
        <div class="header">
            <div class="header_img">
                <img src="view/img/bookshelf.jpg" title="Bookshelf">    
        </div>
            <div class="titlebox">
            <div class="title">
                <h1>Bücherei Manager</h1>
            </div>
            <div class="loginarea">
    ';

    include "model/login.php";

    echo '    

    </div>
            </div>
        </div>    <div class="clear"></div>
    ';
    include 'model/menu.php';

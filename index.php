<?php
    include "view/head.php";


    echo '<h2>Willkommen</h2>';

    if(($_COOKIE['logged_in'] == 'false')) {
        echo'
            <p>Bitte loggen Sie sich ein, um fortfahren zu können.</p>
        ';
    }
    else {
        echo '<p>Was möchten Sie tun?';
        include 'model/menu.php';
    }
    include 'view/footer.php';

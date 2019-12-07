<?php
    include "view/head.php";


    echo '<h2>Willkommen</h2>';

    if(($_COOKIE['logged_in'] == 'false')) {
        echo'
            <p>Bitte loggen Sie sich ein, um fortfahren zu können.</p>
        ';
    }
    else {

    }
    include 'view/footer.php';

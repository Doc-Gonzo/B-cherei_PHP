<?php
include "view/head.php";
checkLogin();

if( isset($_POST['vn_kunde']) AND isset($_POST['nn_kunde']) AND isset($_POST['tel_kunde'])  ){
    echo 'Parameter übergeben.';
    add_kunde($_POST['vn_kunde'],$_POST['nn_kunde'],$_POST['tel_kunde']);
    echo 'Kunde erfolgreich angelegt.';
}
else {
    echo 'Keine Parameter übergeben.';
    }

echo '<h2>Kunde anlegen</h2>';

if(($_COOKIE['logged_in'] == 'false')) {
    echo'
            <p>Bitte loggen Sie sich ein, um fortfahren zu können.</p>
        ';
}
else {
    include 'model/kunde_form.php';
}
include 'view/footer.php';


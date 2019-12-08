<?php
include "view/head.php";
checkLogin();

if( isset($_POST['vn_kunde']) AND isset($_POST['nn_kunde']) AND isset($_POST['tel_kunde'])  ){

    add_kunde($_POST['vn_kunde'],$_POST['nn_kunde'],$_POST['tel_kunde']);
}

    echo '<h2>Kunde anlegen</h2>';

    include 'model/kunde_form.php';

    include 'view/footer.php';


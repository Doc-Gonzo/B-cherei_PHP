<?php
include "view/head.php";
checkLogin();

if( isset($_POST['id_buch']) AND isset($_POST['id_kunde']) AND isset($_POST['datum'])){
    if( !check_if_rent($_POST['id_buch'])) {
        rent_Buch($_POST['id_buch'], $_POST['id_kunde'], $_POST['datum']);
    }
    else {ECHO'Buch ist bereits verliehen.';}
 }

echo '<h2>Buch verleihen</h2>';

include 'model/buch_verleihen_form.php';

include 'view/footer.php';

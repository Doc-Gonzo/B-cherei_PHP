<?php
include "view/head.php";
checkLogin();

if( isset($_POST['id_buch']) AND isset($_POST['id_kunde']) AND isset($_POST['datum'])){
    rent_Buch($_POST['id_buch'],$_POST['id_kunde'],$_POST['datum']);
 }

echo '<h2>Buch verleihen</h2>';

include 'model/buch_verleihen_form.php';

include 'view/footer.php';

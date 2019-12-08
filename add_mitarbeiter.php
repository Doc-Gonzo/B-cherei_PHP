<?php
include "view/head.php";
checkLogin();

if( isset($_POST['vn_mitarbeiter']) AND isset($_POST['nn_mitarbeiter']) AND isset($_POST['tel_mitarbeiter'])  AND isset($_POST['zweigst_mitarbeiter'])  ){

    add_Mitarbeiter($_POST['vn_mitarbeiter'],$_POST['nn_mitarbeiter'],$_POST['tel_mitarbeiter'],$_POST['zweigst_mitarbeiter']);
}

echo '<h2>Mitarbeiter anlegen</h2>';

include 'model/mitarbeiter_form.php';

include 'view/footer.php';

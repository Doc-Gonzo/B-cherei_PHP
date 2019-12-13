<?php
include "view/head.php";
checkLogin();

if( isset($_POST['pw1_mitarbeiter']) AND isset ($_POST['pw2_mitarbeiter'])){
    if( checkPasswords($_POST['pw1_mitarbeiter'],$_POST['pw2_mitarbeiter'])){
        if( isset($_POST['vn_mitarbeiter']) AND isset($_POST['nn_mitarbeiter']) AND isset($_POST['tel_mitarbeiter'])  AND isset($_POST['zweigst_mitarbeiter'])  ){

            $pw_hashed = hash_password_argoni($_POST['pw2_mitarbeiter']);
            add_Mitarbeiter($_POST['vn_mitarbeiter'],$_POST['nn_mitarbeiter'],$_POST['tel_mitarbeiter'],$_POST['zweigst_mitarbeiter'],$pw_hashed);
        }
        else {
            ECHO 'Sie haben nicht alle Felder ausgefüllt.';
        }
    }
    else {
        ECHO 'Passwörter stimmen nicht überein';
    }
};

echo '<h2>Mitarbeiter anlegen</h2>';

include 'model/mitarbeiter_form.php';

include 'view/footer.php';

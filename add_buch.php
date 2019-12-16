<?php
include "view/head.php";
checkLogin();

if( isset($_POST['isbn_buch']) AND isset($_POST['titel_buch']) AND isset($_POST['author_buch'])  AND isset($_POST['cat_buch']) AND isset($_POST['preis_buch']) AND isset($_POST['verlag_buch'])AND isset($_POST['zweigst_buch']) ){
    if($_POST['isbn_buch'] !== "" AND $_POST['titel_buch'] !== "" AND $_POST['author_buch'] !== "" AND $_POST['cat_buch'] !== "" AND $_POST['preis_buch'] !== "" AND $_POST['verlag_buch'] !== "" AND $_POST['zweigst_buch'] !== "" ){
        add_Buch($_POST['isbn_buch'],$_POST['titel_buch'],$_POST['author_buch'],$_POST['cat_buch'],$_POST['preis_buch'],$_POST['verlag_buch'],$_POST['zweigst_buch']);

    }
    else{ECHO'Bitte füllen Sie alle Felder aus.';}
}

echo '<h2>Buch anlegen</h2>';

include 'model/buch_form.php';

include 'view/footer.php';

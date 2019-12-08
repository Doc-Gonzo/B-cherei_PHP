<?php
include "view/head.php";
checkLogin();

if( isset($_POST['isbn_buch']) AND isset($_POST['titel_buch']) AND isset($_POST['author_buch'])  AND isset($_POST['cat_buch']) AND isset($_POST['preis_buch']) AND isset($_POST['verlag_buch'])AND isset($_POST['zweigst_buch']) ){

    add_Buch($_POST['isbn_buch'],$_POST['titel_buch'],$_POST['author_buch'],$_POST['cat_buch'],$_POST['preis_buch'],$_POST['verlag_buch'],$_POST['zweigst_buch']);
}

echo '<h2>Buch anlegen</h2>';

include 'model/buch_form.php';

include 'view/footer.php';

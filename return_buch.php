<?php
include "view/head.php";
checkLogin();

if( isset($_POST['id_verleihvorgang'])){
    return_Buch($_POST['id_verleihvorgang']);

}

echo '<h2>Buch zurückgeben</h2>';

include 'model/buch_return_form.php';

include 'view/footer.php';

<?php

function setLoginCookieUserId($user_id){
        setcookie("logged_in", "true");
        setcookie("logged_in_user", $user_id);
    };
function setLoginCookie(){
    setcookie("logged_in", "true");
};
function logout(){
    setcookie("logged_in", "false");
    setcookie("logged_in_user", "JohnDoe");
     header("index.php");
};
function checkLogin(){
    if(($_COOKIE['logged_in'] == "false")) {
       echo '<script> location.replace("index.php")</script>';
    }
    else {echo 'Cookie Right';}
}
function checkName($givenName)
{
    $nameString = trim($givenName);
    $pattern = '/[a-z0-9.-_]/';
    if (preg_match($pattern, $nameString) === 1) {
        return true;
    } else {
        echo "Name entspricht nicht den vorgaben <br/> <br/>";
        return false;
    }
};
function add_kunde($vn_kunde, $nn_kunde,$tel_kunde ){
    $db_link = new mysqli (
        '127.0.0.1',
        'root',
        '',
        'buch'
    );
    if (!$db_link) {
        echo 'NOT CONNECTED';
    }
    else {
        echo 'CONNECTED!';
    }

    // Daten zum Speichern in der Datenbank vorbereiten:
    $VornameStripped = stripslashes($vn_kunde);
    $NachnameStripped = stripslashes($nn_kunde);

    if (checkName($VornameStripped) AND checkName($NachnameStripped)) {

        $sqleintrag = " CALL add_kunde('$VornameStripped','$NachnameStripped','$tel_kunde'); ";

        if ( mysqli_query($db_link, $sqleintrag)) {
            echo "New record created successfully";
        }
        else {
            echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
        }
    } else {
        echo '</br> Ihre Angaben entsprechen nicht dem Standard';
    }


    $db_link->multi_query("CALL add_Kunde($VornameStripped,$NachnameStripped,$tel_kunde)");

    $db_link->close();

}
<?php
function checkPasswords($pass1,$pass2){
    if ($pass1 == $pass2){
        return true;
    }
    else {
        return false;
    }
};
function hash_password($pass_unhased) {
    $pass_hashed = 'Argon2i hash: ' . password_hash($pass_unhased, PASSWORD_ARGON2I);
    return $pass_hashed;
}
function setSession($sess_user,$sess_pass){
    // Getting submitted user data from database
    $db_link = new mysqli   (
        '127.0.0.1',
        'root',
        '',
        'buch'
    );
    $stmt = $db_link->prepare("SELECT * FROM mitarbeiter WHERE idMitarbeiter = ?");
    $stmt->bind_param('s', $sess_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();
    var_dump($sess_pass, $user->pwMitarbeiter );
    if( password_verify( $sess_pass, $user->pwMitarbeiter ) ) {
        ECHO 'VERIFIED';
        $_SESSION['user_id'] = $user->idMitarbeiter;

    }
    else {
        ECHO 'PW : ' .  $user->pwMitarbeiter ;
     ECHO   'NOT VERIFIED';
    }
};
function logout(){
    session_destroy();
    echo '<script> location.replace("index.php")</script>';
};
function checkLogin(){
    if(($_COOKIE['logged_in'] == "false")) {
       echo '<script> location.replace("index.php")</script>';
       exit();
    }
}
function hash_password_argoni($pass_unhased) {
    $pass_hashed = 'Argon2i hash: ' . password_hash($pass_unhased, PASSWORD_ARGON2I);
    return $pass_hashed;
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

    // Daten zum Speichern in der Datenbank vorbereiten:
    $VornameStripped = stripslashes($vn_kunde);
    $NachnameStripped = stripslashes($nn_kunde);

    if (checkName($VornameStripped) AND checkName($NachnameStripped)) {

        $sqleintrag = " CALL add_kunde('$VornameStripped','$NachnameStripped','$tel_kunde'); ";

        if ( mysqli_query($db_link, $sqleintrag)) {
            echo "Kunde erfolgreich angelegt.";
        }
        else {
            echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
        }
    } else {
        echo '</br> Ihre Angaben entsprechen nicht dem Standard';
    }

    $db_link->close();

}

function add_Mitarbeiter($vn_mitarbeiter, $nn_mitarbeiter,$tel_mitarbeiter,$zweigst_mitarbeiter ){
$db_link = new mysqli (
    '127.0.0.1',
    'root',
    '',
    'buch'
);
    if (!$db_link) {
        echo 'NOT CONNECTED';
    }

    // Daten zum Speichern in der Datenbank vorbereiten:
    $VornameStripped = stripslashes($vn_mitarbeiter);
    $NachnameStripped = stripslashes($nn_mitarbeiter);

    if (checkName($VornameStripped) AND checkName($NachnameStripped)) {

        $sqleintrag = " CALL add_mitarbeiter('$VornameStripped','$NachnameStripped','$tel_mitarbeiter','$zweigst_mitarbeiter'); ";

        if (mysqli_query($db_link, $sqleintrag)) {
            echo "Mitarbeiter erfolgreich angelegt.";
        }
        else {
            echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
        }
    } else {
        echo '</br> Ihre Angaben entsprechen nicht dem Standard';
    }

    $db_link->close();

}

function add_Buch($isbn_buch, $titel_buch,$author_buch,$cat_buch,$preis_buch,$verlag_buch,$zweigst_buch ){
    $db_link = new mysqli (
        '127.0.0.1',
        'root',
        '',
        'buch'
    );
    if (!$db_link) {
        echo 'NOT CONNECTED';
    }
        $sqleintrag = " CALL add_buch('$isbn_buch','$titel_buch','$author_buch','$cat_buch','$preis_buch','$verlag_buch','$zweigst_buch'); ";

        if (mysqli_query($db_link, $sqleintrag)) {
            echo "Buch erfolgreich angelegt.";
        }
        else {
            echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
        }
    $db_link->close();
}
function rent_Buch($id_buch, $id_kunde,$datum ){
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
        echo 'CONNECTED';
    }
    $today  =date("Y/m/d") ;

    $sqleintrag = " CALL add_Verleihvorgang('$id_buch','$id_kunde','$datum','$today'); ";

    if (mysqli_query($db_link, $sqleintrag)) {
        echo "Buch erfolgreich angelegt.";
    }
    else {
        echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
    }
    $db_link->close();
}

function return_Buch($id_verleihvorgang){
    $db_link = new mysqli (
        '127.0.0.1',
        'root',
        '',
        'buch'
    );
    if (!$db_link) {
        echo 'NOT CONNECTED';
    }

    $today  =date("Y/m/d") ;

    $sqleintrag = " CALL return_Buch('$id_verleihvorgang','$today'); ";

    if (mysqli_query($db_link, $sqleintrag)) {
        echo "Buch erfolgreich retourniert.";
    }
    else {
        echo "Anfrage fehlgeschlagen: " . mysqli_error($db_link);
    }
    $db_link->close();
}
function rent_list(){
    $db_link = new mysqli (
        '127.0.0.1',
        'root',
        '',
        'buch'
    );
    if (!$db_link) {
        echo 'NOT CONNECTED';
    }
     $sqleintrag = " SELECT idBuch,titelBuch From verleihvorgang JOIN buch ON buch.idBuch = verleihvorgang.buchIDVerleihgvorgang  WHERE datumRueckgabe IS NULL ";

    if ($result = $db_link->query($sqleintrag)) {

        /* fetch object array */
        while ($row = $result->fetch_row()) {
            echo  '<span class="book_id">' . $row[0] . '</span> ' . '<span class="book_title">' . $row[1] . '</span>' . ' </br>';
        }

    }
    $db_link->close();
}

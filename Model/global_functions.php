<?php

function checkPasswords($pass1, $pass2){
    if ($pass1 == $pass2){
        return true;
    }
    else {
        return false;
    }
};
function getDBLink(){
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
        return $db_link;
    }
}
function setSession($sess_user,$sess_pass){
    // Getting submitted user data from database
    $db_link =  getDBLink();
    $stmt = $db_link->prepare("SELECT * FROM mitarbeiter WHERE idMitarbeiter = ?");
    $stmt->bind_param('s', $sess_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();
    var_dump($user );
    ECHO   '</br></br> ';
    $stored_pw = $user->pwMitarbeiter;
    ECHO   '</br></br> Uebermitteltes PW:  ' . $sess_pass;
        ECHO   '</br></br> Uebermitteltes PW Hashed:  ' . hash_password_argoni($sess_pass);
        ECHO   '</br></br> Stored PW DB: '. $stored_pw;

    if (password_verify("$sess_pass","$stored_pw")) {
        ECHO 'VERIFIED';
        $_SESSION['user_id'] = $user->idMitarbeiter;
    }
    else {
        ECHO   '</br></br> NOT VERIFIED';
    }
    $db_link->close();
}


function setSessionRaw($sess_user,$sess_pass){
    // Getting submitted user data from database
    $db_link =  getDBLink();
    $stmt = $db_link->prepare("SELECT * FROM mitarbeiter WHERE idMitarbeiter = ?");
    $stmt->bind_param('s', $sess_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_object();
    ECHO   '</br></br> ';
    $stored_pw = $user->pwMitarbeiterRaw;
    if ($stored_pw ==$sess_pass) {
        ECHO 'VERIFIED';
        $_SESSION['user_id'] = $user->idMitarbeiter;
    }
    else {
        ECHO   '</br></br> NOT VERIFIED';
    }
    $db_link->close();
}


function logout(){
    session_destroy();
    echo '<script> location.replace("index.php")</script>';
};
function checkLogin(){

}
function hash_password_argoni($pass_unhashed) {
    $pass_hashed = password_hash('$pass_unhashed', 3);
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
    $db_link =  getDBLink();

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

function add_Mitarbeiter($vn_mitarbeiter, $nn_mitarbeiter,$tel_mitarbeiter,$zweigst_mitarbeiter,$pw_mitarbeiter ){
    $db_link =  getDBLink();
    // Daten zum Speichern in der Datenbank vorbereiten:

    $VornameStripped = stripslashes($vn_mitarbeiter);
    $NachnameStripped = stripslashes($nn_mitarbeiter);

    if (checkName($VornameStripped) AND checkName($NachnameStripped)) {
        $pw_mitarbeiter_hashed = hash_password_argoni('$pw_mitarbeiter');
        $sqleintrag = " CALL add_mitarbeiter('$VornameStripped','$NachnameStripped','$tel_mitarbeiter','$zweigst_mitarbeiter','$pw_mitarbeiter_hashed'); ";

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
        $db_link =  getDBLink();
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
    $db_link =  getDBLink();

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
    $db_link =  getDBLink();
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
    $db_link =  getDBLink();
     $sqleintrag = " SELECT idBuch,titelBuch,idVerleihvorgang From verleihvorgang JOIN buch ON buch.idBuch = verleihvorgang.buchIDVerleihgvorgang  WHERE datumRueckgabe IS NULL ";

    if ($result = $db_link->query($sqleintrag)) {

        /* fetch object array */
        while ($row = $result->fetch_row()) {
            $short_string = substr($row[1] , 0, 10);
            echo  '<span class="book_id">' . $row[0] . '</span> ' . '<span class="book_title">' . $short_string . '</span>'.'<span class="verleih_id">' . $row[2] . '</span>' . ' </br>';
        }
    }
    $db_link->close();
}
function stock_list(){
    $db_link =  getDBLink();

    $sqleintrag = " SELECT titelBuch,idBuch From verleihvorgang JOIN buch ON buch.idBuch = verleihvorgang.buchIDVerleihgvorgang  WHERE datumRueckgabe IS NOT NULL ";

    if ($result = $db_link->query($sqleintrag)) {
        $books = array();
        /* fetch object and push to array */
        while ($row = $result->fetch_row()) {
            $short_string = substr($row[0], 0, 10);
            $book = '<div class="stock_list_row"><span class="book_title"><a title="' . $row[0] . '" href="buch_detail.php?buch_id=' . $row[1] . '" >' . $short_string . '</a></span>' . '<span class="book_id">' . $row[1] . '</span> </div>';
            // Pruefe ob keine Duplikate
            if (!in_array($book, $books, true)) {
                array_push($books, $book);
            }
        }
        // Array sortieren
        sort($books);
        foreach ($books as &$value) {
            print_r($value);
        }
    }
    $db_link->close();
}

function buch_detail($buch_id){
    $db_link =  getDBLink();

    $sqleintrag = " SELECT * From buch WHERE idBuch = $buch_id ";

    if ($result = $db_link->query($sqleintrag)) {
        $row = $result->fetch_row();
            buch_detail_make_table($row[2],$row[3],$row[4],$row[6],$row[5],$row[1]);
        }
    else {
        ECHO 'Kein Ergebnis unter dieser Buch-ID';
    };
    $db_link->close();
}
function buch_detail_make_table($titel,$author,$cat,$verlag,$preis,$isbn){
    ECHO '
        <table class="book_detail_table">
            <tbody>
                <tr><td>Titel: </td><td>' . $titel .'</td></tr>
                <tr><td>Author: </td><td>'. $author .'</td></tr>
                <tr><td>Genre: </td><td>' . $cat . '</td></tr>
                <tr><td>Verlag: </td><td>'.$verlag.'</td></tr>
                <tr><td>Preis: </td><td>'.$preis.'</td></tr>	
                <tr><td>ISBN: </td><td>'.$isbn . '</td></tr>
            </tbody>	
        </table>
    ';
}

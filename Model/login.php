<?php


if ( ! empty( $_POST ) ) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $sess_user = $_POST['username'];
        $sess_pass = $_POST['password'];

        setSession($sess_user,$sess_pass);
    }
}


if( isset($_POST['hidden_logout']) )
{
    logout();
}

if ( isset( $_SESSION['user_id'] ) ) {
    ECHO 'SESSION GESETZT!!';
}
else {
    echo 'Keine Session';
};
if ( !isset( $_SESSION['user_id'] ) ) {
    echo '
    <div class="loginbox">
        <form action="" method="post">
            <input type="text" name="username" placeholder="Benutzer-ID">
            <input type="text" name="password" placeholder="Passwort">
            <input type="submit" value="Einloggen"> 
        </form>
    <div>
    ';
    }

else {
    echo '
       <div class="logoutbox"><p>User: ' . $_SESSION['user_id'] .'</p>
            <form action="index.php" method="post">
                <input name="hidden_logout" type="hidden" value="true">           
                <input type="submit" value="Ausloggen">
            </form>
       </div>
    
    ';

}

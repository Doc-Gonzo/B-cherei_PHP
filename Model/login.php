<?php

if ( ! empty( $_POST ) ) {
    if (isset($_POST['userID']) && isset($_POST['password'])) {
        $sess_user = $_POST['userID'];
        $sess_pass = $_POST['password'];

       setSession($sess_user,$sess_pass);
       /* setSession($sess_user,$sess_pass); */
    }
}

if( isset($_POST['hidden_logout']) )
{
    logout();
}

if ( !isset( $_SESSION['user_id'] ) ) {
    echo '
    <div class="loginbox">
        <form action="" method="post">
            <input type="text" name="userID" placeholder="Benutzer-ID">
            <input type="password" name="password" placeholder="Passwort">
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

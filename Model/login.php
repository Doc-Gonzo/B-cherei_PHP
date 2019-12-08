<?php


/* PROVISORISCHER DUMMY LOGIN */
if( isset($_POST['password']) )
{
    setLoginCookie();
}
if( isset($_POST['hidden_logout']) )
{
    logout();
}


if(($_COOKIE['logged_in'] == 'false')) {
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
       <div class="logoutbox">
            <p>$first_name</p>
            <p>$last_name</p>
            <form action="index.php" method="post">
                <input name="hidden_logout" type="hidden" value="true">           
                <input type="submit" value="Ausloggen">
            </form>
       </div>
    
    ';

}

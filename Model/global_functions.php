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
};

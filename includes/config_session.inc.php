<?php 
//security purpose
ini_set('session.use_only_cookies', 1); //set ini_set to true inorder to make it secure when it come to handling more exception
ini_set('session.use_strict_mode', 1); // this too are mandatory

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' =>  '/',
    'secure' => true,
    'httponly' => true
]); //this is inorder to make it more secure

session_start();
// if else statement which will update ever 30 minutes which will go in and check our cookie and regenerate id for that cookie // prevent attacker from accessing to cookie
if (!isset($_SESSION['last_regenration'])) {
    // session_regenerate_id();
    // $_SESSION["last_regeneration"] = time();
    regenerate_session_id();
} else {
    $interval= 60 * 30;

    if(time() - $_SESSION['last_regeration'] = $interval){
    // session_regenerate_id();
    // $_SESSION["last_regeneration"] = time();
        regenerate_session_id();
    }
}

//regenerate function
function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}
<?php
session_start();
 if (isset($_POST['user_name']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['user_name']);
    $password = validate($_POST['password']);

    if(empty($username)){
        header("Location: ../index.php?error=Votre nom d'utilisateur est requis.");
        exit();
    } else if (empty($password)){
        header("Location: ../index.php?error=Votre mot de passe est requis.");
        exit();
    } else {
        include_once '../classes/db.php';
        $db = new Db();
        $db->login();

        $request = $db->connexion->query("
        SELECT * FROM users INNER JOIN roles ON users.role_id=roles.role_id WHERE username='$username' AND password='$password' AND roles.`role-name` LIKE 'administrateur'
        "); 
        $response = $request->fetch();
        $db->logout();
        if (!empty($response)){
            header("Location: ../dashboard.php");
            $_SESSION["name"]=$username;
        } else {
            header("Location: ../index.php?error=Le nom d'utilisateur ou le mot de passe est erroné.");
            exit();
        }   
    }}
else {
    header("Location: ../index.php");
    exit();
}

?>
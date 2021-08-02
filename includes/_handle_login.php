<?php
ob_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        include '_dbconnect.php';

        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("SELECT * FROM forum_users WHERE user_email = ? ");
        $stmt->execute([$email]);

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($users);
        if($users > 0){
            if(password_verify($password,$users[0]['user_password'])){
                $login = true;
                session_start();
                $_SESSION['user_id'] = $users[0]['user_id'];
                $_SESSION['username'] = $users[0]['user_name'];
                $_SESSION['email'] = $users[0]['user_email'];
                $_SESSION['loggedin'] = true;
                sleep(1);
                $msg = 'Logged in successfully';
                header("location: ../index.php?login=$msg");
            }
            else{
                $error = 'wrong credentials';
                header("Location: ../index.php?login=$error");
            }
        }else{
            $error = 'wrong credentials';
            header("Location: ../index.php?login=$error");
        }
    }
ob_end_flush();
?>
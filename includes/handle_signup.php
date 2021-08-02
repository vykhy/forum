<?php
ob_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include '_dbconnect.php';

        $username = $_REQUEST['name'];
        $email = $_POST['email'];
        $password = $_REQUEST['password'];
        $cpassword = $_REQUEST['cpassword'];

        $exists = 'false';
        
        if($username != ''){
            $pdo = pdo_connect_mysql();
            $stmt = $pdo->prepare("SELECT * FROM forum_users WHERE user_email = ?");
            $stmt->execute([$email]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rows = count($rows);

            if($rows > 0){
                $exists = 'Email is already in use';
            }
        }
               
        if($exists == 'false'){
            if($password == $cpassword) {
                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                $pdo = pdo_connect_mysql();
                $stmt = $pdo->prepare("INSERT INTO forum_users (user_name, user_email, user_password) VALUES (?,?,?)"); //INSERT INTO `user` (`id`, `name`, `password`, `date`) VALUES (NULL, 'test2', 'test2', current_timestamp());
                $confirm = $stmt->execute([$username,$email,$hashed_pass]);
               // print_r($confirm);
                $username = '';
                if($confirm){
                    $showAlert = true;
                    $message='Login successful';
                    header("Location: ../index.php?message=$message");
                }
            }else{ 
                $exists = 'Passwords do not match';
                header("Location: ../index.php?message=$exists");
            }
        }else{
            echo 
            '<div class="alert alert-primary alert-dismissible fade show" id="delete-alert" role="alert">
            <strong>Failed!</strong>' . $exists .'
            <button type="button" id="delete-button" class="btn-close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
        
    }
ob_end_flush();
?>
<?php
    session_start();
    require("database.php");
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            if(isset($_POST['username']) && isset($_POST['password'])){
                
                $password = hash("sha256", $_POST['password']);

                $q = $db->prepare("SELECT * FROM users WHERE username= :username AND password= :password");
                $q->execute(array('username'=>$_POST['username'], ':password'=>$password));

                $results = $q->fetch(); 

                if(isset($results[0])){
                    $_SESSION['ID'] = $results[0];
                    $_SESSION['USERNAME'] = $results[1];
                    $_SESSION['PASSWORD'] = $results[2];
                    $_SESSION['LOGGED'] = true;

                    header("Location: index.php"); 
                       exit();
                }else{
                    echo "<div class='alert alert-danger center-block' role='alert'>
                        Kullanıcı adı veya şifre yanlış!
                        </div>";
                }
            }

        ?>
    <div class="container position-absolute top-50 start-50 translate-middle w-50">
        <div class="row ">
            <div class="col">
            <form action="#" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-dark btn-lg" type="submit">Sign In</button>
                </div>
                <a href="signup.php" class="link-primary">Hesap oluşturmak için tıklayınız</a>
            </form>    
            </div>
        </div>
    </div>
    </body>
</html>
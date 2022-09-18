<?php
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
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            
            $password = hash("sha256", $_POST['password']);            

                $q = $db->prepare("SELECT * FROM users WHERE username= :username ");
                $q->execute(array('username'=>$_POST['username']));

                $results = $q->fetch();  
                if(isset($results[0]))
                {
                    echo "<div class='alert alert-danger center-block' role='alert'>
                        Bu kullanıcı adı zaten mevcut !
                        </div>";
                }
                else
                {                           
                    $username = $_POST['username'];
                    $insert = $db->prepare("INSERT INTO users (username, password) VALUES (?,?)");    
                    $insert -> execute([$username,$password]);
                    
                    echo "<div class='alert alert-success' role='alert'>
                        Başarı ile kayıt oldunuz!
                        </div>";
                }
        }        
        ?>
    <div class="container position-absolute top-50 start-50 translate-middle w-50">
        <div class="row">
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
                    <button class="btn btn-dark btn-lg" type="submit">Sign Up</button>
                </div>
                <a href="login.php" class="link-primary">Giriş yapmak için tıklayınız</a>
            </form>    
            </div>
        </div>
    </div>
    </body>
</html>
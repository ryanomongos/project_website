<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <label>Username</label>
                        <input type="text" name="username" required>
                        <label>Password</label>
                        <input type="password" name="password" required>
                        <button name=login>Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'project');
            session_start();
            if(isset($_POST['login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $result = $conn->query("SELECT * FROM user_accounts WHERE username = '$username' AND password = '$password ");   
                if($result){
                    echo"congrats it work";
                }else{
                    echo strval($result);
                }             
            }
        ?>
    </body>
</html>
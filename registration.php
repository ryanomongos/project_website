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
                        <label>Name</label>
                        <input type="text" name="name" required>
                        <label>Username</label>
                        <input type="text" name="username" required>
                        <label>Password</label>
                        <input type="text" name="password" required>
                        <button name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $conn = new mysqli('localhost', 'root', '', 'project');
            session_start();
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                date_default_timezone_set('Asia/Manila');
                $date = date("Y/m/d H:i:s");

                $result = $conn->query("INSERT INTO user_accounts (name, username, password, createdAt) VALUES ('$name', '$username', '$password', '$date') ");                 
            }
        ?>
    </body>
</html>
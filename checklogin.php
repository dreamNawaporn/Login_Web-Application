<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        require 'Login.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = new Login('localhost', 'login', 'root', '');

            if ($login->authenticate($username, $password)) {
                echo '<h1>Login successful !</h1>';
                echo '<h1>ล็อกอินสำเร็จ ! </h1>';
            } else {
                echo '<h1>Login failed !</h1>';
                echo '<h1>ล็อกอินไม่สำเร็จ !</h1>';
            }
        }
        ?>
    </div>
</body>
</html>

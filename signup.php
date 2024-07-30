<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $error_message = null;
    if(isset($_POST['submit'])){
        $host = 'localhost';
        $user = 'root';
        $db_password = '';
        $dbname = 'myfits';
        $conn = mysqli_connect($host, $user, $db_password, $dbname);

        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);

        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $password = $_POST['password'];

        if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)){
            if(strlen($password) < 8 ){
                $error_message = 'password is too short';
            }else{
            $currentDateTime = date('Y-m-d H:i:s');
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $check = "SELECT * FROM users_data WHERE email = '$email'";
            $result = mysqli_query($conn, $check);

            if(mysqli_num_rows($result) > 0){
                $error_message = 'User with the provided email address already exists';
            }else{
                $add = "INSERT INTO users_data(first_name, last_name, email, user_password, reg_date) VALUES ('$first_name', '$last_name', '$email', '$hash_password', '$currentDateTime')";
                mysqli_query($conn, $add);
                header("Location: login.php");
            }
            }
            mysqli_close($conn);
        }else{
            $error_message = 'All fields are required';
        }
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | Myfits</title>
    <link rel="stylesheet" href="styles/account.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <header>
            <div class="boutique-name">Myfits</div>
            
            <div class="navigation">
                <a href=""><img src="assets/icons/icons8-user-profile-96.png" alt="" width="30" height="30"></a>
                <button class="search-button"><img src="assets/icons/icons8-search-50.png" width="30" height="30"></button>
                <a href=""><img src="assets/icons//icons8-cart-96.png" width="30" height="30"></a>
            </div>
        </header> 

        <center>
        <div class="nav">
                <a href="">Home</a>
                <a href="">Shop</a>
                <a href="">Contact</a>
        </div>
        </center>

        <hr>

        <center>
        <form action="" method="POST" class="login-form">
            <div class="title">Sign up</div>
           <div class="instruction"> Please enter your details to sign up</div>
           <div class="error">
           <?php
                echo $error_message;
           ?>
           </div>
           <input type="text" class="first-name" placeholder="First " name="first_name">
           <input type="text" class="last-name" placeholder="Last name" name="last_name">
           <input type="text" class="email-input" placeholder="Email address" name="email">
           <input type="password" class="password-input" placeholder="Password" name="password">
           <div class="forgot-password"><a href="">Forgot password?</a></div>
           <input type="submit" class="submit-button" value="Login" name="submit">
           <div class="no-account">Already have an account? <a href="login.php">Login</a> </div>
        </form>
    </center>

    </main>
</body>
<script src="scripts/preventDefault.js"></script>
</html>
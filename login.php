<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'myfits';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    $error_message = null;
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST['submit'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $sql = "SELECT * FROM users_data WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $firstname = $row['first_name'];
                $hash_password = $row['user_password'];
                if(password_verify($password, $hash_password)){
                    session_start();
                    $_SESSION['username'] = $firstname;
                    header("Location: index.php");
                }else{
                    $error_message = "Inncorrect email address or password";
                }
            }else{
                $error_message = "Inncorrect email address or password";
            }
        }else{
            $error_message = "All fields are required";
        }
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Myfits</title>
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
            <div class="title">LOGIN</div>
           <div class="instruction"> Please enter your login credentials</div>
           <div class="error">
           <?php
                echo $error_message;
           ?>
           </div>
           <input type="text" class="email-input" placeholder="Email address" name="email">
           <input type="password" class="password-input" placeholder="Password" name="password">
           <div class="forgot-password"><a href="">Forgot password?</a></div>
           <input type="submit" class="submit-button" value="Login" name="submit">
           <div class="no-account">Don't have an account? <a href="signup.php">Sign up</a> </div>
        </form>
    </center>

    </main>
</body>
<script src="scripts/preventDefault.js"></script>
</html>

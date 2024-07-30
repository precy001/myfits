<?php   
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Myfits</title>
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
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

    </main>

    <div class="main-index">
        <center>
            <div class="main-text">Level up your style with our <br> fashion collections
            </div>
            <a href="" class="shop">Shop now</a>
        </center>
    </div>
</body>
<script src="scripts/changePage.js"></script>
</html>
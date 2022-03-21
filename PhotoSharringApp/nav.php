<!-- the navagation bar and link to css -->
<link rel = "stylesheet" href = "css.css">
 <?php
    session_start();
    if (isset($_SESSION['UserID'])){
        echo 
        '<ul>
            <li><a href = "AppHome.php">Home</a></li>
            <li><a href = "MyPage.php">My Page</a></li>            
            <li><a href = "post.php">Post</a></li>
            <li><a href = "Search.php">Search</a></li>
            <li><a href = "profile.php">Profile</a></li>            
            <li><a href = "logout.php">Logout</a></li>
        <ul>';
    }
    else {
        echo
        '<ul>
            <li><a href = "WelcomePage.php">Home</a></li>
            <li><a href = "logIn.php">login</a></li>
            <li><a href = "signUp.php">Sign Up</a></li>
        </ul>';
    }
    
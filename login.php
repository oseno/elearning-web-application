<?php 
    session_start();
    include('connectdatabase.php');  
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM user WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username is wrong!</p>';
        } else {
            if ($password==$password) {
                             echo '<p class="success">Congratulations, you are logged in! <a href="index.html">Click to proceed</a></p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>  
<html>
<head>
    <title>CodeVilla | Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/codevilla.css">

</head>
</head>
<body>
           
    <div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">
      <h1 class="mb-4">Welcome back to <strong>CodeVilla</strong> </h1>
   </div>
 


                <form style = "text-align:center"action="" onsubmit = "return validation()" method = "POST" class="contact-form" data-aos="fade-up" data-aos-delay="300" role="form">
                                     
                      <p><label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Be creative!" name="username" id="username" required></p>
                    
                    
                      <p><label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required></p>                    
                   
                    <div class="col-lg-5 mx-auto col-7">
                      <button type="submit" id="submit-button" name="login"value="login">Log In</button>
                    </div>
                    <br>
                    <p><input type="checkbox" checked="checked" name="remember"> Remember me</p>
                    
                    <div class="container register">
                      <p style = "text-align:center">Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                </form>  
                <br>


  
  
   <!-- SCRIPTS -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- validation for empty field -->    
  
  </body>
  </html>
























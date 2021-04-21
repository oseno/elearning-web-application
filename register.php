<?php      
    session_start();
    include('connectdatabase.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO user(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!<a href="index.html">Click to proceed</a></p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?> 
<html>
<head>
    <title>CodeVilla | Register</title>
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
    <h1 class="mb-4">Register with <strong>CodeVilla</strong> </h1>
 </div>


<form style = "text-align:center" action="" onsubmit = "return validation()" method = "POST" class="contact-form" data-aos="fade-up" data-aos-delay="300" role="form">
  <div class="container">

    <p><label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required></p>

    <p> <label for="status"><b>Student Or Tutor?</b></label>
      <select id="status" name="status">
        <option value="Student">Student</option>
        <option value="Tutor">Tutor</option>
      </select></p>

    <p><label for="username"><b>Username</b></label>
      <input type="text" placeholder="Be creative!" name="username" id="username" required></p>

    <p><label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required></p>

    <p><label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required></p>
    <button type="submit" id="submit-button" name="register" value="register">Register</button>

  </div>
  
  <br>
  <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  <p style= "font-size: 13px;">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>




  
  
   <!-- SCRIPTS -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/custom.js"></script>
  
  </body>
  </html>























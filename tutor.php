<?php
   session_start();
   $con = mysqli_connect("127.0.0.1","root","*Osenopweety187","codevilla");
   if (mysqli_connect_errno()) {
   echo "Unable to connect to MySQL! ". mysqli_connect_error();
   }
   if (isset($_POST['save'])) {
   $target_dir = "tutorcontent/";
   $target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
   $uploadOk = 1;
   $docuFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
   if($docuFileType != "docx" || $docuFileType != "pdf" || $docuFileType != "pptx" || $docuFileType != "txt" ) {
   if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
   $files = date("dmYhis") . basename($_FILES["file"]["name"]);
   }else{
   echo "Error Uploading File";
   exit;
   }
   }else{
   echo "File Not Supported";
   exit;
   }
   $materialname = $_POST['materialname'];
   $materialcontent = "tutorcontent/" . $files;
   $sqli = "INSERT INTO `material` (`materialname`, `materialcontent`) VALUES ('{$materialname}','{$materialcontent}')";
   $result = mysqli_query($con,$sqli);
   if ($result) {
   echo "File has been uploaded";
   };
   }
   ?>
<html>
<head>
    <title>CodeVilla | Tutor</title>
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
        <!-- MENU BAR -->
        <nav class="navbar navbar-expand-lg">
          <div class="container">
              <a class="navbar-brand" href="index.html">
                <i class="fa fa-code"></i>
                CodeVilla
              </a>
  
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
  
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a href="aboutus.html" class="nav-link smoothScroll">About</a>
                      </li>
                      <li class="nav-item">
                          <a href="student.html" class="nav-link smoothScroll">Student</a>
                      </li>
                      <li class="nav-item">
                          <a href="automatedt.html" class="nav-link">Automated Tutor</a>
                      </li>
                      <li class="nav-item">
                           <a href="tutor.php" class="nav-link smoothScroll">Tutor</a>
                       </li>
                      <li class="nav-item">
                           <a href="feedback.html" class="nav-link smoothScroll">Contact</a>
                      </li>
                      <li class="nav-item">
                          <a href="register.php" class="nav-link contact">Register</a>
                      </li>
                      <li class="nav-item">
                           <a href="login.php" class="nav-link contact">Log In</a>
                       </li>
                  </ul>
              </div>
          </div>
      </nav>

      <div class="container">
        <div class="row">              
         <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">
             <h1 class="mb-4" data-aos="fade-up"> Tutors</h1>
         </div>
    
    
        <div class="col-lg-7 mx-auto col-md-10 col-12">
            <div class="about-info">

                <p class="mb-0" data-aos="fade-up"> <strong> What does it mean to be a tutor? </strong></p>
                 <p>  Many students struggle with the logic of basic programming. If you are able to
                     assist them in any way, we are sure it is appreciated. Choose one or both to help with. <strong>Thank you </strong>for choosing to help us.</p>
            </div>

            <div class="about-image" data-aos="fade-up" data-aos-delay="200">

             <img src="images/office.png" class="img-fluid" alt="office">
           </div>
       </div>
    </div>
    </div>

         <section class="project section-padding" id="project">
            <div class="container-fluid">
                 <div class="row">
       
                      <div class="col-lg-12 col-12" style="text-align: center" >
                      
                <form class="form" method="post" action="" enctype="multipart/form-data">
                        <label>
                          <h2 class="mb-5 text-center" data-aos="fade-up"><u>
                            <strong>C</strong>+<strong>+</strong></u>
                          </h2>    
                          <p><strong>Trivia: </strong> C++ was First Standardized in 1998 and originally Called ‘The New C’</p>
                        </label>   <p>
                        <input type="file" name="file">
                        <p>
                        <button type="submit" name="save" class ="btn"><i class="fa fa-upload"></i> Upload</button>
                        </p>

                        <label>
                        <h2 class="mb-5 text-center" data-aos="fade-up">
                           <u> <strong>Java</strong> </u>
                        </h2>       
                        <p><strong>Trivia: </strong>James Gosling and his team was building a set-top box and started 
                            by "cleaning up" C++ and wound up with a new language and runtime. Thus, Java came into being.</p>
                            </label>   <p>
                        <input type="file" name="file">
                        <p>
                        <button type="submit" name="save" class ="btn"><i class="fa fa-upload"></i> Upload</button>
                        </p>
                </form>
                    </div>
            </div>                 
            <br>
            <hr>
<div id="tutordownload">
    <center>
<table id="demo" class="table table-bordered">
<thead>
<tr>
<td>Material</td>
<td>Download</td>
</tr>
</thead>
<tbody>
<?php
$sqli = "SELECT * FROM `material`";
$res = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($res)) {
echo '<tr>';
echo '<td>Click to download!'.$row['materialname'].'</td>';
echo '<td><a class="btn" href="'.$row['materialcontent'].'">Download</a></td>';
echo '</tr>';
}
mysqli_close($con);
?>
</tbody>
</table>
</div>
         </section>

  <div class="col-lg-12 col-12 py-5 mt-5 mb-3 text-center">
            <h4 class="mb-4" data-aos="fade-up"> We have helped so many people and we want to keep doing well. <a href="feedback.html">Tell</a> us 
                how we can do better.</h4>
        </div>

<footer class="site-footer">
    <div class="container">
      <div class="row">
  
        <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
          <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">CodeVilla is excited to have you! Are you excited to have us?
              <strong>Let us know !!</strong></h1>
        </div>
  
        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
          <h4 class="my-4">Contact Information</h4>
  
          <p class="mb-1">
            <i class="fa fa-phone mr-2 footer-icon"></i> 
            +234 818 195 8925
          </p>
  
          <p>
            <a href="ewaosejosephoseno@gmail.com">
              <i class="fa fa-envelope mr-2 footer-icon"></i>
              ejoseno@gmail.com
            </a>
          </p>
        </div>
  
        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
          <h4 class="my-4">Our Services</h4>
  
          <p class="mb-1">
            <i class="fa fa-codepen mr-2 footer-icon"></i> 
            C++
          </p>
          <p class="mb-1">
             <i class="fa fa-codepen mr-2 footer-icon"></i> 
             Java
           </p>
        </div>
  
        <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
          <p class="copyright-text">CodeVilla © 2021. All Rights Reserved
          
        </div>
  
        <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
          
          <ul class="footer-link">
            <li><a href="C:\Users\PC\Desktop\project\html\feedback.html">Contact</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>
  
        <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
          <ul class="social-icon">
            <li><a href="#" class="fa fa-instagram"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-linkedin"></a></li>
            <li><a href="#" class="fa fa-facebook-official"></a></li>
          </ul>
        </div>
  
      </div>
    </div>
  
  
    
  </footer>


<style>
.btn{
margin-left: 6.5%;
background-color: black;
color: white;
}
#demo{
    width:40%;
    text-align:center;
    border:2px solid black;
}
</style>
  
  
   <!-- SCRIPTS -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/custom.js"></script>
  <script type="text/javascript">
  </body>
  </html>























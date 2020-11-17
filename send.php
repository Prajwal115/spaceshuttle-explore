<!DOCTYPE html>
<html>
<head>
  <link rel="icon" src ="Images/iconn.jpg"></link>
</head>
<style>
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #cb4154;
  border-left:8px solid  #cb4154;
  border-bottom: 8px solid darkblue;
  border-right: 8px solid darkblue;
animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
animation-name: animatebottom;
animation-duration: 2s;

}

@keyframes animatebottom {
  from{ bottom:-100px; opacity:0 }
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

font{
  color:white;
  padding-top: 45px;
  font-weight: bold;
}
button a{
  text-decoration: none;
border: none;
background-color: brown;
color:White;
font-weight: 100;
padding-bottom:10px;
transition:all 4s zoom-in 4s;
  display: inline-block;
  font-family: Arial;
  font-size:40px;


}
img {
  width:10%;
  padding-top: 90px;

}
body{
background-image:url("Images/bbg.jpg");
background-repeat:no-repeat;
background-size:cover;
}
footer{
  color:white;
  font-size: 25px;
  text-align: center;
  background-color:#8b4513;
}

</style>
<body>

    <body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>

    <div style="display:none;" id="myDiv" class="animate-bottom">
        <font style="Helventica" size ="18">
      <script>
      var myVar;

      function myFunction() {
        myVar = setTimeout(showPage, 3000);
      }

      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
      }
      </script>
<?php
// DB info
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="messages";
//Db connection
$conn = new mysqli ($servername ,$username , $password , $dbname );
if ($conn -> connect_error) {
  die ("connection falied :" . $conn -> connect_error);
}
$name = $_POST["name"];
$email = $_POST["email"];
$message =$_POST["message"];

//SQL String
$sql ="INSERT INTO message (name,email,message)
VALUES ('$name', '$email','$message')";
 //send query
 if ($conn-> query ($sql) === TRUE) {
    echo"Your Message has been recieved thanks !";
 }
else {
  "Error: ".$sql."<br>".$conn->error;
}
//close db connection
$conn->close();
 ?>
</font>
</div>
<script>
window.history.forward();
      function noBack() {
          window.history.forward();
      }
</script>
<a href ="aboutus.html">
<img src ="Images/back.jpg"></img>
</a>
</body>
</html>

<html>
<link rel="icon" src ="Images/iconn.jpg"></link>
<style>
html{
  color:white;
  font-size: 45px;
text-align: center;

}
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
body{
background-image:url("Images/bbg.jpg");
background-repeat:no-repeat;
background-size:cover;
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
.login{
  padding-top: 250px;
}
</style>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
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
    $host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "final";

    $con = mysqli_connect($host, $user, $password, $db_name);
    if(mysqli_connect_errno()) {
        die("Failed to connect with MySQL: ". mysqli_connect_error());
    }
?>

<?php
    $username = $_POST['user'];
    $password = $_POST['pass'];

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * from allusers where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo "Login successful";
            header("location:home2.html");
        }
        else{
            echo " Login failed. Invalid username or password.";
        }
?>
<div class ="login">
<button><a href ="login.html">Try Again</a></button>
</div>
</html>

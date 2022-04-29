
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    #eye{
      position: relative;
      top: -4vh;
      margin-left:84%;
    }
    #closeeye{
      position: relative;
      top: -4vh;
      margin-left:84%;
      display: none;
    }

    #pass2{
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <form name="myform" action="/practical/login/signin.php" method="POST">
      <div class="card" id="card" style="width: 18rem;">
        <div class="card-body" >
          <h3 id="side">sign in</h3>
          <input type="email" name="email" id="email" class="email" placeholder=" email " />
          <input type="password" name="pass" minlength="8" id="pass" class="suppass" placeholder="  password" required/>
          <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="show_password()" ></i>
          <i class="fa fa-eye-slash" id="closeeye" aria-hidden="true" onclick="show_eye()"></i>
          <p id="text"></p>
          <input type="submit" name="submit" id="submit" value="login" class="submitbtn" />
          <h5 class="h5">Din't have account <a href="signup.php">sign up ?</a> here.</h5>
          <div class="line"></div>
          <br>
        </div>
      </div>
    </form>
      
      <div id="right" class="right">
    </div>
    
    <div class="logup" id="logup">
      <h3>Hey there🔥</h3>
      <p>Sign up here to stay connected with us 😉</p>
      <br>
      <p>Don't have account sign up here 👇</p>
      <a href="signup.php"><button class="sign">sign up</button></a>
    </div>

  </div>
</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  console.clear();
</script>
</html>

<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "wp";

$conn = mysqli_connect($host,$user, $password, $dbname);

if (!$conn) {
  die();
}

if(isset($_POST['submit'])){
  $email = $_POST['email'];
    $pass = $_POST['pass'];
    $getData = "SELECT * FROM practical WHERE `email`='$email' AND `pass`='$pass'";
    $result = mysqli_query($conn, $getData);
    $num = mysqli_num_rows($result);
  
    if($num==1){
    session_start();
    $_SESSION['log']=true;
    $_SESSION['email']=$email;
   
    header("location:/PRACTICAL/landing_page/index.php?user=true");
    }
    else{
      echo  "<script>
      document.getElementById('text').innerHTML='wrong email or password';
      </script>";
      exit;
    }
}


?>
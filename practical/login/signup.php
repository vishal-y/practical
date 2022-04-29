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
  </style>
</head>

<body>
  <div class="container">
    <form name="myform" action="/practical/login/signup.php" method="POST">
      <div class="card" id="card" style="width: 18rem;">
        <div class="card-body" id="phoneup">
          <h3 id="side">sign up</h3>
          <input type="text" id="name" class="supname" name="name" placeholder=" first name" />
          <input type="text" name="lastname" id="lastname" class="lastname" name="lastname" placeholder=" last name" />
          <input type="email" name="email" id="email" class="email" name="email" placeholder=" email " />
          <input type="password" name="pass" minlength="8" id="pass" class="suppass" placeholder="  password" />
          <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="show_password()"></i>
          <i class="fa fa-eye-slash" id="closeeye" aria-hidden="true" onclick="show_eye()"></i>
          <input type="password" name="pass2" minlength="8" id="pass2" class="suppass2" placeholder="  confirm password" />
          <input type="number" name="age" id="age" class="age" placeholder=" age" min="21" max='120' />
          <label for="male" id="male_label">male</label>
          <input type="radio" name="gender" id="male" value="male" required>
          <label for="female" id="female_label">female</label>
          <input type="radio" name="gender" id="female"  value="female">
          <p id="text"></p>
          <input type="submit" name="submit" id="submit" value="register" class="submitbtn" />
          <h5 class="h5">Already have a account <a href="signin.php">sign in ?</a> here.</h5>
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
      <p>Already have account sign in here 👇</p>
      <a href="signin.php"><button class="sign">sign in</button></a>
    </div>

  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="main.js"></script>
</html>



<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "wp";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die();
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  $gender = $_POST['gender'];


  
  if ($name == '' || $age == '' || $lastname == '' || $email == '' || $pass == '') {
    echo "<script>
    document.getElementById('right').style.left ='50%';
    document.getElementById('login').style.display='none';
    document.getElementById('logup').style.display='block';
    document.getElementById('text').innerHTML='error! Try again';
    document.getElementById('name').style.border = '2px solid red';
    document.getElementById('lastname').style.border = '2px solid red';
    document.getElementById('email').style.border = '2px solid red';
    document.getElementById('age').style.border = '2px solid red';
    document.getElementById('pass').style.border = '2px solid red';
    document.getElementById('pass2').style.border = '2px solid red';
    document.getElementById('male_label').style.color = 'red';
    document.getElementById('female_label').style.color = 'red';
    </script>";
  } 
  elseif($pass != $pass2) {
    $show = "<script>
    document.getElementById('text').innerHTML='error! password didnt match ';
    document.getElementById('pass').style.border = '2px solid red';
    document.getElementById('pass2').style.border = '2px solid red';
    console.log('this is password error');
    </script>";
    exit($show);
  }
  elseif($pass == $email) {
    $show = "<script>
    document.getElementById('text').innerHTML='error! password cant be same as email';
    document.getElementById('pass').style.border = '2px solid red';
    document.getElementById('pass2').style.border = '2px solid red';
    console.log('this is password error');
    </script>";
    exit($show);
  }
  else {
    $checkEmail = "SELECT * from practical where email = '$email'";
    $check_query = mysqli_query($conn,$checkEmail);
    $count = mysqli_num_rows($check_query);
    if($count>0){
      $show = "<script>
      document.getElementById('text').innerHTML='error! email already sign up';
      document.getElementById('email').style.border = '2px solid red';
      </script>";
      exit($show);
    }
    else{
      $insert = "INSERT INTO `practical` ( `firstname`, `lastname`, `age`, `gender`, `pass`, `email`) VALUES ('$name', '$lastname', '$age', '$gender', '$pass', '$email')";
      $query = mysqli_query($conn, $insert);
      session_start();
      $_SESSION['log']=true;
      $_SESSION['email']=$email;

      header("location:/PRACTICAL/landing_page/index.php?user=true&new_user");
    }
  }
}


// displaying the data from the database;
// $getData = "SELECT * FROM `practical`";
// $result = mysqli_query($conn, $getData);
// $numRows = mysqli_num_rows($result);
// while ($data = mysqli_fetch_assoc($result)) {
  // $showData =  var_dump($data);
  // echo  $showData;
//   echo "hii"," ",$data['firstname']," ",$data['lastname'];
//   echo "<br>";
// 


?>
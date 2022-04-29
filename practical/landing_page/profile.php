<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "wp";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("error");
}

$show = false;


session_start();
if (isset($_SESSION['log']) == true) {
  $email = $_SESSION['email'];
  $getData = "SELECT * FROM `practical` WHERE `email` = '$email';";
  $result = mysqli_query($conn, $getData);
  while ($row = mysqli_fetch_assoc($result)) {
    $show = true;
    // echo "hii ", $row['firstname'], " ", $row['lastname'];
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.lordicon.com/lusqsztk.js"></script>



</head>

<body id="body">
  <i class="fa-solid fa-moon" id="moon" onclick="night()"></i>
  <i class="fa-solid fa-sun" id="sun" onclick='day()'></i>

  <div id="profiles">


<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
<lord-icon id="monster" 
    src="https://cdn.lordicon.com/spxnqpau.json"
    trigger="hover"
    colors="primary:#ff5a60,secondary:#242424"
    style="width:80px;height:80px">
</lord-icon>

              <?php

              if ($show == true) {

              echo "<h1 id='pro'>PROFILES</h1>
            <div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>
              <div class='carousel-inner' id='all'>
                <div class='carousel-item active' id='pro1'>
                  <div class='prestyle'></div>
                  <div class='carousel-caption d-none d-md-block'>
                    <div id='card_first'>";

                $getData = "SELECT * FROM `practical` WHERE `email` = '$email';";
                $result = mysqli_query($conn, $getData);
                $row = mysqli_fetch_row($result);
                $gender = $row[4];
                if ($gender == 'female') {
                  $allData = "SELECT * FROM `practical` WHERE `gender` = 'male'";
                  $sendquery = mysqli_query($conn, $allData);
                  $get_first_row = mysqli_fetch_row($sendquery);
                  echo "
                  <div class='forimg'>
                <img src='/practical/images/boys/boy1.jpg' class='profileimg' id='img' alt='this is person'>
                </div>
                  <div class='info'>
                  <P class='name'>$get_first_row[1] $get_first_row[2]</P><br>
                  <p class='age'>$get_first_row[3]</P><br>
                  <p class='gender'>$get_first_row[4]</P>
                </div>";
                } else {
                  $allData = "SELECT * FROM `practical` WHERE `gender` = 'female'";
                  $sendquery = mysqli_query($conn, $allData);
                  $get_first_row = mysqli_fetch_row($sendquery);
                  echo $get_first_row[1], $get_first_row[2], "<br>", $get_first_row[3], "<br>", $get_first_row[4];
                  echo "
                  <div class='forimg'>
                <img src='/practical/images/girls/girl1.jpg' class='profileimg' id='img' alt='this is person'>
                </div><div class='info'>
                  <P class='name'>$get_first_row[1] $get_first_row[2]</P><br>
                  <p class='age'>$get_first_row[3]</P><br>
                  <p class='gender'>$get_first_row[4]</P>
                </div>";
                }
                
                
                echo "<div class='icon' id='icon'>
                  <i class='fa-regular fa-heart' id='heart' onclick='color(this)'></i>
                  <i class='fa-regular fa-message' id='msg' name='msg'></i>
                </div>
                
                
              </div>
              
            </h5>
          </div>
        </div>
        
      </div>
    </div>
    <button id='back' class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
    <i class='fa-solid fa-angle-left' class='carousel-control-prev-icon' aria-hidden='true'></i>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button id='next' class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
    <i class='fa-solid fa-angle-right' class='carousel-control-prev-icon' aria-hidden='true'></i>
    <span class='visually-hidden'>Next</span>
  </button>
  </div>
</div>";

}
?>

</body>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</script>

</html>







<?php


if ($show == true) {
  $getData = "SELECT * FROM `practical` WHERE `email` = '$email';";
  $result = mysqli_query($conn, $getData);
  $row = mysqli_fetch_row($result);
  $gender = $row[4];
  if ($gender == 'female') {
    $no = 1;
    $allData = "SELECT * FROM `practical` WHERE `gender` = 'male'";
    $sendquery = mysqli_query($conn, $allData);
    while ($get_all_data = mysqli_fetch_assoc($sendquery)) {
      if ($no > 1) {

        echo "<script>
        let all$no = document.getElementById('all');
        let main_div$no = document.createElement('div');
        main_div$no.className='carousel-item';
        let sdiv$no = document.createElement('div');
        sdiv$no.setAttribute('class','prestyle');
        main_div$no.appendChild(sdiv$no);
        let tdiv$no = document.createElement('div');
        tdiv$no.className='carousel-caption d-none d-md-block';
        
        
        let card$no = document.createElement('div');
        card$no.innerHTML=`<div id='uppercard'  class='hidden$no'>
        <div id='card'>
        
        <div class='forimg'>
        <img src='/practical/images/boys/boy$no.jpg' class='profileimg' id='img' alt='this is person'>
        </div>
        
        <div class='info'>
        <P class='name'>$get_all_data[firstname] $get_all_data[lastname]</P><br>
        <p class='age'>$get_all_data[age]</P><br>
        <p class='gender'>$get_all_data[gender]</P>
        </div>
        
        <div class='icon' id='icon'>
        <i class='fa-regular fa-heart' id='heart$no' onclick='color(this)'></i>
        <i class='fa-regular fa-message' id='msg'   name='msg' ></i>
        </div>

          </div>`;

        tdiv$no.appendChild(card$no);
        main_div$no.appendChild(tdiv$no);
        all$no.appendChild(main_div$no);
        </script>";;
      }
      $no++;
    }
  } else {
    $no = 1;
    $allData = "SELECT * FROM `practical` WHERE `gender` = 'female'";
    $sendquery = mysqli_query($conn, $allData);
    while ($get_all_data = mysqli_fetch_assoc($sendquery)) {
      if ($no > 1) {
        echo "<script>
        let all$no = document.getElementById('all');
        let main_div$no = document.createElement('div');
        main_div$no.className='carousel-item';
        let sdiv$no = document.createElement('div');
        sdiv$no.setAttribute('class','prestyle');
        main_div$no.appendChild(sdiv$no);
        let tdiv$no = document.createElement('div');
        tdiv$no.className='carousel-caption d-none d-md-block';
        
        let card$no = document.createElement('div');
        card$no.innerHTML=`<div id='uppercard'  class='hidden$no'>
        <div id='card'>
        <div class='forimg'>
        <img src='/practical/images/girls/girl$no.jpg' class='profileimg' id='img' alt='this is person'>
        </div>
        <div class='info'>
        <P class='name'>$get_all_data[firstname] $get_all_data[lastname]</P><br>
        <p class='age'>$get_all_data[age]</P><br>
        <p class='gender'>$get_all_data[gender]</P>
        </div>
        
        <div class='icon' id='icon'>
        <i class='fa-regular fa-heart' id='heart' onclick='color(this)'></i>
        <i class='fa-regular fa-message' id='msg'   name='msg' ></i>
        </div>
        
        </div>`;
        
        tdiv$no.appendChild(card$no);
        main_div$no.appendChild(tdiv$no);
        all$no.appendChild(main_div$no);
        </script>";
      }
      $no++;
    }
  }
} else {
  header("location:/practical/login/signin.php");
}
?>
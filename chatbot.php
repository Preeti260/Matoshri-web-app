<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $type = $fetch_info['type'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
  <nav>
     <div class="logo">
        MCERC
     </div>
     <input type="checkbox" id="click">
     <label for="click" class="menu-btn">
     <i class="fas fa-bars"></i>
     </label>
     <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="view-notice.php">NOTICE BOARD</a></li>
        <li><a href="questions.php">ADD QUESTION</a></li>
        <li><a href="logout-user.php">LOGOUT</a></li>

     </ul>
  </nav>
  <div class="content">
    <h1 style="text-align:center">Let's Start</h1>
    <a href="bot.php">
      <button type="button" class="btn btn-warning btn-lg">ASK-MATOSHRI</button>
    </a>

  </div>

</body>
</html>

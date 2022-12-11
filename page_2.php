<?php
session_start();

if (isset($_POST['name'])) {

  if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email'])) {
    $_SESSION['error_page_1'] = "Mandatory field(s) are missing, Please fill it to proceed";
    header("location: page_1.php"); //redirect to first page
  } 
  else {
    if(!preg_match("/^[a-zA-Z-']*$/", $_POST['name'])){
      $_SESSION['error_page_1'] = "Only letters and No spaces allowed";
      header("location: page_1.php"); //redirect to first page
    }
    else{
      if (!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $_SESSION['error_page_1'] = "10-digit phone number is required.";
        header("location: page_1.php"); //redirect to first page
      } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $_SESSION['error_page_1'] = "Invalid Email format";
          header("location: page_1.php"); //redirect to first page
        } 
        else {
          foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
          }
        }
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talrn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<span id="error" class="alert alert-info">
  <!-- Initializing session for errors-->
  <?php
    if (!empty($_SESSION['error_page_2'])) {
      echo $_SESSION['error_page_2'];
      unset($_SESSION['error_page_2']);
    }
    ?>
  </span>
    <div class="container mt-5">
        <form action="page_3.php" method="post">
          <div class="info_2">
            <div class="form-group">
              <label for="location">Location <span>*</span></label>
              <input type="text" class="form-control" name="location" placeholder="Jaipur">
            </div>
            <div class="form-group">
              <label for="age">Age <span>*</span></label>
              <input type="number" class="form-control" name="age" placeholder="in years">
              <div class="form-group">
                <label for="gender">Gender <span>*</span></label><br>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
              </div>
              <input type="reset" class="btn btn-secondary mt-2" value="Previous" />
              <input type="submit" class="btn btn-primary mt-2" value="Submit" />
          </div>
        </form>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<!-- INSERT INTO `tarln` (`S no.`, `Name`, `Phone Number`, `Email`, `Location`, `Age`, `Gender`) VALUES ('', 'Kabir Singh', '7845237987', 'kabirsh@email.com', 'Jaipur', '21', 'male'); -->

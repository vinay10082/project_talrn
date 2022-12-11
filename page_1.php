<?php
session_start();
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
    if (!empty($_SESSION['error_page_1'])) {
      echo $_SESSION['error_page_1'];
      unset($_SESSION['error_page_1']);
    }
    ?>
  </span>
    <div class="container mt-5">
        <form action="page_2.php" method="post">
          <div class="info_1">
            <div class="form-group">
              <label for="name">Name <span>*</span></label>
              <input type="text" class="form-control" name="name" placeholder="John Doe">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number <span>*</span></label>
              <input type="text" class="form-control" name="phone" placeholder="xxxxxxxxxx">
            </div>
            <div class="form-group">
              <label for="email">Email <span>*</span></label>
              <input type="text" class="form-control" name="email" placeholder="abc@xyz.com">
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="Next" />
          </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<!-- INSERT INTO `tarln` (`S no.`, `Name`, `Phone Number`, `Email`, `Location`, `Age`, `Gender`) VALUES ('', 'Kabir Singh', '7845237987', 'kabirsh@email.com', 'Jaipur', '21', 'male'); -->

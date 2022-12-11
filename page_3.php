<?php
session_start();

if(isset($_POST['location'])){

    if(empty($_POST['location']) || empty($_POST['age']) || empty($_POST['gender']) ){
      $_SESSION['error_page_2'] = "Mandatory field(s) are missing, Please fill it again";
      header("location: page_2.php"); //redirect to second page
    }
    else{
        if(!preg_match("/^[a-zA-Z0-9\-\\,.']+/", $_POST['location'])){
            $_SESSION['error_page_2'] = "Enter valid address";
            header("location: page_2.php"); //redirect to second page
        }
        else{
            if(!preg_match("/^[0-9]+$/", $_POST['age'])){
                $_SESSION['error_page_2'] = "Enter valid Age";
                header("location: page_2.php"); //redirect to second page
            }
            else{
                    foreach ($_POST as $key => $value) {
                        $_SESSION['post'][$key] = $value;
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
    <style>
        .result{
           margin-top: 100px;
           margin-left: auto;
           margin-right: auto; 
           text-align: center;
        }
        .result-name{
            text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
  font-size: 90px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
        }
    </style>
</head>
    <body>
        <div class="result">
            Welcome <br>
            <h3 class="result-name">
                <?php echo $_SESSION['post']['name']; ?> 
            </h3><br>
            Thanks for submit info
        </div>
    </body>
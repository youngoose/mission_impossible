<?php
  session_start();

  $result1 = "";
  $result2 = "";
  $result3 = "";
  $userinput1 = "";
  $userinput2 = "";
  $userinput3 = "";
  $frozen1 = "";
  $frozen2 = "";
  $frozen3 = "";
  $howManyCorrect = 0;
  $briefCase = "lock.jpg";
  $congrats = "";

    if ($_SERVER['REQUEST_METHOD'] == "GET"){
      $_SESSION['combination1'] = mt_rand(0,9);
      $_SESSION['combination2'] = mt_rand(0,9);
      $_SESSION['combination3'] = mt_rand(0,9);
    }
    else{
      $userinput1 = $_POST['num1'];
      $userinput2 = $_POST['num2'];
      $userinput3 = $_POST['num3'];

    if ($userinput1 == $_SESSION['combination1']){
      $howManyCorrect++;
      $result1 = "You found the number..";
      $frozen1 = "readonly";
      if ($howManyCorrect == 3){
        $briefCase = "unlock.jpg";
        $congrats = "Congratulation!";
      }
    }
    else if($userinput1 < $_SESSION['combination1']){
      $result1 = "Your number is smaller than the random number";
    }
    else{
      $result1 = "Your number is greater than the random number";
    }

    if ($userinput2 == $_SESSION['combination2']){
      $howManyCorrect++;
      $result2 = "You found the number..";
      $frozen2 = "readonly";
      if ($howManyCorrect == 3){
        $briefCase = "unlock.jpg";
        $congrats = "Congratulation!";
      }
    }
    else if($userinput2 < $_SESSION['combination2']){
      $result2 = "Your number is smaller than the random number";
    }
    else{
      $result2 = "Your number is greater than the random number";
    }


   if ($userinput3 == $_SESSION['combination3']){
      $howManyCorrect++;
      $result3 = "You found the number..";
      $frozen3 = "readonly";
      if ($howManyCorrect == 3){
        $briefCase = "unlock.jpg";
        $congrats = "Congratulation!";
      }
    }
      else if($userinput3 < $_SESSION['combination3']){
        $result3 = "Your number is smaller than the random number";
      }
      else{
        $result3 = "Your number is greater than the random number";
      }
    }

    if (isset($_POST['btnPlayAgain'])){
      session_unset();

      $_SESSION['combination1'] = mt_rand(0,9);
      $_SESSION['combination2'] = mt_rand(0,9);
      $_SESSION['combination3'] = mt_rand(0,9);

      $userinput1 = 0;
      $userinput2 = 0;
      $userinput3 = 0;
      $result1 = "";
      $result2 = "";
      $result3 = "";

      $frozen1 = "";
      $frozen2 = "";
      $frozen3 = "";
      $howManyCorrect = 0;
      $congrats = "";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mission Impossible</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/code.css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron"></div>
        <div id="title">
          <h3>Guess each combination between 0 and 9 (both inclusive):</h3>
        </div>
        <div id="bodyContainer" class="container">
        <div class="briefCase">
          <img src="images/<?php echo $briefCase; ?>" alt="briefcase" width="470" height="400">
        </div>

	<form action="" method="post">
	      <div id="num1">
		  <div>
			<input type="number" min="0" max="9" name="num1" value="<?php echo $userinput1; ?>" <?php echo $frozen1; ?>>
		  </div>
	      </div>
	      <div id="num2">
		  <div>
		        <input type="number" min="0" max="9" name="num2" value="<?php echo $userinput2; ?>" <?php echo $frozen2; ?>>
		  </div>
	      </div>
	      <div id="num3">
		  <div>
			<input type="number" min="0" max="9" name="num3" value="<?php echo $userinput3; ?>" <?php echo $frozen3; ?>>
		  </div>
	      </div>
          <input class="btn btn-info myBtn" id="myBtn1" type="submit" name="btnGuess" value="Guess">
          <input class="btn btn-warning myBtn" type="submit" name="btnPlayAgain" value="Try again">
          <h1><?php echo $congrats ?></h1>
        </form>

	      <h4>The first combination is: <?php echo $_SESSION['combination1'] ?></h4>
	      <h4>The second combination is: <?php echo $_SESSION['combination2'] ?></h4>
	      <h4>The third combination is: <?php echo $_SESSION['combination3'] ?></h4>

        <h4><?php echo "#1: " . $result1 ?></h4>
        <h4><?php echo "#2: " . $result2 ?></h4>
        <h4><?php echo "#3: " . $result3 ?></h4>
        <h5><?php echo "You unlocked " . $howManyCorrect . " combinations so far." ?></h5>
      </div>
    </div>

  </body>
</html>

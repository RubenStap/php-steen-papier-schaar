<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Steen Papier Schaar</h1>
  <p>Speler 1</p>
  <form id="steen_papier_schaar_form" method="get">
    <select id="steen_papier_schaar" name="steen_papier_schaar">
      <option value="steen" name="steen">steen</option>
      <option value="papier" name="papier">papier</option>
      <option value="schaar" name="schaar">schaar</option>
    </select>
    <input type="submit" value="Versturen">
  </form>

  <?php
    session_start();
  if (isset($_GET['steen_papier_schaar'])) {
      $selectedOption = $_GET['steen_papier_schaar'];
      if (!isset($_SESSION['selectedOption_1'])) {
          $_SESSION['selectedOption_1'] = $selectedOption;
      }
      echo "<style>#steen_papier_schaar_form { display: none; }</style>";
      echo "Speler 2";
      echo "<form method='get'>
          <select id='steen_papier_schaar_form_2' name='steen_papier_schaar_2'>
            <option value='steen' name='steen'>steen</option>
            <option value='papier' name='papier'>papier</option>
            <option value='schaar' name='schaar'>schaar</option>
          </select>
          <input type='submit' value='Versturen'>
        </form>";
  } elseif (isset($_GET['steen_papier_schaar_2'])) {
      $selectedOption_1 = $_SESSION['selectedOption_1'];
      $selectedOption_2 = $_GET['steen_papier_schaar_2'];
      echo "<p>speler 1 : $selectedOption_1 </p>" . PHP_EOL;
      echo "<p>speler 2 : $selectedOption_2</p>";
      echo "<style>#steen_papier_schaar_form_2 { display: none; }</style>";

      if ($selectedOption_1 == $selectedOption_2) {
				echo "<h1>Gelijkspel</h1>";
          header("Refresh:5; url=index.php", true, 303);
          session_destroy();
      } else if ($selectedOption_1 == "steen" && $selectedOption_2 == "schaar") {  //Steen wint van schaar
          echo "<h1>speler 1 wint</h1>";
          header("Refresh:5; url=index.php", true, 303);
          session_destroy();
      } else if ($selectedOption_1 == "papier" && $selectedOption_2 == "steen") { //papier wint van steen
          echo "<h1>speler 1 wint</h1>";
          header("Refresh:5; url=index.php", true, 303);
          session_destroy();
      } else if ($selectedOption_1 == "schaar" && $selectedOption_2 == "papier") { //schaar wint van papier
          echo "<h1>speler 1 wint</h1>";
          header("Refresh:5; url=index.php", true, 303);
          session_destroy();
      } else {
          echo "<h1>speler 2 wint</h1>";
          header("Refresh:5; url=index.php", true, 303);
          session_destroy();
      }
  }

  if (isset($_GET['reset'])) {
      header("Refresh:4; url=game.php", true, 303);
          session_destroy();
  }

    ?>
    <form method='get'>
          <input type='submit' value='reset' name="reset">
    </form>
</body>

</html>

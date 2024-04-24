<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if (isset($_GET['computer'])) {
    echo "<style>#select_game { display: none; }</style>";
    echo "<h1>je speelt tegen de computer</h1>";
    echo "<form method='post'>
    <select id='steen_papier_schaar_form' name='steen_papier_schaar_form'>
      <option value='steen' name='steen'>steen</option>
      <option value='papier' name='papier'>papier</option>
      <option value='schaar' name='schaar'>schaar</option>
    </select>
    <input type='submit' value='Versturen'>
  </form>";
    if (isset($_POST['steen_papier_schaar_form'])) {
        echo "<style>#select_game { display: none; }</style>";
        $selectedOption_1 = $_POST['steen_papier_schaar_form'];
    
        echo"<p>speler : $selectedOption_1</p>" . PHP_EOL;
        $computer = mt_rand(1, 3);
        if ($computer == 1) {
            echo "<p>computer : steen</p>";
        } elseif ($computer == 2) {
            echo "<p>computer : papier</p>";
        } elseif ($computer == 3) {
            echo "<p>computer : schaar</p>";
        }
        if ($selectedOption_1 == $computer) {
            echo "<h1>Gelijkspel</h1>";
            header("Refresh:2.5; url=index.php", true, 303);
        } else if ($selectedOption_1 == "steen" && $computer == 3) {  //Steen wint van schaar,
            echo "<h1>Jij wint</h1>";
            header("Refresh:2.5; url=index.php", true, 303);
        } else if ($selectedOption_1 == "papier" && $computer == 1) {  //Papier wint van steen
            echo "<h1>Jij wint</h1>";
            header("Refresh:2.5; url=index.php", true, 303);
        } else if ($selectedOption_1 == "schaar" && $computer == 2) { //Schaar wint van papier
            echo "<h1>Jij wint</h1>";
            header("Refresh:2.5; url=index.php", true, 303);
        } else {
            echo "<h1>Computer wint</h1>";
            header("Refresh:2.5; url=index.php", true, 303);
        }
    }
}

?>
</body>
</html>

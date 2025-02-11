<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lizard Cafe</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/menu.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./breakfast.php">Breakfast</a></li>
          <li><a href="./lunch.php">Lunch</a></li>
          <li><a href="./dinner.php">Dinner</a></li>
        </ul>
      </nav>
    </header>
    <section id="mainBody">
      <div id="breakfast-div">
        <div class="menuHeader">
          <img src="../img/breakfast.png" alt="Image of breakfast foods">
          <h3>Breakfast Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <?php
              $dataFile = fopen("../data/datafile.txt", "r");

              while (($buffer = fgetcsv($dataFile)) != false) {
                if ($buffer[1] == "breakfast") {
                  $name = $buffer[0];
                  $price = $buffer[2];
                  $imgFile = $buffer[3];
                  $desc = $buffer[4];

                  echo "<li><h4>$name - $$price</h4><p>$desc</p><img src=\"../img/menu/$imgFile\" alt=\"image of $name\"></li>";
                }
              }

              fclose($dataFile);
            ?>
          </ul>
        </div>
      </div>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
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
          <?php
            require_once "./utils/dbConnect.php";

            session_start();
            if (isset($_SESSION["username"])) {
              $name = $_SESSION["fname"];
              echo "<li id=\"loginNav\"><a href=\"./login.php\">Hello, $name</a></li>";
            } else {
              echo '<li id="loginNav"><a href="./login.php">Login</a></li>';
            }
          ?>
        </ul>
      </nav>
    </header>
    <section id="mainBody">
      <div id="lunch-div">
        <div class="menuHeader">
          <img src="../img/lunch.png" alt="Image of lunch foods">
          <h3>Lunch Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <?php
              $connection = dbConnect();
              $menuData = $connection->prepare("SELECT * FROM `menu`");
              $menuData->execute();
              $menuDataResults = $menuData->get_result();
              $menuItem = $menuDataResults->fetch_assoc();
              while ($menuItem != false) {
                if ($menuItem["item_meal"] == "lunch") {
                  $name = $menuItem["item_name"];
                  $price = $menuItem["item_price"];
                  $imgFile = $menuItem["item_imagefile"];
                  $desc = $menuItem["item_desc"];

                  echo "<li><h4>$name - $$price</h4><p>$desc</p><img src=\"../img/menu/$imgFile\" alt=\"image of $name\"></li>";
                }
                $menuItem = $menuDataResults->fetch_assoc();
              }

              $menuData->close();
              $connection->close();
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
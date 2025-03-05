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
      <div id="dinner-div">
        <div class="menuHeader">
          <img src="../img/dinner.png" alt="Image of dinner foods">
          <h3>Dinner Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <?php
              require_once "./utils/meal.php";

              $connection = dbConnect();
              $menuData = $connection->prepare("SELECT * FROM `menu`");
              $menuData->execute();
              $menuDataResults = $menuData->get_result();
              $menuItem = $menuDataResults->fetch_assoc();
              while ($menuItem != null) {
                $menuItemClass = new MenuItem();
                $menuItemClass->setItemName($menuItem["item_name"]);
                $menuItemClass->setItemPrice($menuItem["item_price"]);
                $menuItemClass->setItemImageFile($menuItem["item_imagefile"]);
                $menuItemClass->setItemDesc($menuItem["item_desc"]);
                $menuItemClass->setItemMeal($menuItem["item_meal"]);

                if ($menuItemClass->getItemMeal() == "dinner") {
                  $name = $menuItemClass->getItemName();
                  $price = $menuItemClass->getItemPrice();
                  $imgFile = $menuItemClass->getItemImageFile();
                  $desc = $menuItemClass->getItemDesc();

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
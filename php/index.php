<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lizard Cafe</title>
    <link rel="stylesheet" href="../css/base.css">
    <script src="../js/imageLinker.js" defer></script>
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
      <div id="headerImg">
        <img src="../img/mainBanner.png" alt="Banner photo">
        <h2>Welcome to Lizard Cafe!</h2>
        <p>1234 Example Drive, San Jose, CA</p>
        <p>Business Hours: 5 AM - 11 PM on Weekdays, 7 AM - 9 PM on Weekends</p>
        <p>Contact: 123-456-7890</p>
        <h3>Daily Special:</h3>
        <p id="special">
            <?php
                # I wasn't sure how to use include and embed the php, so I decided to put the html in the php file.
                # I'm assuming there is a way but I'm missing it.
                // include "../html/index.html";
                $currentDate = date("N");
                if ($currentDate == 6 or $currentDate == 7) {
                    echo "No special today!";
                } elseif ($currentDate == 1) {
                    echo "Chicken Parmesan!";
                } elseif ($currentDate == 2) {
                    echo "Chicken Alfredo!";
                } elseif ($currentDate == 3) {
                    echo "Smoked Linguica!";
                } elseif ($currentDate == 4) {
                    echo "Lobster!";
                } else if ($currentDate == 5) {
                    echo "Grilled Lamb!";
                }
            ?>
        </p>
      </div>
    </header>
    <section id="mainBody">
      <div id="breakfast-div">
        <div class="menuHeader">
          <img class="breakfast" src="../img/breakfast.png" alt="Image of breakfast foods">
          <h3>Breakfast Menu</h3>
        </div>
        <div class="menuPreview">
          <p>We offer a curated selection of breakfast meals during our breakfast serving time.</p>
          <p>(5 AM - 11 AM Weekdays, 7 AM - 1 PM Weekends)</p>
        </div>
      </div>
      <div id="lunch-div">
        <div class="menuHeader">
          <img class="lunch" src="../img/lunch.png" alt="Image of lunch foods">
          <h3>Lunch Menu</h3>
        </div>
        <div class="menuPreview">
          <p>Our lunch menu has a wide selection of meals to choose from</p>
          <p>(11 AM - 4 PM Weekdays, 1 PM - 3 PM Weekends)</p>
        </div>
      </div>
      <div id="dinner-div">
        <div class="menuHeader">
          <img class="dinner" src="../img/dinner.png" alt="Image of dinner foods">
          <h3>Dinner Menu</h3>
        </div>
        <div class="menuPreview">
          <p>We offer an extensive selection of meal items on our dinner menu.</p>
          <p>(4 PM - 11 PM Weekdays, 3 PM - 9 PM Weekends)</p>
        </div>
      </div>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
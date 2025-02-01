<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lizard Cafe</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="../php/index.php">Home</a></li>
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
          <img src="../img/breakfast.png" alt="Image of breakfast foods">
          <h3>Breakfast Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <li>
              <h4>Pancakes</h4>
              <p>Hot, freshly prepared pancakes.</p>
            </li>
            <li>
              <h4>Waffles</h4>
              <p>Hot waffles topped with strawberries and syrup.</p>
            </li>
            <li>
              <h4>Eggs and Toast</h4>
              <p>Fresh egg prepared sunny side up on top of toast.</p>
            </li>
          </ul>
        </div>
      </div>
      <div id="lunch-div">
        <div class="menuHeader">
          <img src="../img/lunch.png" alt="Image of lunch foods">
          <h3>Lunch Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <li>
              <h4>Cheeseburger</h4>
              <p>Cooked beef burger topped with cheese, lettuce, and tomato.</p>
            </li>
            <li>
              <h4>Pizza</h4>
              <p>Cheese pizza optionally topped with pepperoni, sausage, or peppers.</p>
            </li>
            <li>
              <h4>Salad</h4>
              <p>Salad with iceberg lettuce, cheese, and tomato.</p>
            </li>
            <li>
              <h4>BBQ chicken</h4>
              <p>BBQ chicken with an optional side of a wide range of sauce choices.</p>
            </li>
          </ul>
        </div>
      </div>
      <div id="dinner-div">
        <div class="menuHeader">
          <img src="../img/dinner.png" alt="Image of dinner foods">
          <h3>Dinner Menu</h3>
        </div>
        <div class="menu">
          <ul>
            <li>
              <h4>Grilled steak</h4>
              <p>Grilled steak cooked either medium rare, medium, medium well, or well done.</p>
            </li>
            <li>
              <h4>Pulled pork sandwich</h4>
              <p>Pulled pork sandwich with optional steak sauce.</p>
            </li>
            <li>
              <h4>Spaghetti</h4>
              <p>Spaghetti noodles topped with tomato sauce and meatballs.</p>
            </li>
            <li>
              <h4>Salmon</h4>
              <p>Grilled salmon marinated in lemon juice.</p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
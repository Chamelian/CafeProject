<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lizard Cafe</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/accounts.css">
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

            if (count($_COOKIE) > 0) {
              $connection = dbConnect();
              $sessionID = array_keys($_COOKIE)[0];
              $result = $connection->query("SELECT `account_fname` FROM `accounts` WHERE `account_id` = (
                SELECT `account_id` FROM `sessions` WHERE `session_id` = '$sessionID'
              )");

              if ($result->num_rows > 0) {
                $name = htmlspecialchars($result->fetch_assoc()["account_fname"]);
                echo "<li id=\"loginNav\"><a href=\"./login.php\">Hello, $name</a></li>";
              } else {
                echo '<li id="loginNav"><a href="./login.php">Login</a></li>';
              }
            } else {
              echo '<li id="loginNav"><a href="./login.php">Login</a></li>';
            }
          ?>
        </ul>
      </nav>
    </header>
    <section>
      <h3>Log In</h3>
      <?php
        require_once "./utils/writeCookie.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $connection = dbConnect();
          $sanitizedUsername = htmlspecialchars($_POST["username"]);
          $result = $connection->query("SELECT * FROM `accounts` WHERE `account_username` = '$sanitizedUsername'");
          if ($result->num_rows > 0) {
            $account = $result->fetch_assoc();
            if (password_verify(htmlspecialchars($_POST["password"]), $account["account_password"])) {
              (writeCookie($connection, $account["account_id"]));
              echo "<p>You are now logged in!</p>";
            } else {
              echo "<p>Unkown username or password. Try again.</p>";
            }
          } else {
            echo "<p>Unkown username or password. Try again.</p>";
          }
        }
      ?>
      <form id='registration' method='post' action='<?php $_SERVER["PHP_SELF"] ?>'>
        <p>Username: <input type='text' name='username' value='' maxlength='30' required></p>
        <p>Password: <input type='password' name='password' value='' required></p>
        <input type='submit' value='Login'>
      </form>
      <p><a href="./registration.php">Register for an account</a></p>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
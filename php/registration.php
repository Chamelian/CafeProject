<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lizard Cafe</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/accounts.css">
    <script src="../js/regValidate.js" defer></script>
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
    <section>
      <h3>Register</h3>
      <?php
        require_once "./utils/dbConnect.php";
        require_once "./utils/writeAccount.php";
        require_once "./utils/account.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $connection = dbConnect();
          $result = $connection->query("SELECT account_username FROM accounts");

          $accountClass = new Account();
          $accountClass->setAccountUsername($_POST["username"]);
          $accountClass->setAccountFname($_POST["firstName"]);
          $accountClass->setAccountLname($_POST["lastName"]);
          $accountClass->setAccountPassword($_POST["password"]);

          if ($result->num_rows > 0) {
            $usernames = $result->fetch_assoc();
            if (in_array($_POST["username"], $usernames)) {
              echo "<p>This username is already taken</p>";
            } else {
              echo "<p>Your account has been created. You may now log in!</p>";
              writeAccount($connection, htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["password"]), htmlspecialchars($_POST["firstName"]), htmlspecialchars($_POST["lastName"]));
            }
          } else {
            echo "<p>Your account has been created. You may now log in!</p>";
            writeAccount($connection, $accountClass);
          }
          $connection->close();
        } else {
          $phpInsert = $_SERVER["PHP_SELF"];
          echo "
            <form id='registration' method='post' action='$phpInsert'>
              <p>Username: <input type='text' name='username' value='' maxlength='30' required></p>
              <p>First Name: <input type='text' name='firstName' value='' maxlength='20' required></p>
              <p>Last Name: <input type='text' name='lastName' value='' maxlength='20' required></p>
              <p>Password: <input type='password' name='password' value='' required></p>
              <input type='submit' value='Submit'>
            </form>
          ";
        }
      ?>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
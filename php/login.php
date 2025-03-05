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
      <h3>Log In</h3>
      <?php
        if (isset($_SESSION["username"])) {
          echo "
            <form method='post' action='./utils/logOut.php'>
              <input type='submit' value='Logout'>
            </form>
          ";
        } else {
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $connection = dbConnect();
            $sqlStatement = $connection->prepare("SELECT * FROM `accounts` WHERE `account_username` = ?");
            $sqlStatement->bind_param("s", $username);

            $username = htmlspecialchars($_POST["username"]);
            $sqlStatement->execute();
            $result = $sqlStatement->get_result();

            if ($result->num_rows > 0) {
              $account = $result->fetch_assoc();
              if (password_verify(htmlspecialchars($_POST["password"]), $account["account_password"])) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["fname"] = $account["account_fname"];
                echo "<p>You are now logged in!</p>";
              } else {
                echo "<p>Unkown username or password. Try again.</p>";
              }
            } else {
              echo "<p>Unkown username or password. Try again.</p>";
            }
            $connection->close();
          } else {
            $phpInsert = $_SERVER["PHP_SELF"];
            echo "
              <form method='post' action='$phpInsert'>
                <p>Username: <input type='text' name='username' value='' maxlength='30' required></p>
                <p>Password: <input type='password' name='password' value='' required></p>
                <input type='submit' value='Login'>
              </form>
              <p><a href=\"./registration.php\">Register for an account</a></p>
            ";
          }
        }
      ?>
    </section>
    <footer>
      Lizard Cafe &#8226; 1234 Example Drive, San Jose, CA &#8226; 123-456-7890
    </footer>
  </body>
</html>
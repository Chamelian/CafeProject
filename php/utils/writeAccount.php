<?php
  function writeAccount($connection, $username, $password, $fname, $lname) {
    $sqlStatement = $connection->prepare("INSERT INTO `accounts` (`account_fname`, `account_lname`, `account_password`, `account_username`) VALUES (?, ?, ?, ?)");
    $sqlStatement->bind_param("ssss", $fname, $lname, $hashedPassword, $username);

    $hashedPassword = password_hash(htmlspecialchars($password), PASSWORD_BCRYPT);

    $sqlStatement->execute();
    $sqlStatement->close();
  }
?>
<?php
  require_once "./account.php";
  function writeAccount($connection, $account) {
    $sqlStatement = $connection->prepare("INSERT INTO `accounts` (`account_fname`, `account_lname`, `account_password`, `account_username`) VALUES (?, ?, ?, ?)");
    $sqlStatement->bind_param("ssss", $account->getAccountFname(), $account->getAccountLname(), $hashedPassword, $account->getAccountUsername());

    $hashedPassword = password_hash($account->getAccountPassword(), PASSWORD_BCRYPT);

    $sqlStatement->execute();
    $sqlStatement->close();
  }
?>
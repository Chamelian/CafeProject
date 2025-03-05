<?php
  require_once "./utils/account.php";
  function writeAccount($connection, Account $account) {
    $sqlStatement = $connection->prepare("INSERT INTO `accounts` (`account_fname`, `account_lname`, `account_password`, `account_username`) VALUES (?, ?, ?, ?)");
    $sqlStatement->bind_param("ssss", $firstName, $lastName, $hashedPassword, $username);

    $firstName = $account->getAccountFname();
    $lastName = $account->getAccountLname();
    $hashedPassword = password_hash($account->getAccountPassword(), PASSWORD_BCRYPT);
    $username = $account->getAccountUsername();

    $sqlStatement->execute();
    $sqlStatement->close();
  }
?>
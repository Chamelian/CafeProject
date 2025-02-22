<?php
  function writeCookie($connection, $accountID) {
    // Logs out the previous user
    if (count($_COOKIE) > 0) {
      foreach ($_COOKIE as $cookie => $value) {
        setcookie($cookie, "", -1, "/CafeProject");
        $connection->query("DELETE FROM `sessions` WHERE `session_id` = '$cookie'");
      }
    }

    $oldTokens = $connection->query("SELECT * FROM `sessions` WHERE `account_id` = $accountID");
    if ($oldTokens->num_rows > 0) {
      $connection->query("DELETE FROM `sessions` WHERE `account_id` = $accountID");
    }

    $sessionID = base64_encode((random_bytes(32)));
    $sessionID = substr($sessionID, 0, strpos("=", $sessionID)-1);
    $sessionExpiration = time()+86400; // 24 hours
    setcookie($sessionID, $accountID, $sessionExpiration, "/CafeProject", "", false, true);

    $connection->query("INSERT INTO `sessions` (`session_id`, `session_expiration`, `account_id`) VALUES ('$sessionID', $sessionExpiration, $accountID)");
  }
?>
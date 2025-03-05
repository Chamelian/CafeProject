<?php
// I don't exactly understand how this is better.
class Account {
  private $account_username;
  private $account_fname;
  private $account_lname;
  private $account_password;

  public function __construct() {
    ;
  }

  public function setAccountUsername($accountUsername) {
    $this->account_username = $accountUsername;
  }

  public function setAccountFname($accountFname) {
    $this->account_fname = $accountFname;
  }

  public function setAccountLname($accountLname) {
    $this->account_lname = $accountLname;
  }

  public function setAccountPassword($accountPassword) {
    $this->account_password = $accountPassword;
  }


  public function getAccountUsername() {
    return htmlspecialchars($this->account_username);
  }

  public function getAccountFname() {
    return htmlspecialchars($this->account_fname);
  }

  public function getAccountLname() {
    return htmlspecialchars($this->account_lname);
  }

  public function getAccountPassword() {
    return htmlspecialchars($this->account_password);
  }
}
?>
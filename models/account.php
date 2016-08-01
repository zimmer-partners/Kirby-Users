<?php 
  
/**
* Basic Account page model
*/

class AccountPage extends Page {
  
  public function loggedIn() {
    if ($user = $this->site->user()){
      return true;
    } else {
      return false;
    }
  }
  
}
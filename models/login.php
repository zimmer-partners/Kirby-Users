<?php 
  
/**
* Basic Account page model
*/

class LoginPage extends Page {
  
  // ================
  // = Page Methods =
  // ================
  
  public function loggedIn() {
    if ($user = $this->site->user()){
      return true;
    } else {
      return false;
    }
  }
  
  // =================
  // = Pseudo Fields =
  // =================
  
  public function title() {
    if ($this->loggedIn() && $account_page = $this->content()->get('user_account_page')->toPage()) {
      return $account_page->title();
    } else {
      return parent::title();
    }
  }
  
}
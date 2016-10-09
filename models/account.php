<?php 
  
/**
* Basic Account page model
*/

class AccountPage extends LoginPage {
  
  public function title() {
    if ($this->loggedIn() && $this->content('title_user')->bool()) {
      $user = $site->user();
      return new Field($this, 'title', $user->firstName()->value . ' ' . $user->lastName()->value);
    } else {
      return parent::title()
    }
  }
  
}
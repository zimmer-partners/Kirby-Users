<?php 
  
/**
* Basic Account page model
*/

class AccountPage extends LoginPage {
  
  public function title() {
    if ($this->loggedIn() && $this->content()->get('title_user')->bool()) {
      $user = $this->site->user();
      return new Field($this, 'title', $user->firstName() . ' ' . $user->lastName());
    } else {
      return parent::title();
    }
  }
  
}
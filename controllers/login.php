<?php 

return function($site, $pages, $page) {

  // don't show the login screen to already logged in users
  if($page->loggedIn()) {
    go($page->content()->get('user_account_page')->url());
  } else {
    // handle the form submission
    if(r::is('post') and get('login')) {
      if($user = $site->user(get('username')) and $user->login(get('password'))) {
        go($page->content()->get('user_account_page')->url());
      } else {
        $error = true;
      }
    } else {
      $error = true;
    }
  }
  
  return array('error' => $error);

};
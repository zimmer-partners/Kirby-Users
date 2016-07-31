<?php 

return function($site, $pages, $page) {
  
  if(r::is('post') and get('user__logout')) {
    $site->user()->logout();
    go('/');
  }

  if(!$site->user()) {
    go($page->parent());
  }

};
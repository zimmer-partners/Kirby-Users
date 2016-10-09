<?php 

// =======================
// = Component Registery =
// =======================

$kirby->set('option', 'roles', array(
  array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'editor',
    'name'    => 'Editor',
    'panel'   => true
  ),
  array(
    'id'      => 'member',
    'name'    => 'Member',
    'panel'   => false
  )
));

$kirby->set('option', 'routes', array(
  array(
    'pattern' => 'logout',
    'action'  => function() {
      if($user = site()->user()) $user->logout();
      go('login');
    }
  )
));

$kirby->set('blueprint', 'login', __DIR__ . '/blueprints/login.php');
$kirby->set('template', 'login', __DIR__ . '/templates/login.php');
$kirby->set('controller', 'login', __DIR__ . '/controllers/login.php');
require_once(__DIR__ . '/models/login.php');
$kirby->set('page::model', 'login', 'LoginPage');

$kirby->set('blueprint', 'account', __DIR__ . '/blueprints/account.php');
$kirby->set('template', 'account', __DIR__ . '/templates/account.php');
$kirby->set('controller', 'account', __DIR__ . '/controllers/account.php');
require_once(__DIR__ . '/models/account.php');
$kirby->set('page::model', 'account', 'AccountPage');

$kirby->set('blueprint', 'contact', __DIR__ . '/blueprints/contact.php');
$kirby->set('template', 'contact', __DIR__ . '/templates/contact.php');
require_once(__DIR__ . '/models/contact.php');
$kirby->set('page::model', 'contact', 'ContactPage');

// Converts any field value to a slug
$kirby->set('field::method', 'slug', function($field) {
  $field->value = str::slug($field->value);
  return $field;
});

// Registers all data files as download
if ($user = $kirby->site->user()) {
  if ($user->role() == 'admin' || $user->role() == 'editor') {
    $contact_pages = $kirby->site->index()->filterBy('template', '==', 'contact');
    foreach ($contact_pages as $key => $contact_page) {
      $debug = $contact_page->uri() . DS . 'download';
      $kirby->set('option', 'routes', array(
        array(
          'pattern' => $contact_page->uri() . DS . 'download/(:all)',
          'action'  => function($page_uri) {
            if ($page = site()->find($page_uri)) {
              if ($file = $page->file($page->contact_data_file()->or('data.php'))) {
                if (file_exists($file->root())) {
                  f::download($file->root(), $file->filename());
                }
              }
            }
          }
        )
      ));
    }
    
  }
}

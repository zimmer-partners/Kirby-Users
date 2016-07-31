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
$kirby->set('blueprint', 'contact', __DIR__ . '/blueprints/contact.php');
$kirby->set('template', 'contact', __DIR__ . '/templates/contact.php');
$kirby->set('controller', 'contact', __DIR__ . '/controllers/account.php');
$kirby->set('blueprint', 'account', __DIR__ . '/blueprints/account.php');
$kirby->set('template', 'account', __DIR__ . '/templates/account.php');
$kirby->set('controller', 'account', __DIR__ . '/controllers/account.php');
require_once(__DIR__ . '/models/account.php');
$kirby->set('page::model', 'account', 'AccountPage');

// Converts any field value to a slug
$kirby->set('field::method', 'slug', function($field) {
  $field->value = str::slug($field->value);
  return $field;
});

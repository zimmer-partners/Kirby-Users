<?php snippet('header') ?>
  
  <?= css('assets/plugins/users/user.css') ?>
  
  <main class="main" role="main">

    <div class="text">
      <h1><?= $page->title()->html() ?></h1>
      <?= $page->text()->kirbytext() ?>
    </div>
    
    <?php if ($user = $site->user()): ?>
      <div class="user">
        <div class="user__name">
          <span class='user__name-label'>Name: </span><?= $user->firstName() ?> <?= $user->lastName() ?>
        </div>
        <div class="user__login">
          <span class='user__name-label'>Login: </span><?= $user->username() ?>
        </div>
        <form class="user__logout" method="post" accept-charset="utf-8">
          <input type="hidden" name="user__logout" value="logout" id="user__logout">
          <input type="submit" value="<?= $page->logout_label()->or('Log Out') ?>">
        </form>
      </div>
    <?php endif ?>
    
    <?php if ($children = $page->children()->visible()): ?>
      <div class="user-functions">
        <h2><?= $page->functions_heading()->html()->or('Functions') ?></h2>
        <ul>
        <?php foreach ($children as $key => $child): ?>
          <li><?= $child->title()->link() ?></li>
        <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>
    
  </main>

<?php snippet('footer') ?>
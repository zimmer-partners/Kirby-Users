<?php if($user = $site->user()): ?>
<div class="user">
  <?php if($avatar = $user->avatar()): ?>
  <figure class="user-avatar">
    <img src="<?= $avatar->url() ?>">
  </figure>
  <?php else: ?>
    <script src="https://use.fontawesome.com/f0acb12b62.js"></script>
    <i class="fa fa-user" aria-hidden="true"></i>
  <?php endif ?>
  <div class="user-name">
    <?= esc($user->firstName() . ' ' . $user->lastName()) ?>
  </div>
</div>
<?php else: ?>
  <p>
    Not logged in.
  </p>
<?php endif ?>
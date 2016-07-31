<?php snippet('header') ?>
  
  <?= css('assets/plugins/users/user.css') ?>
  
  <main class="main" role="main">

    <div class="text">
      
      <h1><?= $page->title()->html() ?></h1>
      
      <?php if ($error): ?>
      <div class="alert"><?php echo $page->alert()->html() ?></div>
      <?php endif ?>

      <form class="form" method="post">
        <table border="0" cellspacing="0" cellpadding="0">
          <colgroup>
            <col class="form__field-label">
            <col class="form__field-input">
          </colgroup>
          <tbody>
            <tr>
              <td>
                <label for="username"><?php echo $page->username_label()->html() ?></label>
              </td>
              <td>
                <input type="text" id="username" name="username" required="required">
              </td>
            </tr>
            <tr>
              <td>
                <label for="password"><?php echo $page->password_label()->html() ?></label>
              </td>
              <td>
                <input type="password" id="password" name="password" required="required">
              </td>
            </tr>
            <tr>
              <td colspan="2" align="right">
                <input class="form__submit" type="submit" name="login" value="<?php echo $page->button_label()->html() ?>">
              </td>
            </tr>
          </tbody>
        </table>
      </form>
      
    </div>

  </main>

<?php snippet('footer') ?>
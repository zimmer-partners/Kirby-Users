<?php snippet('header') ?>
  
  <?= css('assets/plugins/users/user.css') ?>
  
  <main class="main" role="main">
    
    <div class="text">
      <h1><?= $page->title()->html() ?></h1>
      
      <?php if($page->alert()->isNotEmpty()): ?>
      <div class="alert"><?= $page->alert()->kirbytext() ?></div>
      <?php endif ?>
      
      <?php if($page->message()->isNotEmpty()): ?>
      <div class="message"><?= $page->message()->kirbytext() ?></div>
      <?php endif ?>
      
    </div>
      
    <div class="contact">
      <?php $user = $site->user(); ?>
      <?php if($user): ?>
      <form class="form" method="post">
        <table border="0" cellspacing="0" cellpadding="0">
          <colgroup>
            <col class="form__field-label">
            <col class="form__field-input">
          </colgroup>
          <tbody>
            <tr>
              <td>
                <label for="from"><?= $page->contact_from()->html() ?></label>
              </td>
              <td>
                <input type="email" id="from" name="from" value="<?= $site->user()->email() ?>" required="required">
              </td>
            </tr>
            <?php if ($page->contact_fields()->isNotEmpty()): ?>
              <?php foreach ($page->contact_fields()->toStructure() as $key => $contact_field): ?>
                <?php 
                  if ($contact_field->prefill()->isNotEmpty()) {
                    $prefill_field_name = $contact_field->prefill()->value;
                    if ($prefill_value = $site->user()->$prefill_field_name()) {
                      $value_attr =  " value=\"{$prefill_value}\"";
                    } else {
                      $value_attr = '';
                    }
                  } else {
                    $value_attr = '';
                  }
                ?>
                <?php $required_attr = ($contact_field->required()->bool()) ? ' required="required"' : '' ?>
                <?php $disabled_attr = ($contact_field->disabled()->bool()) ? ' disabled="disabled"' : '' ?>
                <tr>
                  <td>
                    <label for="<?= $contact_field->label()->slug() ?>"><?= $contact_field->label()->html() ?></label>
                  </td>
                  <td>
                    <input type="text" name="<?= $contact_field->label()->slug() ?>" id="<?= $contact_field->label()->slug() ?>"<?= $value_attr ?><?= $required_attr ?><?= $disabled_attr ?>>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
            <tr>
              <td colspan="2">
                <input type="text" name="subject" id="subject" placeholder="<?= $page->contact_subject()->escape('html') ?>" required="required">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <textarea name="body" id="body" placeholder="<?= $page->contact_body_placeholder()->escape('html') ?>"></textarea>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="right">
                <input type="hidden" id="to" name="to" value="<?= $page->contact_to()->escape('attr') ?>">
                <input type="submit" name="send" value="<?= $page->button_label()->or('Send') ?>">
              </td>
            </tr>
          </tbody>
        </table>
      </form>
      <?php else: ?>
        <?= $page->contact_denied()->kirbytext() ?>
      <?php endif ?>
    </div>

  </main>

<?php snippet('footer') ?>
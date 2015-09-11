<div id="page">
  <div id="main-content" class="column" style="width: 100%;">
    <div class="inner">
      <?php if ($tabs || $title): ?>
        <?php if (!empty($tabs['#primary'])): ?>
          <div id="content-tabs" class="clearfix">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>

        <?php if ($title): ?>
          <?php print render($title_prefix); ?>
          <h1 id="page-title"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>
        <?php endif; ?>

        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($page['content']): ?>
        <?php print render($page['content']); ?>
      <?php endif; ?>
    </div><!-- /inner -->
  </div><!-- /main-content column -->
</div><!-- /page -->

<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlight']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 *
 * 
 */
?>
<div id="page">
  <?php if ($page['header_top']): ?>
    <div id="header-top" class="container">
      <div class="row">
        <div class="column">
          <div class="inner">
            <?php print render($page['header_top']); ?>
          </div><!-- /inner -->
        </div><!-- /column -->
      </div><!-- /row -->
    </div><!-- /container -->
  <?php endif; ?>
  
  <?php $header_first_region = $logo || $site_name || $site_slogan || $page['header_first']; ?>
  <?php if ($header_first_region || $page['header_second'] || $page['header_third']): ?>
    <header id="header" class="container">
      <div class="row">
        <?php if ($header_first_region): ?>
          <div id="header-first" class="column">
            <div class="inner">
              <?php if ($logo): ?>
              <div id="logo">
                <a href="<?php print check_url($front_page) ?>" title="<?php print t('Home') ?>">
                  <img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" />
                </a>
              </div>
              <?php endif; ?>
              
              <?php if ($site_name || $site_slogan): ?>
              <hgroup>
                <?php if ($site_name): ?>
                  <h1 id="site-name">
                    <a href="<?php print check_url($front_page) ?>" title="<?php print t('Home'); ?>">
                      <?php print $site_name; ?>
                    </a>
                  </h1>
                <?php endif; ?>
                <?php if ($site_slogan): ?>
                  <h2 id="slogan">
                    <?php print $site_slogan; ?>
                  </h2>
                <?php endif; ?>
              </hgroup>
              <?php endif; ?>
              <?php if ($page['header_first']): ?>
                <?php print render($page['header_first']); ?>
              <?php endif; ?>
            </div><!-- /column inner -->
          </div><!-- /header-first column -->
        <?php endif; ?>

        <?php if ($page['header_second']): ?>
          <div id="header-second" class="column">
            <div class="inner">
              <?php print render($page['header_second']); ?>
            </div><!-- /column inner -->
          </div><!-- /header-second column -->
        <?php endif; ?>  
        
        <?php if ($page['header_third']): ?>
          <div id="header-third" class="column">
            <div class="inner">
              <?php print render($page['header_third']); ?>
            </div><!-- /column inner -->
          </div><!-- /header-third column -->
        <?php endif; ?> 
      </div><!-- header row -->
    </header><!-- /header container -->
  <?php endif; ?>
  
  <?php if ($main_menu || $secondary_menu || $page['header_bottom']): ?>
    <div id="header-bottom" class="container">
      <div class="row">
        <div class="column">
          <div class="inner">
            <?php if ($main_menu): ?>
              <nav id="main-menu">
                <h2 class="element-invisible">Main menu</h2>
                <?php print $main_menu_tree; ?>
              </nav><!-- /main-menu -->
            <?php endif; ?>
              
            <?php if ($secondary_menu): ?>
              <nav id="secondary-menu">
                <h2 class="element-invisible">Secondary menu</h2>
                <?php print theme('links__system_secondary_menu', array(
                  'links' => $secondary_menu,
                )); ?>
              </nav><!-- /secondary-menu -->
            <?php endif; ?>
                  
            <?php if ($page['header_bottom']): ?>
              <?php print render($page['header_bottom']); ?>
            <?php endif; ?>
          </div><!-- /inner --> 
        </div><!-- /column -->
      </div><!-- /header-bottom row -->
    </div><!-- /header-bottom container --> 
  <?php endif; ?>
  
  <?php if ($page['preface_first'] || $page['preface_second'] || $page['preface_third']): ?>
    <div id="prefaces" class="container <?php print $prefaces; ?>">
      <h2 class="element-invisible">Preface content</h2>
      <div class="row">
        <?php if ($page['preface_first']): ?>
          <div id="preface-first" class="column">
            <div class="inner">
              <?php print render($page['preface_first']); ?>
            </div><!-- /column inner -->
          </div><!-- /preface-first column -->
        <?php endif; ?>
        <?php if ($page['preface_second']): ?>
          <div id="preface-second"class="column">
            <div class="inner">
              <?php print render($page['preface_second']); ?>
            </div><!-- /column inner -->
          </div><!-- /preface-second column -->
        <?php endif; ?>
        <?php if ($page['preface_third']): ?>
          <div id="preface-third" class="column">
            <div class="inner">
              <?php print render($page['preface_third']); ?>
            </div><!-- /column inner -->
          </div><!-- /preface-third column -->
        <?php endif; ?>
      </div><!-- /prefaces row -->
    </div><!-- /prefaces container -->
  <?php endif; ?>
  
  <?php $content_top_region = $page['help'] || $messages || $page['highlight']; ?>
  <?php $content_region = $tabs || $title || $page['content']; ?>
  <?php if ($content_top_region || $content_region || $page['sidebar_first'] || $page['sidebar_second']): ?>
    <div id="main" class="container">
      <div class="row">
        <?php if ($page['sidebar_first']): ?>
          <aside id="sidebar-first" class="sidebar column">
            <div class="inner">
              <h2 class="element-invisible">Sidebar content</h2>
              <?php print render($page['sidebar_first']); ?>
            </div><!-- /column inner -->
          </aside><!-- /sidebar-first column -->
        <?php endif; ?>
        
        <div id="main-content" class="column">
          <div class="inner">
            <?php if ($content_top_region): ?>
              <div id="content-top">
                <?php if ($page['help']): ?>
                  <?php print render($page['help']); ?>
                <?php endif; ?>
                <?php if ($messages): ?>
                  <?php print $messages; ?>
                <?php endif; ?>
                <?php if ($page['highlight']): ?>
                  <div id="highlighted">
                    <?php print render($page['highlight']); ?>
                  </div>
                <?php endif; ?>
              </div><!-- /content-top -->
            <?php endif; ?>

            <?php if ($content_region): ?>
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
            <?php endif; ?>
          </div><!-- /inner -->
        </div><!-- /main-content column -->
        
        <?php if ($page['sidebar_second']): ?>
          <aside id="sidebar-second" class="sidebar column">
            <div class="inner">
              <h2 class="element-invisible">Sidebar content</h2>
              <?php print render($page['sidebar_second']); ?>
            </div><!-- /column inner -->
          </aside><!-- /sidebar-second column -->
        <?php endif; ?>
      </div><!-- /main-content row -->
    </div><!-- /main-content container -->
  <?php endif; ?>
  
  <?php if ($page['postscript_first'] || $page['postscript_second'] || $page['postscript_third']): ?>
    <div id="postscripts" class="container <?php print $postscripts; ?>">
      <h2 class="element-invisible">Postscript content</h2>
      <div class="row">
        <?php if ($page['postscript_first']): ?>
          <div id="postscript-first" class="column fourcol first">
            <div class="inner">
              <?php print render($page['postscript_first']); ?>
            </div><!-- /column inner -->
          </div><!-- /postscript-first column -->
        <?php endif; ?>
        <?php if ($page['postscript_second']): ?>
          <div id="postscript-second"class="column">
            <div class="inner">
              <?php print render($page['postscript_second']); ?>
            </div><!-- /column inner -->
          </div><!-- /postscript-second column -->
        <?php endif; ?>
        <?php if ($page['postscript_third']): ?>
          <div id="postscript-third" class="column">
            <div class="inner">
              <?php print render($page['postscript_third']); ?>
            </div><!-- /column inner -->
          </div><!-- /postscript-third column -->
        <?php endif; ?>
      </div><!-- /postscript row -->
    </div><!-- /postscript container -->
  <?php endif; ?>

  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
    <div id="footers" class="container <?php print $footers; ?>">
      <h2 class="element-invisible">Footer content</h2>
      <div class="row">
        <?php if ($page['footer_first']): ?>
          <div id="footer-first" class="column">
            <div class="inner">
              <?php print render($page['footer_first']); ?>
            </div><!-- /column inner -->
          </div><!-- /footer-first column -->
        <?php endif; ?>
        <?php if ($page['footer_second']): ?>
          <div id="footer-second"class="column">
            <div class="inner">
              <?php print render($page['footer_second']); ?>
            </div><!-- /column inner -->
          </div><!-- /footer-second column -->
        <?php endif; ?>
        <?php if ($page['footer_third']): ?>
          <div id="footer-third" class="column">
            <div class="inner">
              <?php print render($page['footer_third']); ?>
            </div><!-- /column inner -->
          </div><!-- /footer-third column -->
        <?php endif; ?>
      </div><!-- /footer row -->
    </div><!-- /footer container -->
  <?php endif; ?>
</div><!-- /page -->

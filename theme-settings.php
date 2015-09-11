<?php

/**
 * @file
 * Theme setting callbacks 
 */
function jflex_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['logo']['custom_logo_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo URL'),
    '#default_value' => theme_get_setting('custom_logo_url'),
    '#description' => t('Enter the URL where a visitor should be sent when clicking
    on the site logo. For example: www.foo.net  ( NOTE: Do not include http:// )'),
  );
}

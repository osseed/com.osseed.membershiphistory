<?php

require_once 'membershiphistory.civix.php';
// phpcs:disable
use CRM_Membershiphistory_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function membershiphistory_civicrm_config(&$config) {
  _membershiphistory_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function membershiphistory_civicrm_xmlMenu(&$files) {
  _membershiphistory_civix_civicrm_xmlMenu($files);
}

function membershiphistory_civicrm_tabset($tabsetName, &$tabs, $context) {
 if ($tabsetName == 'civicrm/contact/view') {
   $contactId = $context['contact_id'];
   $url = CRM_Utils_System::url( 'civicrm/membership-history',"reset=1&snippet=1&force=1&cid=$contactId");
   $tabs[] = array(
     'id'    => 'membershipHistoryTab',
     'url'   => $url,
     'title' => 'Membership History',
     'weight' => 300,
   );
 }
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function membershiphistory_civicrm_install() {
  _membershiphistory_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function membershiphistory_civicrm_postInstall() {
  _membershiphistory_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function membershiphistory_civicrm_uninstall() {
  _membershiphistory_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function membershiphistory_civicrm_enable() {
  _membershiphistory_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function membershiphistory_civicrm_disable() {
  _membershiphistory_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function membershiphistory_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _membershiphistory_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function membershiphistory_civicrm_managed(&$entities) {
  _membershiphistory_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function membershiphistory_civicrm_caseTypes(&$caseTypes) {
  _membershiphistory_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function membershiphistory_civicrm_angularModules(&$angularModules) {
  _membershiphistory_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function membershiphistory_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _membershiphistory_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function membershiphistory_civicrm_entityTypes(&$entityTypes) {
  _membershiphistory_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function membershiphistory_civicrm_themes(&$themes) {
  _membershiphistory_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function membershiphistory_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function membershiphistory_civicrm_navigationMenu(&$menu) {
//  _membershiphistory_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _membershiphistory_civix_navigationMenu($menu);
//}

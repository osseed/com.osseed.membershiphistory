<?php
use CRM_Membershiphistory_ExtensionUtil as E;

class CRM_Membershiphistory_Page_MembershipHistory extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Membership History'));
    $id = $_GET['cid'];
    $membership_result = civicrm_api3('Membership', 'get', [
      'sequential' => 1,
      'contact_id' => $id,
    ]);

    $membership_status = civicrm_api3('MembershipStatus', 'get', [
      'sequential' => 1,
      'id' => $membership_result['values'][0]['status_id'],
    ]);

    $membership_result['values'][0]['status'] = $membership_status['values'][0]['label'];
    $this->assign('membership_history', $membership_result['values']);
    parent::run();
  }
}

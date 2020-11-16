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

    foreach ($membership_result as $value) {
      foreach ($value as $val) {
        $membership_log[] = civicrm_api3('MembershipLog', 'get', [
          'sequential' => 1,
          'id'=>$val['id'],
        ]);
      }
    }

    foreach ($membership_log as $key => $value) {
      $membershipDetails[$value['id']] = $value['values'][0];
    }

    $this->assign('membership_history', $membershipDetails);
    parent::run();
  }
}

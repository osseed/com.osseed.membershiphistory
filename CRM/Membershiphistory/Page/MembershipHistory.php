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

    foreach ($membership_result as $values) {
      if (is_array($values) || is_object($values)){
        foreach ($values as $val) {
          $membership_log[] = civicrm_api3('MembershipLog', 'get', [
            'sequential' => 1,
            'membership_id' => $val['id'],
          ]);
        }
      }
    }

    $membershipType = CRM_Member_PseudoConstant::membershipType();
    $membershipStatus= CRM_Member_PseudoConstant::membershipStatus();

    foreach ($membership_log as $key => $value) {
      foreach ($value['values'] as $membershipkey => $membershipval) {
        // $membershipDetails[$membershipval['id']] = $membershipval;
        // $membershipDetails[$membershipval['status_id']] = $membershipStatus[$membershipval['status_id']];
        $membershipval['membership_type_id'] = $membershipType[$membershipval['membership_type_id']];
        $membershipval['status_id'] = $membershipStatus[$membershipval['status_id']];
        $membershipDetails[$membershipkey[$membershipval['id']['membership_type_id']['status_id']]] = $membershipval;
      }
    }

    $this->assign('membership_history', $membershipDetails);
    parent::run();
  }
}

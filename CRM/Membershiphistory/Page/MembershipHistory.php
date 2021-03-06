<?php
use CRM_Membershiphistory_ExtensionUtil as E;

class CRM_Membershiphistory_Page_MembershipHistory extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Membership History'));
    $id = isset($_GET['cid']) ? $_GET['cid'] : null;
    $membership_result = civicrm_api3('Membership', 'get', [
      'sequential' => 1,
      'contact_id' => $id,
    ]);

    $membershipDetails = array();
    if(!empty($membership_result['values'])){
      $membershipType = CRM_Member_PseudoConstant::membershipType();
      $membershipStatus= CRM_Member_PseudoConstant::membershipStatus();
      foreach ($membership_result['values'] as $values) {
        $membership_log = civicrm_api3('MembershipLog', 'get', [
          'sequential' => 1,
          'membership_id' => $values['id'],
        ]);
        if(!empty($membership_log['values'])) {
          foreach ($membership_log['values'] as $logvalues) {
            $membershipval['membership_id'] = $logvalues['membership_id'];
            $membershipval['membership_type_id'] = $membershipType[$logvalues['membership_type_id']];
            $membershipval['status'] = $membershipStatus[$logvalues['status_id']];
            $membershipval['modified_date'] = isset($logvalues['modified_date']) ? $logvalues['modified_date'] : null;
            $membershipval['start_date'] = isset($logvalues['start_date']) ? $logvalues['start_date'] :null;
            $membershipval['end_date'] = isset($logvalues['end_date']) ? $logvalues['end_date'] : null;
            $membershipDetails[$logvalues['id']] = $membershipval;
          }
        }
      }
    }

    $this->assign('membership_history', $membershipDetails);
    parent::run();
  }
}

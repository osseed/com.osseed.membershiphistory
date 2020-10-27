<?php
use CRM_Membershiphistory_ExtensionUtil as E;

class CRM_Membershiphistory_BAO_MembershipHistory extends CRM_Membershiphistory_DAO_MembershipHistory {

  /**
   * Create a new MembershipHistory based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Membershiphistory_DAO_MembershipHistory|NULL
   *
  public static function create($params) {
    $className = 'CRM_Membershiphistory_DAO_MembershipHistory';
    $entityName = 'MembershipHistory';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}

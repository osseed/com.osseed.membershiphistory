<script>
var nextPeriodMembershipTypes = {$nextPeriodMembershipTypes|@json_encode};
</script>
<div id="membership-history">
  <h3>{ts}Membership History{/ts}</h3>
  {if $membership_history}
  <table class="selector row-highlight" id="nextPeriodLineItems">
    <tbody>
    <tr class="columnheader">
      <th scope="col">{ts}Membership{/ts}</th>
      <th scope="col">{ts}Membership Modification date{/ts}</th>
      <th scope="col">{ts}Start Date{/ts}</th>
      <th scope="col">{ts}End Date{/ts}</th>
      <th scope="col">{ts}Status{/ts}</th>
    </tr>
    {foreach from=$membership_history item="membership_history"}
      <tr>
        <td>{$membership_history.membership_type_id}</td>
        <td>{$membership_history.modified_date|crmDate}</td>
        <td>{$membership_history.start_date|crmDate}</td>
        <td>{$membership_history.end_date|crmDate}</td>
        <td>{$membership_history.status}</td>
      </tr>
    {/foreach}
    </tbody>
  </table>
  {else}
    <div class="messages status no-popup">
      {icon icon="fa-info-circle"}{/icon}
      {ts}No membership history have been recorded from this contact.{/ts}
    </div>
  {/if}
</div>

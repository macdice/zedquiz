{include file="admin/header.tpl" section="agents"}

<table>
<tr>
<td>ID</td>
<td>Username</td>
<td>Name</td>
<td>Active</td>
<td>Last logged in</td>
<td>Last modified</td>
</tr>
{foreach from=$agents item=agent}
<tr>
<td>{$agent.id}</td>
<td>{$agent.username}</td>
<td>{$agent.first_name} {$agent.last_name} &lt;{$agent.email}&gt;</td>
<td>{$agent.active}</td>
<td>{$agent.last_login}</td>
<td>{$agent.modified} by {$agent.modified_by_first_name} {$agent.modified_by_last_name}</td>
<td>[ <a href="edit_agent.php?id={$agent.id}">Edit</a> ]</td>
</tr>
{/foreach}
</table>

<p>[ <a href="edit_agent.php">Create</a> ]</p>

{include file="admin/footer.tpl"}

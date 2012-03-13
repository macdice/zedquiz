{include file="admin/header.tpl"}

<table>
<tr>
<td>ID</td>
<td>Display name</td>
<td>Company name</td>
<td>Last updated</td>
</tr>
{foreach from=$businesses item=business}
<tr>
<td>{$business.id}</td>
<td>{$business.display_name}</td>
<td>{$business.company_name}</td>
<td>{$business.updated} by {$business.first_name} {$business.last_name}</td>
<td>[ <a href="edit_business.php?id={$business.id}">Edit</a> ]</td>
</tr>
{/foreach}
</table>

<p>[ <a href="edit_business.php">Create</a> ]</p>

{include file="admin/footer.tpl"}

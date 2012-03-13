{include file="admin/header.tpl"}

<form method="POST" action="save_agent.php">
<input type="hidden" name="id" value="{$id}"/>
<table>
<tr>
<td>ID</td>
<td>{$id}</td>
</tr>
<tr>
<td>First name</td>
<td><input name="first_name" type="text" value="{$record.first_name|escape}"/></td>
</tr>
<tr>
<td>Last name</td>
<td><input name="last_name" type="text" value="{$record.last_name|escape}"/></td>
</tr>
<tr>
<td>Email</td>
<td><input name="email" type="text" value="{$record.email|escape}"/></td>
</tr>
<tr>
<td>Username</td>
<td><input name="username" type="text" value="{$record.username|escape}"/></td>
</tr>
<tr>
<td>Password</td>
<td><input name="password" type="text" value=""/></td>
</tr>
<tr>
<td>Active</td>
<td><input name="active" type="checkbox" {if $record.active == "t"}checked="true"{/if}/></td>
</tr>
<tr>
<td>Login failures</td>
<td>
{if $record.login_failures == null}
None
{else}
{$record.login_failures}
<input name="clear_login_failures" type="checkbox"> Clear
{/if}
</td>
</tr>
</table>
<input type="submit" value="Save"/>
</form>

{include file="admin/footer.tpl"}

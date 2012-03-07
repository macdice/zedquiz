{include file="admin/header.tpl"}

<form method="POST" action="save_quiz.php">
<input type="hidden" name="id" value="{$id}"/>
<table>
<tr>
<td>ID</td>
<td>{$id}</td>
</tr>
<tr>
<td>Name</td>
<td><input name="name" type="text" value="{$name}"/></td>
</tr>
<tr>
<td>Start date</td>
<td><input name="start_date" type="text" value="{$start_date}"/></td>
</tr>
<tr>
<td>End date</td>
<td><input name="end_date" type="text" value="{$end_date}"/></td>
</tr>
</table>
<input type="submit" value="Save"/>
</form>

{include file="admin/footer.tpl"}

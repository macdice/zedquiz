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
<td>{html_select_date prefix="start_date_" field_order="DMY" start_year="2012" end_year="2022" time=$start_date}</td>
</tr>
<tr>
<td>End date</td>
<td>{html_select_date prefix="end_date_" field_order="DMY" start_year="2012" end_year="2022" time=$end_date}</td>
</tr>
</table>
<input type="submit" value="Save"/>
</form>

{include file="admin/footer.tpl"}

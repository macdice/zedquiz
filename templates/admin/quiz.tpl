{include file="admin/header.tpl" section="quizes"}

<script>
function doDelete(id) {ldelim}
    alert("Are you sure you want to delete quiz ID " + id + "?");
{rdelim}
</script>

<table>
<tr>
<td>ID</td>
<td>Name</td>
<td>Start date</td>
<td>End date</td>
<td>Questions</td>
</tr>
{foreach from=$quizes item=quiz}
<tr>
<td>{$quiz.id}</td>
<td>{$quiz.name}</td>
<td>{$quiz.start_date}</td>
<td>{$quiz.end_date}</td>
<td>{$quiz.questions}</td>
<td>[ <a href="edit_quiz.php?id={$quiz.id}">Edit</a> | <a href="javascript:doDelete({$quiz.id});">Delete</a> ]</td>
</tr>
{/foreach}
</table>

<p>[ <a href="edit_quiz.php">Create</a> ]</p>

{include file="admin/footer.tpl"}

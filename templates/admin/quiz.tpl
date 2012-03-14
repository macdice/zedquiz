{include file="admin/header.tpl" section="quizes"}

<table>
<tr>
<td>ID</td>
<td>Name</td>
<td>Start date</td>
<td>End date</td>
<td>Questions</td>
<td>Last modified</td>
</tr>
{foreach from=$quizes item=quiz}
<tr>
<td>{$quiz.id}</td>
<td>{$quiz.name}</td>
<td>{$quiz.start_date}</td>
<td>{$quiz.end_date}</td>
<td>{$quiz.questions}</td>
<td>{$quiz.modified} by {$quiz.first_name} {$quiz.last_name}</td>
<td>[ <a href="edit_quiz.php?id={$quiz.id}">Edit</a> | <a href="question.php?quiz={$quiz.id}">Questions</a> ]</td>
</tr>
{/foreach}
</table>

<p>[ <a href="edit_quiz.php">Create</a> ]</p>

{include file="admin/footer.tpl"}

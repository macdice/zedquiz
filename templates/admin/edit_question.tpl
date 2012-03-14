{include file="admin/header.tpl"}

<form method="POST" action="save_question.php">
<input type="hidden" name="id" value="{$id}"/>
<input type="hidden" name="quiz_id" value="{$quiz_id}"/>
<table>
<tr>
<td>ID</td>
<td>{$id}</td>
</tr>
<tr>
<td>Question</td>
<td><input name="question_body" type="text" value="{$question_body|escape}"/>
<input name="active" type="checkbox" {if $active == "t"}checked="true"{/if}/> Active</td>
</tr>
<tr>
<td>Business</td>
<td>
<select name="business">
{html_options values=$business_ids output=$business_names selected=$business}
</select>
</td>
</tr>
{foreach from=$answers item=answer}
<tr>
<td>Answer</td>
<td><input name="answer_{$answer.id}" type="text" value="{$answer.body|escape}"/>
<input name="active_{$answer.id}" type="checkbox" {if $answer.active == "t"}checked="true"{/if}/> Active
<input name="correct" type="radio" value="{$answer.id}" {if $answer.correct == "t"}checked="true"{/if}/> Correct
</td>
</tr>
{/foreach}
<tr>
<td>Add answer</td>
<td><input name="add_answer1" type="text" value=""/>
<input name="correct" type="radio" value="new1"/> Correct
</td>
</tr>
<tr>
<td>Add answer</td>
<td><input name="add_answer2" type="text" value=""/>
<input name="correct" type="radio" value="new2"/> Correct
</td>
</tr>
<tr>
<td>Add answer</td>
<td><input name="add_answer3" type="text" value=""/>
<input name="correct" type="radio" value="new3"/> Correct
</td>
</tr>
<tr>
<td>Add answer</td>
<td><input name="add_answer4" type="text" value=""/>
<input name="correct" type="radio" value="new4"/> Correct
</td>
</tr>
</table>
<input type="submit" value="Save"/>
</form>

{include file="admin/footer.tpl"}

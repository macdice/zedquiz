{include file="admin/header.tpl" section="quizes"}

<ol>
{foreach from=$questions item=question}
<li>{if $question.active == "f"}<strike>{/if}{$question.body}{if $question.active == "f"}</strike>{/if}
  <ul>
    {foreach from=$answers[$question.id] item=answer}
      <li>{if $answer.active == "f"}<strike>{/if}{if $answer.correct == "t"}<b>{/if}{$answer.body}{if $answer.correct == "t"}</b>{/if}{if $answer.active == "f"}</strike>{/if}</li>
    {/foreach}
  </ul>
  <p>Business: {$question.business_name}</p>
  <p>Question last modified {$question.modified} by {$question.first_name} {$question.last_name}</p>
  <p>[ <a href="edit_question.php?id={$question.id}">Edit</a> ]</p>
</li>
{/foreach}
</ol>

<p>[ <a href="edit_question.php?quiz={$quiz_id}">Create</a> ]</p>

{include file="admin/footer.tpl"}

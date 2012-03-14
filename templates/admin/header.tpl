<html>
<head>
<title>ZedQuiz Admin</title>
</head>
<body>
<p>
Logged in as {$smarty.session.agent_first_name} {$smarty.session.agent_last_name}
 |
{if $section == "overview"}<b>Overview</b>{else}<a href="overview.php">Overview</a>{/if}
 |
{if $section == "businesses"}<b>Businesses</b>{else}<a href="business.php">Businesses</a>{/if}
 |
{if $section == "quizes"}<b>Quizes</b>{else}<a href="quiz.php">Quizes</a>{/if}
 |
{if $section == "agents"}<b>Agents</b>{else}<a href="agent.php">Agents</a>{/if}
 |
<a href="logout.php">Logout</a>
</p>

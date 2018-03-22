<?php
//Learning php commands
echo 'Get variable is ';
echo $_GET['getVariable'];
echo '<br/>';
echo 'Request variable is ';
echo $_REQUEST['requestVariable'];
echo '<br/>';

if(isset($_GET['getVariable']))
{
	echo $_POST['name'];
	echo $_REQUEST['message'];
}


?>

<form action="learning_post_get.php?getVariable=1&amp;requestVariable=1" method="post">

	Name: <input type="text" name="name" /><br/>
	Message: <textarea name="message"></textarea><br/>
	
	<input type="submit" value="Send Message" />

</form>
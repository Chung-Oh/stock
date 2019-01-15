<?php 
require_once 'convert.php';

function showAlert($type)
{
	if (isset($_SESSION[$type])) {?>
		<p class="alert-<?php echo $type ?>"><?php echo $_SESSION[$type] ?></p>
		<?php unset($_SESSION[$type]);	
	}
}
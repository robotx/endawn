<?php
session_start();
$_SESSION = array();
session_destroy();
echo '<script type="text/javascript">document.location.href="../index.php"
</script>';
?>

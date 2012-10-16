<?php

//destory cookie before logout
setcookie('consumer', '', time()-3600);
setcookie('token', '', time()-3600);

header('Location:login.php');

?>

<?php
setcookie("name","",time()-3600,"/");
setcookie("password","",time()-3600,"/");
header('Location: http://test.loc/login.php');
exit;
<?php
setcookie('login','',time()-3600,'/');
setcookie('user','',time()-3600,'/');
header("Location:/");
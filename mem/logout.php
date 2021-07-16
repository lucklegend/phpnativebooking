<?php

if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
   setcookie("cookname", "", time()-60*60*24*100, "/");
   setcookie("cookpass", "", time()-60*60*24*100, "/");
}

 unset($_SESSION);
  echo "<script type=text/javascript language=javascript> window.location.href = '../home.php?ops=2'; </script> ";
			exit;




?>
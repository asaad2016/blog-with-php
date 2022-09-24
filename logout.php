<?php

		setcookie("uid","",time()-60*60*24*2000);
		setcookie("login","",time()-60*60*24*2000);
		header('Location:index.php');


	
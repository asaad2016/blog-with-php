<?php

function refresh($page,$duration){
	echo "<meta http-equiv='refresh' content='" . $duration . ";url=" . $page . "' />";
}
<?php

if(!isset($session)) {
	header("Location: ./");
	exit();
}

if(isset($_GET['delVid'])) {
	$vidToDelId = htmlentities($_GET['delVid']);
	Manager::deleteVideo($vidToDelId, $session->getId());
}

$vids = Manager::getVideosFromUser($session->getId());

if(empty($vids)) {
	$err = $lang['error_no_videos_uploaded'];	
}
?>
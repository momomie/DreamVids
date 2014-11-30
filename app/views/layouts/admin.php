<!DOCTYPE html>
<html>
	<head>
		<title>DreamVids - Administration</title>
		<meta charset="utf-8">

		<?php isset($currentPage) ? include(VIEW.'layouts/pages/'.$currentPage.'/meta.php') : include(VIEW.'layouts/pages/default/meta.php'); ?>

		<link rel="stylesheet" href="<?php echo ASSETS.'panel/css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo ASSETS.'panel/css/sb-admin.css'; ?>">
		<link rel="stylesheet" href="<?php echo ASSETS.'panel/font-awesome/css/font-awesome.min.css'; ?>">
	</head>

	<body>
		<script type="text/javascript">
			var _webroot_ = "<?php echo WEBROOT ?>";
		</script>
		<div id="wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo WEBROOT.'admin/dashboard'; ?>">DreamVids</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<li class="<?php echo ($current == 'dashboard') ? 'active' : false; ?>"><a href="<?php echo WEBROOT.'admin/dashboard'; ?>"><i class="fa fa-lg fa-dashboard"></i> Tableau de bord</a></li>
						<li class="<?php echo ($current == 'videos') ? 'active' : false; ?>"><a href="<?php echo WEBROOT.'admin/videos'; ?>"><i class="fa fa-lg fa-play"></i> Vidéos</a></li>
						<li class="<?php echo ($current == 'channels') ? 'active' : false; ?>"><a href="<?php echo WEBROOT.'admin/channels'; ?>"><i class="fa fa-lg fa-child"></i> Chaînes</a></li>
						<li class="<?php echo ($current == 'comments') ? 'active' : false; ?>"><a href="<?php echo WEBROOT.'admin/comments'; ?>"><i class="fa fa-lg fa-comment-o"></i> Commentaires</a></li>
						<li><a href="<?php echo WEBROOT; ?>"><i class="fa fa-lg fa-times"></i> Quitter</a></li>
					</ul>
				</div>
			</nav>

		<?php include($content); ?>

		</div>

		<script src="<?php echo ASSETS.'panel/js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo ASSETS.'panel/js/jquery.js'; ?>"></script>
		<?php isset($currentPage) ? include(VIEW.'layouts/pages/'.$currentPage.'/scripts.php') : include(VIEW.'layouts/pages/default/scripts.php'); ?>
	</body>
</html>
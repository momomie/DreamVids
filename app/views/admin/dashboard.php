<div id="page-wrapper">
	<div class="container-fluid">
	<h1>Panel <?php echo $rankStr; ?> - Tableau de bord</h1>

		<div class="user-info">
			<h2><?php echo $user->username; ?> <small><?php echo $rankStr ?></small></h2>
			<div class="row">
				<div class="col-lg-3">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $reportedCommentsCount; ?></div>
									<div>Commentaires reportés</div>
								</div>
							</div>
						</div>
						<a href="<?php echo WEBROOT.'admin/comments'; ?>">
							<div class="panel-footer">
								<span class="pull-left">Voir</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-play fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $reportedVidsCount; ?></div>
									<div>Vidéos reportées</div>
								</div>
							</div>
						</div>
						<a href="<?php echo WEBROOT.'admin/videos'; ?>">
							<div class="panel-footer">
								<span class="pull-left">Voir</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
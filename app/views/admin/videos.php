<div id="page-wrapper">
	<div class="container-fluid">
	<h1>Panel <?php echo $rankStr; ?> - Vidéos</h1>
		<div class="row">
			<div class="col-xs-12 form-inline">
				<a class="<?php echo ($type == 'all') ? 'active' : false; ?> btn btn-primary" href="<?php echo WEBROOT.'admin/videos/all'; ?>">Toutes les vidéos</a>
				<a class="<?php echo ($type == 'flagged') ? 'active' : false; ?> btn btn-warning" href="<?php echo WEBROOT.'admin/videos/flagged'; ?>">Flagged</a>
				<input type="text" class="form-control" value="<?php echo $query; ?>" id="search" placeholder="Rechercher"> 
				<a class="btn btn-primary" href="#" onclick="searchVideo(document.getElementById('search').value)">Rechercher</a>
				<br>
			</div>
		<br/>
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-stripped table-condensed table-bordered">
					<thead>
						<tr>
							<th>Titre</th>
							<th>Auteur</th>
							<th>Vues</th>
							<th>+</th>
							<th>-</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
						if($vids) 
						foreach ($vids as $vid): ?>
							<tr>
								<td><a href="<?php echo WEBROOT.'watch/'.$vid->id; ?>"><?php echo $vid->title; ?></a></td>
								<td><?php echo UserChannel::find($vid->poster_id)->name; ?></td>
								<td><?php echo number_format($vid->views); ?></td>
								<td><?php echo $vid->likes; ?></td>
								<td><?php echo $vid->dislikes; ?></td>
								<td>
									<?php if($vid->isSuspended()) { ?>
										<button class="btn btn-success" onclick="unSuspendVideo('<?php echo $vid->id ?>')">Annuler la suspension</button>	
									<?php } else { ?>
										<?php echo ($vid->isFlagged()) ? "<button class=\"btn btn-success\" onclick=\"unFlagVideo('" . $vid->id . "')\">Annuler le flag</button>" : "<button class=\"btn btn-danger\" onclick=\"flagVideo('" . $vid->id . "')\">Signaler</button>"; ?>
										<button class="btn btn-warning" onclick="suspendVideo('<?php echo $vid->id ?>')">Suspendre</button>
										<button class="btn btn-primary" onclick="setToDiscover('<?php echo $vid->id ?>')">Mettre en avant</button>
									<?php } ?>
								
									<?php if($isAdmin): ?>
										<button class="btn btn-danger" onclick="eraseVideo('<?php echo $vid->id ?>')">Supprimer</button>
									<?php endif ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
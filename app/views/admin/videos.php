<div id="page-wrapper">
	<div class="container-fluid">
	<h1>Panel <?php echo $rankStr; ?> - Videos reportés/suspendues</h1>
		<table class="table table-bordered">
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
				<?php foreach ($reportedVids as $vid): ?>
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
								<button class="btn btn-success" onclick="unFlagVideo('<?php echo $vid->id ?>')">Annuler le flag</button>
								<button class="btn btn-warning" onclick="suspendVideo('<?php echo $vid->id ?>')">Suspendre</button>
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
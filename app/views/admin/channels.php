<div id="page-wrapper">
	<div class="container-fluid">
	<h1>Panel <?php echo $rankStr; ?> - Liste des chaînes</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Créateur</th>
					<th>Administrateurs</th>
					<th>Vues</th>
					<th>Abonnés</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($channels as $chan): ?>
					<tr>
						<td><a href="<?php echo WEBROOT.'channel/'.$chan->id; ?>"><?php echo $chan->name; ?></a></td>
						<td><?php echo User::find($chan->owner_id)->username; ?></td>
						<td><?php echo $chan->getAdminsNames(); ?></td>
						<td><?php echo $chan->views; ?></td>
						<td><?php echo $chan->subscribers; ?></td>
						<td><button class="btn btn-danger">Suprimer</button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
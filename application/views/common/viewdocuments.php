
<div id="page-wrapper">
	<div class="main">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-warning">
					<div class="panel-heading">
						View Documents
					</div>
					<div class="panel-body">
						<div class="list-group">
					<?php foreach ($documents as $document): ?>
						<li class="list-group-item"><a href="<?php echo base_url($document->url) ?>"><?php echo $document->url ?></a>  <br></li>
					<?php endforeach ; ?>

				</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>



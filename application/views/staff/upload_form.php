<div id="page-wrapper" style="padding-top: 10%">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-offset-2">
			<form action="<?php echo site_url('staff/do_upload') ?>" method="post" enctype="multipart/form-data" >
				<input type="hidden" name="client_id" value="<?php echo $clientId ?>">
				<input type="file" class="form-control" name="userfile">
				<br>
				<button class="btn btn-warning" type="submit">Upload</button>
			</form>
		</div>
	</div>
</div>

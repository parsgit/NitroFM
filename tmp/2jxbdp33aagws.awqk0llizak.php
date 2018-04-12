<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	
<div id="panel" class="panel panel-warning center-block le-panel" 
			style="width: 40%;display: none;">
			<div class="panel-heading text-center bk-hpanel2" style="color: #ffffff;">Create Admin Account</div>
			<div class="panel-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-4 control-label center-block">username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="username"
								placeholder="your username">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label center-block">password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password1"
								placeholder="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">confirm</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password2"
								placeholder="confirm Password">
						</div>
					</div>

					<div class="form-group">

						<button id="button2" onclick="create_user()" class="btn btn-warning center-block">Save Admin Accunt</button>
					</div>
				</div>
			</div>
		</div>


</body>
</html>

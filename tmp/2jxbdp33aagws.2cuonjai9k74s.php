<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>setup</title>

<!-- Bootstrap -->
<link href="public/bootstrap-3.3.7/css/bootstrap.min.css"
	rel="stylesheet">
<link href="public/res/install/style.css" rel="stylesheet">
<link href="public/res/install/background.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bk">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="public/bootstrap-3.3.7/js/bootstrap.min.js"></script>


	<div class="text-center">
		<h1>Welcome To NitroFM Setup</h1>
	</div>

	<div style="width: 40%; display: none;" id="messagealterdanger"
		class="alert alert-danger  center-block le-panel" role="alert">

		ERROR : pleas complet all filds</div>

	<div style="width: 40%; display: none;" id="messagealtersuccess"
		class="alert alert-success center-block le-panel" role="alert">
		ERROR : pleas complet all filds</div>
	<div id="mycontent">
		<div id="panel" class="panel panel-primary center-block le-panel"
			style="width: 40%">
			<div class="panel-heading text-center">DataBase setup</div>
			<div class="panel-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-4 control-label center-block">DataBase
							Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="db_name"
								placeholder="db_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label center-block">username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="db_username"
								placeholder="db_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="db_password"
								placeholder="Password">
						</div>
					</div>

					<div class="form-group">

						<button id="button1" onclick="create_db()" class="btn btn-warning center-block">install
							DataBase</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="public/res/install/init_createdb.js"></script>
</body>
</html>

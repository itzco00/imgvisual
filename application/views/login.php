<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/avanteprof_2.png"/>

	<title>Login</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	<!--external css-->
	<link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page">
		<div class="container">
			<form class="form-login" action="" method="post" style="border:1px solid #00B2E1">
				<h2 class="form-login-heading" style="background: #00B2E1">Login</h2>
				<div class="login-wrap">
					<input name="username" type="text" class="form-control" placeholder="Usuario" autofocus>
					<br>
					<input name="password" type="password" class="form-control" placeholder="Contraseña">
					<label class="checkbox">
						<span class="pull-right">
						</span>
					</label>
					<button class="btn btn-theme btn-block" type="submit" style="background:#00B2E1">Enviar</button>
				</div>

				<!-- Modal -->
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Forgot Password ?</h4>
							</div>
							<div class="modal-body">
								<p>Enter your e-mail address below to reset your password.</p>
								<form action="" method="post">
									<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
								<button class="btn btn-theme" type="submit">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	<!-- modal -->

	</form>

	</div>
	</div>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!--BACKSTRETCH-->
	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
	<script>
		$.backstretch("assets/img/login-bg.jpg", {
			speed: 500
		});
	</script>


</body>

</html>
@if (Auth::check())
    <script> window.location="{{ route('dashboard') }}"</script>
@endif 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>ISuport</title>

	<!-- Global stylesheets -->
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/pages/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/pages/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="/pages/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="/pages/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="/pages/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

  	<link href="/css/main.css" rel="stylesheet">

	<!-- Core JS files -->
	<script src="/global_assets/js/main/jquery.min.js"></script>
	<script src="/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="/global_assets/js/plugins/forms/wizards/steps.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/inputmask.js"></script>
	<script src="/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="/global_assets/js/plugins/extensions/cookie.js"></script>
	<script src="/pages/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/form_wizard.js"></script>
	<script src="/global_assets/js/demo_pages/login.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/passy.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/maxlength.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="/global_assets/js/demo_pages/form_validation.js"></script>
	<script src="/global_assets/js/demo_pages/form_controls_extended.js"></script>
	<script src="/global_assets/js/demo_pages/job_apply.js"></script>
	<script src="/global_assets/js/demo_pages/login_validation.js"></script>
    <script src="/global_assets/js/demo_pages/extra_jgrowl_noty.js"></script>
    <script src="/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="/global_assets/js/plugins/notifications/noty.min.js"></script>
	<!-- /theme JS files -->

</head>

<body>
	<!-- Main navbar -->
    <div class="navbar navbar-expand-md">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ route('default') }}" class="d-inline-block">
                    <h1>G-Hire</h1>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-mobile">           
                <span class="ml-md-3 mr-md-auto"></span>
                <ul class="navbar-nav">
                	<li class="nav-item dropdown dropdown-user">
                        <a href="{{ route('Devregister') }}" class="navbar-nav-link d-flex align-items-center">
                            <span>WORK AS A DEVELOPER</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-user">
                        <a href="{{ route('login') }}" class="navbar-nav-link d-flex align-items-center">
                            <span>SIGN-IN</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-user">
                        <a href="{{ route('POregister') }}" class="navbar-nav-link d-flex align-items-center">
                            <span>REGISTER</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center" style=" background: url(/images/home/slider-bg.png) 0 100% repeat-x;">

				@yield('body')

				
			</div>
			<!-- /content area -->

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>
				
				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						<a href="{{ route('default') }}">&copy; G-Hire 2019. All Rights Reserved.</a>
					</span>
		
					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Privacy Policy</a></li>
						<li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Terms of Services</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /content wrapper -->

	</div>
	<!-- /page content -->

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Developer Name | G-Hire</title>

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

	<!-- Core JS files -->
	<script src="/global_assets/js/main/jquery.min.js"></script>
	<script src="/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
	<script src="/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="/global_assets/js/plugins/loaders/progressbar.min.js"></script>
	<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="/global_assets/js/plugins/notifications/bootbox.min.js"></script>
	<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="/pages/assets/js/app.js"></script>
	<script src="/global_assets/js/demo_pages/form_wizard.js"></script>
	<script src="/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="/global_assets/js/demo_pages/components_progress.js"></script>
	<script src="/global_assets/js/demo_pages/job_list.js"></script>
	<script src="/global_assets/js/demo_pages/components_modals.js"></script>
	<script src="/global_assets/js/demo_pages/form_layouts.js"></script>
	<script src="/global_assets/js/demo_pages/user_pages_profile_tabbed.js"></script>
	<script src="/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="/global_assets/js/demo_pages/form_controls_extended.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/maxlength.min.js"></script>
	<script src="/global_assets/js/plugins/forms/inputs/passy.js"></script>
	<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
	<script src="/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="/global_assets/js/demo_pages/alpaca_advanced.js"></script>
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

<body class="">

	  <!-- Main navbar -->
	  <div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand wmin-0 mr-5">
			<a href="{{ route('default') }}" class="d-inline-block">
				<h6>G-Hire</h6>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-expanded="false">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
					</a>
					
					<div class="dropdown-menu dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Online Users</span>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
									<li class="media">
										<div class="mr-3">
											<img src="/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
										</div>
										<div class="media-body">
											<a href="{{ route('showmessages') }}" class="media-title font-weight-semibold">{{ 'Developer1' }}</a>
											@if(Auth::user()->usertype === 'ProductOwner')
												<span class="d-block text-muted font-size-sm">{{ 'Developer' }}</span>
											@endif
										</div>
										<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
									</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-git-compare"></i>
						@if (count($live_projects) > 0)
							<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">{{ count($live_projects) }}</span>
						@endif
					</a>

					<div class="dropdown-menu dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Projects Notifications</span>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								@for ($i = 0; $i < count($live_projects); $i++)
									@foreach($live_projects[$i] as $live_project)
										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
											</div>
											<a href="{{ route('ActiveProjects', $live_project->id) }}">
												<div class="media-body">
													{{ $live_project->title }}
													<div class="text-muted font-size-sm">{{ '$'.$live_project->budget }} <b>& Delivery Time: </b> {{ $live_project->deliverytime }}</div>
												</div>
											</a>	
										</li>
									@endforeach
								@endfor	
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All hirings</a>
						</div>
					</div>
				</li>
			</ul>

			<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>{{ Auth::user()->fname. ' '. Auth::user()->lname , 'Developer'  }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{ route('profile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="{{ route('profile') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="icon-switch2"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</li>
			</ul>
		</div>
	</div>
    <!-- /main navbar -->
    
    <!-- Secondary navbar -->
	<div class="navbar navbar-expand-md navbar-light">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
				<i class="icon-unfold mr-2"></i>
				Navigation
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="navbar-nav-link active">
						<i class="icon-home4 mr-2"></i>
						Dashboard
					</a>
				</li>

				<li class="nav-item nav-item-levels mega-menu-full">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Projects
					</a>

					<div class="dropdown-menu dropdown-content" style="width: 20%;">
						<div class="dropdown-content-body">
							<div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1">Main Panel</div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->usertype === 'ProductOwner')
                                            <li>
                                                <a href="{{ route('PostProject') }}" class="dropdown-item rounded"><i class="icon-copy"></i> Post New Project</a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->usertype === 'ProductOwner')
                                            <li>
                                                <a href="{{ route('developerRequests') }}" class="dropdown-item rounded">
                                                    <i class="icon-width"></i>
                                                    Developer Requests
                                                </a> 
                                            </li>
										@endif
										@if(Auth::user()->usertype === 'Developer')
                                        <li>
                                            <a href="{{ route('ApplyToProject') }}" class="dropdown-item rounded"><i class="icon-copy"></i> Apply to Project</a>
										</li>
										@endif
                                    </ul>
                                </div>
						</div>
					</div>
				</li>
                @if(Auth::user()->usertype === 'Developer')
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link">
                            <i class="icon-coin-dollar mr-2"></i>
                            Earnings & Analytics
                        </a>
                    </li>
                @endif
			</ul>
		</div>
	</div>
	<!-- /secondary navbar -->

	<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">

				@yield('body')

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<div id="app"></div>

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
	<!--<script src="/js/app.js"></script>-->	
	<script type="text/javascript">
		document.getElementById("account-settings").style.display = "none";
		$(document).ready(function(){
		$('#acc-sett').click(function(){
			$("#account-settings").show();
			$("#profile-information").hide();
			document.getElementById("main-text").innerText = "Account Settings";
		});
		$('#prof-info').click(function(){
			$("#account-settings").hide();
			$("#profile-information").show();
			document.getElementById("main-text").innerText = "Profile";
		});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sendmessage').submit(function(e){
				var route = $('#sendmessage').data('route');
				var form_data = $(this);
				$.ajax({
					type: 'POST',                        
					url: route,
					data: form_data.serialize(),
					success: function(Response){
						console.log(Response);
						$('#text').val('');
						var today = new Date();
						var li = $('<li class="media"></li>');
						li.html('<div class="mr-3"><a href="#"><img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt=""></a></div><div class="media-body"><div class="media-chat-item">' + Response.message +'</div><div class="font-size-sm text-muted mt-2">' + today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate() + ' ' + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds() +'<a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div></div>');
						$("#chat_list").append(li);
					}
				});
				e.preventDefault();
			});
			var messageBody = document.querySelector('#messageBody');
			messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight; 
		});
		$(document).ready(function(){
			$('#postproject').submit(function(e){
				var route = $('#postproject').data('route');
				var form_data = $(this);
				$.ajax({
					type: 'POST',                        
					url: route,
					data: form_data.serialize(),
					success: function(Response){
						//console.log(Response.title);
						$('#Notification').append('<div class="alert alert-info alert-styled-left alert-arrow-left alert-dismissible bg-white mb-4"><button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button><h6 class="alert-heading font-weight-semibold mb-1">Success,</h6>Posted Project successfully!</div>');
						//$('#postproject').reset();
					}
				});
				e.preventDefault();
			});
		});
    </script>	
</body>

</html>

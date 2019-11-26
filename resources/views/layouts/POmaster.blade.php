<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product-Owner | G-Hire</title>

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
    <script src="/global_assets/js/plugins/ui/slinky.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="/global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="/global_assets/js/plugins/loaders/progressbar.min.js"></script>
    <script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="/pages/assets/js/app.js"></script>
    <script src="/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="/global_assets/js/demo_pages/components_progress.js"></script>
    <script src="/global_assets/js/demo_pages/form_layouts.js"></script>
    <script src="/global_assets/js/demo_pages/user_pages_profile_tabbed.js"></script>
    <!-- /theme JS files -->

</head>

<body class="">

    <!-- Main navbar -->
     <div class="navbar navbar-expand-md">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="d-inline-block">
                    <h1>G-Hire</h1>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-mobile">           
                <span class="ml-md-3 mr-md-auto"></span>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-user">
                        <span class="badge bg-success align-self-start ml-3">Online</span>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="d-md-none ml-2">Messages</span>
                            <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                            <div class="dropdown-content-header">
                                <span class="font-weight-semibold">Messages</span>
                            </div>

                            <div class="dropdown-content-body dropdown-scrollable">
                                <ul class="media-list">
                                    @for ($i = 0; $i < 4; $i++)
                                        <li class="media">
                                            <div class="mr-3 position-relative">
                                                <img src="/global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                            </div>

                                            <div class="media-body">
                                                <div class="media-title">
                                                    <a href="{{ route('POmessages') }}">
                                                        <span class="font-weight-semibold">{{ 'James Alexander' }}</span>
                                                        <span class="text-muted float-right font-size-sm">04:58</span>
                                                    </a>
                                                </div>

                                                <span class="text-muted">{{ 'who knows, maybe that would be the best thing for me...' }}</span>
                                            </div>
                                        </li>
                                    @endfor
                                </ul>
                            </div>

                            <div class="dropdown-content-footer justify-content-center p-0">
                                <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="" data-original-title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-user">
                        <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                            <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                            <span>{{ 'Oxama', '' }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('POprofile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                            <a href="{{ route('POprofile') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
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
    </div>
    <!-- /main navbar -->


    <!-- Secondary navbar -->
    <div class="navbar navbar-expand-md navbar-light">
        <div class="navbar-collapse collapse" id="navbar-navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-nav-link active">
                        <i class="icon-home4 mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="post-project" class="navbar-nav-link">
                        <i class="icon-make-group mr-2"></i>
                        Post Project
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link">
                        <i class="icon-strategy mr-2"></i>
                        On Going Projects
                    </a>
                </li>
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


	<!-- Footer -->
  	<footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <p>&copy; G-Hire 2019. All Rights Reserved.</p>
                                <a target="_blank" href="http://www.themeum.com">Privacy Policy</a> |
                                <a target="_blank" href="http://www.themeum.com">Terms of Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
	<!-- /footer -->        
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
            });
    </script>
</body>

</html>

@extends('layouts/app',['users' => $users])


@section('body')	

	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-8">

			<!-- Recommended Developers -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Recommended Developers</h2>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body pb-0">
				</div>
			</div>
			<!-- /Recommended Developers -->

			<!-- Active Projects -->
			<div class="card">
				<div class="table-responsive">
					<table class="table text-nowrap">
						<thead>
							<td colspan="2">Active Projects</td>
							<td class="text-right">
							<span class="badge bg-blue badge-pill">{{ 'No Active Projects'}}</span>
							</td>
						</thead>
						<tbody>
							<tr>
								<th style="width: 50px">Due</th>
								<th style="width: 300px;">User</th>
								<th>Description</th>
							</tr>									
						</tbody>
					</table>
				</div>
			</div>
			<!-- /Active Projects -->
		</div>

		<div class="col-xl-4">

			<!-- Profile -->
			<div class="card">
				<div class="card-header">
					<div class="header-elements text-center">
						<img src="/global_assets/images/placeholders/placeholder.jpg" width="130" height="130" class="rounded-circle" alt="">
					</div>
				</div>

				<!-- Stat -->
				<div class="card-body py-0">
					<div class="row text-center">
						<div class="col-6">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">$0</h5>
								@if (Auth::user()->usertype === 'ProductOwner')
									<span class="font-size-sm">Invested This Month</span>
								@endif
								@if (Auth::user()->usertype === 'Developer')
									<span class="font-size-sm">Earned This Month</span>
								@endif
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">0</h5>
								<span class="font-size-sm">Response Time</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /Stat -->
			</div>
			<!-- /Profile -->

            @if (Auth::user()->usertype === 'ProductOwner')
                <!-- Post Project -->
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Hi, {{ Auth::user()->fname. ' '. Auth::user()->lname  }}</h3>
                        <div class="header-elements">
                            <p>Get offers from developers for your projects</p>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location = '{{ route('PostProject') }}';">Post Project</button>
                        </div>
                    </div>
                </div>
                <!-- /Post Project -->
			@endif
			
			@if (Auth::user()->usertype === 'Developer')
			 <!-- DeveleperDetails -->
			 <div class="card">
				<div class="card-header">
					<h5><b>Bio</b></h5>
					<p>With over 2 years experience under my belt, I am the PERFECT contractor for your project. I specialize in Web Development, Web (Scraping, Crawling, Automation) and Windows Application Developing. I pride myself on providing the highest quality of work, and will never complete a project until the client is 100% satisfied. And more! Message me with an idea and I'll do a little research and see if it's something I can handle</p>
					<hr>
					<h5><b>Language</b></h5>
						<ul>
							<li>
								English
							</li>
						</ul>
					<hr>
					<h5><b>Skills</b></h5>
						<div class="row">
							<div class="col-sm">
								<span class="badge badge-light badge-striped badge-striped-left border-left-primary">C++</span>
							</div>
							<div class="col-sm">
								<span class="badge badge-light badge-striped badge-striped-left border-left-primary">Java</span>
							</div>
							<div class="col">
								<span class="badge badge-light badge-striped badge-striped-left border-left-primary">Selenium Driver</span>
							</div>
							<div class="col">
								<span class="badge badge-light badge-striped badge-striped-left border-left-primary">Python</span>
							</div>
						</div>
					<hr>
					<h5><b>Education</b></h5>
					<p>FAST - national university of computer and emerging sciences, Pakistan, Graduated 2019</p>
					<hr>
				</div>
			</div>
			<!-- /DeveleperDetails -->
			@endif

		</div>
	</div>
	<!-- /dashboard content -->
@endsection
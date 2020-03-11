@extends('layouts/app',['users' => $users],['live_projects' => $live_projects])


@section('body')	

	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-8">

			<!-- Recommended Developers -->
			<div class="card">
				<div class="card-header header-elements-inline">
                    @if(Auth::user()->usertype === 'ProductOwner')
						<h2 class="card-title">Recommended Developers</h2>
					@endif
                    @if(Auth::user()->usertype === 'Developer')
						<h2 class="card-title">Recommended Projects</h2>
					@endif
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body pb-0">
					<div class="row">
						@if(Auth::user()->usertype === 'ProductOwner')
							<div class="col-md-4">
								<div class="card card-body">
									<div class="media">
										<div class="mr-3">
											<a href="#">
												<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="42" height="42" alt="">
											</a>
										</div>

										<div class="media-body">
											<h6 class="mb-0">Name</h6>
											<span class="text-muted">UX/UI designer</span>
											<li class="list-inline-item">
												<i class="icon-star-full2 font-size-base text-warning-300"></i>
												<i class="icon-star-full2 font-size-base text-warning-300"></i>
												<i class="icon-star-full2 font-size-base text-warning-300"></i>
												<i class="icon-star-full2 font-size-base text-warning-300"></i>
												<i class="icon-star-half font-size-base text-warning-300"></i>
												<span class="text-muted ml-1">(49)</span>
											</li>
										</div>

										<div class="ml-3 align-self-center">
											<div class="list-icons">
						                    	<div class="list-icons-item dropdown">
							                    	<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
							                    	<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(16px, 16px, 0px);">
														<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
														<div class="dropdown-divider"></div>
														<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Hire Developer</a>
													</div>
						                    	</div>
					                    	</div>
										</div>
									</div>
								</div>
							</div>
						@elseif(Auth::user()->usertype === 'Developer')
							<div class="card blog-horizontal">
								<div class="card-body">

									<div class="mb-3">
										<h5 class="d-flex font-weight-semibold flex-nowrap my-1">
											<a href="#" class="text-default mr-2">Data Governance</a>

											<span class="text-success ml-auto">$49.99</span>
										</h5>

										<ul class="list-inline list-inline-dotted text-muted mb-0">
											<li class="list-inline-item">By <a href="#" class="text-muted">Eugene Kopyov</a></li>
											<li class="list-inline-item">Nov 1st, 2016</li>
										</ul>
									</div>

									<p>When suspiciously goodness labrador understood rethought yawned grew piously endearingly inarticulate oh goodness jeez trout distinct hence cobra despite.</p>

									One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed.
								</div>

								<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
									<ul class="list-inline list-inline-dotted mb-0">
										<li class="list-inline-item"><i class="icon-users mr-2"></i> 382</li>
										<li class="list-inline-item"><i class="icon-alarm mr-2"></i> 60 hours</li>
									</ul>

									<div class="mt-2 mt-sm-0">
										<a href="#"><i class="icon-checkmark3 font-size-base mr-2"></i> Apply to this Project</a>
									</div>
								</div>
							</div>							
						@endif
					</div>
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
								@if (count($live_projects) > 0)
									<span class="badge bg-blue badge-pill">{{ count($live_projects).' Active Project'}}</span>
								@else
									<span class="badge bg-blue badge-pill">{{ 'No Active Project' }}</span>
								@endif
							</td>
						</thead>
						<tbody>
							<tr>
								<th style="width: 50px">Due</th>
								<th style="width: 300px;">User</th>
								<th style="width: 300px;">Title</th>
								<th>Budget</th>
							</tr>
							@for ($i = 0; $i < count($live_projects); $i++)
								@foreach($live_projects[$i] as $live_project)
									<tr>
										<th style="width: 50px">{{ $live_project->deliverytime }}</th>
										@if(Auth::user()->usertype === 'ProductOwner')
											@for ($i = 0; $i < count($dev_details); $i++)
												@foreach($dev_details[$i] as $dev_detail)
													<th style="width: 300px;">{{ $dev_detail->fname . ' '. $dev_detail->lname }}</th>
												@endforeach
											@endfor
										@elseif(Auth::user()->usertype === 'Developer')
											@for ($i = 0; $i < count($prodO_details); $i++)
												@foreach($prodO_details[$i] as $prodO_detail)
													<th style="width: 300px;">{{ $prodO_detail->fname . ' '. $prodO_detail->lname }}</th>
												@endforeach
											@endfor
										@endif																			
										<th style="width: 300px;">{{ $live_project->title }}</th>
										<th>{{ $live_project->budget }}</th>
									</tr>
								@endforeach
							@endfor																			
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
								@if (Auth::user()->usertype === 'ProductOwner')
									<h5 class="font-weight-semibold mb-0">{{ '$'.$total_invested }}</h5>
									<span class="font-size-sm">Invested This Month</span>
								@endif
								@if (Auth::user()->usertype === 'Developer')
									<h5 class="font-weight-semibold mb-0">{{ '$0' }}</h5>
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
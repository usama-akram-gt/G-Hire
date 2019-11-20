@extends('layouts/Devmaster')


@section('body')
	<!-- Apply to project -->
	<h1 id="main-text">Apply to Projects</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Filter -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group form-group-feedback form-group-feedback-left">
											<input type="search" class="form-control" placeholder="Job title or keywords">
											<div class="form-control-feedback">
												<i class="icon-reading text-muted"></i>
											</div>
										</div>

										<div class="form-group form-group-feedback form-group-feedback-left">
											<input type="search" class="form-control" placeholder="Location">
											<div class="form-control-feedback">
												<i class="icon-pin-alt text-muted"></i>
											</div>
										</div>

										<button type="submit" class="btn bg-blue btn-block">
											<i class="icon-search4 font-size-base mr-2"></i>
											Find jobs
										</button>
									</form>
								</div>
							</div>
							<!-- /filter -->


							<!-- Job title -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Job title</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<form action="#">
									<div class="card-body">
										<div class="form-group">
											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Developer
													<span class="text-muted font-size-sm ml-1">(38)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Front end designer
													<span class="text-muted font-size-sm ml-1">(43)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													UX designer
													<span class="text-muted font-size-sm ml-1">(74)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Software engineer
													<span class="text-muted font-size-sm ml-1">(25)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Full stack designer
													<span class="text-muted font-size-sm ml-1">(12)</span>
												</label>
											</div>
										</div>
									</div>

									<div class="card-footer text-center p-0">
										<a href="#" class="d-block p-2">All job titles</a>
									</div>
								</form>
							</div>
							<!-- /job title -->


							<!-- Specific skills -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Specific skills</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<form action="#">
									<div class="card-body">
										<div class="form-group">
											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													JavaScript
													<span class="text-muted font-size-sm ml-1">(53)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													HTML5, SCSS/SASS
													<span class="text-muted font-size-sm ml-1">(36)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Wireframing
													<span class="text-muted font-size-sm ml-1">(21)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-checker"><span><input type="checkbox" class="form-input-styled" data-fouc=""></span></div>
													Scrum
													<span class="text-muted font-size-sm ml-1">(8)</span>
												</label>
											</div>
										</div>
									</div>

									<div class="card-footer text-center p-0">
										<a href="#" class="d-block p-2">All skills</a>
									</div>
								</form>
							</div>
							<!-- /specific skills -->


							<!-- Date posted -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Date posted</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-choice"><span><input type="radio" name="when_posted" class="form-input-styled" data-fouc=""></span></div>Today
													<span class="text-muted font-size-sm ml-1">(632)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-choice"><span><input type="radio" name="when_posted" class="form-input-styled" data-fouc=""></span></div>
													Yesterday
													<span class="text-muted font-size-sm ml-1">(431)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-choice"><span><input type="radio" name="when_posted" class="form-input-styled" data-fouc=""></span></div>
													Last week
													<span class="text-muted font-size-sm ml-1">(31)</span>
												</label>
											</div>

											<div class="form-check">
												<label class="form-check-label">
													<div class="uniform-choice"><span><input type="radio" name="when_posted" class="form-input-styled" data-fouc=""></span></div>Last month
													<span class="text-muted font-size-sm ml-1">(124)</span>
												</label>
											</div>
										</div>								
									</form>
								</div>
							</div>
							<!-- /date posted -->

						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
						<div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" data-toggle="modal" data-target="#modal_full">Interaction UX/UI Industrial Designer</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Dell</a></li>
										<li class="list-inline-item">Amsterdam, Netherlands</li>
									</ul>

									Extended kindness trifling remember he confined outlived if. Assistance sentiments yet unpleasing say. Open they an busy they my such high. An active dinner wishes at unable hardly no talked on. Immediate him her resolving his favourite. Wished denote abroad at branch at. Mind what no by kept.
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
						</div><div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" data-toggle="modal" data-target="#modal_full">Interaction UX/UI Industrial Designer</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Dell</a></li>
										<li class="list-inline-item">Amsterdam, Netherlands</li>
									</ul>

									Extended kindness trifling remember he confined outlived if. Assistance sentiments yet unpleasing say. Open they an busy they my such high. An active dinner wishes at unable hardly no talked on. Immediate him her resolving his favourite. Wished denote abroad at branch at. Mind what no by kept.
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
						</div><div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" data-toggle="modal" data-target="#modal_full">Interaction UX/UI Industrial Designer</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Dell</a></li>
										<li class="list-inline-item">Amsterdam, Netherlands</li>
									</ul>

									Extended kindness trifling remember he confined outlived if. Assistance sentiments yet unpleasing say. Open they an busy they my such high. An active dinner wishes at unable hardly no talked on. Immediate him her resolving his favourite. Wished denote abroad at branch at. Mind what no by kept.
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
						</div><div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" data-toggle="modal" data-target="#modal_full">Interaction UX/UI Industrial Designer</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Dell</a></li>
										<li class="list-inline-item">Amsterdam, Netherlands</li>
									</ul>

									Extended kindness trifling remember he confined outlived if. Assistance sentiments yet unpleasing say. Open they an busy they my such high. An active dinner wishes at unable hardly no talked on. Immediate him her resolving his favourite. Wished denote abroad at branch at. Mind what no by kept.
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
						</div><div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" data-toggle="modal" data-target="#modal_full">Interaction UX/UI Industrial Designer</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Dell</a></li>
										<li class="list-inline-item">Amsterdam, Netherlands</li>
									</ul>

									Extended kindness trifling remember he confined outlived if. Assistance sentiments yet unpleasing say. Open they an busy they my such high. An active dinner wishes at unable hardly no talked on. Immediate him her resolving his favourite. Wished denote abroad at branch at. Mind what no by kept.
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
						</div>
						<!-- /cards layout -->


						<!-- Pagination -->
						<div class="d-flex justify-content-center pt-3 mb-3">
							<ul class="pagination">
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
								<li class="page-item active"><a href="#" class="page-link">1</a></li>
								<li class="page-item"><a href="#" class="page-link">2</a></li>
								<li class="page-item"><a href="#" class="page-link">3</a></li>
								<li class="page-item"><a href="#" class="page-link">4</a></li>
								<li class="page-item"><a href="#" class="page-link">5</a></li>
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
							</ul>
						</div>
						<!-- /pagination -->

					</div>
					<!-- /right content -->



					<!-- Full Modal -->
					<div id="modal_full" class="modal fade show" tabindex="-1">
						<div class="modal-dialog modal-full">
							<div class="modal-content">
								<div class="modal-header">
									<div class="media flex-column flex-md-row mb-4">
									<a href="#" class="align-self-md-center mr-md-3 mb-2 mb-md-0">
										<img src="../global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>

									<div class="media-body">
										<h5 class="media-title font-weight-semibold">Interaction UX/UI Industrial Designer</h5>
										<ul class="list-inline list-inline-dotted text-muted mb-0">
											<li class="list-inline-item">Utrecht, Netherlands</li>
											<li class="list-inline-item">3 days ago</li>
										</ul>
									</div>
								</div>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>

								<div class="modal-body">
									<div class="mb-4">
										<h6 class="font-weight-semibold">Job Description</h6>

										<p>Named among Fortune’s 2016 World’s Most Admired Companies, Flex offers a world of innovation, learning opportunities, and a strong reputation as environmentally responsible citizens. We are a leading sketch-to-scale™ company that designs and builds intelligent products for a connected world. With more than 200,000 professionals across 30 countries, and a promise to help the world Live smarter™, Flex provides innovative design, engineering, manufacturing, real-time supply chain insight and logistics services to companies of all sizes in various industries and end-markets.</p>

										<p>With more than 100,000 team members globally, we promote an environment that is rooted in the entrepreneurial spirit in which the company was founded. Dell ’ s team members are committed to serving our communities, regularly volunteering for over 1,500 non-profit organizations. The company has also received many accolades from employer of choice to energy conservation. Our team members follow an open approach to technology innovation and believe that technology is essential for human success.</p>

										<p>We are looking for a <strong>Interaction UX/UI Industrial Designer</strong> for our <strong>Product Development</strong> team!</p>
									</div>

									<div class="mb-4">
										<form action="#">
											<div class="form-group">
												<label>Offer your best to win the project!</label>
												<textarea rows="5" cols="5" class="form-control" placeholder="Describe Your Offer"></textarea>
											</div>
											
											<hr>

											<div class="form-group">
												<label>Total Offer Amount</label>
												<input type="text" class="form-control" placeholder="$5000 max">
											</div>

											<hr>

											<div class="form-group">
												<label>How much time will it take you to Complete the Project?</label> <br>
												<div class="row">
													<div class="col-md-3">
														<button type="button" class="btn btn-outline-secondary">24 Hours</button>
													</div>
													<div class="col-md-3">
														<button type="button" class="btn btn-outline-secondary">3 Days</button>
													</div>
													<div class="col-md-3">
														<button type="button" class="btn btn-outline-secondary">7 Days</button>
													</div>
													<div class="col-md-3">	
														<input type="text" class="form-control" placeholder="1-30 Days">
													</div>
												</div>
											</div>

											<hr>
											<div class="modal-footer">
												<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-light" data-dismiss="modal"><i class="icon-checkmark3 mr-2"></i>Save this job</button>
												<button type="button" class="btn bg-primary"><i class="icon-envelop2 mr-2"></i>Apply to this Project</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Full Modal -->
	</div>
	<!-- /Apply to project -->
@endsection
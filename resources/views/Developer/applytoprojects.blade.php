@extends('layouts/app',['users'=>$users])


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

						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
						@foreach($projects as $project)
							<div class="card card-body">
								<div class="media flex-column flex-sm-row">
									<div class="mr-sm-3 mb-2 mb-sm-0">
										<a href="#">
											<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
										</a>
									</div>

									<div class="media-body">
										<h6 class="media-title font-weight-semibold">
											<a href="#" data-id="{{ $project->id }}" data-title="{{ $project->title }}" data-description="{{ $project->description }}" data-budget="{{ $project->budget }}" data-catagory="{{ $project->catagory }}" data-toggle="modal" data-target="#modal_full">{{ $project->title }}</a>
										</h6>

										<ul class="list-inline list-inline-dotted text-muted mb-2">
											<li class="list-inline-item"><a href="#" class="text-muted">{{ $project->catagory }}</a></li>
											<li class="list-inline-item">Payment: {{ $project->budget }}</li>
										</ul>

										{{ $project->description }}
									</div>
								</div>
							</div>
						@endforeach
						<!-- /cards layout -->

					</div>
					<!-- /right content -->



					<!-- Full Modal -->
					<div id="modal_full" class="modal fade show" tabindex="-1">
						<div class="modal-dialog modal-full">
							<div class="modal-content">
								<div class="modal-header">
									<div class="media flex-column flex-md-row mb-4">
									<a href="#" class="align-self-md-center mr-md-3 mb-2 mb-md-0">
										<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>

									<div class="media-body">
										<h5 id="title" class="media-title font-weight-semibold"></h5>
										<ul class="list-inline list-inline-dotted text-muted mb-0">
										<li id="id" class="list-inline-item"></li>
											<li id="catagory" class="list-inline-item"></li>
											<li id="budget" class="list-inline-item"></li>
										</ul>
									</div>
								</div>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>
								
								<div class="modal-body">
									<div class="mb-4">
										<h6  class="font-weight-semibold">Job Description</h6>

										<p id="description"></p>
									</div>

									<div class="mb-4">

										<form action="/applyproject" method="post" id="applyjobform">
										@csrf

											<div class="form-group">
												<label>Offer your best to win the project!</label>
												<textarea name="offerings" rows="5" cols="5" class="form-control" placeholder="Describe Your Offer"></textarea>
											</div>

											<div class="form-group">
												<label>Total Offer Amount</label>
												<input type="text" name="offeramount" class="form-control" placeholder="$5000 max">
											</div>

											<div class="form-group">
												<label>How much time will it take you to Complete the Project?</label> <br>
												<input name="time" type="text" class="form-control" placeholder="1-30 Days">
											</div>

											<hr>
											<div class="modal-footer">
												<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
												
												<button type="submit" class="btn bg-primary"><i class="icon-envelop2 mr-2"></i>Apply to this Project</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Full Modal -->
	</div>

	<script type="text/javascript">
		$('#modal_full').on('show.bs.modal',function(e)
		{
			var link=$(e.relatedTarget)
			var id=link.data('id')
			var title=link.data('title')
			var budget=link.data('budget')
			var description=link.data('description')
			var catagory=link.data('catagory')

			var did=1
			var modal=$(this)
			modal.find('#title').text(title)
			modal.find('#id').text('Project ID: '+id)
			modal.find('#budget').text('Budget: '+budget)
			modal.find('#description').text(description)
			modal.find('#catagory').text('Catagory: ' +catagory)
	
			$('#applyjobform').attr('action','/applyproject/'+id+'/'+title);
		});
	</script>
	<!-- /Apply to project -->
@endsection
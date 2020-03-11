@extends('layouts/app',['users'=>$users],['live_projects'=>$live_projects])


@section('body')
	<!-- Apply to project -->
	<h1 id="main-text">Employee's List</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					
					<!-- /left sidebar component -->


					<!-- Right content -->
					
					<div class="flex-fill overflow-auto">
						<!-- Cards layout -->

						<div class="card card-body">
							<div class="row">
								@foreach($devlist as $value)
									<div class="col-md-4">
										<div class="card card-body">
											<div class="media">
												<div class="mr-3">
													<a href="#">
														<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="42" height="42" alt="">
													</a>
												</div>

												<div class="media-body">
													<a href="#" id="view" data-fname="{{ $value->fname }}" data-lname="{{ $value->lname }}" data-email="{{ $value->email }}" data-toggle="modal" data-target="#modal_full">{{ $value->fname }} {{$value->lname}}</a>
													<br>
													@foreach($spec as $specs)
		    											<span class="text-muted">{{ $specs->specialization }}</span> <br>
			                                        @endforeach
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
								@endforeach
							</div>
						</div>
						<!-- remove from below-->
						
						
						<!-- /cards layout -->

					</div>
					<!-- /right content  -->

                    <!-- Full Modal -->
					<div id="modal_full" class="modal fade show" tabindex="-1">
						<div class="modal-dialog modal-full">
							<form id="editjobform">
							@csrf
							<div class="modal-content">
								<div class="modal-header">
									<div class="media flex-column flex-md-row mb-4">
									
								
									<div class="media-body">
											
									</div>
								</div>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>
							 
								<div class="modal-body">
									<div class="mb-4">
									<div class="form-group">
									<a href="#" class="align-self-md-center mr-md-3 mb-2 mb-md-0">
										<img src="../global_assets/images/placeholders/placeholder.jpg" id="file" name="file" class="rounded" width="44" height="44" alt="">
									</a>
									</div>
									<div class="form-group">
									<h6  class="font-weight-semibold">Name: </h6> <h5 id='fname'></h5>
												
											</div>
											<div class="form-group">
											<h6  class="font-weight-semibold">Email: </h6>
                                            <h5 id='email'></h5>
											</div>
											<div class="form-group">
										        <h6  class="font-weight-semibold">Specialization:</h6>
                                                <h5 id='spec'></h5>
										</div>
									</div>

									<div class="mb-4">



									<div class="form-group">
									<h6  class="font-weight-semibold">Choose Catagory</h6>
										<select name="catagory" id="type" class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
											<optgroup label="Programming & Tech">
												<option value="Web Programming">Web Programming</option>
												<option value="Website Builders & CMS">Website Builders & CMS</option>
												<option value="mobile app">Mobile Applications</option>
												<option value="game dev">Game Development</option>
												<option value="desktop app">Desktop Application</option>
											</optgroup>
										</select>
									</div>

											<hr>
											<div class="modal-footer">
												<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
												
												
											</div>
										
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- Full Modal -->

					<!-- Message Modal -->
					<div id="modal_message" class="modal fade show" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<div class="media flex-column flex-md-row mb-4">
									</div>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>
								
								<div class="modal-body">
									<div class="card-body">
										<form id="message" method="post">
										@csrf
											<div class="form-group">
												<label>Ask developer what he has got and about any query?</label>
												<textarea name="text" id="text" rows="5" cols="5" class="form-control" placeholder="Type message here ..."></textarea>
											</div>

											<div class="text-right">
												<button type="submit" data-id="" class="btn btn-primary">Message <i class="icon-paperplane ml-2"></i></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Message Modal -->
					
	</div>
	<!-- /Apply to project -->
	<script type="text/javascript">
		$('#modal_full').on('show.bs.modal',function(e)
		{
			var link=$(e.relatedTarget);
			var fname=link.data('fname');
            var lname=link.data('lname');
            var email=link.data('email');
            var spec=link.data('spec');
			var modal=$(this);
            var name=fname+' '+lname;
			modal.find('#fname').text(name);
            modal.find('#email').text(email);
            modal.find('#spec').text(spec);
		});
		$('#modal_message').on('show.bs.modal',function(e)
		{
			var link=$(e.relatedTarget);
			var id=link.data('id');
			var modal=$(this);
			modal.find('#id').val(id);
			$('#message').attr('action','/conversation/send/'+id);
		});
	</script>
@endsection
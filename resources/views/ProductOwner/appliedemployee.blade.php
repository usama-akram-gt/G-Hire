@extends('layouts/app',['users'=>$users])


@section('body')
	<!-- Apply to project -->
	<h1 id="main-text">Employee's List</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					
					<!-- /left sidebar component -->


					<!-- Right content -->
					
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
						@foreach($data['data'] as $value)
						<div class="card card-body">
							<div class="media flex-column flex-sm-row">

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">Developer Name: {{ $value->dev_username }}</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><label>Offer Amount: {{ $value->offeramount }}</label></li>
										<li class="list-inline-item"><label>Offer Time: {{ $value->time }}</label></li>
									</ul>

									<label>Offerings</label>
									{{ $value->offerings }}
								</div>
							</div>
							<div align="right">
							<button data-toggle="modal" data-target="#modal_message" data-id="{{ $value->id }}" type="button" class="btn bg-primary">Message</button>
							<button type="button" class="btn bg-primary">Accpet</button>
							<button type="button" class="btn bg-primary">Decline</button>
							<button type="button" class="givefeedback" data-id="{{ $value->id }}"  data-toggle="modal" data-target="#modal_full" class="btn bg-primary">Give Feedback</button>
							</div>
						</div>
						<!-- remove from below-->
						@endforeach
						
						
						<!-- /cards layout -->

					</div>
					<!-- /right content  -->

					<!-- Feedback Modal -->
					<div id="modal_full" class="modal fade show" tabindex="-1">
						<div class="modal-dialog modal-full">
							<form action="/editProject" method="post" id="editjobform">
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
									<div class="card-body">
											<form action="/postfeedback" method="post">
											@csrf		
												<div class="form-group">
												<label class="form-check-label">How was the response time of the Developer?</label>
													<input type="radio" class="form-radio" value="Good" name="resptime"><label>Good</label>
													<input type="radio" class="form-radio" value="Bad" name="resptime" ><label>Bad</label>
												
												</div>
			
												<div class="form-group">
													<label class="form-check-label">How was the communication skills of the Developer?</label>
													<br>
													<input type="radio" class="form-radio" value="poor" name="comm"><label>Poor</label>
													<input type="radio" class="form-radio" value="good" name="comm"><label>Good</label>
													<input type="radio" class="form-radio" value="excellent" name="comm"><label>Excellent</label>
												</div>
			
												<div class="form-group">
													<label class="form-check-label">Will You Recommend this Developer to other users?</label>
													<input type="radio" class="form-radio" value="yes" name="recommend"><label>YES</label>
													<input type="radio" class="form-radio" value="no" name="recommend"><label>NO</label>
												</div>
												<hr>
												
												<div class="form-group">
													<label class="form-check-label">Please enter your remarks?</label>
													<textarea rows="5" cols="5" class="form-control" placeholder="Enter Remarks" name="remarks"></textarea>
												</div>
												<hr>
												<div class="form-group">
													<label class="form-check-label">Please rank the overall performance of developer?</label>
													<br>
													<input type="radio" class="form-radio" value=1 name="stars"><label>Star 1</label>
													<input type="radio" class="form-radio" value=2 name="stars"><label>Star 2</label>
													<input type="radio" class="form-radio" value=3 name="stars"><label>Star 3</label>
													<input type="radio" class="form-radio" value=4 name="stars"><label>Star 4</label>
													<input type="radio" class="form-radio" value=5 name="stars"><label>Star 5</label>
												</div>
												
												<div class="text-right">
													<button type="submit" data-id="" class="btn btn-danger">Post <i class="icon-paperplane ml-2"></i></button>
												</div>
											</form>
										</div>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- Feedback Modal -->

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
			var id=link.data('id');
			$('#editjobform').attr('action','/postfeedback/'+id);
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


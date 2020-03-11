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
								<button type="button" class="btn bg-primary" data-id="{{ $value->id }}" data-devid="{{ $value->dev_id }}" data-projid="{{ $value->project_id }}" data-offeramount="{{ $value->offeramount }}" data-toggle="modal" data-target="#modal_form_vertical">Accpet</button>
								<button type="button" data-id="{{ $value->id }}" class="btn bg-primary">Decline</button>
								<button type="button" data-id="{{ $value->id }}"  data-toggle="modal" data-target="#modal_full" class="btn bg-primary givefeedback">Give Feedback</button>
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

					<div id="modal_form_vertical" class="modal fade show">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Payment Details (Pay and get started with this Developer)</h5>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>
								<form id="payment_redirection" method="post" action="">
									@csrf
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-4">
													<label>Card Name</label>
													<input type="text" name="card_name" id="card_name" placeholder="Eugene" class="form-control">
												</div>
												<div class="col-sm-8">
												<label>Email</label>
												<input type="text" name="card_email" id="card_email" placeholder="eugene@kopyov.com" class="form-control">
												<span class="form-text text-muted">name@domain.com</span>
											</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-12">
													<label>Address line *</label>
													<input type="text" name="card_address" id="card_address" placeholder="Ring street 12" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-8">
													<label>Card Number</label>
													<input type="text" name="card_number" id="card_number" placeholder="9999-9999-9999-9999" data-mask="9999-9999-9999-9999" class="form-control">
												</div>
												<div class="col-sm-4">
													<label>CVV</label>
													<input type="text" name="card_cvv" id="card_cvv" placeholder="111" data-mask="999" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-2">
													<label>Expiry Date</label>
													<div class="btn-group">
														<input type="text" name="card_month" id="card_month" placeholder="Month" data-mask="99" class="form-control">
														<input type="text" name="card_year" id="card_year" placeholder="Year" data-mask="9999" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>

									<input type="text" id="dev_id" hidden="" value="">
									<input type="text" id="project_id" hidden="" value="">
									<input type="text" id="offeramount" hidden="" value="">
									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
										<button type="submit" id="accept_payment" class="btn bg-primary">Accpet</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
	</div>
	<!-- /Apply to project -->
	<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
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
		$('#modal_form_vertical').on('show.bs.modal',function(e)
		{
			var link=$(e.relatedTarget);
			var dev_id=link.data('devid');
			var project_id=link.data('projid');
			var offeramount=link.data('offeramount');
			var modal=$(this);
			modal.find('#project_id').val(project_id);
			modal.find('#dev_id').val(dev_id);
			modal.find('#offeramount').val(offeramount);
		});
		// Called when token created successfully.
	  var successCallback = function(data) {
	    console.log(data.response.token.token);
	    var token = data.response.token.token;
	    var card_name = $("#card_name").val();
	    var card_email = $("#card_email").val();
	    var card_address = $("#card_address").val();
	    var card_number = $("#card_number").val();
	    var card_cvv = $("#card_cvv").val();
	    var card_month = $("#card_month").val();
	    var card_year = $("#card_year").val();
	    var dev_id = $("#dev_id").val();
	    var project_id = $("#project_id").val();
	    var offeramount = $("#offeramount").val();
		$('#payment_redirection').attr('action','/make/payment/'+ card_name + '/' + card_email+ '/' + card_address+ '/' + card_number+ '/' + card_cvv+ '/' + card_month+ '/' + card_year + '/' + dev_id + '/' + project_id + '/' + token + '/' + offeramount);

	  	var myForm = document.getElementById('payment_redirection');
	    // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
	    myForm.submit();
	  };

	  // Called when token creation fails.
	  var errorCallback = function(data) {
	    // Retry the token request if ajax call fails
	    if (data.errorCode === 200) {
	       // This error code indicates that the ajax call failed. We recommend that you retry the token request.
	    } else {
	      alert(data.errorMsg);
	    }
	  };

	  var tokenRequest = function() {
	  	console.log($("#card_number").val());
	  	console.log($("#card_cvv").val());
	  	console.log($("#card_month").val());
	  	console.log($("#card_year").val());
	    // Setup token request arguments
	    var args = {
	      sellerId: "901420767",
	      publishableKey: "7F380ADC-8AF3-467E-968B-7011721DA9FA",
	      ccNo: $("#card_number").val(),
	      cvv: $("#card_cvv").val(),
	      expMonth: $("#card_month").val(),
	      expYear: $("#card_year").val()
	    };

	    // Make the token request
	    TCO.requestToken(successCallback, errorCallback, args);
	  };
		$(function() {
		    // Pull in the public encryption key for our environment
		    TCO.loadPubKey('sandbox');
		    $("#accept_payment").click(function(){
		      // Call our token request function
		      tokenRequest();

		      // Prevent form from submitting
		      return false;			
			});
		  });
	</script>
@endsection


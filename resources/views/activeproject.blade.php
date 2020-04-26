@extends('layouts/app',['users'=>$users],['live_projects'=>$live_projects])


@section('body')
	<div id="Notification">
	</div>
	<!-- Post Project -->
	<div style="margin-left: 8%; margin-right: 8%;">
		<h4>Active Project</h4>
		@foreach($current_ongoing_project[0] as $current_ongoing_prj)
			<p class="font-weight-semibold">Order ID: {{$current_ongoing_prj->project_id}}   ---> *Note: We recommend to start it as soon as possible!</p>
			@if($current_ongoing_prj->status === 'OnGoing')
				<div class="alert bg-primary text-white alert-styled-right alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><i><b><span id="timer"></span></b></i></button>
					<span class="font-weight-semibold"><i>New Order</i> </span> has been created!    <b><u>It will end on: </u></b>
			    </div>
		    @elseif($current_ongoing_prj->status === 'Complete')
				<div class="alert bg-success text-white alert-styled-right alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span><i class="icon-spinner2 spinner text-muted top-0"></i></span></button>
					<span class="font-weight-semibold"><i>Order</i> </span> has been Completed!    <b><u>
					@if(Auth::user()->usertype === 'Developer')
					You have earned! $50</u></b>
					@endif
			    </div>
			@elseif($current_ongoing_prj->status === 'Endorsement')
				<div class="alert bg-primary text-white alert-styled-right alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><i><b><span id="timer"></span></b></i></button>
					<span class="font-weight-semibold"><i>New Endorsement against this Order</i> </span> has been created! You need to make sure the Revisions    <b><u>It will end on: </u></b>
			    </div>
		    @elseif($current_ongoing_prj->status === 'Submitted')
			<div class="alert bg-primary text-white alert-styled-right alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><i><b><span></span></b></i></button>
				<span class="font-weight-semibold"><i>Order has been submitted</i> </span> 
				@if(Auth::user()->usertype === 'Developer')
				Wating on Product-Owner to Accept!    <b><u></u></b>
				@endif
		    </div>
		    @else
			    <div class="alert bg-danger text-white alert-styled-right alert-dismissible">
					<span class="font-weight-semibold"><i>Order</i> </span> has been Cancelled!    <b><u>You have lost! $50</u></b>
			    </div>
		    @endif
	    @endforeach
		<div class="card">

			@foreach($current_ongoing_project[0] as $current_ongoing_prj)
			<form method="post" enctype="multipart/form-data" action="{{ route('uploadFile',$current_ongoing_prj->project_id) }}">
			@csrf
			<div class="text-center">
				@if(Auth::user()->usertype === 'Developer')
				<div class="col-lg-12" style="margin-top: 2%;">
					<div class="uniform-uploader" id="uniform-file-styled">
						<input type="file" name="file" id="file-styled" accept=".zip,.rar,.7zip" class="alpaca-control" autocomplete="off">
						<span class="filename" style="user-select: none;">No file selected</span>
						<span class="action btn bg-blue" style="user-select: none;">Choose File</span>
					</div>
					It accepts just zip/rar/7zip so try to zip your folder!
				</div>
				@endif
				@if(Auth::user()->usertype === 'ProductOwner')
				<div class="col-lg-12" style="margin-top: 2%;">
					<div class="uniform-uploader" id="uniform-file-styled">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<tbody>
									<tr>
										<th style="width: 300px">File Name</th>
										<th style="width: 300px;">File Size</th>
										<th style="width: 300px">Download</th>
									</tr>
										@foreach($files[0] as $file)
											<tr>
												<th style="width: 50px">{{ $file->name }}</th>
												<th style="width: 300px;">{{ $file->size }}</th>
												<th><a href="{{ route('download',['path' => $file->path, 'name' => $file->name]) }}" class="btn btn-success btn-float"><i class="icon-file-download"></i> <span>Download</span></a></th>
											</tr>
										@endforeach																			
								</tbody>
							</table>
						</div>
					</div>
				</div>
				@endif
				<h6 class="m-0 font-weight-semibold">If you have any issue then contact to <b>Resolution Center</b></h6>
				<p class="text-muted mb-3">Try to submit project as soon as possible!</p>
				@if($current_ongoing_prj->status === 'Complete' || $current_ongoing_prj->status === 'Cancel')
                @else
	                <button type="button" class="btn bg-danger btn-float"><i class="icon-cancel-circle2"></i> <span>Cancel Order</span></button>

	                @if(Auth::user()->usertype === 'Developer')
		                <button type="submit" class="btn btn-success btn-float"><i class="icon-folder-check icon-2x"></i> <span>Submit Project</span></button>
	                @endif
	                @if(Auth::user()->usertype === 'ProductOwner')
		                <button type="button" data-id="{{ $current_ongoing_prj->dev_id }}" data-pid="{{ $current_ongoing_prj->project_id }}" data-toggle="modal" data-target="#modal_full" class="btn btn-success btn-float"><i class="icon-folder-check icon-2x givefeedback"></i> <span>Accept Project</span></button>
	                <button type="button" data-id="{{ $current_ongoing_prj->project_id }}" id="endorsement" class="btn bg-indigo-400 btn-float"><i class="icon-spinner4 spinner"></i> <span>Send Endorsment</span></button>
	                @endif
                @endif
            </div>
            </form>
			@endforeach
		</div>
	</div>
	<!-- /Post Project -->
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
									<input type="radio" class="form-radio" value=1 name="stars"><label><i class="icon-star-full2 font-size-base text-warning-300"></i></label>
									<input type="radio" class="form-radio" value=2 name="stars"><label><i class="icon-star-full2 font-size-base text-warning-300"></i></label>
									<input type="radio" class="form-radio" value=3 name="stars"><label><i class="icon-star-full2 font-size-base text-warning-300"></i></label>
									<input type="radio" class="form-radio" value=4 name="stars"><label><i class="icon-star-full2 font-size-base text-warning-300"></i></label>
									<input type="radio" class="form-radio" value=5 name="stars"><label><i class="icon-star-full2 font-size-base text-warning-300"></i></label>
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

	<script>
		// Set the date we're counting down to
		var countDownDate = new Date("March 15, 2020 15:37:25").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();
		    
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		    
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // Output the result in an element with id="demo"
		  document.getElementById("timer").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("timer").innerHTML = "EXPIRED";
		  }
		}, 1000);
	</script>

	<script type="text/javascript">
		$('#modal_full').on('show.bs.modal',function(e)
		{
			var link=$(e.relatedTarget);
			var id=link.data('id');
			var pid=link.data('pid');
			$('#editjobform').attr('action','/postfeedback/'+id+'/'+pid);
		});
	</script>

	<script type="text/javascript">
		$('#endorsement').click(function() {
			var id = $("#endorsement").attr("data-id");
			console.log(id);
			window.location.href = '/Endorsement/' + id;
		});

	</script>

@endsection
@extends('layouts/app',['users',$users])


@section('body')
	<!-- Apply to project -->
	<h1 id="main-text">Posted Projects</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					
					<!-- /left sidebar component -->


					<!-- Right content -->
					
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
						@foreach($data['data'] as $value)
						<div class="card card-body">
							<div class="media flex-column flex-sm-row">
								<div class="mr-sm-3 mb-2 mb-sm-0">
									<a href="#">
										<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
									</a>
								</div>

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">
										<a href="#" id="view" data-id="{{ $value->id }}" data-catagory="{{ $value->catagory }}" data-file="{{ $value->file }}" data-title="{{ $value->title }}" data-budget="{{ $value->budget }}" data-description="{{ $value->description }}" data-toggle="modal" data-target="#modal_full">{{ $value->title }}</a>
									</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><a href="#" class="text-muted">Catagory: {{ $value->catagory }}</a></li>
										<li class="list-inline-item">Budget: {{ $value->budget }}</li>
									</ul>

									{{ $value->description }}
								</div>
							</div>
							<div align="right">
							<button type="button" value="{{$value->id}}" class="listbtn" class="btn bg-primary" >View Developer's List</button>
							<button type="button" data-id="{{ $value->id }}" data-catagory="{{ $value->catagory }}" data-file="{{ $value->file }}" data-title="{{ $value->title }}" data-budget="{{ $value->budget }}" data-description="{{ $value->description }}"  class="btn bg-primary" data-toggle="modal" data-target="#modal_full">Edit</button>
							</div>
						</div>
						<!-- remove from below-->
						@endforeach
						
						
						<!-- /cards layout -->

					</div>
					<!-- /right content  -->



					<!-- Full Modal -->
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
									<div class="mb-4">
									<div class="form-group">
									<a href="#" class="align-self-md-center mr-md-3 mb-2 mb-md-0">
										<img src="../global_assets/images/placeholders/placeholder.jpg" id="file" name="file" class="rounded" width="44" height="44" alt="">
									</a>
									</div>
									<div class="form-group">
									<h6  class="font-weight-semibold">Title</h6>
												<input type="text" name="title" id="title" class="form-control" placeholder="$5000 max">
											</div>
											<div class="form-group">
											<h6  class="font-weight-semibold">Payment</h6>
												<input type="text" name="budget" id="budget" class="form-control" placeholder="$5000 max">
											</div>
											<div class="form-group">
										<h6  class="font-weight-semibold">Job Description</h6>
										<textarea id="description" rows="5" cols="5" class="form-control" name="description"></textarea>
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
												
												<button type="submit" class="btn bg-primary"><i class="icon-envelop2 mr-2"></i>Save the Changes</button>
											</div>
										
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- Full Modal -->
	</div>
	<!-- /Apply to project -->



<script type="text/javascript">
	$('#modal_full').on('show.bs.modal',function(e)
	{
		var link=$(e.relatedTarget)
		var id=link.data('id')
		var title=link.data('title')
		var budget=link.data('budget')
		var description=link.data('description')
		var file=link.data('file')
		var catagory=link.data('catagory')

		var modal=$(this)
		modal.find('#title').val(title)
		modal.find('#catagory').val(catagory)
		modal.find('#budget').val(budget)
    	modal.find('#description').val(description)
		modal.find('#file').val(file)

		$('#editjobform').attr('action','/editProject/'+id);
	});
</script>

<script type='text/javascript'>
$(document).ready(function() {
	$(".listbtn").on('click',function(){
		var pid= $(this).attr('value');
  //this will find the selected website
  var go_to_url = '/showemplist/'+pid;
  
  //this will redirect us in same window
  document.location.href = go_to_url;
});
});
</script>

<script type='text/javascript'>
 function open(var pid)
 {
	var go_to_url = '/showemplist/'+pid;
  
  //this will redirect us in same window
  document.location.href = go_to_url;	
 }

</script>
@endsection

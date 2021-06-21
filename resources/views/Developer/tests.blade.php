@extends('layouts/app',['users'=>$users],['live_projects'=>$live_projects])


@section('body')
	<!-- Give Test -->
	<h1 id="main-text">Give Test</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Right content -->
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
							@foreach($projects as $project)
							<div class="card card-body" id="applyPanel">
								<div class="modal-header">
									<div class="media flex-column flex-md-row mb-4">
										<a href="#" class="align-self-md-center mr-md-3 mb-2 mb-md-0">
											<img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded" width="44" height="44" alt="">
										</a>

										<div class="media-body">
											<h5 id="title" class="media-title font-weight-semibold">Title: {{ $project->title }}</h5>
											<ul class="list-inline list-inline-dotted text-muted mb-0">
												Project ID: <li id="id" class="list-inline-item">{{ $project->id }}</li>
												<li id="catagory" class="list-inline-item">{{ $project->catagory }}</li>
												Budget: <li id="budget" class="list-inline-item">{{ $project->budget }}</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="media flex-column flex-sm-row">

									<div class="media-body">
										<div class="mb-4">
											<h6  class="font-weight-semibold">Job Description</h6>

											<p id="description">{{ $project->description }}</p>
										</div>
							@endforeach
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
													<button type="submit" class="btn bg-primary"><i class="icon-envelop2 mr-2"></i>Apply to this Project</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						<!-- /cards layout -->
							<div class="card card-body" id="testPanel">
								<h6 class="text-muted">*<u style="color: red;">Note:</u> This test will be a <b>MCQ base</b> where you need to score <i>80% out of 100 </i>  to put your bid on the project</h6>
								<div class="mb-4" id="testPhase">
									@foreach($tests as $test)
									<div class="form-group mb-3 mb-md-2">
										<label class="d-block font-weight-semibold" id="{{ $test->qnumber }}">{{ $test->qnumber }}-  {{ $test->quest}}</label>
										@if ($test->A != '')
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="A" class="form-check-input-styled" name="{{ $test->qnumber }}" data-fouc="">
												{{ $test->A }}
											</label>
										</div>
										@endif
										@if ($test->B != '')
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="B" class="form-check-input-styled" name="{{ $test->qnumber }}" data-fouc="">
												{{ $test->B }}
											</label>
										</div>
										@endif
										@if ($test->C != '')
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="C" class="form-check-input-styled" name="{{ $test->qnumber }}" data-fouc="">
												{{ $test->C }}
											</label>
										</div>
										@endif
										@if ($test->D != '')
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="D" class="form-check-input-styled" name="{{ $test->qnumber }}" data-fouc="">
												{{ $test->D }}
											</label>
										</div>
										@endif
										@if ($test->ans != '')
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="text" hidden="" value="{{ $test->ans }}" name="{{ $test->qnumber }}">
											</label>
										</div>
										@endif
									</div>
									@endforeach
									<hr>
									<div class="modal-footer">
										<button type="submit" class="btn bg-primary" id="submitTest"><i class="icon-envelop2 mr-2"></i>Submit Test</button>
									</div>
								</div>
							</div>

					</div>
					<!-- /right content -->

	</div>
	<script type="text/javascript">
		document.getElementById('testPanel').style.display = 'block';
		document.getElementById('applyPanel').style.display = 'none';


		$('#submitTest').click(function() {

			var id = $('#id').text();
			var title = $('#title').text();
			var count = 0;
			$("input").each(function() {
			    var name = $(this).attr("name");
			    var input_element = "input[name='" + name + "']:checked";
			    var val = $(input_element).val();
			    var ans_element = "input[name='" + name + "'][type=text]";
			    var answer = $(ans_element).val();
				if(val === answer){
					count = count + 1;
				}
			});
			if(count >= 1){
				//if 80%
				document.getElementById('testPanel').style.display = 'none';
				document.getElementById('applyPanel').style.display = 'block';
			}
			
			$('#applyjobform').attr('action','/applyproject/'+id+'/'+title);
		});

	</script>
	<!-- /Give Test -->
@endsection
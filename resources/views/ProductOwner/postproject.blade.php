@extends('layouts/POmaster')


@section('body')
	<!-- Post Project -->
	<div class="row">
					<!-- Messages -->
					<div style="margin-left: 8%;">
						<h4>What services are you looking forward?</h4>
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>

							<div class="card-body">
								<form action="#">
									<div class="form-group">
										<label>Describe the service you're looking to purchase - please be as detailed as possible:</label>
										<textarea rows="5" cols="5" class="form-control" placeholder="I'm looking for ..."></textarea>
										<br>
										<input type="file" class="form-input-styled" data-fouc="">
										<span class="bg-light">Choose any file!</span>
									</div>
									
									<hr>

									<div class="form-group">
										<label>Choose Catagory:</label>
										<select class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
											<optgroup label="Programming & Tech">
												<option value="AK">Web Programming</option>
												<option value="HI">Website Builders & CMS</option>
												<option value="HI">Mobile Applications</option>
												<option value="HI">Game Development</option>
												<option value="HI">Desktop Application</option>
											</optgroup>
										</select>
									</div>

									<hr>

									<div class="form-group">
										<label>Once you place your order, when would you like your service delivered?</label> <br>
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
									
									<div class="form-group">
										<label>What is your budget for this service?</label>
										<input type="text" class="form-control" placeholder="$  Enter Budget">
									</div>

									<hr>

									<div class="form-group">
										<label>Tags:</label>
										<select multiple="" data-placeholder="Enter tags" class="form-control form-control-select2-icons select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
											<optgroup label="Techniques">
												<option value="wordpress2">Wordpress</option>
												<option value="tumblr2">Github</option>
												<option value="stumbleupon">Screen Sharing</option>
											</optgroup>
											<optgroup label="Programming">
												<option value="pdf" >C++</option>
												<option value="word">Java</option>
												<option value="excel">Python</option>
												<option value="openoffice">C#</option>
											</optgroup>
											<optgroup label="Tools">
												<option value="chrome" selected="">Eclipse</option>
												<option value="firefox" selected="">Visual Studio Code</option>
												<option value="safari"></option>
												<option value="opera">Opera</option>
												<option value="IE">IE</option>
											</optgroup>
										</select>
									</div>

									<div class="text-right">
										<button type="submit" class="btn btn-danger">Post <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /Messages -->
	</div>
	<!-- /Post Project -->
@endsection
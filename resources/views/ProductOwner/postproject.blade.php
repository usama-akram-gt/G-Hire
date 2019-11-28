@extends('layouts/app',['users'=>$users])


@section('body')
	<div id="Notification">
	</div>
	<!-- Post Project -->
	<div class="row">
		<div style="margin-left: 8%;">
			<h4>What services are you looking forward?</h4>
			<div class="card">
				<div class="card-header header-elements-inline">
				</div>

				<div class="card-body">
					<form id="postproject" method="POST" data-route="{{ route('PostNewProject') }}">
						@csrf
						<div class="form-group">
							<label>Give title to your project:</label>
							<input name="title" id="title" type="text" class="form-control" placeholder=".etc (Web Development using Laravel)">
						</div>
						
						<hr>
						<div class="form-group">
							<label>Describe the service you're looking to purchase - please be as detailed as possible:</label>
							<textarea name="description" id="description" rows="5" cols="5" class="form-control" placeholder="I'm looking for ..."></textarea>
							<br>
							<input name="file" type="file" class="form-input-styled" data-fouc="">
							<span class="bg-light">Choose any file!</span>
						</div>
						
						<hr>

						<div class="form-group">
							<label>Choose Catagory:</label>
							<select name="catagory" class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
								<optgroup label="Programming & Tech">
									<option value="Web Programming">Web Programming</option>
									<option value="Website Builders & CMS">Website Builders & CMS</option>
									<option value="Mobile Applications">Mobile Applications</option>
									<option value="Game Development">Game Development</option>
									<option value="Desktop Application">Desktop Application</option>
								</optgroup>
							</select>
						</div>

						<hr>

						<div class="form-group">
							<label>Once you place your order, when would you like your service delivered?</label> <br>
							<input name="deliverytime" id="deliverytime" type="text" class="form-control" placeholder="1-30 Days">
						</div>

						<hr>
						
						<div class="form-group">
							<label>What is your budget for this service?</label>
							<input name="budget" id="budget" type="text" class="form-control" placeholder="$  Enter Budget">
						</div>

						<hr>

						<div class="form-group">
							<label>Tags:</label>
							<select name="tags" id="tags" multiple="" data-placeholder="Enter tags" class="form-control form-control-select2-icons select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
								<optgroup label="Techniques">
									<option value="wordpress2">Wordpress</option>
									<option value="Github">Github</option>
									<option value="Screen Sharing">Screen Sharing</option>
								</optgroup>
								<optgroup label="Programming">
									<option value="C++" >C++</option>
									<option value="Java">Java</option>
									<option value="Python">Python</option>
									<option value="C#">C#</option>
								</optgroup>
								<optgroup label="Tools">
									<option value="Eclipse" selected="">Eclipse</option>
									<option value="Visual Studio Code" selected="">Visual Studio Code</option>
									<option value="safari">Safari</option>
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
	</div>
	<!-- /Post Project -->
@endsection
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
		<!-- Version Control System -->
		<div class="card">
			<div class="card-header header-elements-sm-inline">
				<div class="col-lg-12">
					<h6 class="card-title"><strong>Version Control System</strong></h6>				
				</div>
				<div class="header-elements">
					
            	</div>
			</div>

			<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
				<div class="col-lg-12">
					@if(Auth::user()->usertype === 'ProductOwner')
						<p>You can track this <code>repository</code> which has been controlling by the developer to work on your project.</p>
					@endif
					@if(Auth::user()->usertype === 'Developer')
						<p>You can create <code>repository</code> to manage the code versioning more efficiently. You need to provide your github username so that we create repo and invite you as a contributor to start controlling this project versioning.</p>
					@endif
				</div>
				<div class="row">
					@if(Auth::user()->usertype === 'Developer')
						@if($vcs_project[0]->isEmpty())
							<div class="col-lg-12" id="starting">
								<div class="input-group">
									<input type="text" class="form-control" required="" placeholder="Enter your Github username?" id="contributor_name">
									<span class="input-group-append">
										@foreach($current_ongoing_project[0] as $current_ongoing_prj)
											<button class="btn btn-light" data-projectid="{{ $current_ongoing_prj->project_id }}" data-devid="{{ $current_ongoing_prj->dev_id }}" data-poid="{{ $current_ongoing_prj->prodO_id }}" type="button" id="start_vcs">Create</button>
										@endforeach
									</span>
								</div>
							</div>
						@endif
						@if(!$vcs_project[0]->isEmpty())
							<div class="col-lg-12" id="links">
								<h5 class="font-weight-semibold mb-0">Contributor Link: 
									<span class="text-success font-size-sm font-weight-normal">
										@foreach($vcs_project[0] as $vcs_proj)
											 <a href="javascript:void(0)">https://github.com/G-Hire/{{ $vcs_proj->repo_name }}/invitations</a>
										 @endforeach
									</span>
								</h5>
								<h5 class="font-weight-semibold mb-0">Clone with HTTPS: 
									<span class="text-success font-size-sm font-weight-normal">
										@foreach($vcs_project[0] as $vcs_proj)
										 <a href="javascript:void(0)">https://github.com/G-Hire/{{ $vcs_proj->repo_name }}.git</a>
										 @endforeach
									</span>
								</h5>
							</div>
						@endif
					@endif
						<div class="col-lg-12">
							@foreach($vcs_project[0] as $vcs_proj)
								<button id="referesh" data-RN="{{ $vcs_proj->repo_name }}">Referesh</button>
							@endforeach
						</div>	
				</div>
			</div>

			@if($vcs_project[0]->isEmpty())
				<h6><code>Repo has not yet created!</code></h6>
			@endif
			@if(!$vcs_project[0]->isEmpty())
				<div class="table-responsive" id="files">
					<table class="table text-nowrap">
						<thead>
							<tr class="table-active table-border-double">
								<td><span class="text-success-600"><i class="icon-alignment-unalign mr-2"></i> <b id="commits">0 commits</b></span></td>
								<td>
									<span class="badge bg-success badge-pill" id="no_branches">0 branches</span>
									<div class="list-icons ml-3">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-git-pull-request"></i></a>
											<div class="dropdown-menu" id="branches_name">
											</div>
				                		</div>
				                	</div>	
	                			</td>
								<td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> <b id="contributor">2 contributors</b></span></td>
							</tr>
						</thead>
						<tbody id="Repo_files">
							<tr>
								<th>File Name</th>
								<th>Commit Message</th>
								<th>Creation Time</th>
							</tr>
							<!--
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="mr-3">
												<span><i class="icon-folder mr-2"></i></span>
												<a href="#" class="text-default">app</a>
											</div>
										</div>
									</td>
									<td><span class="text-muted">upto 80%</span></td>
									<td><span class="text-muted">13 days ago</span></td>
								</tr>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="mr-3">
												<span><i class="icon-file-text mr-2"></i></span>
												<a href="#" class="text-default">composer.json</a>
											</div>
										</div>
									</td>
									<td><span class="text-muted">Layout changes</span></td>
									<td><span class="text-muted">6 days ago</span></td>
								</tr>
							-->
						</tbody>
					</table>
				</div>
			@endif
		</div>
		<!-- /Version Control System -->
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
		var countDownDate = new Date("May 15, 2020 15:37:25").getTime();

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
			window.location.href = '/Endorsement/' + id;
		});

		$('#referesh').click(function() {
			calling_from_referesh();
		});

		calling_from_referesh();


		function calling_from_referesh(){
			var RN = $("#referesh").attr("data-RN");
			console.log(RN);
			var settings = {
			  "url": `https://api.github.com/repos/G-Hire/${RN}/commits`,
			  "method": "GET",
			  "timeout": 0,
			  "headers": {
				"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9"
			  },
			};
			running_API(settings, 'commits');
			var settings = {
			  "url": `https://api.github.com/repos/G-Hire/${RN}/branches`,
			  "method": "GET",
			  "timeout": 0,
			  "headers": {
				"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9"
			  },
			};
			running_API(settings, 'branches');
		}


		function running_API(settings, choice){
			$.ajax(settings).done(function (response) {
			  if(choice === 'commits'){		  	
				  console.log(response);
				  var commit_count = document.getElementById('commits').innerHTML;
				   var matches = commit_count.match(/(\d+)/);       
		            if (matches) { 
		                console.log(matches[0]); 
		                console.log(response.length);
		                if(response.length === undefined){
			                var total_commits = parseInt(matches[0]) + 1;
		    				document.getElementById('commits').innerHTML = `${total_commits} commits`;		                	
		                }
		                else{
			                var total_commits = parseInt(matches[0]) + response.length;
		    				document.getElementById('commits').innerHTML = `${total_commits} commits`;		                		
		                } 
		            } 
				  getting_commits_data(response);
			  }
			  else if(choice === 'branches'){
  				  console.log(response);	
  				  document.getElementById('no_branches').innerHTML = `${response.length} branches`;
  				  for (var i = 0; i < response.length; i++) {
  				  	document.getElementById('branches_name').innerHTML += `<a href="javascript:void(0)" id="branches" class="dropdown-item" onclick="getting_branch_data('${response[i].commit.url}','${response[i].name}');"><i class="icon-sync"></i> ${response[i].name}</a>`;
  				  }
			  }
			  if(response.length === 0){
			  	console.log(`Length Empty of Repo`);	
				document.getElementById('no_branches').innerHTML = '0 Branches';
				document.getElementById('Repo_files').innerHTML += '<h6><code>No files!</code></h6>';			
			  }
			}).fail(function(response) {
				console.log(`Repo is empty`);
				document.getElementById('commits').innerHTML = '0 commits';
            })
		}


		function getting_commits_data(response){
			if(response.length === undefined){
				console.log(response.commit.tree.url);
				var commit_msg = response.commit.message;
				console.log(commit_msg);
				var commit_date = response.commit.author.date;
				console.log(commit_date);
				var settings = {
				  "url": response.commit.tree.url,
				  "method": "GET",
				  "timeout": 0,
				  "headers": {
				    "Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9 "
				  },
				};
				 var commit_count = document.getElementById('commits').innerHTML;
			     var matches = commit_count.match(/(\d+)/);       
	             if (matches) { 
 					getting_files(settings,commit_msg,commit_date,matches[0]);
	             }
			}
			else{
				for (var i = response.length - 1; i >= 0; i--) {
					console.log(response[i].commit.tree.url);
					var commit_msg = response[i].commit.message;
					console.log(commit_msg);
					var commit_date = response[i].commit.author.date;
					console.log(commit_date);
					var settings = {
					  "url": response[i].commit.tree.url,
					  "method": "GET",
					  "timeout": 0,
					  "headers": {
						"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9"
					  },
					};
					getting_files(settings,commit_msg,commit_date,i);
				}
			}				
		}

		function getting_files(settings,commit_msg,commit_date,commit_no){
			$.ajax(settings).done(function (response) {
			  document.getElementById('Repo_files').innerHTML += `<tr><td colspan="3"><code><strong>Commit Number: ${commit_no}</strong></code></td></tr>`;
			  for (var i = 0; i < response.tree.length; i++) {
			  	console.log(response.tree[i].path);
					if(response.tree[i].type === 'blob'){
						  	document.getElementById('Repo_files').innerHTML += `
			  				<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<span><i class="icon-file-text mr-2"></i></span>
											<a href="javascript:void(0)" data-url="${response.tree[i].url}" class="text-default">${response.tree[i].path}</a>
										</div>
									</div>
								</td>
								<td><span class="text-muted">${commit_msg}</span></td>
								<td><span class="text-muted">${commit_date}</span></td>
							</tr>`;				  		
				  	}
				  	else if(response.tree[i].type === 'tree'){
						  	document.getElementById('Repo_files').innerHTML += `
			  				<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="mr-3">
											<span><i class="icon-folder mr-2"></i></span>
											<a href="javascript:void(0)" data-url="${response.tree[i].url}" class="text-default">${response.tree[i].path}</a>
										</div>
									</div>
								</td>
								<td><span class="text-muted">${commit_msg}</span></td>
								<td><span class="text-muted">${commit_date}</span></td>
							</tr>`;
				  	}				  	
			  }
			});
		}


		function getting_branch_data(branch_commit_url,branch_name){
			console.log(branch_commit_url);
			if(branch_name === 'master'){
				document.getElementById('Repo_files').innerHTML = `<tr>
								<th>File Name</th>
								<th>Commit Message</th>
								<th>Creation Time</th>
							</tr>`;
				document.getElementById('commits').innerHTML = `0 commits`;	
				document.getElementById('branches_name').innerHTML = ``;
				calling_from_referesh();
			}
			else{
				var settings = {
				  "url": branch_commit_url,
				  "method": "GET",
				  "timeout": 0,
				  "headers": {
					"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9"
				  },
				};
				running_API(settings,'commits');
			}
		}


		$('#start_vcs').click(function() {
			var contributor_name = document.getElementById('contributor_name').value;
			if(contributor_name === ''){ return; }
			name = generateName();			
			creating_repo(name,contributor_name);
		});

		function creating_repo(name,contributor_name){
			var settings = {
			  "url": "https://api.github.com/orgs/G-Hire/repos",
			  "method": "POST",
			  "timeout": 0,
			  "headers": {
				"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9",
			    "Content-Type": "application/json"
			  },
			  "data": JSON.stringify({"name":name,"description":name,"private":true}),
			};

			$.ajax(settings).done(function (response) {
			  console.log(response);
	  		  adding_contributor(contributor_name,name);
			});
		}

		function adding_contributor(cn,rn){
			var settings = {
			  "url": `https://api.github.com/repos/G-Hire/${rn}/collaborators/${cn}`,
			  "method": "PUT",
			  "timeout": 2000,
			  "headers": {
				"Authorization": "Bearer ccd3dcb82671644ff9ee2e1272d2b015b740d2f9"
			  },
			};

			$.ajax(settings).done(function (response) {
			  console.log(response);
			  	var projid = $("#start_vcs").attr("data-projectid");
				var devid = $("#start_vcs").attr("data-devid");
				var poid = $("#start_vcs").attr("data-poid");
				window.location.href = '/create_repo/' + projid + '/' + devid + '/' + poid + '/' + name;
			});
		}


		function capFirst(string) {
			    return string.charAt(0).toUpperCase() + string.slice(1);
			}

			function getRandomInt(min, max) {
			  	return Math.floor(Math.random() * (max - min)) + min;
			}

			function generateName(){
				var name1 = ["abandoned","able","absolute","adorable","adventurous","academic","acceptable","acclaimed","accomplished","accurate","aching","acidic","acrobatic","active","actual","adept","admirable","admired","adolescent","adorable","adored","advanced","afraid","affectionate","aged","aggravating","aggressive","agile","agitated","agonizing","agreeable","ajar","alarmed","alarming","alert","alienated","alive","all","altruistic","amazing","ambitious","ample","amused","amusing","anchored","ancient","angelic","angry","anguished","animated","annual","another","antique","anxious","any","apprehensive","appropriate","apt","arctic","arid","aromatic","artistic","ashamed","assured","astonishing","athletic","attached","attentive","attractive","austere","authentic","authorized","automatic","avaricious","average","aware","awesome","awful","awkward","babyish","bad","back","baggy","bare","barren","basic","beautiful","belated","beloved","beneficial","better","best","bewitched","big","big-hearted","biodegradable","bite-sized","bitter","black","black-and-white","bland","blank","blaring","bleak","blind","blissful","blond","blue","blushing","bogus","boiling","bold","bony","boring","bossy","both","bouncy","bountiful","bowed","brave","breakable","brief","bright","brilliant","brisk","broken","bronze","brown","bruised","bubbly","bulky","bumpy","buoyant","burdensome","burly","bustling","busy","buttery","buzzing","calculating","calm","candid","canine","capital","carefree","careful","careless","caring","cautious","cavernous","celebrated","charming","cheap","cheerful","cheery","chief","chilly","chubby","circular","classic","clean","clear","clear-cut","clever","close","closed","cloudy","clueless","clumsy","cluttered","coarse","cold","colorful","colorless","colossal","comfortable","common","compassionate","competent","complete","complex","complicated","composed","concerned","concrete","confused","conscious","considerate","constant","content","conventional","cooked","cool","cooperative","coordinated","corny","corrupt","costly","courageous","courteous","crafty","crazy","creamy","creative","creepy","criminal","crisp","critical","crooked","crowded","cruel","crushing","cuddly","cultivated","cultured","cumbersome","curly","curvy","cute","cylindrical","damaged","damp","dangerous","dapper","daring","darling","dark","dazzling","dead","deadly","deafening","dear","dearest","decent","decimal","decisive","deep","defenseless","defensive","defiant","deficient","definite","definitive","delayed","delectable","delicious","delightful","delirious","demanding","dense","dental","dependable","dependent","descriptive","deserted","detailed","determined","devoted","different","difficult","digital","diligent","dim","dimpled","dimwitted","direct","disastrous","discrete","disfigured","disgusting","disloyal","dismal","distant","downright","dreary","dirty","disguised","dishonest","dismal","distant","distinct","distorted","dizzy","dopey","doting","double","downright","drab","drafty","dramatic","dreary","droopy","dry","dual","dull","dutiful","each","eager","earnest","early","easy","easy-going","ecstatic","edible","educated","elaborate","elastic","elated","elderly","electric","elegant","elementary","elliptical","embarrassed","embellished","eminent","emotional","empty","enchanted","enchanting","energetic","enlightened","enormous","enraged","entire","envious","equal","equatorial","essential","esteemed","ethical","euphoric","even","evergreen","everlasting","every","evil","exalted","excellent","exemplary","exhausted","excitable","excited","exciting","exotic","expensive","experienced","expert","extraneous","extroverted","extra-large","extra-small","fabulous","failing","faint","fair","faithful","fake","false","familiar","famous","fancy","fantastic","far","faraway","far-flung","far-off","fast","fat","fatal","fatherly","favorable","favorite","fearful","fearless","feisty","feline","female","feminine","few","fickle","filthy","fine","finished","firm","first","firsthand","fitting","fixed","flaky","flamboyant","flashy","flat","flawed","flawless","flickering","flimsy","flippant","flowery","fluffy","fluid","flustered","focused","fond","foolhardy","foolish","forceful","forked","formal","forsaken","forthright","fortunate","fragrant","frail","frank","frayed","free","French","fresh","frequent","friendly","frightened","frightening","frigid","frilly","frizzy","frivolous","front","frosty","frozen","frugal","fruitful","full","fumbling","functional","funny","fussy","fuzzy","gargantuan","gaseous","general","generous","gentle","genuine","giant","giddy","gigantic","gifted","giving","glamorous","glaring","glass","gleaming","gleeful","glistening","glittering","gloomy","glorious","glossy","glum","golden","good","good-natured","gorgeous","graceful","gracious","grand","grandiose","granular","grateful","grave","gray","great","greedy","green","gregarious","grim","grimy","gripping","grizzled","gross","grotesque","grouchy","grounded","growing","growling","grown","grubby","gruesome","grumpy","guilty","gullible","gummy","hairy","half","handmade","handsome","handy","happy","happy-go-lucky","hard","hard-to-find","harmful","harmless","harmonious","harsh","hasty","hateful","haunting","healthy","heartfelt","hearty","heavenly","heavy","hefty","helpful","helpless","hidden","hideous","high","high-level","hilarious","hoarse","hollow","homely","honest","honorable","honored","hopeful","horrible","hospitable","hot","huge","humble","humiliating","humming","humongous","hungry","hurtful","husky","icky","icy","ideal","idealistic","identical","idle","idiotic","idolized","ignorant","ill","illegal","ill-fated","ill-informed","illiterate","illustrious","imaginary","imaginative","immaculate","immaterial","immediate","immense","impassioned","impeccable","impartial","imperfect","imperturbable","impish","impolite","important","impossible","impractical","impressionable","impressive","improbable","impure","inborn","incomparable","incompatible","incomplete","inconsequential","incredible","indelible","inexperienced","indolent","infamous","infantile","infatuated","inferior","infinite","informal","innocent","insecure","insidious","insignificant","insistent","instructive","insubstantial","intelligent","intent","intentional","interesting","internal","international","intrepid","ironclad","irresponsible","irritating","itchy","jaded","jagged","jam-packed","jaunty","jealous","jittery","joint","jolly","jovial","joyful","joyous","jubilant","judicious","juicy","jumbo","junior","jumpy","juvenile","kaleidoscopic","keen","key","kind","kindhearted","kindly","klutzy","knobby","knotty","knowledgeable","knowing","known","kooky","kosher","lame","lanky","large","last","lasting","late","lavish","lawful","lazy","leading","lean","leafy","left","legal","legitimate","light","lighthearted","likable","likely","limited","limp","limping","linear","lined","liquid","little","live","lively","livid","loathsome","lone","lonely","long","long-term","loose","lopsided","lost","loud","lovable","lovely","loving","low","loyal","lucky","lumbering","luminous","lumpy","lustrous","luxurious","mad","made-up","magnificent","majestic","major","male","mammoth","married","marvelous","masculine","massive","mature","meager","mealy","mean","measly","meaty","medical","mediocre","medium","meek","mellow","melodic","memorable","menacing","merry","messy","metallic","mild","milky","mindless","miniature","minor","minty","miserable","miserly","misguided","misty","mixed","modern","modest","moist","monstrous","monthly","monumental","moral","mortified","motherly","motionless","mountainous","muddy","muffled","multicolored","mundane","murky","mushy","musty","muted","mysterious","naive","narrow","nasty","natural","naughty","nautical","near","neat","necessary","needy","negative","neglected","negligible","neighboring","nervous","new","next","nice","nifty","nimble","nippy","nocturnal","noisy","nonstop","normal","notable","noted","noteworthy","novel","noxious","numb","nutritious","nutty","obedient","obese","oblong","oily","oblong","obvious","occasional","odd","oddball","offbeat","offensive","official","old","old-fashioned","only","open","optimal","optimistic","opulent","orange","orderly","organic","ornate","ornery","ordinary","original","other","our","outlying","outgoing","outlandish","outrageous","outstanding","oval","overcooked","overdue","overjoyed","overlooked","palatable","pale","paltry","parallel","parched","partial","passionate","past","pastel","peaceful","peppery","perfect","perfumed","periodic","perky","personal","pertinent","pesky","pessimistic","petty","phony","physical","piercing","pink","pitiful","plain","plaintive","plastic","playful","pleasant","pleased","pleasing","plump","plush","polished","polite","political","pointed","pointless","poised","poor","popular","portly","posh","positive","possible","potable","powerful","powerless","practical","precious","present","prestigious","pretty","precious","previous","pricey","prickly","primary","prime","pristine","private","prize","probable","productive","profitable","profuse","proper","proud","prudent","punctual","pungent","puny","pure","purple","pushy","putrid","puzzled","puzzling","quaint","qualified","quarrelsome","quarterly","queasy","querulous","questionable","quick","quick-witted","quiet","quintessential","quirky","quixotic","quizzical","radiant","ragged","rapid","rare","rash","raw","recent","reckless","rectangular","ready","real","realistic","reasonable","red","reflecting","regal","regular","reliable","relieved","remarkable","remorseful","remote","repentant","required","respectful","responsible","repulsive","revolving","rewarding","rich","rigid","right","ringed","ripe","roasted","robust","rosy","rotating","rotten","rough","round","rowdy","royal","rubbery","rundown","ruddy","rude","runny","rural","rusty","sad","safe","salty","same","sandy","sane","sarcastic","sardonic","satisfied","scaly","scarce","scared","scary","scented","scholarly","scientific","scornful","scratchy","scrawny","second","secondary","second-hand","secret","self-assured","self-reliant","selfish","sentimental","separate","serene","serious","serpentine","several","severe","shabby","shadowy","shady","shallow","shameful","shameless","sharp","shimmering","shiny","shocked","shocking","shoddy","short","short-term","showy","shrill","shy","sick","silent","silky","silly","silver","similar","simple","simplistic","sinful","single","sizzling","skeletal","skinny","sleepy","slight","slim","slimy","slippery","slow","slushy","small","smart","smoggy","smooth","smug","snappy","snarling","sneaky","sniveling","snoopy","sociable","soft","soggy","solid","somber","some","spherical","sophisticated","sore","sorrowful","soulful","soupy","sour","Spanish","sparkling","sparse","specific","spectacular","speedy","spicy","spiffy","spirited","spiteful","splendid","spotless","spotted","spry","square","squeaky","squiggly","stable","staid","stained","stale","standard","starchy","stark","starry","steep","sticky","stiff","stimulating","stingy","stormy","straight","strange","steel","strict","strident","striking","striped","strong","studious","stunning","stupendous","stupid","sturdy","stylish","subdued","submissive","substantial","subtle","suburban","sudden","sugary","sunny","super","superb","superficial","superior","supportive","sure-footed","surprised","suspicious","svelte","sweaty","sweet","sweltering","swift","sympathetic","tall","talkative","tame","tan","tangible","tart","tasty","tattered","taut","tedious","teeming","tempting","tender","tense","tepid","terrible","terrific","testy","thankful","that","these","thick","thin","third","thirsty","this","thorough","thorny","those","thoughtful","threadbare","thrifty","thunderous","tidy","tight","timely","tinted","tiny","tired","torn","total","tough","traumatic","treasured","tremendous","tragic","trained","tremendous","triangular","tricky","trifling","trim","trivial","troubled","true","trusting","trustworthy","trusty","truthful","tubby","turbulent","twin","ugly","ultimate","unacceptable","unaware","uncomfortable","uncommon","unconscious","understated","unequaled","uneven","unfinished","unfit","unfolded","unfortunate","unhappy","unhealthy","uniform","unimportant","unique","united","unkempt","unknown","unlawful","unlined","unlucky","unnatural","unpleasant","unrealistic","unripe","unruly","unselfish","unsightly","unsteady","unsung","untidy","untimely","untried","untrue","unused","unusual","unwelcome","unwieldy","unwilling","unwitting","unwritten","upbeat","upright","upset","urban","usable","used","useful","useless","utilized","utter","vacant","vague","vain","valid","valuable","vapid","variable","vast","velvety","venerated","vengeful","verifiable","vibrant","vicious","victorious","vigilant","vigorous","villainous","violet","violent","virtual","virtuous","visible","vital","vivacious","vivid","voluminous","wan","warlike","warm","warmhearted","warped","wary","wasteful","watchful","waterlogged","watery","wavy","wealthy","weak","weary","webbed","wee","weekly","weepy","weighty","weird","welcome","well-documented","well-groomed","well-informed","well-lit","well-made","well-off","well-to-do","well-worn","wet","which","whimsical","whirlwind","whispered","white","whole","whopping","wicked","wide","wide-eyed","wiggly","wild","willing","wilted","winding","windy","winged","wiry","wise","witty","wobbly","woeful","wonderful","wooden","woozy","wordy","worldly","worn","worried","worrisome","worse","worst","worthless","worthwhile","worthy","wrathful","wretched","writhing","wrong","wry","yawning","yearly","yellow","yellowish","young","youthful","yummy","zany","zealous","zesty","zigzag","rocky"];

				var name = capFirst(name1[getRandomInt(0, name1.length + 1)]);
				return name;
			}

	</script>

@endsection
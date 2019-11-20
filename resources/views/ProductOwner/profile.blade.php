@extends('layouts/POmaster')    	
	
@section('body')
	<h1 id="main-text">Profile</h1>
	<div class="row">
						<div class="col-xl-8">
							<!-- profile -->
							<div class="card" id="profile-information">
										<div class="card-header header-elements-inline">
											<h5 class="card-title">Profile information</h5>
											<div class="header-elements">
												<div class="list-icons">
							                		<a class="list-icons-item" data-action="collapse"></a>
							                		<a class="list-icons-item" data-action="reload"></a>
							                		<a class="list-icons-item" data-action="remove"></a>
							                	</div>
						                	</div>
										</div>

										<div class="card-body">
											<form action="#">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Username</label>
															<input type="text" value="Eugene" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Full name</label>
															<input type="text" value="Kopyov" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Address line 1</label>
															<input type="text" value="Ring street 12" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Address line 2</label>
															<input type="text" value="building D, flat #67" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<label>City</label>
															<input type="text" value="Munich" class="form-control">
														</div>
														<div class="col-md-4">
															<label>State/Province</label>
															<input type="text" value="Bayern" class="form-control">
														</div>
														<div class="col-md-4">
															<label>ZIP code</label>
															<input type="text" value="1031" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Email</label>
															<input type="text" readonly="readonly" value="eugene@kopyov.com" class="form-control">
														</div>
														<div class="col-md-6">
								                            <label>Your country</label>
								                            <select class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
								                                <option value="germany" selected="">Germany</option> 
								                                <option value="france">France</option> 
								                                <option value="spain">Spain</option> 
								                                <option value="netherlands">Netherlands</option> 
								                                <option value="other">...</option> 
								                                <option value="uk">United Kingdom</option> 
								                            </select>
														</div>
													</div>
												</div>

						                        <div class="form-group">
						                        	<div class="row">
						                        		<div class="col-md-6">
															<label>Phone #</label>
															<input type="text" value="+99-99-9999-9999" class="form-control">
															<span class="form-text text-muted">+99-99-9999-9999</span>
						                        		</div>

														<div class="col-md-6">
															<label>Upload profile image</label>
						                                    <input type="file" class="form-input-styled" data-fouc="">
														</div>
						                        	</div>
						                        </div>

						                        <div class="text-right">
						                        	<button type="submit" class="btn btn-primary">Save changes</button>
						                        </div>
											</form>
										</div>
									</div>
							<!-- /profile -->
							<!-- Account settings -->
									<div class="card" id="account-settings" style="display: none;">
										<div class="card-header header-elements-inline">
											<h5 class="card-title">Account settings</h5>
											<div class="header-elements">
												<div class="list-icons">
							                		<a class="list-icons-item" data-action="collapse"></a>
							                		<a class="list-icons-item" data-action="reload"></a>
							                		<a class="list-icons-item" data-action="remove"></a>
							                	</div>
						                	</div>
										</div>

										<div class="card-body">
											<form action="#">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Username</label>
															<input type="text" value="Kopyov" readonly="readonly" class="form-control">
														</div>

														<div class="col-md-6">
															<label>Current password</label>
															<input type="password" value="password" readonly="readonly" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>New password</label>
															<input type="password" placeholder="Enter new password" class="form-control">
														</div>

														<div class="col-md-6">
															<label>Repeat password</label>
															<input type="password" placeholder="Repeat new password" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Profile visibility</label>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="radio" name="visibility" class="form-input-styled" checked="" data-fouc="">
																	Visible to everyone
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="radio" name="visibility" class="form-input-styled" data-fouc="">
																	Visible to friends only
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="radio" name="visibility" class="form-input-styled" data-fouc="">
																	Visible to my connections only
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="radio" name="visibility" class="form-input-styled" data-fouc="">
																	Visible to my colleagues only
																</label>
															</div>
														</div>

														<div class="col-md-6">
															<label>Notifications</label>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-input-styled" checked="" data-fouc="">
																	Password expiration notification
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-input-styled" checked="" data-fouc="">
																	New message notification
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-input-styled" checked="" data-fouc="">
																	New task notification
																</label>
															</div>

															<div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-input-styled">
																	New contact request notification
																</label>
															</div>
														</div>
													</div>
												</div>

						                        <div class="text-right">
						                        	<button type="submit" class="btn btn-primary">Save changes</button>
						                        </div>
					                        </form>
										</div>
									</div>
									<!-- /account settings -->

						</div>

						<div class="col-xl-4">

							<!-- My messages -->
						<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

								<!-- Sidebar content -->
								<div class="sidebar-content">

									<!-- Navigation -->
									<div class="card">
										<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url(../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
											<div class="card-img-actions d-inline-block mb-3">
												<img class="img-fluid rounded-circle" src="../global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
												<div class="card-img-actions-overlay rounded-circle">
													<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
														<i class="icon-plus3"></i>
													</a>
													<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
														<i class="icon-link"></i>
													</a>
												</div>
											</div>

								    		<h6 class="font-weight-semibold mb-0">Victoria Davidson</h6>
								    		<span class="d-block opacity-75">Head of UX</span>
								    		<span class="d-block opacity-75">Pakistan</span>

							    			<div class="list-icons list-icons-extended mt-3">
						                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
						                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
						                    	<a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
					                    	</div>
								    	</div>

										<div class="card-body p-0">
											<ul class="nav nav-sidebar mb-2">
												<li class="nav-item-header">Navigation</li>
												<li class="nav-item">
													<a href="#" id="prof-info" class="nav-link active" data-toggle="tab">
														<i class="icon-user"></i>
														 My profile
													</a>
												</li>
												<li class="nav-item">
													<a href="#" id="acc-sett" class="nav-link" data-toggle="tab">
														<i class="icon-profile"></i>
														Account Settings
													</a>
												</li>
												<li class="nav-item-divider"></li>
												<li class="nav-item">
													<a href="login_advanced.html" class="nav-link" data-toggle="tab">
														<i class="icon-switch2"></i>
														Logout
													</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- /navigation -->
								</div>
								<!-- /sidebar content -->
							</div>
							<!-- /my messages -->	

						</div>
	</div>
@endsection
@extends('layouts.auth')

@section('body')
	<!-- Wizard with validation -->
	<p>{{ $msg ?? '' }}</p>
	<div class="card">
					<div class="card-header">
							<div class="text-center mb-2">
								<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Create account (Developer)</h5>
								<span class="d-block text-muted">All fields are required</span>
							</div>
					</div>
                	<form class="wizard-form steps-validation" action="#" data-fouc>
						<h6>Personal details</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>First name: <span class="text-danger">*</span></label>
										<input type="text" name="fname" class="form-control required" placeholder="Enter first name">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Last name: <span class="text-danger">*</span></label>
										<input type="text" name="lname" class="form-control required" placeholder="Enter last name">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password: <span class="text-danger">*</span></label>
										<input type="text" name="password" class="form-control required" placeholder="Enter password">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Repeat password: <span class="text-danger">*</span></label>
										<input type="text" name="rpassword" class="form-control required" placeholder="Repeat password">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email address: <span class="text-danger">*</span></label>
										<input type="email" name="email" class="form-control required" placeholder="your@email.com">
									</div>
								</div>

								<div class="col-md-6">
									<label>Date of birth: <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
													<option></option>
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-day" data-placeholder="Day" class="form-control form-control-select2" data-fouc>
													<option></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="...">...</option>
													<option value="31">31</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
													<option></option>
													<option value="1">1980</option>
													<option value="2">1981</option>
													<option value="3">1982</option>
													<option value="4">1983</option>
													<option value="5">1984</option>
													<option value="6">1985</option>
													<option value="7">1986</option>
													<option value="8">1987</option>
													<option value="9">1988</option>
													<option value="10">1989</option>
													<option value="11">1990</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>

						<h6>Your education</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Institute Name: <span class="text-danger">*</span></label>
		                                <input type="text" name="university" placeholder="Institute name" class="form-control required">
	                                </div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Country:</label>
	                                    <select name="university-country" data-placeholder="Choose a Country..." class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="1">United States</option> 
	                                        <option value="2">France</option> 
	                                        <option value="3">Germany</option> 
	                                        <option value="4">Spain</option> 
	                                    </select>
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
												<label>Degree level: <span class="text-danger">*</span></label>
			                                    <select name="level1" data-placeholder="Choose an option..." class="form-control form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
			                                        <option></option> 
			                                        <option value="student">Student</option> 
			                                        <option value="bsc">Bachelor</option> 
			                                        <option value="msc">Master</option> 
			                                        <option value="as">Associate</option> 
			                                        <option value="phd">Doctorate</option>
			                                    </select>
									</div>

									<div class="form-group">
										<label>Specialization:</label>
		                                <input type="text" name="specialization" placeholder="Design, Development etc." class="form-control">
	                                </div>
								</div>

								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<label>From:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label>To:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Language of education:</label>
		                                <input type="text" name="education-language" placeholder="English, German etc." class="form-control">
	                                </div>
								</div>
							</div>
						</fieldset>

						<h6>Your experience</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Company: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="Company name" class="form-control required">
	                                </div>

									<div class="form-group">
										<label>Position: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-position" placeholder="Company name" class="form-control required">
	                                </div>

									<div class="row">
										<div class="col-md-6">
											<label>From:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label>To:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
	                                <div class="form-group">
										<label>Brief description:</label>
	                                    <textarea name="experience-description" rows="4" cols="4" placeholder="Tasks and responsibilities" class="form-control"></textarea>
	                                </div>
								</div>
							</div>
						</fieldset>

						<h6>Other Information</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="d-block">Upload Your CV:</label>
	                                    <input type="file" name="resume" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                    </div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Where did you find us? <span class="text-danger">*</span></label>
	                                    <select name="source" data-placeholder="Choose an option..." class="form-control form-control-select2 required" data-fouc>
	                                        <option></option> 
	                                        <option value="monster">Monster.com</option> 
	                                        <option value="linkedin">LinkedIn</option> 
	                                        <option value="google">Google</option> 
	                                        <option value="adwords">Google AdWords</option> 
	                                        <option value="other">Other source</option>
	                                    </select>
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Availability: <span class="text-danger">*</span></label>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled required" data-fouc>
												Immediately
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled" data-fouc>
												1 - 2 weeks
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled" data-fouc>
												3 - 4 weeks
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled" data-fouc>
												More than 1 month
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Additional information:</label>
	                                    <textarea name="additional-info" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control"></textarea>
                                    </div>
								</div>
							</div>
						</fieldset>
					</form>
	</div>
	<!-- /wizard with validation -->
@endsection	
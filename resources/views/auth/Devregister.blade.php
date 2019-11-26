@extends('layouts.auth')

@section('body')
	<!-- Wizard with validation -->
	<div class="card">
					<div class="card-header">
						<div class="text-center mb-2">
							<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
							<h5 class="mb-0">Create account (Developer)</h5>
							<span class="d-block text-muted">All fields are required</span>
						</div>
					</div>
                	<form id="devPage" class="wizard-form steps-validation" action="{{ route('registerDeveloper') }}" method="GET">
						@csrf
						<h6>Personal details</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>First name: <span class="text-danger">*</span></label>
										<input type="text" name="fname" value="{{ old('fname') }}" class="form-control @error('fname') is-invalid @enderror required" value="{{ old('fname') }}" placeholder="Enter first name">
										@error('fname')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Last name: <span class="text-danger">*</span></label>
										<input type="text" name="lname" value="{{ old('lname') }}" class="form-control @error('lname') is-invalid @enderror required" placeholder="Enter last name">
										@error('lname')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password: <span class="text-danger">*</span></label>
										<input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror required" placeholder="Enter password">
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Repeat password: <span class="text-danger">*</span></label>
										<input type="password" name="rpassword" value="{{ old('rpassword') }}" class="form-control required" placeholder="Repeat password">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email address: <span class="text-danger">*</span></label>
										<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror required" placeholder="your@email.com">
										<input id="usertype" type="text" class="form-control" placeholder="Confirm Password" name="usertype" required autocomplete="new-password" value="Developer" hidden>
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<label>Date of birth: <span class="text-danger">*</span></label>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<select name="birth_month" value="{{ old('birth_month') }}" data-placeholder="Month" class="form-control @error('birth_month') is-invalid @enderror form-control-select2" data-fouc>
													<option></option>
													<option value="January">January</option>
													<option value="February">February</option>
													<option value="March">March</option>
													<option value="April">April</option>
													<option value="May">May</option>
													<option value="June">June</option>
													<option value="July">July</option>
													<option value="August">August</option>
													<option value="September">September</option>
													<option value="October">October</option>
													<option value="November">November</option>
													<option value="December">December</option>
												</select>
												@error('birth_month')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth_day" value="{{ old('birth_day') }}" data-placeholder="Day" class="form-control @error('birth_day') is-invalid @enderror form-control-select2" data-fouc>
													<option></option>
													@for($day = 1; $day <=31;$day++)
														<option value="{{ $day, ''}}">{{ $day, ''}}</option>
													@endfor
												</select>
												@error('birth_day')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<select name="birth_year" value="{{ old('birth_year') }}" data-placeholder="Year" class="form-control @error('birth_year') is-invalid @enderror form-control-select2" data-fouc>
													<option></option>
													@for($year = 1990; $year <= 2019; $year++)
														<option value="{{ $year, ''}}">{{ $year ,'' }}</option>
													@endfor
												</select>
												@error('birth_year')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
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
		                                <input type="text" value="{{ old('university') }}" name="university" placeholder="Institute name" class="form-control @error('university') is-invalid @enderror required">
										@error('university')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Country:</label>
	                                    <select name="university_country" value="{{ old('university_country') }}" data-placeholder="Choose a Country..." class="form-control @error('university_country') is-invalid @enderror form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="United States">United States</option> 
	                                        <option value="France">France</option> 
	                                        <option value="Germany">Germany</option> 
											<option value="Spain">Spain</option> 
											<option value="Pakistan">Pakistan</option> 
										</select>
										@error('university_country')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
												<label>Degree level: <span class="text-danger">*</span></label>
			                                    <select name="level1" value="{{ old('level1') }}" data-placeholder="Choose degree..." class="form-control @error('level1') is-invalid @enderror form-control-select2 select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
			                                        <option></option> 
			                                        <option value="student">Student</option> 
			                                        <option value="bachelor">Bachelor</option> 
			                                        <option value="master">Master</option> 
			                                        <option value="associate">Associate</option> 
			                                        <option value="doctrate">Doctorate</option>
												</select>
												@error('level1')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
									</div>

									<div class="form-group">
										<label>Specialization:</label>
		                                <input type="text" name="specialization" value="{{ old('specialization') }}" placeholder="Design, Development etc." class="form-control @error('specialization') is-invalid @enderror">
										@error('specialization')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<label>From:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_from_month" value="{{ old('education_from_month') }}" data-placeholder="Month" class="form-control @error('education_from_month') is-invalid @enderror form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option>
															<option value="February">February</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>
														</select>
														@error('education_from_month')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_from_year" value="{{ old('education_from_year') }}" data-placeholder="Year" class="form-control @error('education_from_year') is-invalid @enderror form-control-select2" data-fouc>
					                                        <option></option> 
															@for($year = 1990; $year <= 2019; $year++)
															<option value="{{ $year, ''}}">{{ $year ,'' }}</option>
															@endfor
														</select>
														@error('education_from_year')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label>To:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_to_month" value="{{ old('education_to_month') }}" data-placeholder="Month" class="form-control @error('education_to_month') is-invalid @enderror form-control-select2" data-fouc>
					                                    	<option></option>
															<option value="January">January</option>
															<option value="February">February</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>
														</select>
														@error('education_to_month')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_to_year" value="{{ old('education_to_year') }}" data-placeholder="Year" class="form-control @error('education_to_year') is-invalid @enderror form-control-select2" data-fouc>
					                                        <option></option> 
															@for($year = 1990; $year <= 2019; $year++)
																<option value="{{ $year, ''}}">{{ $year ,'' }}</option>
															@endfor
														</select>
														@error('education_to_year')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Language of education:</label>
		                                <input type="text" name="education_language" value="{{ old('education_language') }}" placeholder="English, German etc." class="form-control @error('education_language') is-invalid @enderror">
										@error('education_language')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
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
		                                <input type="text" name="experience_company" value="{{ old('experience_company') }}" placeholder="Company name" class="form-control @error('experience_company') is-invalid @enderror required">
										@error('experience_company')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="form-group">
										<label>Position: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience_position" value="{{ old('education_position') }}" placeholder="Company name" class="form-control @error('experience_position') is-invalid @enderror required">
										@error('experience_position')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>

									<div class="row">
										<div class="col-md-6">
											<label>From:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_from_month_experience" value="{{ old('education_from_month_experience') }}" data-placeholder="Month" class="form-control @error('education_from_month_experience') is-invalid @enderror form-control-select2" data-fouc>
					                                    	<option></option>
															<option value="January">January</option>
															<option value="February">February</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>> 
														</select>
														@error('education_from_month_experience')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_from_year_experience" value="{{ old('education_from_year_experience') }}" data-placeholder="Year" class="form-control @error('education_from_year_experience') is-invalid @enderror form-control-select2" data-fouc>
					                                        <option></option> 
															@for($year = 1990; $year <= 2019; $year++)
																<option value="{{ $year, ''}}">{{ $year ,'' }}</option>
															@endfor
														</select>
														@error('education_from_year_experience')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label>To:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_to_month_experience" value="{{ old('education_to_month_experience') }}" data-placeholder="Month" class="form-control @error('education_to_month_experience') is-invalid @enderror form-control-select2" data-fouc>
					                                    	<option></option>
															<option value="January">January</option>
															<option value="February">February</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>
														</select>
														@error('education_to_month_experience')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education_to_year_experience" value="{{ old('education_to_year_experience') }}" data-placeholder="Year" class="form-control @error('education_to_year_experience') is-invalid @enderror form-control-select2" data-fouc>
					                                        <option></option> 
															@for($year = 1990; $year <= 2019; $year++)
																<option value="{{ $year, ''}}">{{ $year ,'' }}</option>
															@endfor
														</select>
														@error('education_to_year_experience')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
				                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
	                                <div class="form-group">
										<label>Brief description:</label>
										<textarea name="experience_description" value="{{ old('experience_description') }}" rows="4" cols="4" placeholder="Tasks and responsibilities" class="form-control @error('experience_description') is-invalid @enderror"></textarea>
										@error('experience_description')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
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
										<input type="file" name="resume" value="{{ old('resume') }}" class="form-input-styled" data-fouc>
										<span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
										@error('resume')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Where did you find us? <span class="text-danger">*</span></label>
	                                    <select name="source" value="{{ old('source') }}" data-placeholder="Choose an option..." class="form-control @error('source') is-invalid @enderror form-control-select2 required" data-fouc>
	                                        <option></option> 
	                                        <option value="monster">Monster.com</option> 
	                                        <option value="linkedin">LinkedIn</option> 
	                                        <option value="google">Google</option> 
	                                        <option value="adwords">Google AdWords</option> 
	                                        <option value="other">Other source</option>
										</select>
										@error('source')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group @error('availability') is-invalid @enderror">
										<label>Availability: <span class="text-danger">*</span></label>
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" value="{{ 'Immediately' }}" class="form-input-styled required" data-fouc>
												Immediately
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" value="{{ '1 - 2 weeks' }}" class="form-input-styled" data-fouc>
												1 - 2 weeks
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" value="{{ '3 - 4 weeks' }}" class="form-input-styled" data-fouc>
												3 - 4 weeks
											</label>
										</div>

										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" value="{{ old('availability') }}" class="form-input-styled" data-fouc>
												More than 1 month
											</label>
										</div>
										@error('availability')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Additional information (BIO):</label>
	                                    <textarea name="additional_info" value="{{ old('additional_info') }}" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="form-control @error('additional_info') is-invalid @enderror"></textarea>
										@error('additional_info')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>
						</fieldset>
					</form>
	</div>
	<!-- /wizard with validation -->
@endsection	
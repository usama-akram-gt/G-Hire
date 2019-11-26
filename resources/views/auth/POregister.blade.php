@extends('layouts.auth')

@section('body')
	<!-- Registration form -->
	<form action="{{ route('register') }}" method="POST" class="flex-fill form-validate-jquery">
		@csrf
		<div class="row" id="product-owner">
			<div class="col-lg-6 offset-lg-3">
				<div class="card mb-0">
					<div class="card-body">
						<div class="text-center mb-3">
							<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
							<h5 class="mb-0">Create account (Product Owner)</h5>
							<span class="d-block text-muted">All fields are required</span>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-feedback form-group-feedback-right">
									<input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="First Name" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

		                            @error('fname')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                            @enderror
									<div class="form-control-feedback">
										<i class="icon-user-plus text-muted"></i>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-feedback form-group-feedback-right">
									<input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="Last Name" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

		                            @error('lname')
		                                <span class="invalid-feedback" role="alert">
		                                    <strong>{{ $message }}</strong>
		                                </span>
		                            @enderror
									<div class="form-control-feedback">
										<i class="icon-user-plus text-muted"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-right">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							<div class="form-control-feedback">
								<i class="icon-mention text-muted"></i>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-feedback form-group-feedback-right">
									<div class="badge-indicator">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
										<div class="form-control-feedback">
											<i class="icon-user-lock text-muted"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-feedback form-group-feedback-right">
									<input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
									<input id="usertype" type="text" class="form-control" placeholder="Confirm Password" name="usertype" required autocomplete="new-password" value="ProductOwner" hidden>
									<div class="form-control-feedback">
											<i class="icon-user-lock text-muted"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<button id="CaccountClick" name="Caccount" type="submit" class="btn btn-primary btn-block">Create Account <i class="icon-plus3 ml-2"></i></button>
						</div>

						<div class="form-group text-center text-muted content-divider">
							<span class="px-2">or sign up with</span>
						</div>

						<div class="form-group text-center">
							<button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
							<button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-google"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- /registration form -->
@endsection
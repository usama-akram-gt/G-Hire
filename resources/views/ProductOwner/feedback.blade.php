@extends('layout/POmaster')


@section('body')
	<!-- Post Project -->
	<div class="row">
					<!-- Messages -->
					<div style="margin-left: 34%;">
						<h2>Feedback</h2>
						<div class="card">
							<div class="card-header header-elements-inline">
							</div>

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
										<input type="radio" class="form-radio" value=1 name="stars"><label>Star 1</label>
                                        <input type="radio" class="form-radio" value=2 name="stars"><label>Star 2</label>
                                        <input type="radio" class="form-radio" value=3 name="stars"><label>Star 3</label>
                                        <input type="radio" class="form-radio" value=4 name="stars"><label>Star 4</label>
                                        <input type="radio" class="form-radio" value=5 name="stars"><label>Star 5</label>
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
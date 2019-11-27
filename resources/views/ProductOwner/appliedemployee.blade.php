@extends('layout/POmaster')


@section('body')
	<!-- Apply to project -->
	<h1 id="main-text">Employee's List</h1>
	<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					
					<!-- /left sidebar component -->


					<!-- Right content -->
					
					<div class="flex-fill overflow-auto">

						<!-- Cards layout -->
						@foreach($data as $value)
						<div class="card card-body">
							<div class="media flex-column flex-sm-row">

								<div class="media-body">
									<h6 class="media-title font-weight-semibold">Developer ID: {{ $value->dev_id }}</h6>

									<ul class="list-inline list-inline-dotted text-muted mb-2">
										<li class="list-inline-item"><label>Offer Amount: {{ $value->offeramount }}</label></li>
										<li class="list-inline-item"><label>Offer Time: {{ $value->time }}</label></li>
									</ul>

									<label>Offerings</label>
									{{ $value->offerings }}
								</div>

								<div class="ml-sm-3 mt-2 mt-sm-0">
									<span class="badge bg-blue">New</span>
								</div>
							</div>
							<div align="right">
							<button type="button" class="btn bg-primary">Message</button>
							<button type="button" class="btn bg-primary">Accpet</button>
							<button type="button" class="btn bg-primary">Decline</button>
							</div>
						</div>
						<!-- remove from below-->
						@endforeach
						
						
						<!-- /cards layout -->


						<!-- Pagination -->
						<div class="d-flex justify-content-center pt-3 mb-3">
							<ul class="pagination">
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
								<li class="page-item active"><a href="#" class="page-link">1</a></li>
								<li class="page-item"><a href="#" class="page-link">2</a></li>
								<li class="page-item"><a href="#" class="page-link">3</a></li>
								<li class="page-item"><a href="#" class="page-link">4</a></li>
								<li class="page-item"><a href="#" class="page-link">5</a></li>
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
							</ul>
						</div>
						<!-- /pagination -->

					</div>
					<!-- /right content  -->



					<!-- Full Modal -->
						

					<!-- Full Modal -->
	</div>
	<!-- /Apply to project -->



<script type="text/javascript">
	$('#modal_full').on('show.bs.modal',function(e)
	{
		var link=$(e.relatedTarget)
		var pid=link.data('pid')
		

		

		$('#devform').attr('action','/showDevList/'+pid);
	});
</script>
@endsection


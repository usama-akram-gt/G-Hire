@extends('layouts/Devmaster')


@section('body')
<!-- Developer Dashboard -->
	<div class="row">
		<div class="col-xl-8">

			<!-- Recommended Projects -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h2 class="card-title">Recommended Developers</h2>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body pb-0">
				</div>
			</div>
			<!-- /Recommended Projects -->

			<!-- Active Projects -->
			<div class="card">
				<div class="table-responsive">
					<table class="table text-nowrap">
						<thead>
							<td colspan="2">Active Projects</td>
							<td class="text-right">
							<span class="badge bg-blue badge-pill">{{ 'No Active Projects'}}</span>
							</td>
						</thead>
						<tbody>
							<tr>
								<th style="width: 50px">Due</th>
								<th style="width: 300px;">User</th>
								<th>Description</th>
							</tr>									
						</tbody>
					</table>
				</div>
			</div>
			<!-- /Active Projects -->
		</div>

		<div class="col-xl-4">

			<!-- Profile -->
			<div class="card">
				<div class="card-header">
					<div class="header-elements text-center">
						<img src="../global_assets/images/placeholders/placeholder.jpg" width="130" height="130" class="rounded-circle" alt="">
					</div>
				</div>

				<!-- Numbers -->
				<div class="card-body py-0">
					<div class="row text-center">
						<div class="col-6">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">$2,345</h5>
								<span class="font-size-sm">Earned This Month</span>
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<h5 class="font-weight-semibold mb-0">3,568</h5>
								<span class="font-size-sm">Response Time</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /numbers -->
			</div>
			<!-- /Profile -->	
		</div>
	</div>
	<!-- /Developer Dashboard -->
@endsection
@extends('layouts.app')

@section('page-header')
	<div class="content-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-style-1">
				<li class="breadcrumb-item"><a href="#">Layouts</a></li>
				<li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>
			</ol>
		</nav>
		<h3 class="page-title">System Settings</h3>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">System Settings</h5>
					<hr class="card-header-devider">
					<form method="post" action="{{ route('currency.rates.update', $rate->id) }}" id="user-form-add" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-5">
									<label for="name" class="required">Currency Name</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $rate->from_currency_name}}" readonly>
								</div>

								<h5>Exchange Rate Detail</h5>
								<div class="form-group">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>To Currency</th>
												<th>Rate</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($rate_details as $index => $detail)
												<tr>
													<td>{{ ++$index }}</td>
													<td>{{ $detail->to_currency_name  }}</td>
													<td>
														<input type="text" name="exchange_rate[{{ $detail->id }}]" class="form-control"
															   value="{{ $detail->exchange_rate }}" style="width: 120px">
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>

							<div class="divider"></div>
							<div class="col-sm-12 flex-end">
								<input type="submit" name="submit" value="Save" class="btn btn-primary mr-2">
								<a href="{{ route('currency.rates.index') }}" class="btn btn-danger">Cancel</a>
							</div>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('#user-form-add').validate({
			rules: {
			    "exchange_rate[]": "required",
			}
		});

		$('#profile').on('change', function() {
			var oFReader = new FileReader();
	        oFReader.readAsDataURL(document.getElementById("profile").files[0]);

	        oFReader.onload = function (oFREvent) {
	            document.getElementById("profile-preview").src = oFREvent.target.result;
	        };
		});

	});
</script>
@endpush

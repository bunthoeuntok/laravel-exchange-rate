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
					<form method="post" action="{{ route('currency.transfers.update', $transfer->id) }}" id="user-form-add" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-5">
									<label for="name" class="required">To User</label>
									<select name="to_user_id" id="to_user_id" class="form-control" required>
										<option value="">Select User</option>
										@foreach ($users as $user)
											<option value="{{ $user->id }}" {{ $user->id == $transfer->to_user_id ? 'selected' : '' }}>
												{{ $user->name }}
											</option>
										@endforeach
									</select>
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
												<tr>
													<td>1</td>
													<td>{{ $transfer->currency_name  }}</td>
													<td>
														<input type="text" name="amount" value="{{ $transfer->amount }}" class="form-control amount" required
															   style="width: 120px">
													</td>
												</tr>
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
			    "amount": "required",
			}
		});
	});

	function setCheckbox(event) {
		if($(event.target).is(':checked')) {
			$(event.target).closest('tr').find('.amount').prop('disabled', false);
		} else {
			$(event.target).closest('tr').find('.amount').prop('disabled', true);
		}
	}
</script>
@endpush

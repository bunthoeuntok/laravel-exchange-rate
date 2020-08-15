@extends('layouts.app')

@section('page-header')
	<div class="content-header">
{{--	    <nav aria-label="breadcrumb">--}}
{{--	        <ol class="breadcrumb breadcrumb-style-1">--}}
{{--	            <li class="breadcrumb-item"><a href="#">Layouts</a></li>--}}
{{--	            <li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>--}}
{{--	        </ol>--}}
{{--	    </nav>--}}
	    <h1 class="page-title">Rate Report</h1>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
			<div class="card">
				<div class="card-header">
					Filter
				</div>
				<div class="card-body">
					<form action="{{ route('report.rate-reports.search') }}">
						@csrf
						@method('get')
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Currency</label>
									<select name="currency_id" id="currency_id" class="form-control">
										<option value="">Select Currency</option>
										@foreach($currencies as $currency)
											<option value="{{ $currency->id }}">{{ $currency->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Date</label>
									<input type="date" class="form-control" name="date">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<button class="btn btn-primary" style="margin-top: 26px">Search</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Role</h5>
                    <div class="table-responsive" style="min-height: 30vh">
                         <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">From Currency</th>
                                    <th scope="col">To Currency</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($rates as $index => $rate)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $rate->from_currency_name }}</td>
	                                    <td>{{ $rate->to_currency_name }}</td>
	                                    <td>{{ $rate->exchange_rate }}</td>
	                                    <td>{{ $rate->created_by_name }}</td>
	                                    <td>{{ $rate->created_at }}</td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection

@push('scripts')
<script>

</script>
@endpush

@extends('layouts.app')

@section('page-header')
	<div class="content-header">
	    <nav aria-label="breadcrumb">
{{--	        <ol class="breadcrumb breadcrumb-style-1">--}}
{{--	            <li class="breadcrumb-item"><a href="#">Layouts</a></li>--}}
{{--	            <li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>--}}
{{--	        </ol>--}}
	    </nav>
	    <h1 class="page-title">Sale Report</h1>
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
					<form action="{{ route('report.reports.search') }}">
						@csrf
						@method('get')
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="from_date">From Date</label>
									<input type="date" id="from_date" class="form-control" name="from_date">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="to_date">To Date</label>
									<input type="date" class="form-control" name="to_date" id="to_date">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="user_id">User</label>
									<select type="date" class="form-control" name="user_id" id="user_id">
										<option value="">Select User</option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
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
                    <h5 class="card-title">Exchange Report</h5>
                    <div class="table-responsive" style="min-height: 30vh">
                         <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">From Currency</th>
                                    <th scope="col">To Currency</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Exchange Amount</th>
                                    <th scope="col">Changed By</th>
                                    <th scope="col">Changed At</th>
                                </tr>
                            </thead>
                            <tbody>
								@php
									$totalAmount = array(
										'Riel' => 0,
										'Dollar' => 0,
										'Baht' => 0
									);
									$totalExchange = array(
										'Riel' => 0,
										'Dollar' => 0,
										'Baht' => 0
									);
								@endphp
                            	@foreach ($sales as $index => $sale)
									@php
										$totalAmount[$sale->from_currency_name] += $sale->amount;
										$totalExchange[$sale->to_currency_name] += $sale->total_exchange_amount;
									@endphp
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $sale->from_currency_name }}</td>
	                                    <td>{{ $sale->to_currency_name }}</td>
	                                    <td>
											<span>{{ number_format($sale->amount, 2). ' ' .$sale->from_currency_symbol }}</span>
										</td>
	                                    <td>
											<span>{{ number_format($sale->rate, 2). ' ' .$sale->to_currency_symbol }}</span>
										</td>
	                                    <td>
											<span>{{ number_format($sale->total_exchange_amount, 2) .' ' .$sale->to_currency_symbol }}</span>
										</td>
	                                    <td>{{ $sale->user_name }}</td>
	                                    <td>{{ $sale->created_at }}</td>

									</tr>
                            	@endforeach

                            </tbody>
                        </table>
                    </div>

					<div class="row">
						<div class="col-md-12">

						<H2>Total Summary</H2>
						</div>
						<div class="col-md-6">
							<table class="table">
								<thead>
								<tr>
									<th>No</th>
									<th>Currency Name</th>
									<th>Amount</th>
								</tr>
								</thead>
								<tbody>
								@php
									$i = 0;
								@endphp
									@foreach ($totalAmount as $currency => $amount)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $currency }}</td>
											<td>{{ $amount }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table">
								<thead>
								<tr>
									<th>No</th>
									<th>Currency Name</th>
									<th>Amount</th>
								</tr>
								</thead>
								<tbody>
								@php
									$i = 0;
								@endphp
									@foreach ($totalExchange as $currency => $amount)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $currency }}</td>
											<td>{{ $amount }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
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

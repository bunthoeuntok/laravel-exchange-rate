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
                    <h5 class="card-title">Role</h5>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($sales as $index => $sale)
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
										<td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">
														<form class="delete-record" action="{{ route('reports', $sale->id) }}" method="post">
															@method('delete')
															@csrf
															<button style="border: 0; outline: 0; background-color: transparent; padding-left: -7px;">Delete</button>
														</form>
													</a>
	                                            </div>
	                                        </div>
										</td>
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

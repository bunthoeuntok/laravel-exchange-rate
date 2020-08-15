@extends('layouts.app')

@section('page-header')
	<div class="content-header">
	    <div style="display: flex; justify-content: space-between">
			<h4>Sales List</h4>
			<div>
				@can('sale.create')
					<a href="{{ route('sale.sales.create') }}" class="btn btn-sm btn-primary">Add</a>
				@endcan
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>
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
													@can('sale.delete')
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">
															<form class="delete-record" action="{{ route('sale.sales.destroy', $sale->id) }}" method="post">
																@method('delete')
																@csrf
																<button style="border: 0; outline: 0; background-color: transparent; padding-left: -7px;">Delete</button>
															</form>
														</a>
													@endcan
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

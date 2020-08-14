@extends('layouts.app')

@section('page-header')
	<div class="content-header">
	    <nav aria-label="breadcrumb">
	        <ol class="breadcrumb breadcrumb-style-1">
	            <li class="breadcrumb-item"><a href="#">Layouts</a></li>
	            <li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>
	        </ol>
	    </nav>
	    <h1 class="page-title">Fixed Sidebar &amp; Header</h1>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
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
                                    <th scope="col">Created By</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($rates as $index => $rate)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $rate->from_currency_name }}</td>
										@php
											$details = \DB::table('rate_detail')
													->join('currencies', 'rate_detail.to_currency_id', '=', 'currencies.id')
													->where('rate_id', $rate->id)
													->select(['rate_detail.*', 'currencies.name AS to_currency_name'])
													->get();
										@endphp
										<td>
											@foreach ($details as $detail)
											    <span>- {{ $detail->to_currency_name }}: {{ $detail->exchange_rate }}</span>
												<br>
											@endforeach
										</td>
	                                    <td>{{ $rate->created_by_name }}</td>
	                                    <td>{{ $rate->created_at }}</td>
	                                    <td>{{ $rate->updated_at }}</td>
	                                    <td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
	                                                <a class="dropdown-item" href="{{ route('currency.rates.edit', $rate->id) }}">Update</a>
	                                                <div class="dropdown-divider"></div>
	                                                <a class="dropdown-item" href="#">
														<form class="delete-record" action="{{ route('currency.rates.destroy', $rate->id) }}" method="post">
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

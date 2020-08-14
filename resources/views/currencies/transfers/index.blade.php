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
                                    <th scope="col">From User</th>
                                    <th scope="col">To User</th>
                                    <th scope="col">Currency Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($transfers as $index => $transfer)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $transfer->from_user_name }}</td>
	                                    <td>{{ $transfer->to_user_name }}</td>
	                                    <td>{{ $transfer->currency_name }}</td>
	                                    <td>
											<span style="float: left">{{ $transfer->currency_symbol }}</span>
											<span style="float: right">{{ number_format($transfer->amount, 2) }}</span>
										</td>
	                                    <td>
											@if($transfer->is_received)
												<span class="badge badge-primary">Received</span>
												@else
												<span class="badge badge-danger">Not Received</span>
											@endif
	                                    <td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
													@if(!$transfer->is_received)
	                                                	<a class="dropdown-item" href="{{ route('currency.transfers.receive', $transfer->id) }}">Receive</a>
	                                                	<a class="dropdown-item" href="{{ route('currency.transfers.edit', $transfer->id) }}">Update</a>
	                                                	<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">
															<form class="delete-record" action="{{ route('currency.transfers.destroy', $transfer->id) }}" method="post">
																@method('delete')
																@csrf
																<button style="border: 0; outline: 0; background-color: transparent; padding-left: -7px;">Delete</button>
															</form>
														</a>
													@endif
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

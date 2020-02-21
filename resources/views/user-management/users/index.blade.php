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
                    <h5 class="card-title">Users</h5>
                    <div class="table-responsive" style="min-height: 30vh">
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($users as $index => $user)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $user->name }}</td>
	                                    <td>{{ $user->email }}</td>
	                                    <td>{{ $user->created_at }}</td>
	                                    <td>{{ $user->updated_at }}</td>
	                                    <td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
	                                                <a class="dropdown-item" href="#">Action</a>
	                                                <a class="dropdown-item" href="#">Another action</a>
	                                                <a class="dropdown-item" href="#">Something else here</a>
	                                                <div class="dropdown-divider"></div>
	                                                <a class="dropdown-item" href="#">Separated link</a>
	                                            </div>
	                                        </div>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table> --}}
                        {{-- <table class="table" id="users-table">
					        <thead>
					            <tr>
					                <th width="60">Id</th>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Created At</th>
					                <th>Updated At</th>
					            </tr>
					        </thead>
					    </table> --}}

					    <table class="table">
					    	<thead>
					            <tr>
					                <th width="60">Id</th>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Created At</th>
					                <th>Updated At</th>
					            </tr>
					        </thead>
					        <tbody>
					        	@foreach ($users as $index => $user)
					        		<tr>
					        			<td>{{ ++$index }}</td>
					        			<td>{{ $user->name }}</td>
					        			<td>{{ $user->email }}</td>
					        			<td>{{ $user->created_at }}</td>
					        			<td>{{ $user->updated_at }}</td>
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
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('user-management.users.get') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush
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
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($roles as $index => $role)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $role->name }}</td>
	                                    <td>{{ $role->description }}</td>
	                                    <td>{{ $role->created_at }}</td>
	                                    <td>{{ $role->updated_at }}</td>
	                                    <td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
	                                                <a class="dropdown-item" href="{{ route('user-management.roles.edit', $role->id) }}">Update</a>
	                                                <div class="dropdown-divider"></div>
	                                                <a class="dropdown-item" href="#">
														<form class="delete-record" action="{{ route('user-management.roles.destroy', $role->id) }}" method="post">
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

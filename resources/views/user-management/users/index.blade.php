@extends('layouts.app')

@section('page-header')
	<div class="content-header">
	    <div style="display: flex; justify-content: space-between">
			<h4>Dashboard</h4>
			<div>
				@can('user.create')
					<a href="{{ route('user-management.users.create') }}" class="btn btn-sm btn-primary">Create User</a>
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
                    <h5 class="card-title">Users</h5>
                    <div class="table-responsive" style="min-height: 30vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
									<th scope="col">Profile</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($users as $index => $user)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
										<td>
											<img src="{{ asset($user->profile) }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%;">
										</td>
	                                    <td>{{ $user->name }}</td>
	                                    <td>{{ $user->email }}</td>
	                                    <td>{{ $user->role->name }}</td>
	                                    <td>{{ $user->created_at }}</td>
	                                    <td>{{ $user->updated_at }}</td>
	                                    <td>
	                                    	<div class="btn-group">
	                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
	                                            </button>
	                                            <div class="dropdown-menu pull-right">
													@can('user.update')
	                                                	<a class="dropdown-item" href="{{ route('user-management.users.edit', $user->id) }}">Update</a>
													@endcan
													@can('user.delete')
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">
															<form class="delete-record" action="{{ route('user-management.users.destroy', $user->id) }}" method="post">
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
	// $('.delete-record').submit(function (event) {
	// 	event.preventDefault();
	//
	// 	var confirmation = confirm('Are you sure that you want to delete this record?');
	//
	// 	if (!confirmation) {
	// 		return false;
	// 	}
    // })
</script>
@endpush

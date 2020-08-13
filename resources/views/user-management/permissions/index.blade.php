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
                    <h5 class="card-title">Permissions</h5>
                    <div class="table-responsive" style="min-height: 30vh">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Page Name</th>
                                    <th scope="col">Permission</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($roles as $index => $role)
	                                <tr>
	                                    <th scope="row">{{ ++$index }}</th>
	                                    <td>{{ $role->name }}</td>
										<td colspan="2"></td>
										<td>
											<a href="{{ route('user-management.permissions.edit-permission', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
										</td>
	                                </tr>
									@foreach($pages as $page)
										<tr>
											<td></td>
											<td></td>
											<td>{{ $page->name }}</td>
											<td>
												@foreach($page->permissions as $permission)
													<input type="checkbox" disabled class="checkbox" {{ (in_array($permission->id, $role->rolePermission())) ? 'checked' : '' }} />
													<span> {{ $permission->name }}</span>
													<br>
												@endforeach
											</td>
											<td></td>
										</tr>
									@endforeach
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

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
						<form method="post" action="{{ route('user-management.permissions.save-permission', $role->id) }}">
							@csrf
							@method('post')
							 <table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Role</th>
										<th scope="col">Page Name</th>
										<th scope="col">Permission</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>{{ $role->name }}</td>
										<td></td>
									</tr>
									@foreach($pages as $page)
										<tr>
											<td></td>
											<td></td>
											<td>{{ $page->name }}</td>
											<td>
												@foreach($page->permissions as $permission)
													<input type="checkbox" name="permission_id[]" id="{{ $permission->slug }}"
														   class="checkbox" {{ (in_array($permission->id, $role->rolePermission())) ? 'checked' : '' }}
													 		value="{{ $permission->id }}" />
													<label for="{{ $permission->slug }}"> {{ $permission->name }}</label>
													<br>
												@endforeach
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="4" class="text-right">
											<button class="btn btn-sm btn-primary">Save</button>
											<a href="{{ route('user-management.permissions.index') }}" class="btn btn-sm btn-danger">Cancel</a>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
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

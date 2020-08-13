@extends('layouts.app')

@section('page-header')
	<div class="content-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb breadcrumb-style-1">
				<li class="breadcrumb-item"><a href="#">Layouts</a></li>
				<li class="breadcrumb-item active" aria-current="page">Fixed Sidebar &amp; Header</li>
			</ol>
		</nav>
		<h3 class="page-title">System Settings</h3>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">System Settings</h5>
					<hr class="card-header-devider">
					<form method="post" action="{{ route('user-management.pages.update', $page->id) }}" id="user-form-add" enctype="multipart/form-data">
						@csrf
						@method('patch')
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name" class="required">Role Name</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Username" value="{{ old('name') ?? $page->name}}" required>
									@error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="divider"></div>
								<h4>Permission of the page</h4>
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										@foreach($page->permissions as $index => $permission)
											<tr class="form-group">
												<td>{{ ++$index }}</td>
												<td>{{ $permission->name }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>

							</div>

							<div class="divider"></div>
							<div class="col-sm-12 flex-end">
								<input type="submit" name="submit" value="Save" class="btn btn-primary mr-2">
								<a href="{{ route('user-management.roles.index') }}" class="btn btn-danger">Cancel</a>
							</div>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('#user-form-add').validate({
			rules: {
			    name: {required: true,minlength: 3},
				email: {required: true, email: true},
				password: {required:true, minlength: 6},
				role: {required: true}
			}
		});

		$('#profile').on('change', function() {
			var oFReader = new FileReader();
	        oFReader.readAsDataURL(document.getElementById("profile").files[0]);

	        oFReader.onload = function (oFREvent) {
	            document.getElementById("profile-preview").src = oFREvent.target.result;
	        };
		});

	});
</script>
@endpush

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
					<form method="post" action="{{ route('user-management.users.store') }}" id="user-form-add" enctype="multipart/form-data">
						@csrf
						@method('post')
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name" class="required">Username</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Username" value="{{ old('name') }}" required>
									@error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
									<label for="email" class="required">Email</label>
									<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
									@error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
									<label for="password" class="required">Password</label>
									<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="******" required>
									@error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
									<label for=email" class="required">Password</label>
									<input type="password" name="password_confirmation" class="form-control" id="password" placeholder="******" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="role" class="required">User Role</label>
									<select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
										<option value="">Select Role</option>
										@foreach($roles as $role)
											<option value="{{ $role->id }}">
												{{ $role->name }}
											</option>
										@endforeach
									</select>
									@error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="form-group">
									<label for="logo">User Profile</label>
									<div class="form-image logo">
										<img id="profile-preview" src="{{ asset('images/users/no-image.png') }}">
										<input type="file" name="profile" id="profile" accept="image/x-png,image/gif,image/jpeg">
									</div>
								</div>
							</div>


							<div class="divider"></div>
							<div class="col-sm-12 flex-end">
								<input type="submit" name="submit" value="Save" class="btn btn-primary mr-2">
								<input type="submit" name="submit" value="Cancel" class="btn btn-warning">
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

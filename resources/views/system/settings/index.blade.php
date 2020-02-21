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
					<form method="post" action="{{ route('system.settings.store') }}" id="system-setting">
						@method('post')
						@csrf
								<div class="form-group">
									<label for="name" class="required">System Name</label>
									<input type="text" name="name" class="form-control" id="name" placeholder="sytem name header" value="{{ System::system()->name ?? '' }}" required>
								</div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" id="description" rows="3">{{ System::system()->description ?? '' }}</textarea>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="logo">LOGO</label>
											<div class="form-image logo">
												<img src="{{ asset(System::system()->logo ?? '') }}">
												<input type="file" name="logo">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="logo">ICON</label>
											<div class="form-image icon">
												<img src="{{ asset(System::system()->icon ?? '') }}">
												<input type="file" name="icon">
											</div>
										</div>
									</div>
								</div>

							<div class="divider"></div>
							<div class="col-lg-12 flex-end">
								<input type="submit" name="submit" value="Save" class="btn btn-primary mr-2">
								<input type="submit" name="submit" value="Cancel" class="btn btn-warning">
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
		$('#system-setting').validate();
	});
</script>
@endpush
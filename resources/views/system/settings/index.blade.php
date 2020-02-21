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
					<form method="post" action="{{ route('system.settings.update', System::system()->id) }}" id="system-setting" enctype="multipart/form-data">
						@method('patch')
						@csrf
						<div class="form-group">
							<label for="name" class="required">System Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="sytem name header" value="{{ System::system()->name ?? '' }}" required>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control" name="description" id="description" rows="3">{{ System::system()->description ?? '' }}</textarea>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="logo">LOGO</label>
									<div class="form-image logo">
										<img id="img-logo" src="{{ asset(System::system()->logo ?? 'images/system/logo.png') }}">
										<input type="file" name="logo" id="logo">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="logo">ICON</label>
									<div class="form-image icon">
										<img id="img-icon" src="{{ asset(System::system()->icon ?? 'images/system/icon.ico') }}">
										<input type="file" name="icon" id="icon">
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

		$('#logo').on('change', function() {
			var oFReader = new FileReader();
	        oFReader.readAsDataURL(document.getElementById("logo").files[0]);

	        oFReader.onload = function (oFREvent) {
	            document.getElementById("img-logo").src = oFREvent.target.result;
	        };
		});


		$('#icon').on('change', function() {
			var oFReader = new FileReader();
	        oFReader.readAsDataURL(document.getElementById("icon").files[0]);

	        oFReader.onload = function (oFREvent) {
	            document.getElementById("img-icon").src = oFREvent.target.result;
	        };
		});
	});
</script>
@endpush
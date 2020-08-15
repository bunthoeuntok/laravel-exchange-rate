@extends('layouts.app')

@section('page-header')
	<div class="content-header">
	    <div style="display: flex; justify-content: space-between">
			<h4>Dashboard</h4>
{{--			<div>--}}
{{--				<button class="btn btn-sm btn-primary">Add</button>--}}
{{--			</div>--}}
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dashboard</h5>
					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										Users
									</h5>

									<h2>{{ sizeof($users) }}</h2>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										Currencies
									</h5>
									<h2>{{ sizeof($currencies) }}</h2>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">
										Sales
									</h5>
									<h2>{{ sizeof($sales) }}</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">User</h4>
									<table class="table">
										<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Role</th>
										</tr>
										</thead>
										<tbody>
											@foreach ($users as $index => $user)
												<tr>
													<th scope="row">{{ ++$index }}</th>
													<td>{{ $user->name }}</td>
													<td>{{ $user->email }}</td>
													<td>{{ $user->role->name }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>

								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Currencies</h4>
									<table class="table">
										<thead>
										<tr>
											<th>No</th>
											<th>Currency Name</th>
											<th>Currency Name(KH)</th>
											<th>Symbol</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($currencies as $index => $currency)
											<tr>
												<th scope="row">{{ ++$index }}</th>
												<td>{{ $currency->name }}</td>
												<td>{{ $currency->name_kh }}</td>
												<td>{{ $currency->symbol }}</td>
											</tr>
										@endforeach
										</tbody>
									</table>

								</div>
							</div>
						</div>
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

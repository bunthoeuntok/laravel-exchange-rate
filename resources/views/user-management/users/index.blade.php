@extends('layouts.app')

@section('content')
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $index => $user)
				<tr>
					<td>{{ ++$index }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
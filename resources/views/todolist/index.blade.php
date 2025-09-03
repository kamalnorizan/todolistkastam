
@extends('layouts.app')

@section('content')
<div class="container mt-4">
	<h1 class="mb-4">User List</h1>
	<form method="GET" action="" class="mb-4">
		<div class="input-group">
			<input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
			<button class="btn btn-primary" type="submit">Search</button>
		</div>
	</form>
	<div class="card">
		<div class="card-body p-0">
			<table class="table mb-0">
				<thead class="table-light">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Created At</th>
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at }}</td>
						</tr>
					@empty
						<tr>
							<td colspan="4" class="text-center">Please Seach for user.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

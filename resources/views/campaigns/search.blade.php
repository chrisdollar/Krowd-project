// 
<form method="GET" action="{{ url('my-search') }}">
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
		</div>
		<div class="col-md-6">
			<button class="btn btn-success">Search</button>
		</div>
	</div>
</form>


<table class="table table-bordered">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
	</tr>
	@if($users->count())
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
		</tr>
		@endforeach
	@else
	<tr>
		<td colspan="3">Result not found.</td>
	</tr>
	@endif
</table>
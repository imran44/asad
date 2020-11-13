@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>

	        
	    </div>
	</div>

	 {{-- @include('notification')  --}}


<div class="row">
    <script>

  @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
  @endif

  @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
  @endif

  @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
  @endif

  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
  @endif

</script>

</div>
	<table class="table table-bordered">
	<div class="pull-right">
	             <a href="{{ route('users.create') }}" class = "btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
	        </div>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>

			<a class="btn-floating btn-small waves-effect waves-light info" href="{{ route('users.show',$user->id) }}">
			<i class="material-icons">info</i>
			</a>
			<a class="btn-floating btn-small waves-effect waves-light Light blue" href="{{ route('users.edit',$user->id) }}">
			<i class="material-icons">mode_edit</i></a>

			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','onsubmit' => "return confirm('Are you sure you want to delete?')",
			]) !!}
            {!!	Form::button('<i class="material-icons"> delete
			', array(
            'type' => 'submit',
            'class'=> 'btn-floating btn-small waves-effect waves-light pink',
            'onclick'=>'return confirm("Are you sure?")
            </i>' )); 
            !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
	</table>

	{!! $data->render() !!}


@endsection
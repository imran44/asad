@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit New Item</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::model($categories, ['method' => 'PATCH','route' => ['categories.update', $categories->id]]) !!}
	<div class="row">

			<div class="ccol-xs-8 col-sm-6">
            <div class="form-group">
                <strong>Category:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => '')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>

	</div>
	{!! Form::close() !!}


@endsection
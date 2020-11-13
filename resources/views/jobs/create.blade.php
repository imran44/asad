@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Item</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('item.index') }}"> Back</a>
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

	{!! Form::open(array('route' => 'item.store','method'=>'POST')) !!}
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Title','class' => '')) !!}
            </div>
        </div>

        <div class="col-xs-1 col-sm-2 col-md-2">
            <div class="form-group">
                {{ Form::label('catagory_id','Category :')}}
                <select class="form-control" class='dropdown-button btn' data-beloworigin="true" name="catagory_id">
                	@foreach ($categories as $category)
                	<option value="{{ $category->id}}">{{ $category->name }}</option>	
                	@endforeach 
                </select>
            </div>
        </div>


        <div class="col-xs-4 col-sm-4 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => '','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>

	</div>
	{!! Form::close() !!}

@endsection
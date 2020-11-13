@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome </div>

                <div class="panel-body">
                <img src="uploads/avatar/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $user->name }}'s Profile</h2>

                    <form enctype="multipart/form-data" action="profile" method="POST">
                    {!! Form::label('uploadPic', 'Upload profile picture')!!}
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::button(' Add <i class="fa fa-plus-square-o icon-on-right"></i>', array(
                                                'type' => 'submit',
                                                'class'=> 'pull-right btn btn-primary',
                                                )) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

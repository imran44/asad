@extends('layouts.app')



@section('content')

{{-- @include('notification') --}}


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
<div class="row">
                   
                                  
                                 @foreach(Auth::user()->roles as $v)
                                <h4 class="pull-left page-title">Welcome ! {{ $v->display_name }} {{ Auth::user()->name }} </h4>
                                @endforeach
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">FOODPOINT</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>

                            </div>
                        </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
         {{--       @if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif --}}

                <div class="panel-body">
                @foreach(Auth::user()->roles as $v)
                    <label class="label label-success">{{ $v->display_name }} {{ Auth::user()->name }}</label>
                @endforeach
                    {{ Auth::user()->name }} You are logged in!

                </div>
            </div>
        </div>
    </div>

@endsection

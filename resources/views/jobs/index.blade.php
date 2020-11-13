@extends('layouts.app')
 	@section('title', 'Latest Jobs')
 
@section('content')
{{--  @include('notification')  --}}


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

	<section class="latest-jobs">
        <div class="jobs-posting">
            <div class="container">
                <div class="section-posting">
                    <div class="row">
						<div class="col-lg-1 md-1">
							</div>
								<div class="col-sm-12 col-lg-8 md-8">
									<h3>   Latest Jobs </h3>
									<hr>
									
								<div class="table-responsive-sm">
								<table class="table table-borderless">
								@foreach ($jobs as $key => $job)

								<tbody>
								<tr>
					  		
					  			<td>{{ $job->title }}</td>
					  			<td>{{ $job->description }}</td>
								<td>Closing date:{{ $job->created_at }}</td>
								<td><span> Posted:<span>{{ $job->updated_at }}</td>
								<td>{{ $job->catagory->name }}</td>
					  			
					  			
					  		   </tr>
								</tbody>

								@endforeach
								</table>
							</div>
							 {!! $jobs->render() !!}
						</div>
						<div class="col-lg-3 md-3">
							<div id="my_job_category">
	                            <h3>   Category </h3>
								<hr>
								
								
							</div>
						</div>
						</div>
                    </div>
                </div>
            </div>
         </div>
    </section>
@endsection
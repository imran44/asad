@extends('layouts.app')
 
	@section('title', '|  All Categories')

@section('content')
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
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>All Categories</h2>
	        </div>
	       
	    </div>
	
          
    
	<table class="table table-striped table-hover">
	 <div class="pull-right">
	        	@permission('categories-create')
  <a href="{{ route('categories.create') }}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
	            @endpermission
	        </div>
	         <div class="pull-leftt">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="typeahead" name="q"
                    placeholder="Search catagory" style="margin:0px auto;width:300px";> 
                    
          
          </div>
          </div>
		<tr>
			<th>No</th>
			<th>Category Name</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($categories as $category)
	<tr>
		 <td>{{ ++$i }}</td>
		<td>{{ $category->name }}</td>
		<td>
		
			<a class="btn-floating btn-small waves-effect waves-light info" href="{{ route('categories.show',$category->id) }}">
			<i class="material-icons">info</i>
			</a>

			@permission('item-edit')
			<a class="btn-floating btn-small waves-effect waves-light Light blue" href="{{ route('categories.edit',$category->id) }}">
			<i class="material-icons">mode_edit</i></a>
			@endpermission

			@permission('item-delete')
			{!! Form::open(['method' => 'DELETE','route' =>
			  ['categories.destroy', $category->id],
			  'style'=>'display:inline',
			  'onsubmit' => "return confirm('Are you sure you want to delete?')",]) !!}
            
		{!!	Form::button('<i class="material-icons"> delete
			', array(
            'type' => 'submit',
            'class'=> 'btn-floating btn-small waves-effect waves-light pink',
            'onclick'=>'return confirm("Are you sure?")
            </i>' )); !!}

        	{!! Form::close() !!}
        	@endpermission
		</td> 
		
	</tr>
	@endforeach
	</table>

 {!! $categories->render() !!}
        

</div>
<script type="text/javascript">
    var path = "{{ route('categories.autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>

 <script type="text/javascript">

    $('.remove').click(function(){
      swal({
          title: "Are you sure want to remove this item?",
          text: "You will not be able to recover this item",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Confirm",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Your item deleted.", "success");
          } else {
            swal("Cancelled", "You Cancelled", "error");
          }
      });
    });

</script> 


@endsection
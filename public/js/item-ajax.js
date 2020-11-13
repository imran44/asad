var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){

    	total_page = data.last_page;
    	current_page = data.current_page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;
    });
}

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}

/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
		rows = rows + '<td>'+value.address_id+'</td>';
	  	rows = rows + '<td>'+value.name+'</td>';
	  	rows = rows + '<td>'+value.description+'</td>';
		rows = rows + '<td>'+value.phone+'</td>';
		rows = rows + '<td>'+value.email+'</td>';
		rows = rows + '<td>'+value.homemade+'</td>';
		rows = rows + '<td>'+value.lat+'</td>';
		rows = rows + '<td>'+value.lng+'</td>';
		rows = rows + '<td>'+value.bank_name+'</td>';
		rows = rows + '<td>'+value.bank_code+'</td>';
		rows = rows + '<td>'+value.paypal_email+'</td>';
		rows = rows + '<td>'+value.paypal_merchantname+'</td>';
		rows = rows + '<td>'+value.zipcode+'</td>';
		rows = rows + '<td>'+value.easypeisa+'</td>';
		rows = rows + '<td>'+value.cod+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<button data-toggle="modal" data-target="#edit-restaurent" class="btn btn-primary edit-restaurent">Edit</button> ';
                rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
                rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-restaurent").find("form").attr("action");
    var address_id = $("#create-restaurent").find("input[name='address_id']").val();
	var name = $("#create-restaurent").find("input[name='name']").val();
    var description = $("#create-restaurent").find("textarea[name='description']").val();
	var phone = $("#create-restaurent").find("input[name='phone']").val();
	var email = $("#create-restaurent").find("input[name='email']").val();
	var homemade = $("#create-restaurent").find("input[name='homemade']").val();
	var lat = $("#create-restaurent").find("input[name='lat']").val();
	var lng = $("#create-restaurent").find("input[name='lng']").val();
	var bank_name = $("#create-restaurent").find("input[name='bank_name']").val();
	var bank_code = $("#create-restaurent").find("input[name='bank_code']").val();
	var paypal_email = $("#create-restaurent").find("input[name='paypal_email']").val();
	var paypal_merchantname = $("#create-restaurent").find("input[name='paypal_merchantname']").val();
	var zipcode = $("#create-restaurent").find("input[name='zipcode']").val();
	var easypeisa = $("#create-restaurent").find("input[name='easypeisa']").val();
	var cod = $("#create-restaurent").find("input[name='cod']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
		cache: false,
        data:{address_id:address_id, name:name, description:description, phone:phone, email:email, 
		homemade:homemade, lat:lat, lng:lng, bank_name:bank_name, bank_code:bank_code, paypal_email:paypal_email,
		paypal_merchantname:paypal_merchantname, zipcode:zipcode, easypeisa:easypeisa, cod:cod}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
    });

});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: url + '/' + id,
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
});

/* Edit Item */
$("body").on("click",".edit-restaurent",function(){
    var id = $(this).parent("td").data('id');
	var address_id = $(this).parent("td").prev("td").prev("td").text();
    var name = $(this).parent("td").prev("td").text();
    var description = $(this).parent("td").prev("td").text();	
	var phone = $(this).parent("td").prev("td").prev("td").text();
    var email = $(this).parent("td").prev("td").text();	
	var homemade = $(this).parent("td").prev("td").prev("td").text();
    var lat = $(this).parent("td").prev("td").text();
	var lng = $(this).parent("td").prev("td").prev("td").text();
    var bank_name = $(this).parent("td").prev("td").text();	
    var bank_code = $(this).parent("td").prev("td").prev("td").text();
    var paypal_email = $(this).parent("td").prev("td").text();	
	var paypal_merchantname = $(this).parent("td").prev("td").prev("td").text();
    var zipcode = $(this).parent("td").prev("td").text();	
	var easypeisa = $(this).parent("td").prev("td").prev("td").text();
    var cod = $(this).parent("td").prev("td").text();
	
    $("#edit-restaurent").find("input[name='address_id']").val(address_id);
	$("#edit-restaurent").find("input[name='name']").val(name);
	$("#edit-restaurent").find("textarea[name='description']").val(description);
	$("#edit-restaurent").find("input[name='phone']").val(phone);	
	$("#edit-restaurent").find("input[name='email']").val(email);	
	$("#edit-restaurent").find("input[name='homemade']").val(homemade);	
	$("#edit-restaurent").find("input[name='lat']").val(lat);	
	$("#edit-restaurent").find("input[name='lng']").val(lng);	
	$("#edit-restaurent").find("input[name='bank_name']").val(bank_name);	
	$("#edit-restaurent").find("input[name='bank_code']").val(bank_code);
	$("#edit-restaurent").find("input[name='paypal_email']").val(paypal_email);	
	$("#edit-restaurent").find("input[name='paypal_merchantname']").val(paypal_merchantname);	
	$("#edit-restaurent").find("input[name='zipcode']").val(zipcode);
	$("#edit-restaurent").find("input[name='easypeisa']").val(easypeisa);	
	$("#edit-restaurent").find("input[name='cod']").val(cod);
	
    $("#edit-restaurent").find("form").attr("action",url + '/' + id);
});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    var form_action = $("#edit-restaurent").find("form").attr("action");
    var address_id = $("#edit-restaurent").find("input[name='address_id']").val();
	var name = $("#edit-restaurent").find("input[name='name']").val();
    var description = $("#edit-restaurent").find("textarea[name='description']").val();
	var phone = $("#edit-restaurent").find("input[name='phone']").val();
	var email = $("#edit-restaurent").find("input[name='email']").val();
	var homemade = $("#edit-restaurent").find("input[name='homemade']").val();
	var lat = $("#edit-restaurent").find("input[name='lat']").val();
	var lng = $("#edit-restaurent").find("input[name='lng']").val();
	var bank_name = $("#edit-restaurent").find("input[name='bank_name']").val();
	var bank_code = $("#edit-restaurent").find("input[name='bank_code']").val();
	var paypal_email = $("#edit-restaurent").find("input[name='paypal_email']").val();
	var paypal_merchantname = $("#edit-restaurent").find("input[name='paypal_merchantname']").val();
	var zipcode = $("#edit-restaurent").find("input[name='zipcode']").val();
	var easypeisa = $("#edit-restaurent").find("input[name='easypeisa']").val();
	var cod = $("#edit-restaurent").find("input[name='cod']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
		cache: false,
        data:{address_id:address_id, name:name, description:description, phone:phone, email:email, 
		homemade:homemade, lat:lat, lng:lng, bank_name:bank_name, bank_code:bank_code, paypal_email:paypal_email,
		paypal_merchantname:paypal_merchantname, zipcode:zipcode, easypeisa:easypeisa, cod:cod}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
		
        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
});

<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">




<style type="text/css">
	.package-lebel{
		float: left;
		font-size: 16px;
	}
</style>
<form id="formID" class="form-horizontal formular form-label-left" action="javascript:void(0)">
	<fieldset>
		<label class="package-lebel"> Country Name </label>
		<input type="text" class="form-control" name="country_name" value="{{ $country->country_name }}" id="country_name" placeholder="Enter contry name" required >
		<input type="hidden" class="form-control" name="id" value="{{ $country->id }}" id="id">
		<span class="error_name"></span>
	</fieldset>
	<br>
	<fieldset>
		<label class="package-lebel"> Country Code </label>
		<textarea class="form-control" name="country_code" id="country_code"  placeholder="Enter country code" required>{{ $country->country_code }}</textarea>
		<span class="error_code"></span>
	</fieldset>


	<div class="modal-footer">
	    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
	    <button type="submit" onclick="editCountryData()" class="btn btn-primary waves-effect waves-light ">Save</button>
	</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/files/admin/js/master/country.js') }}"></script>



<!-- <script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(CSRF_TOKEN);

    function editCountryData(){
	    var name = $('#name').val();
	    var code = $('#code').val();
	    var id = $('#id').val();
	    console.log(id);

	    var next_step = true;
	    var count = 0;

	    if(name === ''){
            //alert('Please enter your package name.');
            $('#name').focus();
             $('.error_name').html('<span style="color:red;float:left;">Enter country name</p>');
            next_step = false;
        }
        else{
            $('.error_name').html('<span style="display:none"/>')
        }
	    if(code === ''){
            //alert('Please enter your package name.');
            $('#code').focus();
             $('.error_code').html('<span style="color:red;float:left;">Enter country code</p>');
            next_step = false;
        }
        else{
            $('.error_code').html('<span style="display:none"/>')
        }

	    alert(code);
	    //return false;

	    if(next_step && count == 0){
	    	alert(count);
	    	count++;
	        $.ajax({
	            url : "{{url('update-country/{id}')}}",
	            type: 'post',
	            data: {_token:CSRF_TOKEN, name:name, code:code, id:id},
	            success: function (data) {
	                console.log(data);

	                if(data.messageType == 'success'){
	                	Swal.fire(
						  '',
						  data.message,
						  'success'
	                		// form rese
						)
	                	count++;

		               	// Redraw Table After Insert										
						var table = $('#posts').DataTable();

						// #myInput is a <input type="text"> element
						$('.input-sm').on( 'keyup', function () {
							table.search( this.value ).draw();
						} );

	                }

	                if(data.messageType == 'error'){
	                	Swal.fire(
						  '',
						  data.message,
						  'error'
	                		// form rese
						)
	                }

	            },
	            error: function(xhr, ajaxOptions, thrownError, data) {
	            	console.log(data);
	            	/*count++;
	            	Swal.fire(
						  '',
						  data.message,
						  'error'
						)*/
	                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	            }
	        });
	    }
}
</script> -->
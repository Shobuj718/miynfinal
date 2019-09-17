
<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">




<style type="text/css">
	.package-lebel{
		float: left;
		font-size: 16px;
	}
</style>
<form id="formID" class="form-horizontal formular form-label-left" action="javascript:void(0)">
	<fieldset>
		<label class="package-lebel"> Package Name </label>
		<input type="text" class="form-control" name="package_name" id="package_name" placeholder="Enter package name" value="{{ $package->package_name }}" required >

		<input type="hidden" class="form-control" name="package_id" id="package_id" placeholder="Enter package name" value="{{ $package->id }}" required >
		<span class="error_package_name"></span>
	</fieldset>
	<br>
	<fieldset>
		<label class="package-lebel"> Package Description </label>
		<textarea class="form-control" name="package_description" id="package_description" placeholder="Enter package description" required>{{ $package->package_description }}</textarea>
		<span class="error_package_description"></span>
	</fieldset>


	<div class="modal-footer">
		
	    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
	    <button type="submit" onclick="packageDataEdit()" class="btn btn-primary waves-effect waves-light ">Update</button>
	</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/files/admin/js/master/package.js') }}"></script>



<!-- <script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(CSRF_TOKEN);

    function packageDataSubmit(){
	    var package_name = $('#package_name').val();
	    var package_description = $('#package_description').val();
	    console.log(package_name)

	    var next_step = true;
	    var count = 0;

	    if(package_name === ''){
            //alert('Please enter your package name.');
            $('#package_name').focus();
             $('.error_package_name').html('<span style="color:red;float:left;">Enter package name</p>');
            next_step = false;
        }
        else{
            $('.error_package_name').html('<span style="display:none"/>')
        }
	    if(package_description === ''){
            //alert('Please enter your package name.');
            $('#package_description').focus();
             $('.error_package_description').html('<span style="color:red;float:left;">Enter package description</p>');
            next_step = false;
        }
        else{
            $('.error_package_description').html('<span style="display:none"/>')
        }

	    //alert(package_name);
	    //return false;

	    if(next_step && count == 0){
	    	count++;
	        $.ajax({
	            url : "{{url('package-add-new')}}",
	            type: 'post',
	            data: {_token:CSRF_TOKEN, package_name:package_name, package_description:package_description},
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
	                	// reset form field
	                	$("#formID")[0].reset();

		               	// Redraw Table After Insert										
						var table = $('#posts').DataTable();

						$('.input-sm').val("");
						// #myInput is a <input type="text"> element
						$('.input-sm').on( 'keyup', function () {
							table.search( this.value ).draw();
						} );
						$( ".input-sm" ).trigger( "keyup" );

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
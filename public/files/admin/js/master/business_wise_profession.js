    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    function addProfession(){
	    var profession_name 			= $('#profession_name').val();
	    var profession_description 		= $('#profession_description').val();
	    var category_id 				= $('#category_id').val();
	    console.log(profession_name)

	    var next_step = true;
	    var count = 0;

	    if(profession_name === ''){
            $('#profession_name').focus();
             $('.error_name').html('<span style="color:red;float:left;">Enter profession name.</p>');
            next_step = false;
        }
        else{
            $('.error_name').html('<span style="display:none"/>')
        }
	    if(profession_description === ''){
            $('#profession_description').focus();
             $('.pro_desc_error').html('<span style="color:red;float:left;">Enter profession description.</p>');
            next_step = false;
        }
        else{
            $('.pro_desc_error').html('<span style="display:none"/>')
        }
	    if(category_id === ''){
            $('#category_id').focus();
             $('.cat_error_name').html('<span style="color:red;float:left;">Please select a category.</p>');
            next_step = false;
        }
        else{
            $('.cat_error_name').html('<span style="display:none"/>')
        }

	    alert(profession_name);
	    //return false;

	    if(next_step && count == 0){
	    	count++;
	        $.ajax({
	            url : "/add-business-wise-profession",
	            type: 'post',
	            data: {_token:CSRF_TOKEN, profession_name:profession_name, profession_description:profession_description, category_id:category_id},
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
						var table = $('#business-wise-profession').DataTable();

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

	function editProfession(){
	    var profession_name 			= $('#profession_name').val();
	    var profession_description 		= $('#profession_description').val();
	    var category_id 				= $('#category_id').val();
	    var id 							= $('#id').val();
	    console.log(profession_name)

	    var next_step = true;
	    var count = 0;

	    if(profession_name === ''){
            $('#profession_name').focus();
             $('.error_name').html('<span style="color:red;float:left;">Enter profession name.</p>');
            next_step = false;
        }
        else{
            $('.error_name').html('<span style="display:none"/>')
        }
	    if(profession_description === ''){
            $('#profession_description').focus();
             $('.pro_desc_error').html('<span style="color:red;float:left;">Enter profession description.</p>');
            next_step = false;
        }
        else{
            $('.pro_desc_error').html('<span style="display:none"/>')
        }
	    if(category_id === ''){
            $('#category_id').focus();
             $('.cat_error_name').html('<span style="color:red;float:left;">Please select a category.</p>');
            next_step = false;
        }
        else{
            $('.cat_error_name').html('<span style="display:none"/>')
        }

        /*alert(profession_name);
	    return false;*/

	    if(next_step && count == 0){
	    	count++;
	        $.ajax({
	            url : "/update-business-wise-profession/"+id,
	            type: 'post',
	            data: {_token:CSRF_TOKEN, profession_name:profession_name, profession_description:profession_description, category_id:category_id, id:id},
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
						var table = $('#business-wise-profession').DataTable();

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

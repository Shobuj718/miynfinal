
<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">

        <div class="card-block">
            <!-- <form action="{{route('password.change.success', $user->id)}}" method="POST"> -->
        <form id="edit-password" class="form-horizontal formular form-label-left" action="javascript:void(0)">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="current_password" id="current_password" required="">
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                        <span class="current_pass_error"></span>
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Enter new password" name="new_password" id="new_password" required="">
                        <span class="new_pass_error"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Confirm password" name="confirm_password" id="confirm_password" required="">
                        <span class="confirm_pass_error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info pull-right" onclick="editPassword()" type="submit" value="submit">Update</button>
                </div>
            </form>
            
        </div>
    <script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
        function editPassword(){
            var CSRF_TOKEN          = $('meta[name="csrf-token"]').attr('content');

            var current_password    = $('#current_password').val();
            var new_password        = $('#new_password').val();
            var confirm_password   = $('#confirm_password').val();
            var id                  = $('#id').val();
            
            console.log(current_password)

            var next_step = true;
            var count = 0;

            if(current_password === ''){
                //alert('Please enter your package current_password.');
                $('#current_password').focus();
                 $('.current_pass_error').html('<span style="color:red;float:left;">Enter current password.</p>');
                next_step = false;
            }
            else{
                $('.current_pass_error').html('<span style="display:none"/>')
            }
            if(new_password === ''){
                //alert('Please enter your package name.');
                $('#new_password').focus();
                 $('.new_pass_error').html('<span style="color:red;float:left;">Enter new password.</p>');
                next_step = false;
            }
            else{
                $('.new_pass_error').html('<span style="display:none"/>')
            }
            if(confirm_password === ''){
                //alert('Please enter your package name.');
                $('#confirm_password').focus();
                 $('.confirm_pass_error').html('<span style="color:red;float:left;">Enter new password again.</p>');
                next_step = false;
            }
            else{
                $('.confirm_pass_error').html('<span style="display:none"/>')
            }

            //alert(current_password);
            //return false;

            if(next_step && count == 0){
                count++;
                $.ajax({
                    url : "/password-change-success/"+id,
                    type: 'post',
                    data: {_token:CSRF_TOKEN, current_password:current_password, new_password:new_password, confirm_password:confirm_password, id:id},
                    success: function (data) {
                        console.log(data);

                        if(data.messageType == 'success'){
                            Swal.fire({
                              type: data.messageType,
                              title: '',
                              text: data.message,
                              allowOutsideClick:false
                            }).then((result) => {
                                  if (result.value) {
                                    //window.location.reload();
                                    window.location = ('/');
                                  }
                                });




                            count++;

                            // Redraw Table After Insert                                        
                            var table = $('#edit-password').DataTable();

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
    </script>

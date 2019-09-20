
<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">




<style type="text/css">
	.package-lebel{
		float: left;
		font-size: 16px;
	}
</style>
<form id="formID" class="form-horizontal formular form-label-left" action="javascript:void(0)">
	<fieldset>
		<label class="package-lebel"> City Name </label>
		<input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter city name" required >
		<span class="error_city_name"></span>
	</fieldset>
	<br>

	<fieldset>
		<label class="package-lebel"> Timezone Name </label>
		<input type="text" class="form-control" name="timezone_name" id="timezone_name" placeholder="Enter timezone name" required >
		<span class="error_name"></span>
	</fieldset>
	<br>

	<fieldset>
		<label class="package-lebel"> Timezone GMT </label>
		<input type="text" class="form-control" name="timezone_gmt" id="timezone_gmt" placeholder="Enter timezone gmt" required >
		<span class="error_timezone_gmt"></span>
	</fieldset>
	<br>
	
	<fieldset>
		<label class="package-lebel"> Timezone Offset  </label>
		<input type="text" class="form-control" name="timezone_offset" id="timezone_offset" placeholder="Enter timezone offset" required >
		<span class="error_code"></span>
	</fieldset>

	<br>


	<div class="modal-footer">
	    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
	    <button type="submit"  onclick="addTimezone()" class="btn btn-primary waves-effect waves-light ">Save</button>
	</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/files/admin/js/master/timezone.js') }}"></script>

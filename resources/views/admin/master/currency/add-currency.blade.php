
<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">




<style type="text/css">
	.package-lebel{
		float: left;
		font-size: 16px;
	}
</style>
<form id="formID" class="form-horizontal formular form-label-left" action="javascript:void(0)">
	<fieldset>
		<label class="package-lebel"> Currency Name </label>
		<input type="text" class="form-control" name="currency_name" id="currency_name" placeholder="Enter currency name" required >
		<span class="error_name"></span>
	</fieldset>
	<br>
	<fieldset>
		<label class="package-lebel"> Currency Short Code </label>
		<input type="text" class="form-control" name="currency_shortcode" id="currency_shortcode" placeholder="Enter currency short code" required >
		<span class="error_code"></span>
	</fieldset>


	<div class="modal-footer">
	    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
	    <button type="submit" onclick="addCurrencyData()" class="btn btn-primary waves-effect waves-light ">Save</button>
	</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/files/admin/js/master/currency.js') }}"></script>



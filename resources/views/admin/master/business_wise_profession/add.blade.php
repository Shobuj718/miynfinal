
<link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/sweetalert/css/sweetalert.css') }}">




<style type="text/css">
	.package-lebel{
		float: left;
		font-size: 16px;
	}
</style>
<form id="formID" class="form-horizontal formular form-label-left" action="javascript:void(0)">
	<fieldset>
		<label class="package-lebel"> Profession Name </label>
		<input type="text" class="form-control" name="profession_name" id="profession_name" placeholder="Enter profession name" required >
		<span class="error_name"></span>
	</fieldset>
	<br>
	<fieldset>
		<label class="package-lebel">Profession Description </label>
		<textarea class="form-control" name="profession_description" id="profession_description" placeholder="Enter profession description" required></textarea>
		<span class="pro_desc_error"></span>
	</fieldset>
	<br>

	<fieldset>
		<label class="package-lebel">Business Category Name </label>
		<select name="category_id" id="category_id" class="form-control">
            <option value="">Select Business Category</option>
            @foreach($categories as $value)
              <option value="{{ $value->id }}">{{ $value->business_category_name }}</option>
            @endforeach
        </select>	
		<span class="cat_error_name"></span>
	</fieldset>
	<br>


	<div class="modal-footer">
	    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" >Close</button>
	    <button type="submit" onclick="addProfession()" class="btn btn-primary waves-effect waves-light ">Save</button>
	</div>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('/files/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/files/admin/js/master/business_wise_profession.js') }}"></script>



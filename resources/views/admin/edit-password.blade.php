@extends('admin.dashboard')


@section('page_header')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Password</h5>
                    <p class="m-b-0">Edit Password</p>

                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('main_content')

	<div class="page-body">
   
    <div class="card">
        <div class="card-header">
        @if (session('success'))
          <div class="alert alert-success background-success">
                <strong>{{ session('success')}}</strong>
           </div>
        @endif
        @if (session('error'))
           <div class="alert alert-danger background-danger">
               {{ session('error')}}
           </div>
        @endif
        <div class="card-header">
            <h5>Edit Password</h5>
        </div>
        </div>
        <div class="card-block">
            <form action="{{route('password.change.success', $user->id)}}" method="POST">
                @csrf          
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="current_password" id="current_password" required="">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </div>
                </div>    
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Enter new password" name="new_password" id="new_password" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Confirm password" name="confirme_password" id="confirme_password" required="">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info pull-right"  type="submit" value="submit">Save</button>
                </div>
            </form>
            
        </div>
    </div>

</div>

@endsection
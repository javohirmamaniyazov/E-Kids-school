@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account Informations</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row m-1">
          <!-- left column -->
          <div class="col-md-12">
            @include('_message')
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>First Name <span style="color: red">*</span></label>
                      <input type="text" name="name" required value="{{ old('name', $getRecord->name)}}" class="form-control" placeholder="First Name">
                      <p class="text-danger">{{ $errors->first('name')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Last Name <span style="color: red">*</span></label>
                      <input type="text" name="last_name" required value="{{ old('last_name', $getRecord->last_name)}}" class="form-control" placeholder="Last Name">
                    <p class="text-danger">{{ $errors->first('last_name')}}</p>

                    </div>

                    <div class="form-group col-md-6">
                      <label>Gender <span style="color: red">*</span></label>
                      <select class="form-control" required name="gender">
                        <option value="">Select Gender</option>
                        <option {{ (old('gender', $getRecord->gender) == "Male") ? 'selected' : ''}} value="Male">Male</option>
                        <option {{ (old('gender', $getRecord->gender) == "Female") ? 'selected' : ''}} value="Female">Female</option>
                      </select>
                      <p class="text-danger">{{ $errors->first('gender')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Occupation <span style="color: red"></span></label>
                      <input type="text" name="occupation" value="{{ old('occupation', $getRecord->occupation)}}" class="form-control" placeholder="Occupation">
                      <p class="text-danger">{{ $errors->first('occupation')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number <span style="color: red">*</span></label>
                      <input type="text" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}" class="form-control" placeholder="Mobile Number">
                      <p class="text-danger">{{ $errors->first('mobile_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Address <span style="color: red">*</span></label>
                      <input type="text" name="address" required value="{{ old('address', $getRecord->address)}}" class="form-control" placeholder="Address">
                      <p class="text-danger">{{ $errors->first('address')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Profile Picture <span style="color: red"></span></label>
                      <input type="file" name="profile_pic" class="form-control">
                      <p class="text-danger">{{ $errors->first('profile_pic')}}</p>
                      @if (!empty($getRecord->getProfile()))
                          <img src="{{ $getRecord->getProfile() }}" width="85px", height="60px">
                      @endif
                    </div>

                  </div>

                  <hr />
                  
                  <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input type="email" name="email" required value="{{ old('email', $getRecord->email)}}" class="form-control" placeholder="Email">
                    <p class="text-danger">{{ $errors->first('email')}}</p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection
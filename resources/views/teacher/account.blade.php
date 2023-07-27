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
                        <label>Date of Birth <span style="color: red">*</span></label>
                        <input type="date" name="date_of_birth" required value="{{ old('date_of_birth', $getRecord->date_of_birth)}}" class="form-control">
                        <p class="text-danger">{{ $errors->first('date_of_birth')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number <span style="color: red"></span></label>
                      <input type="text" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}" class="form-control" placeholder="Mobile Number">
                      <p class="text-danger">{{ $errors->first('mobile_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Marital Status <span style="color: red"></span></label>
                        <input type="text" name="marital_status" value="{{ old('marital_status', $getRecord->marital_status)}}" class="form-control" placeholder="Marital Status ">
                        <p class="text-danger">{{ $errors->first('marital_status')}}</p>
                      </div>

                    <div class="form-group col-md-6">
                        <label>Profile Picture <span style="color: red"></span></label>
                        <input type="file" name="profile_pic" class="form-control">
                        <p class="text-danger">{{ $errors->first('profile_pic')}}</p>
                        @if (!empty($getRecord->getProfile()))
                          <img src="{{ $getRecord->getProfile() }}" width="85px", height="60px">
                      @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Current Address <span style="color: red">*</span></label>
                        <input type="text" name="address" required value="{{ old('address', $getRecord->address)}}" class="form-control" placeholder="Address">
                        <p class="text-danger">{{ $errors->first('address')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Permanent Address <span style="color: red"></span></label>
                        <input type="text" name="permanent_address" value="{{ old('permanent_address', $getRecord->permanent_address)}}" class="form-control" placeholder="Permanent Address">
                        <p class="text-danger">{{ $errors->first('permanent_address')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Qualification <span style="color: red"></span></label>
                        <input type="text" name="qualification" value="{{ old('qualification', $getRecord->qualification)}}" class="form-control" placeholder="Qualification">
                        <p class="text-danger">{{ $errors->first('qualification')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Work Experience <span style="color: red"></span></label>
                        <input type="text" name="work_experience"  value="{{ old('work_experience', $getRecord->work_experience)}}" class="form-control" placeholder="Work Experience">
                        <p class="text-danger">{{ $errors->first('work_experience')}}</p>
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
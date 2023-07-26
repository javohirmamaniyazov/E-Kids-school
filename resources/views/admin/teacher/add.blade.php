@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Teacher</h1>
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
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>First Name <span style="color: red">*</span></label>
                      <input type="text" name="name" required value="{{ old('name')}}" class="form-control" placeholder="First Name">
                      <p class="text-danger">{{ $errors->first('name')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Last Name <span style="color: red">*</span></label>
                      <input type="text" name="last_name" required value="{{ old('last_name')}}" class="form-control" placeholder="Last Name">
                    <p class="text-danger">{{ $errors->first('last_name')}}</p>

                    </div>

                    <div class="form-group col-md-6">
                        <label>Gender <span style="color: red">*</span></label>
                        <select class="form-control" required name="gender">
                          <option value="">Select Gender</option>
                          <option {{ (old('gender') == "Male") ? 'selected' : ''}} value="Male">Male</option>
                          <option {{ (old('gender') == "Female") ? 'selected' : ''}} value="Female">Female</option>
                        </select>
                        <p class="text-danger">{{ $errors->first('gender')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date of Birth <span style="color: red">*</span></label>
                        <input type="date" name="date_of_birth" required value="{{ old('date_of_birth')}}" class="form-control">
                        <p class="text-danger">{{ $errors->first('date_of_birth')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date of Joining <span style="color: red">*</span></label>
                        <input type="date" name="admission_date" required value="{{ old('admission_date')}}" class="form-control">
                        <p class="text-danger">{{ $errors->first('admission_date')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number <span style="color: red"></span></label>
                      <input type="text" name="mobile_number" value="{{ old('mobile_number')}}" class="form-control" placeholder="Mobile Number">
                      <p class="text-danger">{{ $errors->first('mobile_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Marital Status <span style="color: red"></span></label>
                        <input type="text" name="marital_status" value="{{ old('marital_status')}}" class="form-control" placeholder="Marital Status ">
                        <p class="text-danger">{{ $errors->first('marital_status')}}</p>
                      </div>

                    <div class="form-group col-md-6">
                        <label>Profile Picture <span style="color: red"></span></label>
                        <input type="file" name="profile_pic" class="form-control">
                        <p class="text-danger">{{ $errors->first('profile_pic')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Current Address <span style="color: red">*</span></label>
                        <input type="text" name="address" required value="{{ old('address')}}" class="form-control" placeholder="Address">
                        <p class="text-danger">{{ $errors->first('address')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Permanent Address <span style="color: red"></span></label>
                        <input type="text" name="permanent_address" required value="{{ old('permanent_address')}}" class="form-control" placeholder="Permanent Address">
                        <p class="text-danger">{{ $errors->first('permanent_address')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Qualification <span style="color: red"></span></label>
                        <input type="text" name="qualification" required value="{{ old('qualification')}}" class="form-control" placeholder="Qualification">
                        <p class="text-danger">{{ $errors->first('qualification')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Work Experience <span style="color: red"></span></label>
                        <input type="text" name="work_experience" required value="{{ old('work_experience')}}" class="form-control" placeholder="Work Experience">
                        <p class="text-danger">{{ $errors->first('work_experience')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Note <span style="color: red"></span></label>
                        <input type="text" name="note" required value="{{ old('note')}}" class="form-control" placeholder="Note">
                        <p class="text-danger">{{ $errors->first('note')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Status <span style="color: red">*</span></label>
                        <select class="form-control" required name="status">
                          <option value="">Select Status</option>
                          <option {{ (old('status' == 0) ? 'selected' :'' ) }} value="0">Active</option>
                          <option {{ (old('status' == 1) ? 'selected' :'' ) }} value="1">Inactive</option>
                        </select>
                        <p class="text-danger">{{ $errors->first('status')}}</p>
                      </div>
                  </div>

                  <hr />
                  
                  <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input type="email" name="email" required value="{{ old('email')}}" class="form-control" placeholder="Email">
                    <p class="text-danger">{{ $errors->first('email')}}</p>
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red">*</span></label>
                    <input type="password" name="password"  required class="form-control"  placeholder="Password">
                    <p class="text-danger">{{ $errors->first('password')}}</p>
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
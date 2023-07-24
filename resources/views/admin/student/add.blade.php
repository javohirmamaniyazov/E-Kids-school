@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
                    </div>

                    <div class="form-group col-md-6">
                      <label>Last Name <span style="color: red">*</span></label>
                      <input type="text" name="last_name" required value="{{ old('last_name')}}" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Admission Number <span style="color: red">*</span></label>
                      <input type="text" name="admission_number" required value="{{ old('admission_number')}}" class="form-control" placeholder="Admission Number">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Roll Number <span style="color: red"></span></label>
                      <input type="text" name="roll_number" value="{{ old('roll_number')}}" class="form-control" placeholder="Roll Number">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Class <span style="color: red">*</span></label>
                      <select class="form-control" required name="class_id">
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                            <option value="{{$class->id}}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Gender <span style="color: red">*</span></label>
                      <select class="form-control" required name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Date of Birth <span style="color: red">*</span></label>
                      <input type="date" name="date_of_birth" required value="{{ old('date_of_birth')}}" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Caste <span style="color: red"></span></label>
                      <input type="text" name="casta" value="{{ old('casta')}}" class="form-control" placeholder="Caste">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Religion <span style="color: red"></span></label>
                      <input type="text" name="religion" value="{{ old('religion')}}" class="form-control" placeholder="Religion">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number <span style="color: red"></span></label>
                      <input type="text" name="mobile_number" value="{{ old('mobile_number')}}" class="form-control" placeholder="Mobile Number">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Admission Date <span style="color: red">*</span></label>
                      <input type="date" name="admission_date" required value="{{ old('admission_date')}}" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Profile Picture <span style="color: red"></span></label>
                      <input type="file" name="profile_pic" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Blood Group <span style="color: red"></span></label>
                      <input type="text" name="blood_group" value="{{ old('blood_group')}}" class="form-control" placeholder="Blood Group">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Height <span style="color: red"></span></label>
                      <input type="text" name="height" value="{{ old('height')}}" class="form-control" placeholder="Height">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Weight <span style="color: red"></span></label>
                      <input type="text" name="weight" value="{{ old('weight')}}" class="form-control" placeholder="Weight">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Status <span style="color: red">*</span></label>
                      <select class="form-control" required name="status">
                        <option value="">Select Status</option>
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
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
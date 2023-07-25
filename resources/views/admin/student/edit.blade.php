@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
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
                      <input type="text" name="name" required value="{{ old('name', $getRecord->name)}}" class="form-control" placeholder="First Name">
                      <p class="text-danger">{{ $errors->first('name')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Last Name <span style="color: red">*</span></label>
                      <input type="text" name="last_name" required value="{{ old('last_name', $getRecord->last_name)}}" class="form-control" placeholder="Last Name">
                    <p class="text-danger">{{ $errors->first('last_name')}}</p>

                    </div>

                    <div class="form-group col-md-6">
                      <label>Admission Number <span style="color: red">*</span></label>
                      <input type="text" name="admission_number" required value="{{ old('admission_number', $getRecord->admission_number)}}" class="form-control" placeholder="Admission Number">
                      <p class="text-danger">{{ $errors->first('admission_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Roll Number <span style="color: red"></span></label>
                      <input type="text" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number)}}" class="form-control" placeholder="Roll Number">
                      <p class="text-danger">{{ $errors->first('roll_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Class <span style="color: red">*</span></label>
                      <select class="form-control" required name="class_id">
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                            <option {{ (old('class_id', $getRecord->class_id) == $class->id) ? 'selected' : ''}} value="{{$class->id}}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                      <p class="text-danger">{{ $errors->first('class_id')}}</p>
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
                      <label>Caste <span style="color: red"></span></label>
                      <input type="text" name="casta" value="{{ old('casta', $getRecord->casta)}}" class="form-control" placeholder="Caste">
                      <p class="text-danger">{{ $errors->first('casta')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Religion <span style="color: red"></span></label>
                      <input type="text" name="religion" value="{{ old('religion', $getRecord->religion)}}" class="form-control" placeholder="Religion">
                      <p class="text-danger">{{ $errors->first('religion')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number <span style="color: red"></span></label>
                      <input type="text" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}" class="form-control" placeholder="Mobile Number">
                      <p class="text-danger">{{ $errors->first('mobile_number')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Admission Date <span style="color: red">*</span></label>
                      <input type="date" name="admission_date" required value="{{ old('admission_date', $getRecord->admission_date)}}" class="form-control">
                      <p class="text-danger">{{ $errors->first('admission_date')}}</p>
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
                      <label>Blood Group <span style="color: red"></span></label>
                      <input type="text" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group)}}" class="form-control" placeholder="Blood Group">
                      <p class="text-danger">{{ $errors->first('blood_group')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Height <span style="color: red"></span></label>
                      <input type="text" name="height" value="{{ old('height', $getRecord->height)}}" class="form-control" placeholder="Height">
                      <p class="text-danger">{{ $errors->first('height')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Weight <span style="color: red"></span></label>
                      <input type="text" name="weight" value="{{ old('weight', $getRecord->weight)}}" class="form-control" placeholder="Weight">
                      <p class="text-danger">{{ $errors->first('weight')}}</p>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Status <span style="color: red">*</span></label>
                      <select class="form-control" required name="status">
                        <option value="">Select Status</option>
                        <option {{ (old('status', $getRecord->status) == 0) ? 'selected' :''  }} value="0">Active</option>
                        <option {{ (old('status', $getRecord->status) == 1) ? 'selected' :''  }} value="1">Inactive</option>
                      </select>
                      <p class="text-danger">{{ $errors->first('status')}}</p>
                    </div>
                  </div>

                  <hr />
                  
                  <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input type="email" name="email" required value="{{ old('email', $getRecord->email)}}" class="form-control" placeholder="Email">
                    <p class="text-danger">{{ $errors->first('email')}}</p>
                  </div>
                  <div class="form-group">
                    <label>Password <span style="color: red"></span></label>
                    <input type="text" name="password"  class="form-control"  placeholder="Password">
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
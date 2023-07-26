@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Teacher List (Total : {{ $getRecord->total() }})</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
          <a href="{{ url('admin/teacher/add')}}" class="btn btn-primary">Add new Teacher</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Teacher</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">

                
                <div class="form-group col-md-2">
                      <label>Name</label>
                      <input type="text" name="name"  value="{{Request::get('name')}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Last Name</label>
                  <input type="text" name="last_name"  value="{{Request::get('last_name')}}" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Email</label>
                  <input type="text" name="email"  value="{{Request::get('email')}}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-2">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Active</option>
                    <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label>Date</label>
                  <input type="date" name="date"  value="{{Request::get('date')}}" class="form-control" placeholder="Email">
                </div>
                
                <div class="form-group col-md-2">
                  <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                  <a href="{{url('admin/teacher/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                </div>
              </div>
              </div>
              <!-- /.card-body -->

              
            </form>
          </div>

          @include('_message')
          <div class="card">
            
            <div class="card-header">
              <h3 class="card-title">All Teachers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Date of Joining</th>
                    <th>Mobile Number</th>
                    <th>Marital Status</th>
                    <th>Current Address</th>
                    <th>Permanent Address</th>
                    <th>Qualification</th>
                    <th>Work Experience</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $teacher)
                  <tr>
                    <td>{{ $teacher->id}}</td>
                    <td> 
                      @if (!empty($teacher->getProfile()))
                          <img src="{{ $teacher->getProfile()}}" alt="" height="50px" width="50px" style="border-radius: 50%" >
                      @endif
                    </td>
                    <td style="min-width: 130px">{{ $teacher->name}} {{ $teacher->last_name}}</td>
                    <td>{{ $teacher->email}}</td>
                    <td>{{ $teacher->gender}}</td>
                    <td style="min-width: 115px">
                      @if (!empty($teacher->date_of_birth))
                      {{ date('d-m-Y', strtotime($teacher->date_of_birth))}}
                      @endif  
                    </td>
                    <td style="min-width: 135px">
                      @if (!empty($teacher->admission_date))
                      {{ date('d-m-Y', strtotime($teacher->admission_date))}}
                      @endif   
                    </td>
                    <td style="min-width: 132px">{{ $teacher->mobile_number}}</td>
                    <td style="min-width: 158px">{{ $teacher->marital_status}}</td>
                    <td style="min-width: 100px">{{ $teacher->address}}</td>
                    <td style="min-width: 100px">{{ $teacher->permanent_address}}</td>
                    <td style="min-width: 86px">{{ $teacher->qualification}}</td>
                    <td>{{ $teacher->work_experience}}</td>
                    <td>{{ $teacher->note}}</td>
                    <td>{{ ($teacher->status == 0) ? 'Active' : 'Inactive'}}</td>
                    <td style="min-width: 108px">{{ date('d-m-Y H:i A', strtotime($teacher->created_at)) }}</td>
                    <td style="min-width: 101px">
                      <a href="{{  url('admin/teacher/edit/'.$teacher->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                      <a href="{{  url('admin/teacher/delete/'.$teacher->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="m-3 float-right">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
 <!-- /.content-wrapper -->

 @endsection
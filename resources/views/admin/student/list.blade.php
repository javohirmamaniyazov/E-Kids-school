@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Student List (Total : {{ $getRecord->total() }})</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
          <a href="{{ url('admin/student/add')}}" class="btn btn-primary">Add new Student</a>
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
              <h3 class="card-title">Search Student</h3>
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
                  <a href="{{url('admin/student/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                </div>
              </div>
              </div>
              <!-- /.card-body -->

              
            </form>
          </div>

          @include('_message')
          <div class="card">
            
            <div class="card-header">
              <h3 class="card-title">All Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admission Number</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Caste</th>
                    <th>Religion</th>
                    <th>Mobile Number</th>
                    <th>Admission Date</th>
                    <th>Blood Group</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $item)
                      <tr>
                        <td>{{ $item->id}}</td>
                        <td> 
                          @if (!empty($item->getProfile()))
                              <img src="{{ $item->getProfile()}}" alt="" height="50px" width="50px" style="border-radius: 50%" >
                          @endif
                        </td>
                        <td>{{ $item->name}} {{ $item->last_name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->admission_number}}</td>
                        <td style="min-width: 100px">{{ $item->class_name}}</td>
                        <td>{{ $item->gender}}</td>
                        <td style="min-width: 108px">
                          @if (!empty($item->date_of_birth))
                          {{ date('d-m-Y', strtotime($item->date_of_birth))}}
                          @endif  
                        </td>
                        <td style="min-width: 86px">{{ $item->casta}}</td>
                        <td>{{ $item->religion}}</td>
                        <td>{{ $item->mobile_number}}</td>
                        <td style="min-width: 108px">
                          @if (!empty($item->admission_date))
                          {{ date('d-m-Y', strtotime($item->admission_date))}}
                          @endif   
                        </td>
                        <td>{{ $item->blood_group}}</td>
                        <td>{{ $item->height}}</td>
                        <td>{{ $item->weight}}</td>
                        <td>{{ ($item->status == 0) ? 'Active' : 'Inactive'}}</td>
                        <td style="min-width: 108px">{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                        <td style="min-width: 101px">
                          <a href="{{  url('admin/student/edit/'.$item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-solid fa-pen"></i></a>
                          <a href="{{  url('admin/student/delete/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
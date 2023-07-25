@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Parent Student List (Total : {{ $getRecord->total() }})</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
          <a href="{{ url('admin/parent/add')}}" class="btn btn-primary">Add new Parent</a>
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

                <div class="form-group col-md-3">
                    <label>Student ID</label>
                    <input type="text" name="id"  value="{{Request::get('id')}}" class="form-control" placeholder="Student ID">
                </div>

                <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" name="name"  value="{{Request::get('name')}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group col-md-3">
                  <label>Last Name</label>
                  <input type="text" name="last_name"  value="{{Request::get('last_name')}}" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group col-md-3">
                  <label>Email</label>
                  <input type="text" name="email"  value="{{Request::get('email')}}" class="form-control" placeholder="Email">
                </div>
                
                <div class="form-group col-md-2">
                  <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                  <a href="{{url('admin/parent/my_student/'.$parent_id)}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                </div>
              </div>
              </div> 
            </form>
          </div>
              

          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
              <div class="m-3 float-right">
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Parent Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Occupation</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
              <div class="m-3 float-right">
            </div>
            </div>
            <!-- /.card-body -->
          </div>
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
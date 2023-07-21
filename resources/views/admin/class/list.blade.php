@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Class List </h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
          <a href="{{ url('admin/class/add')}}" class="btn btn-primary">Add new Class</a>
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
                  <h3 class="card-title">Search Class</h3>
                </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">

                    
                    <div class="form-group col-md-3">
                        <label>Name</label>
                        <input type="text" name="name"  value="{{Request::get('name')}}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="date" name="date"  value="{{Request::get('date')}}" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                      <a href="{{url('admin/class/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>
                  </div>
                  </div>
                  <!-- /.card-body -->
  
                  
                </form>
              </div>
              

          @include('_message')
          <div class="card">
            
            <div class="card-header">
              <h3 class="card-title">All Classes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created By</th>
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
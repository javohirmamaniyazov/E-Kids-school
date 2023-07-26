@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Parent Student List - {{ $getParent->name }}  {{ $getParent->last_name}}</h1>
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
                  <a href="{{url('admin/parent/my-student/'.$parent_id)}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                </div>
              </div>
              </div> 
            </form>
          </div>
              

          @include('_message')
          @if (!empty($getSearchStudent))
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
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getSearchStudent as $item)
                    <tr>
                      <td>{{ $item->id}}</td>
                      <td> 
                        @if (!empty($item->getProfile()))
                            <img src="{{ $item->getProfile()}}" alt="" height="50px" width="50px" style="border-radius: 50%" >
                        @endif
                      </td>
                      <td>{{ $item->name}} {{ $item->last_name}}</td>
                      <td>{{ $item->email}}</td>
                      <td>{{ $item->parent_name}}</td>
                      <td style="min-width: 108px">{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                      <td style="min-width: 101px">
                        <a href="{{  url('admin/parent/assign_student/'.$item->id.'/parent/'.$parent_id)}}" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"> Add to Parent</i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="m-3 float-right">
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          @endif
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
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Parent Name</th>
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
                    <td>{{ $item->parent_name}}</td>
                    <td style="min-width: 108px">{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                    <td style="min-width: 101px">
                      <a href="{{  url('admin/parent/assign_student/'.$item->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fas fa-user-minus"> Delete in Parent</i></a>
                    </td>
                  </tr>
                  @endforeach
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
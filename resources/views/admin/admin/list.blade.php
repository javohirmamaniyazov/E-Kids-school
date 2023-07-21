@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>Admin List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right">
          <a href="{{ url('admin/admin/add')}}" class="btn btn-primary">Add new admin</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Admins</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $item)
                      <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->created_at}}</td>
                        <td>
                          <a href="{{  url('admin/admin/edit/'.$item->id)}}" class="btn btn-warning"><i class="fas fa-solid fa-pen"></i></a>
                          <a href="{{  url('admin/admin/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
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
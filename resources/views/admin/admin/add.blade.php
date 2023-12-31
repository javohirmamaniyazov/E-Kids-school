@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Admin</h1>
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
              <form method="post" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required value="{{ old('name')}}" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required value="{{ old('email')}}" class="form-control" placeholder="Email">
                    <p class="text-danger">{{ $errors->first('email')}}</p>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
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
@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Password</h1>
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
            @include('_message')
            <div class="card card-primary">
              <form method="post" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old_password" required  class="form-control" placeholder="Old Password">
                  </div>

                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" required  class="form-control" placeholder="New Password">
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
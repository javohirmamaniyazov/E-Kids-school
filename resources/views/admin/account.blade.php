@extends('layouts.app')

@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account Informations</h1>
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
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name', $getRecord->name )  }}" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $getRecord->email) }}" class="form-control" placeholder="Email">
                    <p class="text-danger">{{ $errors->first('email')}}</p>
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
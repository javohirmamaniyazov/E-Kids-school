@extends('layouts.app')

@section('content')
    


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 ml-1">
        <div class="col-sm-6">
          <h1>My Student</h1>
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
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Student</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Profile</th>
                    <th>Student Name</th>
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
                    <th>Create Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $item)
                  <tr>
                    <td> 
                        @if (!empty($item->getProfile()))
                            <img src="{{ $item->getProfile()}}" alt="" height="50px" width="50px" style="border-radius: 50%" >
                        @endif
                      </td>
                      <td style="min-width: 130px">{{ $item->name}} {{ $item->last_name}}</td>
                      <td>{{ $item->email}}</td>
                      <td style="min-width: 158px">{{ $item->admission_number}}</td>
                      <td style="min-width: 100px">{{ $item->class_name}}</td>
                      <td>{{ $item->gender}}</td>
                      <td style="min-width: 115px">
                        @if (!empty($item->date_of_birth))
                        {{ date('d-m-Y', strtotime($item->date_of_birth))}}
                        @endif  
                      </td>
                      <td style="min-width: 86px">{{ $item->casta}}</td>
                      <td>{{ $item->religion}}</td>
                      <td style="min-width: 132px">{{ $item->mobile_number}}</td>
                      <td style="min-width: 135px">
                        @if (!empty($item->admission_date))
                        {{ date('d-m-Y', strtotime($item->admission_date))}}
                        @endif   
                      </td>
                      <td style="min-width: 112px">{{ $item->blood_group}}</td>
                      <td>{{ $item->height}}</td>
                      <td>{{ $item->weight}}</td>
                    <td style="min-width: 119px">{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
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
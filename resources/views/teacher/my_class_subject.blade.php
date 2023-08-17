@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ml-1">
                    <div class="col-sm-6">
                        <h1>My Class and Subject</h1>
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
                                <h3 class="card-title">My Class and Subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </thead>
                                    {{-- {{ dd($getRecord) }} --}}
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->class_name }}</td>
                                                <td>{{ $item->subject_name }}</td>
                                                <td>{{ $item->subject_type }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
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

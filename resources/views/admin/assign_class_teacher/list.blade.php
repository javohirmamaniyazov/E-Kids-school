@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ml-1">
                    <div class="col-sm-6">
                        <h1>Assign Class Teacher - ({{$getRecord->total()}})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Add new Assign Class Teacher</a>
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
                                <h3 class="card-title">Search Assign Class Teacher</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="form-group col-md-3">
                                            <label>Class Name</label>
                                            <input type="text" name="class_name" value="{{ Request::get('class_name') }}"
                                                class="form-control" placeholder="Class Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Teacher Name</label>
                                            <input type="text" name="teacher_name" value="{{ Request::get('teacher_name') }}"
                                                class="form-control" placeholder="Teacher Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select Status</option>
                                                <option {{ (Request::get('status') == 100 ) ? 'selected' : ''}} value="100">Active</option>
                                                <option {{ (Request::get('status') == 1 ) ? 'selected' : ''}} value="1">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date</label>
                                            <input type="date" name="date" value="{{ Request::get('date') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </form>
                        </div>
                        @include('_message')
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Assign Class Teacher List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Teacher Name</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- {{ dd($getRecord) }} --}}
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->class_name }}</td>
                                                <td>{{ $item->teacher_name }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_by_name }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/assign_class_teacher/edit/' . $item->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-solid fa-pen"></i></a>
                                                    <a href="{{ url('admin/assign_class_teacher/edit_single/' . $item->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ url('admin/assign_class_teacher/delete/' . $item->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
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

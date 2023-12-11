@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ml-1">
                    <div class="col-sm-6">
                        <h1>My Class and Subject</h1>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">My Class and Subject</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                            <th>My Class Timetable</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $item)
                                            <tr>
                                                @if ($item)
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->class_name }}</td>
                                                    <td>{{ $item->subject_name }}</td>
                                                    <td>{{ $item->subject_type }}</td>
                                                    <td>
                                                        @php
                                                            $ClassSubject = $item->getMyTimeTable($item->class_id, $item->subject_id, $item->id);
                                                        @endphp
                                                        @if (!empty($ClassSubject))
                                                            {{ $ClassSubject->start_time }} to {{ $ClassSubject->end_time }}
                                                            <br>
                                                            Room Number : {{ $ClassSubject->room_number}}
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ url('teacher/my_class_subject/class_timetable/' . $item->class_id . '/' . $item->subject_id) }}"
                                                            class="btn btn-primary">My Class Timetable</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
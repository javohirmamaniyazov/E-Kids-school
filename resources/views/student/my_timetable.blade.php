@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2 ml-1">
            <div class="col-sm-6">
               <h1>My Timetable</h1>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               @include('_message')
               <div class="card">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">My Timetable</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body p-0">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>Week</th>
                                 <th>Start Time</th>
                                 <th>End Time</th>
                                 <th>Room Number</th>
                              </tr>
                           </thead>
                           <tbody>
                              
                           </tbody>
                        </table>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  </form>
                  <!-- /.card-body -->
               </div>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
   $('.getClass').change(function() {
       var class_id = $(this).val();
       $.ajax({
           url: "{{ url('admin/class_timetable/get_subject')}}",
           type: "POST",
           data: {
               "_token":"{{ csrf_token() }}",
               class_id:class_id,
           },
           dataType:"json",
           success:function(response) {
               $('.getSubject').html(response.html);
           },
       });
   });
</script>
@endsection
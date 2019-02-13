@extends('layouts.app')

@section('title')
    All Patient
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{url('/dashboard/plugins/datatables/datatable.min.css')}}">

@endsection

@section('content')
    <div class="card">
        <div class="card-header card-header-icon">
            <i class="fa fa-users fa-2x"></i>
        </div>
        <div class="card-content">
            <h4 class="card-title">All Patient</h4>
        </div>
        <table class="table table-striped" id="datatable">
            <thead>
            <tr>
                <th width="5px">#</th>
                <th>Patient Pic</th>
                <th>Patient Info</th>
                <th>Contact Info</th>
                <th>Medical Info</th>
                {{--<th>Status</th>--}}
                <th width="25px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('extra-js')
    <script src="{{url('/dashboard/plugins/datatables/datatable.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/api/data-table/all-patient') }}",
                "columns": [
                    { "data" : "#"},
                    { "data": "image" },
                    { "data": "patient_info" },
                    { "data": "contact_info" },
                    { "data": "medical_info" },
                    { "data" : "actions"}
                ],
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-default"></span><span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    },
                    sProcessing : '<div class="loading-bro"><h1>Loading</h1><svg id="load" x="0px" y="0px" viewBox="0 0 150 150"><circle id="loading-inner" cx="75" cy="75" r="60"/></svg></div>'
                }

            });

            @if(session('delete_patient'))
                $.Notification.notify('success','top right',"Patient deleted",'Patient has been deleted successfully');
            @endif
        });
    </script>
@endsection
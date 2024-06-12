@extends('layouts.root')
@section('content')
@php
App::setLocale(Auth::user()->lang);
@endphp
<!-- datatable css-->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-autofill/css/autoFill.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-keytable/css/keyTable.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-rowgroup/css/rowGroup.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-rowreorder/css/rowReorder.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-scroller/css/scroller.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/datatables-select/css/select.bootstrap4.min.css')}}">

<!-- datatable js-->

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-autofill/js/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('plugins/datatables-autofill/js/autoFill.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>


<script src="{{asset('plugins/datatables-colreorder/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('plugins/datatables-colreorder/js/colReorder.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js')}}"></script>


<script src="{{asset('plugins/datatables-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('plugins/datatables-keytable/js/keyTable.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-rowgroup/js/dataTables.rowGroup.min.js')}}"></script>
<script src="{{asset('plugins/datatables-rowgroup/js/rowGroup.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-rowreorder/js/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('plugins/datatables-rowreorder/js/rowReorder.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('plugins/datatables-scroller/js/scroller.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/datatables-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('plugins/datatables-select/js/select.bootstrap4.min.js')}}"></script>


{{-- sweetalert2 css --}}
{{-- <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">


{{-- sweetalert2 js --}}
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>



<style>
    .dataedit {
        color: #ff9c00;
    }

    .dataedit:hover {
        color: #ffcf06;
    }

    .dataacc {
        color: #00A000;
    }

    .dataacc:hover {
        color: #ff0712;
    }

    .datadeacc {
        color: #ff0712;
    }

    .datadeacc:hover {
        color: #00A000;
    }
    .key {
        color: #4285F4;
    }

    .key:hover {
        color: #0D47A1;
    }
    table.dataTable tbody tr.selected {
        color: rgb(65, 206, 0) !important;
    }
</style>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000
    });
</script>

@if(Session::has('message'))
<script>
    Toast.fire({
        icon: 'success',
        title: "{{ Session::get('message') }}"
    });
</script>
@elseif(Session::has('error'))
<script>
    Toast.fire({
        icon: 'error',
        title: "{{ Session::get('error') }}"
    });
</script>
@endif


<section class="content">
    <div class="container-fluid">



        <table id="user_table" width="100%" class="table">
            <thead>
                <tr class="table-primary">
                    <th width="18%">ID</th>
                    <th width="16%">Name</th>
                    <th width="18%">nic</th>
                    <th width="15%">Phone</th>
                    <th width="10%">email</th>
                    <th width="12%">Add</th>
                    <th width="10%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)

                    <tr class="table-light">
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->fname.' '.$teacher->lname}}</td>
                        <td>{{$teacher->nic}}</td>
                        <td>{{$teacher->pno}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->address}}</td>
                        @if ($teacher->state=='1')
                            <td align="center" id="del{{$teacher->id}}"><i class="fas fa-check-square dataacc text-xl" onclick="del('{{$teacher->id}}','{{$teacher->state}}')"></i>
                            </td>
                        @else
                            <td align="center" id="del{{$teacher->id}}"><i class="fas fa-window-close datadeacc text-xl" onclick="del('{{$teacher->id}}','{{$teacher->state}}')"></i>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.container-fluid -->
  </section>
<script>


    $(document).ready(function () {
        dataTable = $('#user_table').DataTable({
                dom: 'RBflrtip',
                order:[],
                buttons: [
                    {
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column'
                    },
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',


                ],
                autoFill: true,
                "paging": true,
                "scrollX": true,
                "sScrollX": "100%",
                "sScrollXInner": "100%",
                select: true
            });
        });
        function del(uid,st){
            st= Number(!Boolean(Number(st)));
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{url('/users/task/active')}}",
                type: 'post',
                data:{uid:uid,st:st,_token: _token},
                dataType: 'text',
                success: function (response) {
                    if(response=='1'){
                        if(st==1){
                            $('#del'+uid).html("<i class=\"fas fa-check-square dataacc text-xl\" onclick=\"del('"+uid+"','"+st+"')\"></i>");
                        }else{
                            $('#del'+uid).html("<i class=\"fas fa-window-close datadeacc text-xl\" onclick=\"del('"+uid+"','"+st+"')\"></i>");
                        }

                        Toast.fire({
                            icon: 'success',
                            title: "{{__('language.users.ToastMsg.Success')}}"
                        });
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: "{{__('language.users.ToastMsg.Unsuccess')}}"
                        });
                        console.log(response);
                    }
                },
                error: function (response) {
                    Toast.fire({
                        icon: 'error',
                        title: response.responseText
                    });
                    console.log(response);
                }
            });
        }


</script>

@endsection

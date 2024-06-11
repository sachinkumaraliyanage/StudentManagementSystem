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
            sachin

        @if (Auth::user()->type=='SuperAdmin')
            <div class="form-row">
                <div class="form-group col-md-2 ml-auto">
                    <a href="{{url('/users/create')}}" class="btn btn-success btn-block text-light" style="font-size: x-large;"><span class="fas fa-plus"></span>&nbsp; {{__('language.users.ADD')}}</a>
                </div>
            </div>
        @endif


        <table id="user_table" width="100%" class="table">
            <thead>
                <tr class="table-primary">
                    <th width="18%">{{__('language.users.DataTable.Name')}}</th>
                    <th width="16%">{{__('language.users.DataTable.User_Name')}}</th>
                    <th width="18%">{{__('language.users.DataTable.email')}}</th>
                    <th width="15%">{{__('language.users.DataTable.User_Type')}}</th>
                    <th width="10%">{{__('language.users.DataTable.Active')}}</th>
                    <th width="12%">{{__('language.users.DataTable.Set_password')}}</th>
                    <th width="10%">{{__('language.users.DataTable.Edit')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if(Auth::user()->type!='SuperAdmin' && $user->type=='SuperAdmin')
                        @continue
                    @endif
                    <tr class="table-light">
                        <td>{{$user->fname.' '.$user->lname}}</td>
                        <td>{{$user->uname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        @if ($user->state=='1')
                            <td align="center" id="del{{$user->id}}"><i class="fas fa-check-square dataacc text-xl" onclick="del('{{$user->id}}','{{$user->state}}')"></i>
                            </td>
                        @else
                            <td align="center" id="del{{$user->id}}"><i class="fas fa-window-close datadeacc text-xl" onclick="del('{{$user->id}}','{{$user->state}}')"></i>
                            </td>
                        @endif
                        <td align="center"><span onclick="setpassword('{{$user->id}}','{{$user->uname}}')"><i class="fas fa-key key text-xl"></i></span></td>
                        <td align="center"><a href="{{url('users/'.$user->id.'/edit')}}"><i class="fas fa-edit dataedit text-xl"></i></a></td>

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

        function setpassword(uid, uname) {
            swal.fire({
                title: "{{__('language.users.PasswordchangeBox.title')}}".replace(':atribute',uname),
                html:
                    '<labal for="newpassword">{{__('language.users.PasswordchangeBox.New_Password')}}</labal>'+
                    '<input type="password" id="newpassword" class="swal2-input" autocomplete="off">' +
                    '<labal for="newpasswordcomf">{{__('language.users.PasswordchangeBox.Confirm_Password')}}</labal>'+
                    '<input type="password" id="newpasswordcomf" class="swal2-input" autocomplete="off">',
                confirmButtonText: '{{__('language.users.PasswordchangeBox.Change_Password')}}',
                showCancelButton: true,
                cancelButtonText: '{{__('language.users.PasswordchangeBox.Stop')}}',
                customClass: {
                    confirmButton: 'btn btn-success mr-2',
                    cancelButton: 'btn btn-danger ml-2'
                },
                buttonsStyling: false,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        resolve([
                            $('#newpassword').val(),
                            $('#newpasswordcomf').val()
                        ])
                    })
                },
                onOpen: function () {
                    $('#newpassword').focus()
                }
            }).then(function (result) {
                if (result.value) {
                    let newpassword=$('#newpassword').val();
                    let newpasswordcomf=$('#newpasswordcomf').val();
                    console.log(newpassword,newpasswordcomf);
                    if(newpassword==newpasswordcomf && newpassword!=""){
                        console.log(newpassword,newpasswordcomf,'sachin');
                        let _token   = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: "{{url('/users/task/setpassword')}}",
                            type: 'post',
                            data:{uid:uid,pass:newpassword,_token: _token},
                            dataType: 'text',
                            success: function (response) {
                                if(response=='1'){
                                    Toast.fire({
                                        icon: 'success',
                                        title: "{{__('language.users.ToastMsg.pSuccess')}}"
                                    });
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        title: "{{__('language.users.ToastMsg.pUnsuccess')}}"
                                    });
                                    console.log(response);
                                }
                            },
                            error: function (response) {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.responseText
                                });
                                console.log(response.responseText);
                            }
                        });
                    }else{
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            icon: 'error',
                            title: "{{__('language.users.ToastMsg.error1')}}"
                        });
                    }

                } else if (result.dismiss === Swal.DismissReason.cancel ||result.dismiss === Swal.DismissReason.backdrop) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        icon: 'error',
                        title: "{{__('language.users.ToastMsg.Cansel')}}"
                    });
                }
            }).catch(swal.noop)
        }
</script>

@endsection

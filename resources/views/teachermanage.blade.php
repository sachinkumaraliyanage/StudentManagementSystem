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

{{-- select2 --}}

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

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

{{-- select2 --}}
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>



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
    .select2-container {
        width: 100% !important;
    }
    .select2-container .select2-selection--single{
        height: auto;
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

        <form autocomplete="off"  id="teacherform"
        @if (isset($teacherData))
            action="{{url('/teachers/'.$teacherData->id.'/edit')}}"
            method="post"
        @else
            action="{{url('/teachers/create')}}"
            method="post"
        @endif
        >
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="fname">First Name</label>
              <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname"
                autocomplete="off" autofocus
                @if (isset($teacherData))
                    value="{{ $teacherData->fname}}"
                @else
                    value="{{ old('fname') }}"
                @endif
                >
                @error('fname')
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname"
                    autocomplete="off"
                    @if (isset($teacherData))
                        value="{{ $teacherData->lname}}"
                    @else
                        value="{{ old('lname') }}"
                    @endif
                    >
                    @error('lname')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nic">Nic</label>
                <input type="text" class="form-control @error('nic') is-invalid @enderror" id="nic" name="nic"
                    autocomplete="off"
                    @if (isset($teacherData))
                        value="{{ $teacherData->nic}}"
                    @else
                        value="{{ old('nic') }}"
                    @endif
                    >
                    @error('nic')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group col-md-4">
            <label for="gender">Gender</label>
                <select class="multipleselect form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                    <option value="">&nbsp;</option>
                    @foreach ($genderArray as $gender)
                        @if (isset($teacherData)&& $teacherData->gender==$gender)
                            <option value="{{$gender}}" selected >{{$gender}}</option>
                        @else
                            <option value="{{$gender}}" >{{$gender}} </option>
                        @endif
                    @endforeach
                </select>
                @error('gender')
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
            <label for="name_prefix">Name Prifix</label>
                <select class="multipleselect form-control @error('name_prefix') is-invalid @enderror" id="name_prefix" name="name_prefix">
                    <option value="">&nbsp;</option>
                    @foreach ($namePrefixArray as $name_prefix)
                        @if (isset($teacherData)&& $teacherData->name_prefix==$name_prefix)
                            <option value="{{$name_prefix}}" selected >{{$name_prefix}}</option>
                        @else
                            <option value="{{$name_prefix}}" >{{$name_prefix}} </option>
                        @endif
                    @endforeach
                </select>
                @error('name_prefix')
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="pno">Pno</label>
                <input type="text" class="form-control @error('pno') is-invalid @enderror" id="pno" name="pno"
                    autocomplete="off"
                    @if (isset($teacherData))
                        value="{{ $teacherData->pno}}"
                    @else
                        value="{{ old('pno') }}"
                    @endif
                    >
                    @error('pno')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="pno">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    autocomplete="off"
                    @if (isset($teacherData))
                        value="{{ $teacherData->email}}"
                    @else
                        value="{{ old('email') }}"
                    @endif
                    >
                    @error('email')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>



            <div class="form-group col-md-4">
                <label for="school">School</label>
                <input type="school" class="form-control @error('school') is-invalid @enderror" id="school" name="school"
                    autocomplete="off"
                    @if (isset($teacherData))
                        value="{{ $teacherData->school}}"
                    @else
                        value="{{ old('school') }}"
                    @endif
                    >
                    @error('school')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
                <label for="address">address</label>
                <textarea   rows="3" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    autocomplete="off">
                    @if (isset($teacherData))
                        {{ $teacherData->address}}
                    @else
                        {{ old('address') }}
                    @endif
                    </textarea>
                    @error('address')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="description">description</label>
                <textarea   rows="3" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    autocomplete="off">
                    @if (isset($teacherData))
                        {{ $teacherData->address}}
                    @else
                        {{ old('description') }}
                    @endif
                    </textarea>
                    @error('description')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="">&nbsp;</label>
                @if (isset($teacherData))
                    <button type="submit" class="btn btn-warning btn-block" style=""><span class="fas fa-edit"></span>&nbsp; Edit</button>
                 @else
                    <button type="submit" class="btn btn-success btn-block" style=""><span class="fas fa-plus"></span>&nbsp; Add</button>
                @endif
            </div>

        </div>

        </form>

        <table id="user_table" width="100%" class="table">
            <thead>
                <tr class="table-primary">
                    <th width="5%">ID</th>
                    <th width="16%">Name</th>
                    <th width="15%">nic</th>
                    <th width="15%">Phone</th>
                    <th width="18%">email</th>
                    <th width="20%">Add</th>
                    <th width="6%">Status</th>
                    <th width="6%">Edit</th>
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
                        <td align="center"><a href="{{url('/teachers/'.$teacher->id.'/edit')}}"><i class="fas fa-edit dataedit text-xl"></i></a></td>
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
            $('.multipleselect').select2({

            });
        });
        function del(tid,st){
            st= Number(!Boolean(Number(st)));
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{url('/teachers/active')}}",
                type: 'post',
                data:{tid:tid,st:st,_token: _token},
                dataType: 'text',
                success: function (response) {
                    if(response=='1'){
                        if(st==1){
                            $('#del'+tid).html("<i class=\"fas fa-check-square dataacc text-xl\" onclick=\"del('"+tid+"','"+st+"')\"></i>");
                        }else{
                            $('#del'+tid).html("<i class=\"fas fa-window-close datadeacc text-xl\" onclick=\"del('"+tid+"','"+st+"')\"></i>");
                        }

                        Toast.fire({
                            icon: 'success',
                            title: "Teacher Status Changed Successfully"
                        });
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: "Teacher Status Change Failed"
                        });
                        console.warn();(response);
                    }
                },
                error: function (response) {
                    Toast.fire({
                        icon: 'error',
                        title: response.responseText
                    });
                    console.error(response);
                }
            });
        }


</script>

@endsection

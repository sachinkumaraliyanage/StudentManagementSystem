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

        <form autocomplete="off"  id="studentform"
        @if (isset($studentData))
            action="{{url('/students/'.$studentData->id.'/edit')}}"
            method="post"
        @else
            action="{{url('/students/create')}}"
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
                    value="{{ $studentData->fname}}"
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
                    @if (isset($studentData))
                        value="{{ $studentData->lname}}"
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
                <label for="gender">Gender</label>
                    <select class="multipleselect form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                        <option value="">&nbsp;</option>
                        @foreach ($genderArray as $gender)
                            @if (isset($studentData)&& $studentData->gender==$gender)
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
                    <label for="student_phone">Student Phone</label>
                    <input type="text" class="form-control @error('student_phone') is-invalid @enderror" id="student_phone" name="student_phone"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->student_phone}}"
                        @else
                            value="{{ old('student_phone') }}"
                        @endif
                        >
                        @error('student_phone')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="dob">Student's Birthday</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->dob}}"
                        @else
                            value="{{ old('dob') }}"
                        @endif
                        >
                        @error('dob')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="nic">Student's NIC</label>
                    <input type="text" class="form-control @error('nic') is-invalid @enderror" id="nic" name="nic"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->nic}}"
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
                    <label for="school">School</label>
                    <textarea   rows="3" class="form-control @error('school') is-invalid @enderror" id="school" name="school"
                        autocomplete="off">
                        @if (isset($studentData))
                            {{ $studentData->school}}
                        @else
                            {{ old('school') }}
                        @endif
                        </textarea>
                        @error('school')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->email}}"
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
                    <label for="address">Address</label>
                    <textarea   rows="3" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                        autocomplete="off">
                        @if (isset($studentData))
                            {{ $studentData->address}}
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
                    <label for="Parent_name">Parent's Name</label>
                    <input type="text" class="form-control @error('Parent_name') is-invalid @enderror" id="Parent_name" name="Parent_name"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->Parent_name}}"
                        @else
                            value="{{ old('Parent_name') }}"
                        @endif
                        >
                        @error('Parent_name')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>


                <div class="form-group col-md-4">
                    <label for="parent_phone">Parent's Phone</label>
                    <input type="text" class="form-control @error('parent_phone') is-invalid @enderror" id="parent_phone" name="parent_phone"
                        autocomplete="off"
                        @if (isset($studentData))
                            value="{{ $studentData->parent_phone}}"
                        @else
                            value="{{ old('parent_phone') }}"
                        @endif
                        >
                        @error('parent_phone')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="parent_address">Address</label>
                    <textarea   rows="3" class="form-control @error('parent_address') is-invalid @enderror" id="parent_address" name="parent_address"
                        autocomplete="off">
                        @if (isset($studentData))
                            {{ $studentData->parent_address}}
                        @else
                            {{ old('parent_address') }}
                        @endif
                        </textarea>
                        @error('parent_address')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group col-md-4">
                <label for="parent_nic">Parent's NIC</label>
                <input type="text" class="form-control @error('parent_nic') is-invalid @enderror" id="parent_nic" name="parent_nic"
                    autocomplete="off"
                    @if (isset($studentData))
                        value="{{ $studentData->parent_nic}}"
                    @else
                        value="{{ old('parent_nic') }}"
                    @endif
                    >
                    @error('parent_nic')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

           
            <div class="form-group col-md-4">
                <label for="parent_email">Parent's Email</label>
                <input type="parent_email" class="form-control @error('parent_email') is-invalid @enderror" id="parent_email" name="parent_email"
                    autocomplete="off"
                    @if (isset($studentData))
                        value="{{ $studentData->parent_email}}"
                    @else
                        value="{{ old('parent_email') }}"
                    @endif
                    >
                    @error('parent_email')
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group col-md-4">
            </div>



            <div class="form-group col-md-4">
                <label for="">&nbsp;</label>
                @if (isset($studentData))
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
                    <th width="15%">Gender</th>
                    <th width="15%">Student Phone</th>
                    <th width="18%">email</th>
                    <th width="20%">Parent Name</th>
                    <th width="20%">Parent Address</th>
                    <th width="20%">Parent Phone</th>
                    <th width="6%">Status</th>
                    <th width="6%">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)

                    <tr class="table-light">
                        <td>{{$student->id}}</td>
                        <td>{{$student->fname.' '.$student->lname}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->student_phone}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->parent_name}}</td>
                        <td>{{$student->parent_address}}</td>
                        <td>{{$student->parent_phone}}</td>
                        @if ($student->state=='1')
                            <td align="center" id="del{{$student->id}}"><i class="fas fa-check-square dataacc text-xl" onclick="del('{{$student->id}}','{{$student->state}}')"></i>
                            </td>
                        @else
                            <td align="center" id="del{{$student->id}}"><i class="fas fa-window-close datadeacc text-xl" onclick="del('{{$student->id}}','{{$student->state}}')"></i>
                            </td>
                        @endif
                        <td align="center"><a href="{{url('/students/'.$student->id.'/edit')}}"><i class="fas fa-edit dataedit text-xl"></i></a></td>
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
                url: "{{url('/students/active')}}",
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
                            title: "Student Status Changed Successfully"
                        });
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: "Student Status Change Failed"
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

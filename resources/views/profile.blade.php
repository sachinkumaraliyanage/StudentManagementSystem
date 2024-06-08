@extends('layouts.root')
@section('content')
@php
App::setLocale(Auth::user()->lang);
App::setFallbackLocale(Auth::user()->lang);
@endphp
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

        <form autocomplete="off"  method="POST"  id="userform"
        @if (isset($add))
            action="{{url('/users/create')}}"
        @elseif(isset($profile))
            action="{{url('/users/show')}}"
        @elseif(isset($user))
            action="{{url('/users/'.$user->id.'/edit')}}"
        @endif
        >
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="fname">{{__('language.profile.First_name')}}</label>
                  <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname"
                  autocomplete="off" autofocus
                  @if (isset($user))
                    value="{{ $user->fname}}"

                  @else
                    value="{{ old('fname') }}"
                  @endif

                  >
                  @isset($user)
                    <input type="hidden" id="id" name="id" value="{{$user->id}}">
                  @endisset

                    @error('fname')

                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    @isset($user)
                        @error('id')

                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                    @endisset
                </div>
                <div class="form-group col-md-4">
                  <label for="lname">{{__('language.profile.Last_Name')}}</label>
                  <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname"
                  autocomplete="off"
                  @if (isset($user))
                    value="{{ $user->lname}}"
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
                    <label for="uname">{{__('language.profile.User_Name')}}</label>
                    <input type="text" class="form-control @error('uname') is-invalid @enderror" id="uname" name="uname"
                    autocomplete="off"
                    @if (isset($user))
                      value="{{ $user->uname}}"
                    @else
                      value="{{ old('uname') }}"
                    @endif
                    >
                      @error('uname')

                          <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>

                      @enderror
                  </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">{{__('language.profile.email')}}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    autocomplete="off"
                    @if (isset($user))
                      value="{{ $user->email}}"
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
                  <div class="form-group col-md-6">
                      <label for="type">{{__('language.profile.User_Type')}}</label>
                      <select class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                      @isset($profile)
                          disabled
                      @endisset>
                      @foreach ($typelist as $type)
                        <option value="{{$type}}"
                            @if (old('type')!=null&& old('type')==$type)
                                selected
                            @elseif(isset($user)&& $user->type==$type))
                                selected
                            @endif>
                            {{$type}}</option>
                      @endforeach
                      </select>

                        @error('type')

                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="display">{{__('language.profile.Customer_Display_Name')}}</label>
                    <input type="text" class="form-control" id="display" name="display"
                    autocomplete="off"
                    @if (isset($user))
                      value="{{ $user->display}}"
                    @else
                      value="{{ old('display') }}"
                    @endif
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="printer">{{__('language.profile.Printer_Name')}}</label>
                    <input type="text" class="form-control" id="printer" name="printer"
                    autocomplete="off"
                    @if (isset($user))
                      value="{{ $user->printer}}"
                    @else
                      value="{{ old('printer') }}"
                    @endif
                    >
                </div>

            </div>
            @isset($add)
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">{{__('language.profile.Password')}}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        autocomplete="off"
                        >
                        @error('password')

                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">{{__('language.profile.Confirm_Password')}}</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                        autocomplete="off"
                        >
                        </div>

                </div>
              @endisset
            <div align="center" @isset($profile) class="row" @endisset>
                <div class="col-md-6 text-center">
                    @if (isset($user))
                        <button type="submit" class="btn btn-warning btn-block" style="font-size: x-large;"><span class="fas fa-edit"></span>&nbsp; {{__('language.profile.Edit')}}</button>
                    @else
                        <button type="submit" class="btn btn-success btn-block" style="font-size: x-large;"><span class="fas fa-plus"></span>&nbsp; {{__('language.profile.ADD')}}</button>
                    @endif

                </div>
                @isset($profile)
                    <div class="col-md-6 text-center">
                        <button onclick="event.preventDefault();setpassword()" class="btn btn-primary btn-block" style="font-size: x-large;"><span class="fas fa-key"></span>&nbsp; {{__('language.profile.Change_Password')}}</button>
                    </div>
                @endisset
            </div>
        </form>

    </div><!-- /.container-fluid -->
  </section>
<script>

        function setpassword() {
            swal.fire({
                title: '{{__('language.profile.PasswordchangeBox.Change_Password')}}',
                html:
                    '<labal for="oldpass">{{__('language.profile.PasswordchangeBox.Current_Password')}}</labal>'+
                    '<input type="password" id="oldpass" class="swal2-input" autocomplete="off">' +
                    '<labal for="newpassword">{{__('language.profile.PasswordchangeBox.New_Password')}}</labal>'+
                    '<input type="password" id="newpassword" class="swal2-input" autocomplete="off">' +
                    '<labal for="newpasswordcomf">{{__('language.profile.PasswordchangeBox.Confirm_Password')}}</labal>'+
                    '<input type="password" id="newpasswordcomf" class="swal2-input" autocomplete="off">',
                confirmButtonText: '{{__('language.profile.PasswordchangeBox.Change_Password')}}',
                showCancelButton: true,
                cancelButtonText: '{{__('language.profile.PasswordchangeBox.Stop')}}',
                customClass: {
                    confirmButton: 'btn btn-success mr-2',
                    cancelButton: 'btn btn-danger ml-2'
                },
                buttonsStyling: false,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        resolve([
                            $('#oldpass').val(),
                            $('#newpassword').val(),
                            $('#newpasswordcomf').val()
                        ])
                    })
                },
                onOpen: function () {
                    $('#oldpass').focus()
                }
            }).then(function (result) {
                if (result.value) {
                    let oldpass=$('#oldpass').val();
                    let newpassword=$('#newpassword').val();
                    let newpasswordcomf=$('#newpasswordcomf').val();
                    console.log(newpassword,newpasswordcomf);
                    if(newpassword==newpasswordcomf){
                        let _token   = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: "{{url('/users/task/chengepasword')}}",
                            type: 'post',
                            data:{oldpass:oldpass,pass:newpassword,_token: _token},
                            dataType: 'text',
                            success: function (response) {
                                if(response=='1'){
                                    Toast.fire({
                                        icon: 'success',
                                        title: "{{__('language.profile.ToastMsg.Success')}}"
                                    });
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        title: response
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
                            title: "{{__('language.profile.ToastMsg.error1')}}"
                        });
                    }

                } else if (result.dismiss === Swal.DismissReason.cancel ||result.dismiss === Swal.DismissReason.backdrop) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        icon: 'error',
                        title: "{{__('language.profile.ToastMsg.Cansel')}}"
                    });
                }
            }).catch(swal.noop)
        }
</script>

@endsection

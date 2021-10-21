@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection--multiple{
            min-height: 46px !important;
            border-color: #ced4da !important;
        }
        input[type='file']{
            opacity: 1;
            font-size: 15px;
        }
    </style>

@endsection
@section('content')


    <section class="section section-sm">
        <div class="container pt-5">

            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center">Edit Group</h1>
                </div>
            </div>
            <form role="form" enctype="multipart/form-data" action="{{route('group.update',$editGroup->id)}}" method="POST">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control " name="name" placeholder=""  value="{{$editGroup->name}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Select Group Members</label>
                        <div class="input-group">
                            <select class="form-control select2" multiple="multiple"
                                    name="members[]" id="" >
                                @foreach($members as $member)
                                    <option value="{{$member->id}}"  {{in_array($member->id , $editGroup->members()->pluck('user_id')->toArray()) ? 'selected' : ''}}>
                                        {{$member->name}}</option>
                                @endforeach
                            </select>
                            <div class="select2-selection" style="display: none;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Image</label>
                        <div class="input-group">

                            <input type="file" class="form-control " name="image" placeholder=""  value="{{old($editGroup->image)}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Cover Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control " name="cover_image" placeholder=""  value="{{old($editGroup->cover_image)}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 4px;">
                        <label for="">Description</label>
                        <div class="input-group">

                            <textarea class="form-control" name="desc"  style="width: 100%;height: 140px;">{{$editGroup->description}}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark  " style="width: 20%;color: #fff3cd; margin: auto; margin-top: 30px; padding: 10px;">Edit Group</button>

                </div>
            </form>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(function () {
            $('.select2').select2({
                placeholder: "select"
            })
        })
    </script>
        @if (session('noty_error'))
            <script type="text/javascript">
                swal({
                    title: "{{ trans('general.error_oops') }}",
                    text: "{{ trans('general.already_sent_report') }}",
                    type: "error",
                    confirmButtonText: "{{ trans('users.ok') }}"
                });
            </script>
        @endif

        @if (session('noty_success'))
            <script type="text/javascript">
                swal({
                    title: "{{ trans('general.thanks') }}",
                    text: "{{ trans('general.reported_success') }}",
                    type: "success",
                    confirmButtonText: "{{ trans('users.ok') }}"
                });
            </script>
        @endif

        @if (session('success_verify'))
            <script type="text/javascript">
                swal({
                    title: "{{ trans('general.welcome') }}",
                    text: "{{ trans('users.account_validated') }}",
                    type: "success",
                    confirmButtonText: "{{ trans('users.ok') }}"
                });
            </script>
        @endif

        @if (session('error_verify'))
            <script type="text/javascript">
                swal({
                    title: "{{ trans('general.error_oops') }}",
                    text: "{{ trans('users.code_not_valid') }}",
                    confirmButtonText: "{{ trans('users.ok') }}"
                });
            </script>
        @endif   type: "error",


@endsection

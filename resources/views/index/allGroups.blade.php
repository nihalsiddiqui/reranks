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
                <div class="col-md-12" style="margin-bottom: 30px;">
                    <h1 style="text-align: center">All Groups</h1>
                </div>
            </div>

            <div class="row" style="margin-bottom: 30px;">
                @foreach($groups as $group)
                <div class="col-md-3 col-sm-12">

{{--                        @dd($group->cover_image);--}}

                   <a href="{{route('group.profile',$group->id) }}"  class="" style="color: #0a0a0a;text-decoration: none;" >
                    <div class="card" style="margin-bottom: 20px; box-shadow: 2px 2px 6px 6px grey">
                        <img src="{{asset($group->cover_image)}}" height="160px;">
                        <div class="card-body" style="padding: 15px;">
                                <h5 style="font-weight: normal!important;">{{$group->name}}</h5>
                                <p>{{$group->members->count()}} members </p>
{{--                            - 140 posts a day--}}
{{--                            <p><span><i class="fas fa-user mr-2"></i></span>32 friends are members</p>--}}
                        </div>
{{--                            <div class="card-footer" style="border-top: none!important;justify-content: space-between;flex-flow: row;display: flex;">--}}
{{--                                <a href="" class="btn btn-lg" style="border-radius: 1rem!important;background: #46b8da;color: #fff;">Join</a>--}}
{{--                                <a href="" class="btn btn-lg btn-secondary" style="border-radius: 1rem!important;color: #fff;">Preview</a>--}}
{{--                            </div>--}}
                    </div>
                   </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center" >
                    {{ $groups->links()}}
                </div>
            </div>
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
    {{--    @if (session('noty_error'))--}}
    {{--        <script type="text/javascript">--}}
    {{--            swal({--}}
    {{--                title: "{{ trans('general.error_oops') }}",--}}
    {{--                text: "{{ trans('general.already_sent_report') }}",--}}
    {{--                type: "error",--}}
    {{--                confirmButtonText: "{{ trans('users.ok') }}"--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif--}}

    {{--    @if (session('noty_success'))--}}
    {{--        <script type="text/javascript">--}}
    {{--            swal({--}}
    {{--                title: "{{ trans('general.thanks') }}",--}}
    {{--                text: "{{ trans('general.reported_success') }}",--}}
    {{--                type: "success",--}}
    {{--                confirmButtonText: "{{ trans('users.ok') }}"--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif--}}

    {{--    @if (session('success_verify'))--}}
    {{--        <script type="text/javascript">--}}
    {{--            swal({--}}
    {{--                title: "{{ trans('general.welcome') }}",--}}
    {{--                text: "{{ trans('users.account_validated') }}",--}}
    {{--                type: "success",--}}
    {{--                confirmButtonText: "{{ trans('users.ok') }}"--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif--}}

    {{--    @if (session('error_verify'))--}}
    {{--        <script type="text/javascript">--}}
    {{--            swal({--}}
    {{--                title: "{{ trans('general.error_oops') }}",--}}
    {{--                text: "{{ trans('users.code_not_valid') }}",--}}
    {{--                confirmButtonText: "{{ trans('users.ok') }}"--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif   type: "error",--}}


@endsection

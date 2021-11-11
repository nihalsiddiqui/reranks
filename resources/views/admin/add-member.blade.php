@extends('admin.layout')

@section('css')
    <link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                {{ trans('admin.admin') }}
                <i class="fa fa-angle-right margin-separator"></i>
                Add Member

                <i class="fa fa-angle-right margin-separator"></i>
{{--                {{ $data->name }}--}}
            </h4>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="content">

                <div class="row">

                    <div class="col-md-12">

                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Member</h3>
                            </div><!-- /.box-header -->

                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/members/') }}" enctype="multipart/form-data">
                                @csrf

                            @include('errors.errors-forms')

                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Name" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            <!-- Start Box Body -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ trans('admin.verified') }}</label>
                                        <div class="col-sm-10">
                                            <select name="verified" class="form-control">
                                                <option  value="no">{{ trans('admin.pending') }}</option>
                                                <option  value="yes">{{ trans('admin.verified') }}</option>
                                                <option  value="reject">{{ trans('admin.reject') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->

                                <!-- Start Box Body -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ trans('admin.status') }}</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                <option  value="pending">{{ trans('admin.pending') }}</option>
                                                <option  value="active">{{ trans('admin.active') }}</option>
                                                <option  value="suspended">{{ trans('admin.suspended') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->

                                <!-- Start Box Body -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ trans('admin.role') }}</label>
                                        <div class="col-sm-10">
                                            <select name="role[]" class="form-control" >
                                                @foreach($roles as $role)
{{--                                                    <option  value="normal" hidden>{{trans('admin.normal')}}</option>--}}
{{--                                                    <option  value="user" hidden>{{trans('admin.visitor')}}</option>--}}
{{--                                                    <option  value="admin" hidden>{{trans('admin.role_admin')}}</option>--}}
                                                    <option  value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div><!-- /.box-body -->

{{--                            @if ($data->verified_id == 'yes')--}}
                                <!-- Start Box Body -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ trans('general.custom_fee') }}</label>
                                            <div class="col-sm-10">
                                                <select name="custom_fee" class="form-control">
                                                    <option  value="0" >{{__('general.none')}}</option>
                                                    @for ($i=1; $i <= 50; ++$i)
                                                        <option  value="{{$i}}">{{$i}}%</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <!-- Start Box Body -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ trans('general.featured')  }}</label>
                                            <div class="col-sm-10">

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="featured"  value="yes">
                                                        {{ trans('general.yes')  }}
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="featured"  value="no">
                                                        {{ trans('general.no')  }}
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
{{--                                @endif--}}

                                <div class="box-footer">
                                    <a href="{{ url('panel/admin/members') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                    <button type="submit" class="btn btn-success pull-right">{{ trans('admin.save') }}</button>
                                </div><!-- /.box-footer -->
                            </form>
                        </div>

                    </div><!-- /. col-md-9 -->

{{--                    <div class="col-md-3">--}}

{{--                        <div class="block-block text-center">--}}
{{--                            <img src="{{Helper::getFile(config('path.avatar'))}}" class="thumbnail img-responsive">--}}
{{--                        </div>--}}

{{--                        @php--}}

{{--                            if ($data->status == 'pending') {--}}
{{--                              $_status = trans('admin.pending');--}}
{{--                            } elseif ($data->status == 'active') {--}}
{{--                              $_status = trans('admin.active');--}}
{{--                            } else {--}}
{{--                              $_status = trans('admin.suspended');--}}
{{--                            }--}}

{{--                        @endphp--}}

{{--                        <ol class="list-group">--}}
{{--                            <li class="list-group-item"> {{trans('admin.registered')}} <span class="pull-right color-strong">{{ Helper::formatDate($data->date) }}</span></li>--}}

{{--                            <li class="list-group-item"> {{trans('admin.status')}} <span class="pull-right color-strong">{{ $_status }}</span></li>--}}

{{--                            <li class="list-group-item"> {{trans('general.country')}} <span class="pull-right color-strong">@if( $data->countries_id != '' ) {{ $data->country()->country_name }} @else {{ trans('admin.not_established') }} @endif</span></li>--}}

{{--                            <li class="list-group-item"> {{trans('general.gender')}} <span class="pull-right color-strong">{{ $data->gender ? __('general.'.$data->gender) : __('general.not_specified') }}</span></li>--}}

{{--                            <li class="list-group-item"> {{trans('general.birthdate')}} <span class="pull-right color-strong">{{ $data->birthdate ? $data->birthdate : __('general.no_available') }}</span></li>--}}

{{--                        </ol>--}}

{{--                        <div class="block-block text-center">--}}

{{--                            <a href="{{url($data->username)}}" target="_blank"class="btn btn-lg btn-success btn-block margin-bottom">--}}
{{--                                {{trans('general.go_to_page')}}--}}
{{--                            </a>--}}

{{--                            @if ($data->status == 'pending')--}}
{{--                                <a href="{{url('panel/admin/resend/email', $data->id)}}" class="btn btn-lg btn-default btn-block margin-bottom">--}}
{{--                                    {{trans('general.resend_confirmation_email')}}--}}
{{--                                </a>--}}
{{--                            @endif--}}

{{--                            {!! Form::open([--}}
{{--                                  'method' => 'post',--}}
{{--                                  'url' => ['panel/admin/login/user', $data->id],--}}
{{--                                  'class' => 'displayInline'--}}
{{--                                ]) !!}--}}
{{--                            {!! Form::submit(trans('general.login_as_user'), ['class' => 'btn btn-lg btn-info btn-block margin-bottom loginAsUser']) !!}--}}
{{--                            {!! Form::close() !!}--}}

{{--                            {!! Form::open([--}}
{{--                              'method' => 'DELETE',--}}
{{--                              'route' => ['user.destroy', $data->id],--}}
{{--                              'class' => 'displayInline'--}}
{{--                            ]) !!}--}}
{{--                            {!! Form::submit(trans('admin.delete'), ['data-url' => $data->id, 'class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']) !!}--}}
{{--                            {!! Form::close() !!}--}}
{{--                        </div>--}}
{{--                    </div><!-- col-md-3 -->--}}
                </div><!-- /.row -->
            </div><!-- /.content -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection

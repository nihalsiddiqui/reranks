@extends('admin.layout')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection--multiple{
            border-color: #ced4da !important;
        }
        .select2-selection__choice{
            color: black!important;
        }

    </style>@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                {{ trans('admin.admin') }}
                <i class="fa fa-angle-right margin-separator"></i>
                {{ trans('admin.role') }}
                <i class="fa fa-angle-right margin-separator"></i>
                {{ trans('general.edit-role') }}
            </h4>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="content">

                <div class="row">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('general.add_new') }}</h3>
                        </div><!-- /.box-header -->


                        <!-- form start -->
                        <form class="form-horizontal" enctype="multipart/form-data" method="post"  action="{{ url('panel/admin/update/role',$data->id) }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(Session::has('success'))
                                <div class="alert alert-success p-1">{{ Session::get('success') }}</div>
                        @endif

                        @include('errors.errors-forms')

                        <!-- Start Box Body -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ trans('admin.name') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{$data->name}}" name="name" required class="form-control"
                                               placeholder="">
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <!-- Start Box Body -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ trans('admin.permission') }}</label>
                                    <div class="col-sm-10">

                                        <select class="select2 form-control" required multiple="multiple" name="permission[]" >
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}" {{ in_array($permission->id, $data->permissions()->get()->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div><!-- /.box-body -->


                            <div class="box-footer">
                                <a href="{{ url('panel/admin/languages') }}"
                                   class="btn btn-default">{{ trans('admin.cancel') }}</a>
                                <button type="submit"
                                        class="btn btn-success pull-right">{{ trans('admin.save') }}</button>
                            </div><!-- /.box-footer -->
                        </form>
                    </div>

                </div><!-- /.row -->

            </div><!-- /.content -->

            <!-- Your Page Content Here -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
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

@endsection

@extends('admin.layout')

@section('css')
    <link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                {{ trans('admin.admin') }}
                <i class="fa fa-angle-right margin-separator"></i>
                Type
                <i class="fa fa-angle-right margin-separator"></i>
                {{ trans('general.add_new') }}
            </h4>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="content">

                <div class="row">

                    <div class="box p-top-20">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{ url('panel/admin/store/society') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('errors.errors-forms')

                        <!-- Start Box Body -->


                                                        <div class="box-body ">
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @endif
                                <div class="col-md-12">
                                       <div class="form-group ">

                                           <div class="col-md-6">
                                               <label class="col-form-label control-label">Name</label>
                                               <input type="text" value="{{ old('name') }}" required name="name" class="form-control" placeholder="name">
                                           </div>
                                      <div class="col-md-6">
                                          <label class="col-form-label control-label">Address</label>
                                          <input type="text" value="{{ old('address') }}" required name="address" class="form-control" placeholder="address">
                                      </div>
                                       </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label">City</label>
                                                <input type="text" value="{{ old('city') }}" required name="city"
                                                       class="form-control" placeholder="city">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label">Date</label>
                                                <input type="date" value="{{ old('date') }}" required name="date"
                                                       class="form-control" placeholder="date">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-form-label control-label text-capitalize">distance from airport</label>
                                            <input type="text" value="{{ old('distance_from_airport') }}" required name="distance_from_airport"
                                                   class="form-control" placeholder="distance_from_airport">
                                        </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">distance from city center</label>
                                                <input type="text" value="{{ old('distance_from_city_center') }}" required name="distance_from_city_center"
                                                       class="form-control" placeholder="distance_from_city_center">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">distance from railway</label>
                                                <input type="text" value="{{ old('distance_from_railway') }}" required name="distance_from_railway"
                                                       class="form-control" placeholder="distance_from_railway">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">distance from motorway</label>
                                                <input type="text" value="{{ old('distance_from_motorway') }}" required name="distance_from_motorway"
                                                       class="form-control" placeholder="distance_from_motorway">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">factory area</label>
                                                <input type="text" value="{{ old('factory_area') }}" required name="factory_area"
                                                       class="form-control" placeholder="factory_area">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">possession by developers</label>
                                                <input type="text" value="{{ old('possession_by_developers') }}" required name="possession_by_developers"
                                                       class="form-control" placeholder="possession_by_developers">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">market trending zone</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                          <div class="col-md-6">
                                              <label class="col-form-label control-label text-capitalize">locality region value</label>
                                              <select name="type" required class="form-control" id="">
                                                  <option value="" selected disabled>Select Type</option>
                                                  {{--                                                @foreach($types as $type)--}}
                                                  <option value="0">0</option>
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5">5</option>
                                                  <option value="6">6</option>
                                                  {{--                                                @endforeach--}}
                                              </select>
                                          </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <div class="col-md-6">
                                               <label class="col-form-label control-label text-capitalize">rain flood zone</label>
                                               <select name="type" required class="form-control" id="">
                                                   <option value="" selected disabled>Select Type</option>
                                                   {{--                                                @foreach($types as $type)--}}
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>

                                                   {{--                                                @endforeach--}}
                                               </select>
                                           </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">earthquake zone</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">industrial zone</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">scenic view</label>
                                                    <select name="type" required class="form-control" id="">
                                                        <option value="" selected disabled>Select Type</option>
                                                        {{--                                                @foreach($types as $type)--}}
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        {{--                                                @endforeach--}}
                                                    </select>

                                                </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">air quality</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">water quality</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <div class="col-md-6">
                                               <label class="col-form-label control-label text-capitalize">green energy level</label>
                                               <select name="type" required class="form-control" id="">
                                                   <option value="" selected disabled>Select Type</option>
                                                   {{--                                                @foreach($types as $type)--}}
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>

                                                   {{--                                                @endforeach--}}
                                               </select>
                                           </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">roads in society</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">sewerage</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">smart city level</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">project maintenances level</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">electricity cost</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">thread zone</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">financially growth</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <div class="col-md-6">
                                               <label class="col-form-label control-label text-capitalize">rental income</label>
                                               <select name="type" required class="form-control" id="">
                                                   <option value="" selected disabled>Select Type</option>
                                                   {{--                                                @foreach($types as $type)--}}
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>

                                                   {{--                                                @endforeach--}}
                                               </select>
                                           </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">strength of developers</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">transfer expense</label>
                                                    <select name="type" required class="form-control" id="">
                                                        <option value="" selected disabled>Select Type</option>
                                                        {{--                                                @foreach($types as $type)--}}
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>

                                                        {{--                                                @endforeach--}}
                                                    </select>
                                                </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">transfer mechanism</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">market trust</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>

                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">competency of developer</label>
                                                <select name="type" required class="form-control" id="">
                                                    <option value="" selected disabled>Select Type</option>
                                                    {{--                                                @foreach($types as $type)--}}
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    {{--                                                @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="col-md-6">
                                            <label class="col-form-label control-label text-capitalize">feedback about society</label>
                                            <select name="type" required class="form-control" id="">
                                                <option value="" selected disabled>Select Type</option>
                                                {{--                                                @foreach($types as $type)--}}
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>

                                                {{--                                                @endforeach--}}
                                            </select>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-form-label control-label text-capitalize">green area percentage</label>

                                            <div class="radio">
                                                <label class="padding-zero">
                                                    <input type="radio" name="green_area_percentage" value="on" checked>
                                                    {{ trans('general.yes') }}
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label class="padding-zero">
                                                    <input type="radio" name="green_area_percentage" value="off">
                                                    {{ trans('general.no') }}
                                                </label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">down payment</label>

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="down_payment" value="on" checked>
                                                        {{ trans('general.yes') }}
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="down_payment" value="off">
                                                        {{ trans('general.no') }}
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label control-label text-capitalize">installment plan</label>

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="installment_plan" value="on" checked>
                                                        {{ trans('general.yes') }}
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label class="padding-zero">
                                                        <input type="radio" name="installment_plan" value="off">
                                                        {{ trans('general.no') }}
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">water bed feet</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="water_bed_feet" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="water_bed_feet" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">total area society</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="total_area_society" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="total_area_society" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">project completion year</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="project_completion_year" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="project_completion_year" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">population percentage</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="population_percentage" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="population_percentage" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize">number of parks</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="number_of_parks" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="number_of_parks" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label control-label text-capitalize"> successfully delivered by developer</label>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="_successfully_delivered_by_developer" value="on" checked>
                                                            {{ trans('general.yes') }}
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class="padding-zero">
                                                            <input type="radio" name="_successfully_delivered_by_developer" value="off">
                                                            {{ trans('general.no') }}
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                            </div><!-- /.box-body -->


{{--                            <!-- Start Box Body -->--}}
{{--                            <div class="box-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="col-sm-2 control-label">{{ trans('admin.description') }}</label>--}}
{{--                                    <div class="col-sm-10">--}}

{{--                                        <textarea name="description" rows="5" cols="40" class="form-control"--}}
{{--                                                  placeholder="{{ _('Description') }}">{{ old('description') }}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- /.box-body -->--}}

                            <div class="box-footer">
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
    <script src="{{ asset('public/admin/js/ckeditor-init.js')}}"></script>
@endsection

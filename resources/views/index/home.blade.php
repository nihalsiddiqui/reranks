@extends('layouts.app')

@section('content')
  <!-- jumbotron -->
  <div class="jumbotron homepage m-0 bg-gradient">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 ">
{{--          <h1 class="display-4 pt-5 mb-3 text-white">{{trans('general.welcome_title')}}</h1>--}}
{{--          <p class="text-white">{{trans('general.subtitle_welcome')}}</p>--}}
{{--          <p>--}}
{{--            <a href="{{url('creators')}}" class="btn btn-lg btn-primary btn-w-mb px-4 mr-2" role="button">{{trans('general.explore')}}</a>--}}

{{--            <a href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}" class="btn btn-lg btn-main btn-outline-light btn-w px-4">--}}
{{--              {{trans('general.getting_started')}} <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small></a>--}}
{{--          </p>--}}

            <div class="input-box">
                <div class="input-group">
                    <input type="search" style="text-transform: uppercase;border-radius: 25px;height: 50px" id="search"
                           name="search_query"
                           class="form-control typeahead " autocomplete="off"
                           placeholder="Socties Ranking...." aria-label="..."
                           value="{{ Request::get('search_query') }}">
                    <span class="input-group-btn">
                                                <span id="search_Button" class="btn btn-lg form-control"
                                                      style="background: #D0191D;border-radius: 50%;height: 50px;width: 50px;padding: 0;padding-top: 5px;">
                                                    <i class="fa fa-search" style="color: white;margin-top: 8px;"></i>
                                                </span>
                                                <input type="submit" hidden name="" id="form_submit">
                                            </span>

                    <a class="button"
                       style="padding: 10px;background: #D0191D; border-radius: 50%;"
                       data-toggle="modal" data-target="#myModal">
{{--                        <img style="" src="{{asset("images/filter.svg")}}" alt="">--}}
                        <span> <i class="fas fa-2x text-white fa-sort-amount-up-alt"></i></span>
                    </a>
                </div>

            </div>
        </div>
{{--        <div class="col-lg-7 first">--}}
{{--          <img src="{{url('public/img', $settings->home_index)}}" class="img-center img-fluid">--}}
{{--        </div>--}}
      </div>
    </div>
  </div>
  <!-- ./ jumbotron -->

  <!-- Filter Modal Start Here -->
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
              <a class="btn  " style="float: right; background:  #D0191D;color: #fff; margin-left: 753px; width: 50px; transform: translate(10px, -16px);"
                 data-dismiss="modal">&times;</a>
              <div class="modal-body">
                  <div class="form-fields row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                      </div>
                      <div id="square_feats" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0!important;">Property Type</p>
                              <div class="input-box ">
                                  <select name="Property" class="form-control" id="property_type">
                                      <option value="any" {{ (Request::get('category') === 'any') ? 'selected' : '' }}>Any</option>
{{--                                      @foreach($categories as $category)--}}
{{--                                          <option value="{{$category->id}}" {{ (Request::get('category') == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>--}}
{{--                                      @endforeach--}}
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div id="purpose" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Listing Type</p>
                              <div class="input-box">
                                  <select id="select_purpose" class="form-control">
                                      <option selected="selected" disabled>Select Listing Type</option>
                                      <option
                                          value="sale" {{ (Request::get('purpose') === 'sale') ? 'selected' : '' }}>
                                          Sale
                                      </option>
                                      <option
                                          value="rent" {{ (Request::get('purpose') === 'rent') ? 'selected' : '' }}>
                                          Rent
                                      </option>
                                      <option
                                          value="for_lease" {{ (Request::get('purpose') === 'for_lease') ? 'selected' : '' }}>
                                          For Lease
                                      </option>
                                      <option
                                          value="mortgage" {{ (Request::get('purpose') === 'mortgage') ? 'selected' : '' }}>
                                          Mortgage
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div id="baths" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Number of Baths</p>
                              <div class="input-box">
                                  <select name="baths" id="bath_rooms" class="form-control">
                                      <option value="0" selected="selected" disabled>Number of Baths
                                      </option>
                                      <option value="1" {{ (Request::get('bath') === '1') ? 'selected' : '' }}>1
                                      </option>
                                      <option value="2" {{ (Request::get('bath') === '2') ? 'selected' : '' }}>2
                                      </option>
                                      <option value="3" {{ (Request::get('bath') === '3') ? 'selected' : '' }}>3
                                      </option>
                                      <option value="4" {{ (Request::get('bath') === '4') ? 'selected' : '' }}>4
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div id="beds" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Number of Rooms</p>
                              <div class="input-box">
                                  <select id="bed_rooms" class="form-control">
                                      <option value="0" selected="selected" disabled>Select Number of
                                          Rooms
                                      </option>
                                      <option value="1" {{ (Request::get('rooms') === '1') ? 'selected' : '' }}>
                                          1
                                      </option>
                                      <option value="2" {{ (Request::get('rooms') === '2') ? 'selected' : '' }}>
                                          2
                                      </option>
                                      <option value="3" {{ (Request::get('rooms') === '3') ? 'selected' : '' }}>
                                          3
                                      </option>
                                      <option value="4" {{ (Request::get('rooms') === '4') ? 'selected' : '' }}>
                                          4
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div id="square_feats" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Area</p>
                              <div class="input-box">
                                  <select id="area" class="form-control">
                                      <option selected="selected" disabled>Select Area</option>
                                      <option value="1-2" {{ (Request::get('area') === '1-2') ? 'selected' : '' }}>1 - 2 Acres</option>
                                      <option value="2-5" {{ (Request::get('area') === '2-5') ? 'selected' : '' }}>2 - 5 Acres</option>
                                      <option value="5-10" {{ (Request::get('area') === '5-10') ? 'selected' : '' }}>5 - 10 Acres</option>
                                      <option value="10-50" {{ (Request::get('area') === '10-50') ? 'selected' : '' }}>10 - 50 Acres</option>
                                      <option value="50-100" {{ (Request::get('area') === '50-100') ? 'selected' : '' }}>50 - 100 Acres</option>
                                      <option value="100-200" {{ (Request::get('area') === '100-200') ? 'selected' : '' }}>100 - 200 Acres</option>
                                      <option value="200-300" {{ (Request::get('area') === '200-300') ? 'selected' : '' }}>200 - 300 Acres</option>
                                      <option value="300-400" {{ (Request::get('area') === '300-400') ? 'selected' : '' }}>300 - 400 Acres</option>
                                      <option value="400-500" {{ (Request::get('area') === '400-500') ? 'selected' : '' }}>400 - 500 Acres</option>
                                      <option value="500-1000" {{ (Request::get('area') === '500-1000') ? 'selected' : '' }}>500 - 1000 Acres</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div id="listed_since" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Listed since</p>
                              <div class="input-box">
                                  <input style="padding: 10px 15px;border: solid 1px #e8e8e8;" type="text"
                                         id="dateRange" name="daterange" class="form-control"
                                         value="{{ Request::get('date_range') }}"/>
                              </div>
                          </div>
                      </div>
                      <div id="price_range" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="single-field">
                              <p style="margin: 0">Price Range</p>
                              <div class="input-box">
                                  <select id="amount" class="form-control">
                                      <option selected="selected" disabled>Select Price Range</option>
                                      <option
                                          value="0-5000000" {{ (Request::get('price_range') === '0-5000000') ? 'selected' : '' }}>
                                          0 - 5 Million
                                      </option>
                                      <option
                                          value="5000000-10000000" {{ (Request::get('price_range') === '5000000-10000000') ? 'selected' : '' }}>
                                          5 Million - 1 Crore
                                      </option>
                                      <option
                                          value="10000000-50000000" {{ (Request::get('price_range') === '10000000-50000000') ? 'selected' : '' }}>
                                          1 Crore - 5 Crore
                                      </option>
                                      <option
                                          value="50000000-100000000" {{ (Request::get('price_range') === '50000000-100000000') ? 'selected' : '' }}>
                                          5 Crore - 10 Crore
                                      </option>
                                      <option
                                          value="100000000-500000000" {{ (Request::get('price_range') === '100000000-500000000') ? 'selected' : '' }}>
                                          10 Crore - 50 Crore
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <a class="button btn btn-danger btn-lg " type="button"
                     style="margin-top: 20px; background:  #D0191D;color: #fff;float: right;font-size: 17px" data-toggle="modal"
                     data-target="#myModal">Ok </a>

              </div>
          </div>

      </div>
  </div>

  <!-- Filter Modal End Here -->

  <div class="section py-5 py-large">
    <div class="container">
        <div class="btn-block text-center mb-5">
          <h1 class="font-weight-light">{{trans('general.header_box_2')}}</h1>
          <p>
            {{trans('general.desc_box_2')}}
          </p>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="text-center">
                <img src="{{url('public/img', $settings->img_1)}}" class="img-center img-fluid" width="120">
                <h5 class="mt-3">{{trans('general.card_1')}}</h5>
                <p class="text-muted mt-3">{{trans('general.desc_card_1')}}</p>
              </div>
          </div>

          <div class="col-lg-4">
            <div class="text-center">
              <img src="{{url('public/img', $settings->img_2)}}" class="img-center img-fluid" width="120">
              <h5 class="mt-3">{{trans('general.card_2')}}</h5>
              <p class="text-muted mt-3">{{trans('general.desc_card_2')}}</p>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="text-center">
            <img src="{{url('public/img', $settings->img_3)}}" class="img-center img-fluid" width="120">
            <h5 class="mt-3">{{trans('general.card_3')}}</h5>
            <p class="text-muted mt-3">{{trans('general.desc_card_3')}}</p>
          </div>
      </div>

      </div>
    </div>
  </div>

  <!-- Create profile -->
  <div class="section py-5 py-large">
    <div class="container">
      <div class="row align-items-center">
      <div class="col-12 col-lg-7 text-center mb-3">
        <img src="{{url('public/img', $settings->img_4)}}" alt="User" class="img-fluid">
      </div>
      <div class="col-12 col-lg-5">
        <h1 class="m-0 w-75 font-weight-light">{{trans('general.header_box_3')}}</h1>
        <div class="col-lg-9 col-xl-8 p-0">
          <p class="py-4 m-0 text-muted">{{trans('general.desc_box_3')}}</p>
        </div>
        <a href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}" class="btn btn-lg btn-main btn-outline-danger btn-w px-4">
          {{trans('general.getting_started')}} <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small></a>
      </div>
    </div>
    </div><!-- End Container -->
  </div><!-- End Section -->



  <!-- Create profile -->
      <div class="section py-5 py-large bg-black">
          <div class="container">
              <div class="btn-block text-center mb-5">
                  <h1 class="font-weight-light"> Posts</h1>
                  <p>
                      The best posts selected by our team.
                  </p>
              </div>
              <div class="row ">
                  @foreach($updates as $update)
                  <div class="col-md-3 col-lg-3 mt-4">
                      <div class="card" style=" box-shadow: 2px 2px 5px 5px gray">
                                <img src="{{url('public/img', $update->image)}}" alt="post" class="img-fluid">
                          <div class="card-header">
                              <span>{{$update->date}}</span>
                          </div>
                          <div class="card-body">
                              {{$update->description}}
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div><!-- End Container -->
      </div>
  <!-- End Section -->



@if ($settings->widget_creators_featured == 'on')

    @if ($users->count() != 0)
    <!-- Users -->
    <div class="section py-5 py-large">
      <div class="container">
        <div class="btn-block text-center mb-5">
          <h1 class="font-weight-light">{{trans('general.creators_featured')}}</h1>
          <p>
            {{trans('general.desc_creators_featured')}}
          </p>
        </div>
        <div class="row">

{{--        @if ($usersTotal > $users->total())--}}
{{--          <div class="w-100 mb-3 text-center">--}}
{{--            <a href="{{url('creators')}}" class="float-right link-border">{{trans('general.view_all_creators')}} <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small></a>--}}
{{--          </div>--}}
{{--        @endif--}}

          <div class="owl-carousel owl-theme">
            @foreach ($users as $response)
              @include('includes.listing-creators')
          @endforeach
          </div>
        </div><!-- End Row -->
      </div><!-- End Container -->
    </div><!-- End Section -->
  @endif
@endif

  @if ($settings->show_counter == 'on')
  <!-- Counter -->
  <div class="section py-5 py-large">
    <div class="container mb-4">
      <div class="btn-block text-center">
        <h1 class="font-weight-light">{{trans('general.our_numbers')}}</h1>
        <p>
          {{trans('general.our_numbers_subtitle')}}
        </p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="fa fa-users align-baseline text-primary"></i></span>
            <div>
{{--              <h3 class="mb-0">{!! Helper::formatNumbersStats($usersTotal) !!}</h3>--}}
              <h5 class="font-weight-light">{{trans('general.creators')}}</h5>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="fa fa-photo-video align-baseline text-warning"></i></span>
            <div>
              <h3 class="mb-0">{!! Helper::formatNumbersStats(Updates::count()) !!}</h3>
              <h5 class="font-weight-light">{{trans('general.content_created')}}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="fa fa-hand-holding-usd align-baseline text-success"></i></span>
            <div>
              <h3 class="mb-0">@if($settings->currency_position == 'left') {{ $settings->currency_symbol }}@endif{!! Helper::formatNumbersStats(Transactions::whereApproved('1')->sum('earning_net_user')) !!}@if($settings->currency_position == 'right'){{ $settings->currency_symbol }} @endif</h3>
              <h5 class="font-weight-light">{{trans('general.earnings_of_creators')}}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@if ($settings->earnings_simulator == 'on')
<!-- Earnings simulator -->
<div class="section py-5 py-large">
  <div class="container mb-4">
    <div class="btn-block text-center">
      <h1 class="font-weight-light">{{trans('general.earnings_simulator')}}</h1>
      <p>
        {{trans('general.earnings_simulator_subtitle')}}
      </p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label for="rangeNumberFollowers" class="w-100">
          {{ __('general.number_followers') }}
          <i class="feather icon-facebook mr-1"></i>
          <i class="feather icon-twitter mr-1"></i>
          <i class="feather icon-instagram"></i>
          <span class="float-right">
            #<span id="numberFollowers">1000</span>
          </span>
        </label>
        <input type="range" class="custom-range" value="0" min="1000" max="1000000" id="rangeNumberFollowers" onInput="$('#numberFollowers').html($(this).val())">
      </div>

      <div class="col-md-6">
        <label for="rangeMonthlySubscription" class="w-100">{{ __('general.monthly_subscription_price') }}
          <span class="float-right">
            {{ $settings->currency_position == 'left' ? $settings->currency_symbol : null }}<span id="monthlySubscription">{{ $settings->min_subscription_amount }}</span>{{ $settings->currency_position == 'right' ? $settings->currency_symbol : null }}
        </span>
        </label>
        <input type="range" class="custom-range" value="0" onInput="$('#monthlySubscription').html($(this).val())" min="{{ $settings->min_subscription_amount }}" max="{{ $settings->max_subscription_amount }}" id="rangeMonthlySubscription">
      </div>

      <div class="col-md-12 text-center mt-4">
        <h3 class="font-weight-light">{{trans('general.earnings_simulator_subtitle_2')}}
          <span class="font-weight-bold"><span id="estimatedEarn"></span> <small>{{$settings->currency_code}}</small></span>
          {{ __('general.per_month') }}*</h3>
        <p class="mb-1">
          * {{trans('general.earnings_simulator_subtitle_3')}}
        </p>
        <small class="w-100 d-block">* {{trans('general.include_platform_fee', ['percentage' => $settings->fee_commission])}}</small>
      </div>
    </div>
  </div>
</div>
@endif

    <div class="jumbotron m-0 text-white text-center bg-gradient">
      <div class="container position-relative">
        <h1>{{trans('general.head_title_bottom')}}</h1>
        <p>{{trans('general.head_title_bottom_desc')}}</p>
        <p>
          <a href="{{url('creators')}}" class="btn btn-lg btn-w-mb px-4 mr-2" style="background: #D0191D;color: #fff;" role="button">{{trans('general.explore')}}</a>
          <a class="btn btn-lg btn-main btn-outline-light btn-w px-4" href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}" role="button">
          {{trans('general.getting_started')}} <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small>
        </a>
        </p>
      </div>
    </div>

@endsection

@section('javascript')

  @if ($settings->earnings_simulator == 'on')
  <script type="text/javascript">

  function decimalFormat(nStr)
  {
    @if ($settings->decimal_format == 'dot')
     var $decimalDot = '.';
     var $decimalComma = ',';
     @else
     var $decimalDot = ',';
     var $decimalComma = '.';
     @endif

     @if ($settings->currency_position == 'left')
     var currency_symbol_left = '{{$settings->currency_symbol}}';
     var currency_symbol_right = '';
     @else
     var currency_symbol_right = '{{$settings->currency_symbol}}';
     var currency_symbol_left = '';
     @endif

      nStr += '';
      var x = nStr.split('.');
      var x1 = x[0];
      var x2 = x.length > 1 ? $decimalDot + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
          var x1 = x1.replace(rgx, '$1' + $decimalComma + '$2');
      }
      return currency_symbol_left + x1 + x2 + currency_symbol_right;
    }

    function earnAvg() {
      var fee = {{ $settings->fee_commission }};
      @if($settings->currency_code == 'JPY')
       $decimal = 0;
      @else
       $decimal = 2;
      @endif

      var monthlySubscription = parseFloat($('#rangeMonthlySubscription').val());
      var numberFollowers = parseFloat($('#rangeNumberFollowers').val());

      var estimatedFollowers = (numberFollowers * 5 / 100)
      var followersAndPrice = (estimatedFollowers * monthlySubscription);
      var percentageAvgFollowers = (followersAndPrice * fee / 100);
      var earnAvg = followersAndPrice - percentageAvgFollowers;

      return decimalFormat(earnAvg.toFixed($decimal));
    }
   $('#estimatedEarn').html(earnAvg());

   $("#rangeNumberFollowers, #rangeMonthlySubscription").on('change', function() {

     $('#estimatedEarn').html(earnAvg());

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
		type: "error",
		confirmButtonText: "{{ trans('users.ok') }}"
		});
    </script>
	 @endif

@endsection

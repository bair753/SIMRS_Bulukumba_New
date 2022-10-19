@extends('template.template3')
@section('css')
    <style>
        .pcoded .pcoded-inner-content {
            padding: 10px 0 10px 0;
        }

        .class-icon {
            font-size: 50px;

            padding: 5px;
            border-radius: 5px;
            background: #bcbcbc8a;
        }

        .pad {
            padding-top: 3rem;
        }

        @media (min-width: 992px) {
            .pad {
                padding-top: 1.8rem;
            }
        }

        .modal-lg .kons {
            width: 1140px;
        }

        .text-white {
            color: white
        }

        @media only screen and (max-width: 575px) {
            .latest-update-card .card-block .latest-update-box .update-meta {
                z-index: 2;
                min-width: 0;
                text-align: left !important;
                margin-bottom: 15px;
                border-top: 1px solid #f1f1f1;
                padding-top: 15px;
            }
        }

        #return-to-top {
            z-index: 999;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #404e67;
            width: 50px;
            height: 50px;
            display: block;
            text-decoration: none;
            -webkit-border-radius: 35px;
            -moz-border-radius: 35px;
            border-radius: 35px;
            display: none;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #return-to-top i {
            color: #fff;
            margin: 0;
            position: relative;
            left: 16px;
            top: 13px;
            font-size: 19px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #return-to-top:hover {
            background: rgba(0, 0, 0, 0.62);
        }

        #return-to-top:hover i {
            color: #fff;
            top: 5px;
        }

        .card {
            border-radius: 24px;
            -webkit-box-shadow: 0 1px 20px 0 rgb(69 90 100 / 8%);
            box-shadow: 0 10px 25px 0 rgb(68 82 88 / 8%);
            /* border: none; */
            margin-bottom: 30px;
            border: 1px solid rgb(68 82 88 / 8%);
        }

    </style>
@endsection

@section('content-body')
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <div class="page-wrapper pad" style="margin-top:20px">
        <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h5>Artificial Intelligence</h5>
                </div>
                <div class="card-block tab-icon">
                    {{-- <form action="{!! route('show_page', ['role' => session('role'), 'pages' => $r->pages]) !!}" method="get">
                        <div class="row">
                            <div class="col-lg-7">
                            </div>
                            <div class="col-lg-2" style="margin-top: 5px">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="ti-calendar"></i></span>
                                    <input type="text" id="tglawal" name="tglawal" class="date-custom form-control"
                                        value="{{ request()->get('tglawal') }}">
                                </div>

                            </div>
                            <div class="col-lg-2" style="margin-top: 5px">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="ti-calendar"></i></span>
                                    <input type="text" id="tglakhir" name="tglakhir" class="date-custom form-control"
                                        value="{{ request()->get('tglakhir') }}">
                                </div>
                            </div>
                            <div class="col-lg-1" style="margin-top: 5px">
                                <button class="btn btn-success  btn-outline-success" type="submit">
                                    <i class="icofont icofont-search"></i>Search</button>
                            </div>
                        </div>
                    </form> --}}
                    <div class="row" style="margin-top:10px ">

                        <div class="col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs md-tabs " role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i
                                            class="fa fa-cube"></i>Inventory Manager</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i
                                            class="fa fa-arrow-left"></i>Order Manager</a>
                                    <div class="slide"></div>
                                </li>

                            </ul>
                            <div class="tab-content card-block">
                                <div class="tab-pane active" id="home7" role="tabpanel">
                                    <div class="col-lg-12 col-xl-12">

                                        <ul class="nav nav-tabs  tabs" role="tablist">
                                            <li class="nav-item details">
                                                <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"
                                                    aria-selected="true">Insight</a>
                                            </li>
                                            {{-- <li class="nav-item details">
                                                <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"
                                                    aria-selected="false">Intelligence</a>
                                            </li> --}}
                                            <li class="nav-item details">
                                                <a class="nav-link" data-toggle="tab" href="#messages1"
                                                    role="tab">Dashboard</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#settings1"
                                                    role="tab">Data</a>
                                            </li> --}}
                                        </ul>

                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="row">
                                                    @if(count($res['im_summary']))
                                                    @forelse ($res['im_summary'] as $i => $k)
                                                  
                                                        <div class="col-xl-4 col-md-12">
                                                            <div class="card quater-card" style="cursor: pointer;background: rgba(41, 50, 65, 0.4);
                                                                    color: #FFFFFF;"
                                                                onclick="klikDetails('{!! $k['status'] !!}')">
                                                                <div class="card-header"
                                                                    style="padding: .75rem 1.25rem;">
                                                                    <div class="card-header-right">
                                                                        <ul class="list-unstyled card-option">
                                                                            <li><i style="color: white"
                                                                                    class="feather icon-info"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="card-block">
                                                                    <h6 class="text-white m-b-20">{{ $k['status'] }}</h6>
                                                                    <h4>{{ App\Http\Controllers\MainController::format_num($k['price'], 'IDR. ') }}
                                                                    </h4>
                                                                    <p class="text-white"><span
                                                                            class="f-right">{{ number_format($k['price_percentage'], 2) }}%</span>
                                                                    </p>
                                                                    <div class="progress">
                                                                        <div class="progress-bar {{ $res['color'][$i] }}"
                                                                            style="width: {{ number_format($k['price_percentage'], 2) }}%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <span >Data Not Found</span>
                                                        @endforelse
                                                        @endif
                                                    <div class="col-md-12" id="showInvent">
                                                        <div class="card quater-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20">Inventory</h6>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table  table-striped table-sm table-styling"
                                                                        id="t_IM" style="width:100%">
                                                                        <thead class="table-default">
                                                                            <tr>
                                                                                <th style="color:black;width: 10%">#
                                                                                </th>
                                                                                <th style="color:black;width: 10%">Item Name
                                                                                </th>
                                                                                <th style="color:black">Item Type </th>
                                                                                <th style="color:black">Unit Type </th>
                                                                                <th style="color:black">Qty </th>
                                                                                <th style="color:black">Price (IDR) </th>
                                                                                <th style="color:black">Total Cost </th>
                                                                                <th style="color:black">Date </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $total = 0;
                                                                            @endphp
                                                                            @forelse($res['im_insights']  as $i => $d)
                                                                                @php
                                                                                    $total = $total + (float) $d['total_cost'];
                                                                                @endphp
                                                                                <tr>
                                                                                    <td><a href='#'
                                                                                            class="btn btn-danger btn-outline-danger btn-mini click-detail"
                                                                                            id-produk="{{ $d['item_id'] }}"
                                                                                            nama-produk="{{ $d['item_name'] }}">
                                                                                            <i
                                                                                                class='icofont icofont-search'></i></a>
                                                                                    </td>
                                                                                    <td>{{ $d['item_name'] }}</td>
                                                                                    <td>{{ $d['item_type'] }}</td>
                                                                                    <td>{{ $d['unit_type'] }}</td>
                                                                                    <td>{{ $d['order_quantity'] }}</td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['unit_cost'], '') }}
                                                                                    </td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['total_cost'], '') }}
                                                                                    </td>
                                                                                    <td>{{ $d['order_date'] }}</td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="3"
                                                                                        style="text-align: center">Data
                                                                                        Tidak ada
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <span class="text-muted">Total
                                                                    {{ App\Http\Controllers\MainController::format_num($total, 'IDR. ') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="showIntelligence">
                                                        <div class="card quater-card">

                                                            <div class="card-header" style="padding: .75rem 1.25rem;">
                                                                <div class="card-header-right">
                                                                    <ul class="list-unstyled card-option">
                                                                        <li class="close-intel"><i
                                                                                class="feather icon-x-circle"
                                                                                style="    font-size: 26px;"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card-block">
                                                                <h6 class="m-b-20">Intelligence</h6>
                                                                <h5 class="m-b-20" id="titleIntel"></h5>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-3" style="cursor: pointer"
                                                                        onclick="detailPegawai('Aktif')">
                                                                        <div class="card bg-c-yellow order-card">
                                                                            <div class="card-block">
                                                                                <h6>Current Stock</h6>
                                                                                <h2 id="l_current_stok"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-3" style="cursor: pointer"
                                                                        onclick="detailPegawai('Non Aktif')">
                                                                        <div class="card bg-c-blue order-card">
                                                                            <div class="card-block">
                                                                                <h6>Optimal Stock Level</h6>
                                                                                <h2 id="l_optimal_stok"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-3">
                                                                        <div class="card bg-c-green order-card">
                                                                            <div class="card-block">
                                                                                <h6>Stock Out Risk</h6>
                                                                                <h2 id="l_stokout"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-3">
                                                                        <div class="card bg-c-pink  order-card">
                                                                            <div class="card-block">
                                                                                <h6>Holding Cost</h6>
                                                                                <h2 id="l_holding"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-4">
                                                                        <div class="card bg-c-orenge order-card">
                                                                            <div class="card-block">
                                                                                <h6>Inventory to Sales Ratio</h6>
                                                                                <h2 id="l_inven_ratio"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 col-lg-4">
                                                                        <div class="card bg-c-kuning order-card">
                                                                            <div class="card-block">
                                                                                <h6>Sell Through Rate</h6>
                                                                                <h2 id="l_sell"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-lg-4">
                                                                        <div class="card bg-c-maroon  order-card">
                                                                            <div class="card-block">
                                                                                <h6>Inventory Turnover</h6>
                                                                                <h2 id="l_turn_over"></h2>
                                                                                <p class="m-b-0"> <i
                                                                                        class="feather icon-arrow-up"></i>
                                                                                </p>
                                                                                <i
                                                                                    class="card-icon feather icon-bar-chart-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading bg-default">
                                                                    <span style="color: black">Sold SOH Chart :</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div id="chartTimeSeries"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading bg-default">
                                                                    <span style="color: black">Consumption Forecasting :
                                                                    </span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div id="chartForecast"></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="messages1" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="panel panel-purple">
                                                                <div class="panel-heading bg-purple">
                                                                    Rate Of Utilisation - Average Monthly
                                                                    Consumption Rate
                                                                </div>
                                                                <div class="panel-body">
                                                                    @php
                                                                        $avg_month = App\Http\Controllers\MainController::getArogyaF('im/rateutil');
                                                                    @endphp
                                                                    <div id="chartAvgMonth"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="panel panel-primary">
                                                                <div class="panel-heading bg-primary">
                                                                    Frequency Analysis - High
                                                                </div>
                                                                <div class="panel-body">
                                                                    @php
                                                                        $avg_month2 = App\Http\Controllers\MainController::getArogyaF('im/freq');
                                                                    @endphp
                                                                    <div id="chartAvgMonth2"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="panel panel-success">
                                                                <div class="panel-heading bg-success">
                                                                    Frequency Analysis - Med
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div id="chartAvgMonth3"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="panel panel-info">
                                                                <div class="panel-heading bg-info">
                                                                    Frequency Analysis - Low
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div id="chartAvgMonth4"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="profile1" role="tabpanel">
                                                <div class="row">
                                                    akf
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="profile7" role="tabpanel">
                                    <div class="col-lg-12 col-xl-12">

                                        <ul class="nav nav-tabs  tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"
                                                    aria-selected="true">Insight</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-selected="false">Intelligence</a>
                                            </li>

                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#settings2"
                                                    role="tab">Data</a>
                                            </li> --}}
                                        </ul>

                                        <div class="tab-content tabs card-block">
                                            <div class="tab-pane active" id="home2" role="tabpanel">
                                                <div class="row">

                                                    @forelse ($res['om_summary'] as $i => $k)
                                                        <div class="col-xl-4 col-md-12">
                                                            <div class="card quater-card" style="cursor: pointer"
                                                                onclick="klikDetailsOM('{!! $k['status'] !!}')">
                                                                <div class="card-block">
                                                                    <h6 class="text-muted m-b-20">
                                                                        {{ $k['status'] }}
                                                                    </h6>
                                                                    <h4>{{ App\Http\Controllers\MainController::format_num($k['price'], 'IDR. ') }}
                                                                    </h4>
                                                                    <p class="text-muted"><span
                                                                            class="f-right">{{ number_format($k['price_percentage'], 2) }}%</span>
                                                                    </p>
                                                                    <div class="progress">
                                                                        <div class="progress-bar {{ $res['color'][$i] }}"
                                                                            style="width: {{ number_format($k['price_percentage'], 2) }}%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                    @endforelse


                                                    <div class="col-md-12">
                                                        <div class="card quater-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20">Inventory</h6>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table  table-striped table-sm table-styling"
                                                                        id="t_OM" style="width:100%">
                                                                        <thead class="table-default">
                                                                            <tr>
                                                                                <th style="color:black;width: 10%">
                                                                                    Item Name
                                                                                </th>
                                                                                <th style="color:black">Qty </th>
                                                                                <th style="color:black">Price (IDR)
                                                                                </th>
                                                                                <th style="color:black">Total Cost
                                                                                    (IDR)
                                                                                </th>
                                                                                <th style="color:black">Supplier
                                                                                    Name </th>
                                                                                <th style="color:black">Date </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $total = 0;
                                                                            @endphp
                                                                            @forelse($res['om_insights']  as $i => $d)
                                                                                @php
                                                                                    $total = $total + (float) $d['total_cost'];
                                                                                @endphp
                                                                                <tr>

                                                                                    <td>{{ $d['item_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $d['order_qty'] }}
                                                                                    </td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['unit_cost'], '') }}
                                                                                    </td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['total_cost'], '') }}
                                                                                    </td>
                                                                                    <td>{{ $d['supplier_name'] }}
                                                                                    </td>
                                                                                    <td>{{ date('Y-m-d', strtotime($d['order_date'])) }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="3"
                                                                                        style="text-align: center">
                                                                                        Data
                                                                                        Tidak ada
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <span class="text-muted">Total
                                                                    {{ App\Http\Controllers\MainController::format_num($total, 'IDR. ') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="profile2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card quater-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20">Supplier Risk</h6>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table  table-striped table-sm table-styling"
                                                                        id="t_SRISK" style="width:100%">
                                                                        <thead class="table-default">
                                                                            <tr>
                                                                                <th style="color:black;width: 10%">
                                                                                    Supplier
                                                                                    Name </th>
                                                                                <th style="color:black">Avg Risk
                                                                                </th>
                                                                                <th style="color:black">Avg Price
                                                                                    (IDR)
                                                                                </th>
                                                                                <th style="color:black">Total Price
                                                                                    (IDR)
                                                                                </th>
                                                                                <th style="color:black">Total Qty
                                                                                </th>
                                                                                <th style="color:black">Impact Cost
                                                                                    (IDR)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $total = 0;
                                                                            @endphp
                                                                            @forelse($res['supplier_risk']  as $i => $d)
                                                                                @php
                                                                                    $total = $total + (float) $d['impact_cost'];
                                                                                @endphp
                                                                                <tr>

                                                                                    <td>{{ $d['supplier_name'] }}
                                                                                    </td>
                                                                                    <td>{{ $d['avg_risk'] }}</td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['avg_price'], '') }}
                                                                                    </td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['total_amount'], '') }}
                                                                                    </td>
                                                                                    <td>{{ $d['total_qty'] }}
                                                                                    </td>
                                                                                    <td style="text-align: right">
                                                                                        {{ App\Http\Controllers\MainController::format_num($d['impact_cost'], '') }}
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="7"
                                                                                        style="text-align: center">
                                                                                        Data
                                                                                        Tidak ada
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <span class="text-muted">Total Impact
                                                                    {{ App\Http\Controllers\MainController::format_num($total, 'IDR. ') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="tab-pane" id="settings2" role="tabpanel">
                                                <div class="row">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKunjungan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="titleModalKun"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="load_kunjungan">
                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalKunjungan2" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="titleModalKun2"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="load_kunjungan2">
                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var APP_URL = {!! json_encode(url('/')) !!}
        $(document).ready(function() {


        })

        $('#showInvent').show()
        $('#showIntelligence').hide()
        $('#show_impact').hide()
        $('#btnImpact').click(function() {
            impactTable.clear().draw();
            loadImpact()
            $('#show_impact').show()
        })

        function loadImpact() {
            $.ajax({
                type: "GET",
                url: APP_URL + '/arogya?url=im/status',
                success: function(data) {
                    if (data.length > 0) {
                        impactTable.clear().draw();
                        var dataGrid = []
                        for (let x = 0; x < data.length; x++) {
                            const element = data[x];
                            if (element.status == 'Understock') {
                                dataGrid.push(element)
                            }
                        }

                        let samateuuu = false
                        let group = [];
                        for (let i in dataGrid) {
                            samateuuu = false
                            dataGrid[i].count = 1
                            for (let x in group) {
                                if (group[x].item_type == dataGrid[i].item_type) {
                                    group[x].count = group[x].count + dataGrid[i].count
                                    group[x].qty = group[x].qty + dataGrid[i].qty
                                    group[x].total_cost = group[x].total_cost + dataGrid[i].total_cost
                                    group[x].optimal_level = group[x].optimal_level + dataGrid[i].optimal_level
                                    group[x].soh = group[x].soh + dataGrid[i].soh
                                    samateuuu = true;
                                }
                            }
                            if (samateuuu == false) {
                                let result = {
                                    item_type: dataGrid[i].item_type,
                                    count: dataGrid[i].count,
                                    qty: dataGrid[i].qty,
                                    total_cost: dataGrid[i].total_cost,
                                    optimal_level: dataGrid[i].optimal_level,
                                    soh: dataGrid[i].soh,
                                }
                                group.push(result)
                            }
                        }
                        for (let z = 0; z < group.length; z++) {
                            const element = group[z];
                            element.total_cost = formatRupiah(element.total_cost, '')
                            element.qty = formatRupiah(element.qty, '')
                            element.optimal_level = formatRupiah(element.optimal_level, '')
                            element.soh = formatRupiah(element.soh, '')
                        }
                        impactTable.rows.add(group).draw();
                    } else {
                        impactTable.clear().draw();

                    }
                }
            });
        }

        function formatRupiah(value, currency) {
            return currency + " " + parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
        }

        $('#btnReason').click(function() {
            $('#show_impact').hide()
        })
        $('#btnAction').click(function() {
            $('#show_impact').hide()
        })
        //tabel
        impactTable = $("#tblImpact").DataTable({
            data: [],
            select: true,

            columns: [{
                    "data": "item_type",
                    "width": "15%"
                },
                {
                    "data": "count",
                    "width": "10%"
                },
                {
                    "data": "qty",
                    "width": "10%"
                },
                {
                    "data": "total_cost",
                    "width": "10%"
                },
                {
                    "data": "optimal_level",
                    "width": "10%"
                },
                {
                    "data": "soh",
                    "width": "10%"
                }
            ],

            order: [
                [0, 'asc']
            ],
            bAutoWidth: true,
            rowCallback: function(row, data) {},
            bFilter: false,
            bInfo: true,
            bLengthChange: false,
            processing: true,
            retrieve: true,
            pageLength: 5,
            scroll: 200
        });
        impactTable = $("#tblImpact2").DataTable({
            data: [],
            select: true,

            columns: [{
                    "data": "item_type",
                    "width": "15%"
                },
                {
                    "data": "count",
                    "width": "10%"
                },
                {
                    "data": "qty",
                    "width": "10%"
                },
                {
                    "data": "total_cost",
                    "width": "10%"
                },
                {
                    "data": "optimal_level",
                    "width": "10%"
                },
                {
                    "data": "soh",
                    "width": "10%"
                }
            ],

            order: [
                [0, 'asc']
            ],
            bAutoWidth: true,
            rowCallback: function(row, data) {},
            bFilter: false,
            bInfo: true,
            bLengthChange: false,
            processing: true,
            retrieve: true,
            pageLength: 5,
            scroll: 200
        });

        function klikDetails(kode) {

            $.ajax({
                type: 'GET',
                url: APP_URL + '/get-detail-im',
                data: {
                    kode: kode
                },
                cache: false,
                success: function(respond) {
                    document.getElementById("titleModalKun").innerHTML = kode
                    $('#modalKunjungan').modal("show");
                    $("#load_kunjungan").html(respond);
                }
            })
        }

        function klikDetailsOM(kode) {
            return
            $.ajax({
                type: 'GET',
                url: APP_URL + '/get-detail-om',
                data: {
                    kode: kode
                },
                cache: false,
                success: function(respond) {
                    document.getElementById("titleModalKun2").innerHTML = kode
                    $('#modalKunjungan2').modal("show");
                    $("#load_kunjungan2").html(respond);
                }
            })
        }
        setChartAVGMonth()
        setChartAVGMonth2()


        function setChartAVGMonth() {
            let datax = @json($avg_month);

            let series = [];
            let jumlah = 0;
            let categories = []
            let loopIndex = 0;
            datax.sort(function(a, b) {
                if (a.avg_monthly_cons_rate > b.avg_monthly_cons_rate) {
                    return -1;
                }
                if (a.avg_monthly_cons_rate < b.avg_monthly_cons_rate) {
                    return 1;
                }
                return 0;
            })
            for (let i in datax) {
                categories.push(datax[i].item_name);
                let dataz2 = [];
                dataz2.push({
                    y: parseFloat(datax[i].avg_monthly_cons_rate),
                    color: this.colors[i]
                });
                jumlah = jumlah + parseFloat(datax[i].avg_monthly_cons_rate);
                if (loopIndex < 10)
                    series.push({
                        name: datax[i].item_name,
                        data: dataz2
                    });
                loopIndex++;

            }


            Highcharts.chart('chartAvgMonth', {
                chart: {
                    type: 'column',
                },

                title: {
                    text: ''
                },
                xAxis: {
                    categories: ["Average"],
                    labels: {
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Top 10 Avg. Monthy Consumption Rate'
                    }
                },
                plotOptions: {
                    column: {
                        // url:"#",
                        cursor: 'pointer',

                        dataLabels: {
                            enabled: true,
                            color: this.colors[1],

                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, '.', ',') + '';
                            }
                        },
                        showInLegend: true
                    }
                },
                tooltip: {
                    formatter: function() {
                        let point = this.point,
                            s = this.x + ':' + Highcharts.numberFormat(this.y, 0, '.', ',') + '<br/>';
                        return s;

                    }

                },
                series: series,
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: true,
                    borderRadius: 5,
                    borderWidth: 1
                },

            })
        }

        function setChartAVGMonth2() {
            let datax = @json($avg_month2);

            let series = [];
            let series2 = [];
            let series3 = [];
            let jumlah = 0;
            let categories = []

            datax.sort(function(a, b) {
                if (a.CNT > b.CNT) {
                    return -1;
                }
                if (a.CNT < b.CNT) {
                    return 1;
                }
                return 0;
            })
            let loopIndex = 0;
            for (let i in datax) {
                if (datax[i].freq == 'High') {
                    categories.push(datax[i].item_name);
                    let dataz2 = [];
                    dataz2.push({
                        y: parseFloat(datax[i].CNT.toFixed(2)),
                        color: this.colors[i]
                    });
                    jumlah = jumlah + parseFloat(datax[i].CNT.toFixed(2));
                    if (loopIndex < 10)
                        series.push({
                            name: datax[i].item_name,
                            data: dataz2
                        });
                    loopIndex++;
                }
            }
            loopIndex = 0;
            for (let i in datax) {
                if (datax[i].freq == 'Med') {
                    categories.push(datax[i].item_name);
                    let dataz2 = [];
                    dataz2.push({
                        y: parseFloat(datax[i].CNT.toFixed(2)),
                        color: this.colors[i]
                    });
                    jumlah = jumlah + parseFloat(datax[i].CNT.toFixed(2));
                    if (loopIndex < 10)
                        series2.push({
                            name: datax[i].item_name,
                            data: dataz2
                        });
                    loopIndex++;
                }
            }
            loopIndex = 0;
            for (let i in datax) {
                if (datax[i].freq == 'Low') {
                    categories.push(datax[i].item_name);
                    let dataz2 = [];
                    dataz2.push({
                        y: parseFloat(datax[i].CNT.toFixed(2)),
                        color: this.colors[i]
                    });
                    jumlah = jumlah + parseFloat(datax[i].CNT.toFixed(2));
                    if (loopIndex < 10)
                        series3.push({
                            name: datax[i].item_name,
                            data: dataz2
                        });
                    loopIndex++;
                }
            }


            Highcharts.chart('chartAvgMonth2', {
                chart: {
                    type: 'column',
                },

                title: {
                    text: ''
                },
                xAxis: {
                    categories: ["Qty"],
                    labels: {
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Top 10 High Freq'
                    }
                },
                plotOptions: {
                    column: {
                        // url:"#",
                        cursor: 'pointer',

                        dataLabels: {
                            enabled: true,
                            color: this.colors[1],

                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, '.', ',') + '';
                            }
                        },
                        showInLegend: true
                    }
                },
                tooltip: {
                    formatter: function() {
                        let point = this.point,
                            s = this.x + ':' + Highcharts.numberFormat(this.y, 0, '.', ',') + '<br/>';
                        return s;

                    }

                },
                series: series,
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: true,
                    borderRadius: 5,
                    borderWidth: 1
                },

            })


            Highcharts.chart('chartAvgMonth3', {
                chart: {
                    type: 'column',
                },

                title: {
                    text: ''
                },
                xAxis: {
                    categories: ["Qty "],
                    labels: {
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Top 10 Med Freq'
                    }
                },
                plotOptions: {
                    column: {
                        // url:"#",
                        cursor: 'pointer',

                        dataLabels: {
                            enabled: true,
                            color: this.colors[1],

                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, '.', ',') + '';
                            }
                        },
                        showInLegend: true
                    }
                },
                tooltip: {
                    formatter: function() {
                        let point = this.point,
                            s = this.x + ':' + Highcharts.numberFormat(this.y, 0, '.', ',') + '<br/>';
                        return s;

                    }

                },
                series: series2,
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: true,
                    borderRadius: 5,
                    borderWidth: 1
                },

            })

            Highcharts.chart('chartAvgMonth4', {
                chart: {
                    type: 'column',
                },

                title: {
                    text: ''
                },
                xAxis: {
                    categories: ["Qty "],
                    labels: {
                        align: 'center',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Top 10 Low Freq'
                    }
                },
                plotOptions: {
                    column: {
                        // url:"#",
                        cursor: 'pointer',

                        dataLabels: {
                            enabled: true,
                            color: this.colors[1],

                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, '.', ',') + '';
                            }
                        },
                        showInLegend: true
                    }
                },
                tooltip: {
                    formatter: function() {
                        let point = this.point,
                            s = this.x + ':' + Highcharts.numberFormat(this.y, 0, '.', ',') + '<br/>';
                        return s;

                    }

                },
                series: series3,
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                legend: {
                    enabled: true,
                    borderRadius: 5,
                    borderWidth: 1
                },

            })
        }

        $(".close-intel").click(function(e) {

            e.preventDefault();
            $('#showInvent').show()
            $('#showIntelligence').hide()
        })
        $(".click-detail").click(function(e) {
            e.preventDefault();
            $('#showInvent').hide()
            $('#showIntelligence').show()

            var id = $(this).attr("id-produk");
            var nama = $(this).attr("nama-produk");

            document.getElementById("titleIntel").innerHTML = nama

            let l_inven_ratio = 0,
                l_stokout = 0,
                l_inven = 0,
                l_sell = 0,
                l_turn_over = 0,
                l_current_stok = 0,
                l_optimal_stok = 0;
            $("#l_sell").text(l_sell);
            $("#l_inven_ratio").text(l_inven_ratio);
            $("#l_current_stok").text(l_current_stok);
            $("#l_optimal_stok").text(l_optimal_stok);
            $("#l_turn_over").text(l_turn_over);
            $("#l_stokout").text('NA');
            $("#l_holding").text('NA');
            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/isr?itemname=' + nama,
                success: function(respond) {

                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            l_inven_ratio = l_inven_ratio + parseFloat(element.inventory_to_sales_ratio)
                        }
                    }
                    $("#l_inven_ratio").text(l_inven_ratio);
                }
            })

            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/sellthrough?itemname=' + nama,
                success: function(respond) {

                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            if (element.sell_through_rate != 'NaN') {
                                l_sell = l_sell + parseFloat(element.sell_through_rate)
                            }
                        }
                    }
                    $("#l_sell").text(l_sell);
                }
            })

            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/status?itemname=' + nama,
                success: function(respond) {
                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            l_current_stok = l_current_stok + parseFloat(element.qty)
                            l_optimal_stok = l_optimal_stok + parseFloat(element.optimal_level)
                        }
                    }
                    $("#l_current_stok").text(l_current_stok);
                    $("#l_optimal_stok").text(l_optimal_stok);
                }
            })


            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/turnover?itemname=' + nama,
                success: function(respond) {
                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            if (element.inventory_turnover != 'NaN') {
                                l_turn_over = l_turn_over + parseFloat(element.inventory_turnover)
                            }
                        }
                    }
                    $("#l_turn_over").text(l_turn_over);
                }
            })

            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/timeseries?itemname=' + nama,
                success: function(respond) {
                    let datana = []
                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            datana.push(element)
                        }
                    }

                    setChartTimeSeries(datana, nama)
                }
            })
            $.ajax({
                type: 'GET',
                async: true,
                dataType: 'json',
                url: APP_URL + '/arogya?url=im/forecast?itemname=' + nama,
                success: function(respond) {
                    let datana = []
                    for (let x = 0; x < respond.length; x++) {
                        const element = respond[x];
                        if (element.item_id == id) {
                            datana.push(element)
                        }
                    }

                    setChartForecast(datana, nama)
                }
            })


        })

        function setChartForecast(datana, nama) {
            console.log(datana)

            let ranges = [];
            let actual = []
            let categories = []
            let prediction = [];
           
            for (let i in datana) {
                categories.push(datana[i].month);
                ranges.push([datana[i].month,datana[i].cons_forecast_lower,datana[i].cons_forecast_upper ])
                actual.push([datana[i].month,datana[i].cons_forecast]);
                prediction.push([datana[i].month,datana[i].cons_forecast]);
            }
       
      

            Highcharts.chart('chartForecast', {

                title: {
                    text: nama
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Quantity'
                    }
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    crosshairs: true,
                    shared: true,
                    valueSuffix: ''
                },
                legend: {

                    borderRadius: 5,
                    borderWidth: 1,
                    // verticalAlign: 'middle'
                },
                series: [{
                    name: 'Prediction',
                    data: prediction,
                    zIndex: 1,
                    lineWidth: 5,
                    marker: {
                        fillColor: '#2364c5',
                        lineWidth: 2,
                        lineColor: '#2364c5'
                    }
                }, {
                    name: 'Actual',
                    data: actual,
                    zIndex: 1,
                    lineWidth: 0,
                    marker: {
                        fillColor: 'red',
                        lineWidth: 0,
                        lineColor: '#FFFFFF',
                        fillOpacity: 0.3,
                    }
                }, {
                    name: 'Range',
                    data: ranges,
                    type: 'arearange',
                    lineWidth: 0,
                    linkedTo: ':previous',
                    color: '#88ac91',
                    fillOpacity: 0.6,
                    zIndex: 0,
                    marker: {
                        enabled: false
                    }
                }]
            });

        }

        function setChartTimeSeries(datax, nama) {
            console.log(datax)
            let sold = [];
            let soh = []
            let categories = []
            let loopIndex = 0;

            for (let i in datax) {
                categories.push(datax[i].month);
                sold.push(parseFloat(datax[i].qty_out));
                soh.push(parseFloat(datax[i].soh));

            }

            Highcharts.chart('chartTimeSeries', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: nama
                },
                xAxis: {
                    categories: categories
                },
                credits: {
                    enabled: false
                },
                yAxis: {
                    title: {
                        text: 'Count'
                    }
                },

                tooltip: {
                    formatter: function() {
                        let point = this.point,
                            s = this.x + ':' + Highcharts.numberFormat(this.y, 0, '.', ',') + '<br/>';
                        return s;

                    }

                },
                plotOptions: {
                    area: {
                        // url:"#",
                        cursor: 'pointer',

                        dataLabels: {
                            enabled: true,
                            color: this.colors[1],

                            formatter: function() {
                                return Highcharts.numberFormat(this.y, 0, '.', ',');
                            }
                        },
                        showInLegend: true
                    },
                },
                legend: {
                    layout: 'horizontal',
                    // align: 'right',
                    borderRadius: 5,
                    borderWidth: 1,
                    // verticalAlign: 'middle'
                },

                series: [{
                    name: 'Sold',
                    data: sold,
                    color: '#b39c9f'
                }, {
                    name: 'SOH',
                    data: soh,
                    color: '#c0c7cb'
                }]
            });

        }
    </script>
@endsection

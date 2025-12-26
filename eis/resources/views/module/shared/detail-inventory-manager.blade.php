<ul class="nav nav-tabs  tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#homex" role="tab" aria-selected="true">Impact</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profilex" role="tab" aria-selected="false">Reasons</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#messagesx" role="tab">Action</a>
    </li>

</ul>

<div class="tab-content tabs card-block">
    <div class="tab-pane active" id="homex" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>By Category</h5>
                    </div>
                    <div class="card-block">

                        <div class="table-responsive">
                            <table class="table  table-striped table-sm table-styling" id="tabelstatus2132"
                                style="width:100%">
                                <thead>
                                    <tr class="table-inverse">
                                        <th>Category</th>
                                        <th># Items</th>
                                        <th>Qty {{ $title }}</th>
                                        <th>Amt {{ $title }}</th>
                                        <th>Optimal Lvl</th>
                                        <th>Soh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $data2 = [];
                                        if ($title == 'optimal') {
                                            $data2 = $optimal;
                                        }
                                        if ($title == 'overstock') {
                                            $data2 = $overstok;
                                        }
                                        if ($title == 'understock') {
                                            $data2 = $understock;
                                        }
                                        $sama = false;
                                        $groupingArr = [];
                                        
                                        for ($i = 0; $i < count($data2); $i++) {
                                            $sama = false;
                                            $data2[$i]['count'] = 1;
                                            for ($x = 0; $x < count($groupingArr); $x++) {
                                                if ($data2[$i]['item_type'] == $groupingArr[$x]['item_type']) {
                                                    $sama = true;
                                                    $groupingArr[$x]['count'] = (float) $data2[$i]['count'] + (float) $groupingArr[$x]['count'];
                                                    $groupingArr[$x]['qty'] = (float) $data2[$i]['qty'] + (float) $groupingArr[$x]['qty'];
                                                    $groupingArr[$x]['total_cost'] = (float) $data2[$i]['total_cost'] + (float) $groupingArr[$x]['total_cost'];
                                                    $groupingArr[$x]['optimal_level'] = (float) $data2[$i]['optimal_level'] + (float) $groupingArr[$x]['optimal_level'];
                                                    $groupingArr[$x]['soh'] = (float) $data2[$i]['soh'] + (float) $groupingArr[$x]['soh'];
                                                }
                                            }
                                            if ($sama == false) {
                                                // $groupingArr[] = $data2[$i];
                                        
                                                $groupingArr[] = [
                                                    'item_type' => $data2[$i]['item_type'],
                                                    'qty' => $data2[$i]['qty'],
                                                    'count' => $data2[$i]['count'],
                                                    'total_cost' => $data2[$i]['total_cost'],
                                                    'optimal_level' => $data2[$i]['optimal_level'],
                                                    'soh' => $data2[$i]['soh'],
                                                ];
                                            }
                                        }
                                        // dd($data2);
                                    @endphp
                                    @foreach ($groupingArr as $i => $d)
                                        <tr>
                                            <td>{{ $d['item_type'] }}</td>
                                            <td>{{ $d['count'] }}</td>
                                            <td>{{ $d['qty'] }}</td>
                                            <td>{{ App\Http\Controllers\MainController::format_num($d['total_cost'], '') }}
                                            </td>
                                            <td>{{ App\Http\Controllers\MainController::format_num($d['optimal_level'], '') }}
                                            </td>
                                            <td>{{ App\Http\Controllers\MainController::format_num($d['soh'], '') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>By Critical</h5>
                    </div>
                    <div class="card-block">

                        <div class="table-responsive">
                            <table class="table  table-striped table-sm table-styling" id="tbl_2" style="width:100%">
                                <thead>
                                    <tr class="table-inverse">
                                        <th>Critically</th>
                                        <th># Items</th>
                                        <th>Qty {{ $title }}</th>
                                        <th>Amt {{ $title }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $data2x = [];
                                        if ($title == 'optimal') {
                                            $data2x = $optimal;
                                        }
                                        if ($title == 'overstok') {
                                            $data2x = $overstok;
                                        }
                                        if ($title == 'understock') {
                                            $data2x = $understock;
                                        }
                                        $sama = false;
                                        $groupingArrx = [];
                                        
                                        for ($i = 0; $i < count($data2x); $i++) {
                                            $sama = false;
                                            $data2x[$i]['count'] = 1;
                                            for ($x = 0; $x < count($groupingArrx); $x++) {
                                                if ($data2x[$i]['criticality'] == $groupingArrx[$x]['criticality']) {
                                                    $sama = true;
                                                    $groupingArrx[$x]['count'] = (float) $data2x[$i]['count'] + (float) $groupingArrx[$x]['count'];
                                                    $groupingArrx[$x]['qty'] = (float) $data2x[$i]['qty'] + (float) $groupingArrx[$x]['qty'];
                                                    $groupingArrx[$x]['total_cost'] = (float) $data2x[$i]['total_cost'] + (float) $groupingArrx[$x]['total_cost'];
                                                    $groupingArrx[$x]['optimal_level'] = (float) $data2x[$i]['optimal_level'] + (float) $groupingArrx[$x]['optimal_level'];
                                                    $groupingArrx[$x]['soh'] = (float) $data2x[$i]['soh'] + (float) $groupingArrx[$x]['soh'];
                                                }
                                            }
                                            if ($sama == false) {
                                                // $groupingArrx[] = $data2x[$i];
                                        
                                                $groupingArrx[] = [
                                                    'criticality' => $data2x[$i]['criticality'],
                                                    'qty' => $data2x[$i]['qty'],
                                                    'count' => $data2x[$i]['count'],
                                                    'total_cost' => $data2x[$i]['total_cost'],
                                                    'optimal_level' => $data2x[$i]['optimal_level'],
                                                    'soh' => $data2x[$i]['soh'],
                                                ];
                                            }
                                        }
                                        // dd($data2);
                                    @endphp
                                    @foreach ($groupingArrx as $i => $d)
                                        <tr>
                                            <td>{{ $d['criticality'] }}</td>
                                            <td>{{ $d['count'] }}</td>
                                            <td>{{ $d['qty'] }}</td>
                                            <td>{{ App\Http\Controllers\MainController::format_num($d['total_cost'], '') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="profilex" role="tabpanel">
        <div class="row">
        </div>
    </div>
    <div class="tab-pane" id="messagesx" role="tabpanel">
        <div class="row">

            {{-- <div class="table-responsive">
                <table class="table table-striped table-bordered" cellpadding="0" id="tbl_PopAction"
                    style="font-size:small;width:100% ">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Type</th>
                            <th>Unit Type</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                </table>
            </div> --}}
        </div>
    </div>
</div>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    $(function() {
        $("#tabelstatus2132").dataTable();
        $("#tbl_2").dataTable();
    });

    var actionTable = $("#tbl_PopAction").DataTable({
        data: [],
        select: true,
        columnDefs: [{
            'targets': 1,
            'render': function(data, type) {
                return "<div class='btn-group'> " +
                    "<button type='button' class='btn btnView btn-default btn-xs data-toggle='modal' >" +
                    data + "</button> " +
                    "</div>";
            }
        }],
        columns: [{
                "data": "item_name",
                "width": "15%"
            },
            {
                "data": "item_type",
                "width": "10%"
            },
            {
                "data": "unit_type",
                "width": "10%"
            },
            {
                "data": "qty",
                "width": "10%"
            },
            {
                "data": "unit_cost",
                "width": "30%"
            },
            {
                "data": "total_cost",
                "width": "15%"
            },
            {
                "data": "order_date",
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
        pageLength: 10,
        scroll: 200
    });

    // actionTable.clear().draw();
    $("#messagesx").click(function() {
        loadDetail()
    });

    function loadDetail() {
        $.ajax({
            type: "GET",
            url: APP_URL + '/arogya?url=im/status?status=' + $title,

            success: function(data) {
                if (data.length > 0) {
                    actionTable.clear().draw();
                    actionTable.rows.add(data).draw();
                } else {
                    actionTable.clear().draw();
                    // notif("Informasi..!!", data.metaData.message, 'info');
                }
            }
        });
    }
</script>

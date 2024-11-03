<?php
// include("checkAdmin.php");
if (empty($_SESSION)) {
    header("location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="assets/css/datatables.min.css" />
    <link rel="stylesheet" href="assets/css/gijgo.css" />
    
    <style>
        #orderModal .form-control {
            border-width: 1px;
            border-color: #d8d9dd;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include('sidebar.php') ?>

        <div class="main-panel">
            <?php include('header.php') ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">My Order List</h4>
                    </div>
                    <div class="page-category">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row d-flex">
                                        <div class="col-md-2">
                                            <input id="startDatepicker" />
                                        </div>
                                        <div class="col-md-2">
                                            <input id="endDatepicker" />
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control form-control" id="orderIdx" placeholder="Order No" />
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-select form-control" id="orderState">
                                                <option disabled hidden selected>State</option>
                                                <option value="">All</option>
                                                <option value="ordered">Ordered</option>
                                                <option value="processing">Processing</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 d-flex">
                                            <button id="searchButton" class="btn btn-primary btn-round ms-auto me-1 float-right">
                                                <i class="fas fa-search"></i>
                                                Search
                                            </button>
                                            <button id="orderButton" class="btn btn-danger btn-round float-right">
                                                <i class="fa fa-plus"></i>
                                                Order
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="orderTable" class="cell-border nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Coating</th>
                                                    <th>R&L</th>
                                                    <th>SPH</th>
                                                    <th>CYL</th>
                                                    <th>AXIS</th>
                                                    <th>ADD</th>
                                                    <th>DIA</th>
                                                    <th>PRISM</th>
                                                    <th>QTY</th>
                                                    <th>State</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>

    <?php include("order-modal.html") ?>

    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="assets/js/plugin/datatables/dataTables.select.js"></script>
    <script src="assets/js/plugin/datatables/select.dataTables.js"></script>
    <script src="assets/js/plugin/datatables/dataTables.buttons.js"></script>
    <script src="assets/js/plugin/datatables/buttons.dataTables.js"></script>
    <script src="assets/js/plugin/datatables/jszip.min.js"></script>
    <script src="assets/js/plugin/datatables/vfs_fonts.js"></script>
    <script src="assets/js/plugin/datatables/buttons.html5.min.js"></script>
    <script src="assets/js/plugin/datepicker/gijgo.min.js"></script>
    <script>
        $(document).ready(function() {
            let startDatepicker = $("#startDatepicker").datepicker({
                uiLibrary: "bootstrap5",
                format: "yyyy-mm-dd",
            });
            let endDatepicker = $("#endDatepicker").datepicker({
                uiLibrary: "bootstrap5",
                format: "yyyy-mm-dd",
            });
            startDatepicker.value(new Date().setDate(new Date().getDate() - 7));
            endDatepicker.value(new Date());

            startDatepicker.on("change", function() {
                checkDateDiff();
            });
            endDatepicker.on("change", function() {
                checkDateDiff();
            });

            function checkDateDiff() {
                let startDate = new Date(startDatepicker.value());
                let endDate = new Date(endDatepicker.value());
                if (startDate > endDate) {
                    alert("Start date must be before end date");
                    endDatepicker.value(startDate);
                }
                console.log(endDate - startDate);
                let diffDays = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24));
                if (diffDays > 7) {
                    alert("Date difference must be less than 7 days");
                    startDatepicker.value(endDate - 1);
                }
            }

            let modalMode = "ADD"; // ADD, UPDATE
            let orderTable = $("#orderTable").DataTable({
                info: false,
                lengthChange: false,
                searching: false,
                pageLength: 15,
                select: {
                    style: "single",
                },
                scrollX: true,
                layout: {
                    bottomStart: {
                        buttons: [
                            {
                                extend: 'csvHtml5',
                                className: 'btn btn-primary btn-border',
                                title: 'test',
                            },
                            {
                                extend: 'excelHtml5',
                                className: 'btn btn-success btn-border',
                            },
                        ]
                    }
                },
                // ajax: {
                //     type: "post",
                //     url: "api/order.php",
                //     dataType: "json",
                //     data: {
                //         flag: "selectAll",
                //     },
                // },
                // columns: [{
                //         data: "idx"
                //     },
                //     {
                //         data: "id"
                //     },
                //     {
                //         data: "name"
                //     },
                    // {
                    //     data: "authority",
                    //     render: function(data, type, row) {
                    //         return data === "0" ? "Admin" : "Customer";
                    //     },
                    // },
                    // {
                    //     data: "email"
                    // },
                    // {
                    //     data: "company"
                    // },
                    // {
                    //     data: "memo"
                    // },
                // ],
                rowCallback: function(row, data) {
                    
                }
            });

            $("#orderButton").click(function() {
                modalMode = "ADD";
                resetModalForm();
                $("#orderModal").modal('show');
                $("#orderName").focus();
            });

            $("#searchButton").click(function() {
                $.ajax({
                    url: "api/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAll",
                        startDate: $("#startDatepicker").val(),
                        endDate: $("#endDatepicker").val(),
                        orderIdx: $("#orderIdx").val(),
                        orderState: $("#orderState").val(),
                    },
                    success: function(result) {
                        console.log(result.data);
                    },
                    error: function(result, status, error) {
                        console.log(result);
                    },
                });
            });

            $("#orderTable tbody").on("click", "tr", function() {
                
            });

            function resetModalForm() {
                $("#orderName").val("");
                $("#orderDesign").empty();
                $("#orderIndex").empty();
                $("#orderColor").empty();
                $("#orderCorridor").val("");
                $("#orderCoating").val("");
                $('input[name="orderType"][value="1"]').prop('checked', true).trigger('change');
                
            }

            $("input[name='orderType']").change(function() {
                console.log($(this).val());
                $("#orderDesign").empty();
                $("#orderIndex").empty();
                $("#orderColor").empty();
                $("#orderCorridor").val("");
                $("#orderCoating").val("");
                $.ajax({
                    url: "api/order-design.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAllByType",
                        type_idx: $(this).val(),
                    },
                    success: function(result) {
                        console.log(result.data);
                        $("#orderDesign").empty();
                        $.each(result.data, function(index, design) {
                            $("#orderDesign").append("<option value='" + design.idx + "'>" + design.name + "</option>");
                        });
                        $("#orderDesign").val("");
                    },
                    error: function(result, status, error) {
                        console.log(result);
                    },
                });

                if ($(this).val() === "1") {
                    $("#orderCorridor").attr("disabled", false);
                } else if ($(this).val() === "2") {
                    $("#orderCorridor").attr("disabled", true);
                    $("#orderCorridor").val("");
                } else if ($(this).val() === "3") {
                    $("#orderCorridor").attr("disabled", true);
                    $("#orderCorridor").val("");
                }
            });

            $("#orderDesign").change(function() {
                console.log($("input[name='orderType']:checked").val());
                $.ajax({
                    url: "api/order-index.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAllByType",
                        type_idx: $("input[name='orderType']:checked").val(),
                    },
                    success: function(result) {
                        console.log(result.data);
                        $("#orderIndex").empty();
                        $.each(result.data, function(index, index) {
                            $("#orderIndex").append("<option value='" + index.idx + "'>" + index.name + "</option>");
                        });
                        $("#orderIndex").val("");
                    },
                    error: function(result, status, error) {
                        console.log(result);
                    },
                });
            });

            $("#orderIndex").change(function() {
                console.log($("#orderIndex").val());
                $.ajax({
                    url: "api/order-color.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAllByIndex",
                        index_idx: $("#orderIndex").val(),
                    },
                    success: function(result) {
                        console.log(result.data);
                        $("#orderColor").empty();
                        $.each(result.data, function(index, color) {
                            $("#orderColor").append("<option value='" + color.idx + "'>" + color.name + "</option>");
                        });
                        $("#orderColor").val("");
                    },
                    error: function(result, status, error) {
                        console.log(result);
                    },
                });
            });

            $("#saveButton").click(function() {
                console.log("saveButton");
                let orderName = $("#orderName").val();
                let orderDesign = $("#orderDesign").val() || "";
                let orderIndex = $("#orderIndex").val() || "";
                let orderColor = $("#orderColor").val() || "";
                let orderCorridor = $("#orderCorridor").val() || "";
                let orderFrame = $("input[name='orderFrame']:checked").val() || "";
                let orderCoating = $("#orderCoating").val() || "";
                let orderUV = $("input[name='orderUV']").is(":checked") ? true : false;
                let orderTintColor = $("input[name='orderTintColor']:checked").val() || "";
                let orderMirror = $("input[name='orderMirror']:checked").val() || "";
                let orderQty = $("#orderQty").val() || "";

                if (!orderName) {
                    $("#orderNameFormGroup").addClass("has-error has-feedback");
                    $("#orderNameHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderNameFormGroup").removeClass("has-error has-feedback");
                    $("#orderNameHelp").addClass("d-none");
                }

                console.log(
                    "orderName: " + orderName + 
                    ", \norderType: " + $("input[name='orderType']:checked").val() + 
                    ", \norderRSPH: " + $("#orderRSPH").val() + 
                    ", \norderRCYL: " + $("#orderRCYL").val() + 
                    ", \norderRAXIS: " + $("#orderRAXIS").val() + 
                    ", \norderRADD: " + $("#orderRADD").val() + 
                    ", \norderRDIA: " + $("#orderRDIA").val() + 
                    ", \norderRPRISM: " + $("#orderRPRISM").val() + 
                    ", \norderRQTY: " + $("#orderRQTY").val() + 
                    ", \norderLSPH: " + $("#orderLSPH").val() + 
                    ", \norderLCYL: " + $("#orderLCYL").val() + 
                    ", \norderLAXIS: " + $("#orderLAXIS").val() + 
                    ", \norderLADD: " + $("#orderLADD").val() + 
                    ", \norderLDIA: " + $("#orderLDIA").val() + 
                    ", \norderLPRISM: " + $("#orderLPRISM").val() + 
                    ", \norderLQTY: " + $("#orderLQTY").val() + 
                    ", \norderHBOX: " + $("#orderHBOX").val() + 
                    ", \norderVBOX: " + $("#orderVBOX").val() + 
                    ", \norderEDBOX: " + $("#orderEDBOX").val() + 
                    ", \norderDBL: " + $("#orderDBL").val() + 
                    ", \norderRSEG: " + $("#orderRSEG").val() + 
                    ", \norderRPD: " + $("#orderRPD").val() + 
                    ", \norderLPD: " + $("#orderLPD").val() + 
                    ", \norderPANTO: " + $("#orderPANTO").val() + 
                    ", \norderZTILT: " + $("#orderZTILT").val() + 
                    ", \norderINSET: " + $("#orderINSET").val() + 
                    ", \norderDesign: " + orderDesign + 
                    ", \norderIndex: " + orderIndex + 
                    ", \norderColor: " + orderColor + 
                    ", \norderCorridor: " + orderCorridor + 
                    ", \norderFrame: " + orderFrame + 
                    ", \norderCoating: " + orderCoating + 
                    ", \norderUV: " + orderUV + 
                    ", \norderTintColor: " + orderTintColor + 
                    ", \norderTintColorDesc: " + $("#orderTintColorDesc").val() + 
                    ", \norderMirror: " + orderMirror + 
                    ", \norderMirrorDesc: " + $("#orderMirrorDesc").val() + 
                    ", \norderMemo: " + $("#orderMemo").val() + 
                    ", \norderQty: " + $("#orderQty").val()
                );

                $.ajax({
                    url: "api/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "createOne",
                        orderName: orderName,
                        orderType: $("input[name='orderType']:checked").val(),
                        
                        orderRSPH: $("#orderRSPH").val(),
                        orderRCYL: $("#orderRCYL").val(),
                        orderRAXIS: $("#orderRAXIS").val(),
                        orderRADD: $("#orderRADD").val(),
                        orderRDIA: $("#orderRDIA").val(),
                        orderRPRISM: $("#orderRPRISM").val(),
                        orderRQTY: $("#orderRQTY").val(),

                        orderLSPH: $("#orderLSPH").val(),
                        orderLCYL: $("#orderLCYL").val(),
                        orderLAXIS: $("#orderLAXIS").val(),
                        orderLADD: $("#orderLADD").val(),
                        orderLDIA: $("#orderLDIA").val(),
                        orderLPRISM: $("#orderLPRISM").val(),
                        orderLQTY: $("#orderLQTY").val(),

                        orderHBOX: $("#orderHBOX").val(),
                        orderVBOX: $("#orderVBOX").val(),
                        orderEDBOX: $("#orderEDBOX").val(),
                        orderDBL: $("#orderDBL").val(),
                        orderRSEG: $("#orderRSEG").val(),
                        orderRPD: $("#orderRPD").val(),
                        orderLPD: $("#orderLPD").val(),
                        orderPANTO: $("#orderPANTO").val(),
                        orderZTILT: $("#orderZTILT").val(),
                        orderINSET: $("#orderINSET").val(),

                        orderDesign: orderDesign,
                        orderIndex: orderIndex,
                        orderColor: orderColor,
                        orderCorridor: orderCorridor,
                        orderFrame: orderFrame,
                        orderCoating: orderCoating,
                        orderUV: orderUV,
                        orderTintColor: orderTintColor,
                        orderTintColorDesc: $("#orderTintColorDesc").val(),
                        orderMirror: orderMirror,
                        orderMirrorDesc: $("#orderMirrorDesc").val(),
                        orderMemo: $("#orderMemo").val(),
                        orderQty: $("#orderQty").val(),
                    },
                    success: function(result) {
                        console.log(result);
                    },
                    error: function(result, status, error) {
                        console.log(result);
                    },
                });
            });
        });
    </script>
</body>

</html>
<?php
include("../../utils/checkAdmin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../commons/head.php') ?>
    <link rel="stylesheet" href="../../assets/css/datatables.min.css" />
    <link rel="stylesheet" href="../../assets/css/gijgo.css" />
    <link rel="stylesheet" href="../../assets/css/custom.css" />
    
    <style>
        #orderModal .form-control {
            border-width: 1px;
            border-color: #d8d9dd;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include('../commons/sidebar.php') ?>

        <div class="main-panel">
            <?php include('../commons/header.php') ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Admin Order List</h4>
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
                                            <select class="form-select form-control" id="state">
                                                <option disabled hidden selected>State</option>
                                                <option value="">All</option>
                                                <option value="ordered">Ordered</option>
                                                <option value="processing">Processing</option>
                                                <option value="completed">Completed</option>
                                                <option value="canceled">Canceled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 d-flex">
                                            <button id="searchButton" class="btn btn-muted btn-round ms-auto me-1 float-right">
                                                <i class="fas fa-search"></i>
                                                Search
                                            </button>
                                            <button id="orderButton" class="btn btn-primary btn-round float-right">
                                                <i class="fa fa-plus"></i>
                                                Order
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="orderTable" class="cell-border nowrap hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Customer</th>
                                                    <th>Name</th>
                                                    <!-- <th>Type</th> -->
                                                    <th>Index</th>
                                                    <th>Design</th>
                                                    <th>Color</th>
                                                    <th>Coating</th>
                                                    <th>R&L</th>
                                                    <th>SPH</th>
                                                    <th>CYL</th>
                                                    <th>AXIS</th>
                                                    <th>ADD</th>
                                                    <th>DIA</th>
                                                    <th>PRISM</th>
                                                    <th>MEMO</th>
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
            <?php include('../commons/footer.php') ?>
        </div>
    </div>

    <?php include("../commons/order-modal.php") ?>

    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="../../assets/js/plugin/datatables/dataTables.select.js"></script>
    <script src="../../assets/js/plugin/datatables/select.dataTables.js"></script>
    <script src="../../assets/js/plugin/datatables/dataTables.buttons.js"></script>
    <script src="../../assets/js/plugin/datatables/buttons.dataTables.js"></script>
    <script src="../../assets/js/plugin/datatables/jszip.min.js"></script>
    <script src="../../assets/js/plugin/datatables/vfs_fonts.js"></script>
    <script src="../../assets/js/plugin/datatables/buttons.html5.min.js"></script>
    <script src="../../assets/js/plugin/datepicker/gijgo.min.js"></script>
    <script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
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
            startDatepicker.value(new Date());
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
                let diffDays = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24));
                if (diffDays > 7) {
                    alert("Date difference must be less than 7 days");
                    endDatepicker.value(startDate);
                }
            }

            let modalMode = "ADD";
            let orderIdx = "";

            let isFirstRow = true;
            let isColored = false;
            let prevRowIdx = "";
            let orderTable = $("#orderTable").DataTable({
                info: false,
                lengthChange: false,
                searching: false,
                pageLength: 15,
                select: false,
                scrollX: true,
                layout: {
                    bottomStart: {
                        buttons: [
                            {
                                extend: 'csvHtml5',
                                className: 'btn btn-primary btn-border',
                            },
                            {
                                extend: 'excelHtml5',
                                className: 'btn btn-success btn-border',
                            },
                        ]
                    }
                },
                ajax: {
                    url: "../../api/admin/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectOrderListBy",
                        startDate: $("#startDatepicker").val(),
                        endDate: $("#endDatepicker").val(),
                        orderIdx: $("#orderIdx").val(),
                        state: $("#state").val(),
                    },
                },
                columns: [
                    { data: "idx" },
                    { data: "member_name" },
                    { data: "name" },
                    // { data: "type" },
                    { data: "index_name" },
                    { data: "design_name" },
                    { data: "color_name" },
                    { data: "coating" },
                    { data: "spec_LR" },
                    { data: "spec_sph" },
                    { data: "spec_cyl" },
                    { data: "spec_axis" },
                    { data: "spec_add" },
                    { data: "spec_dia" },
                    { data: "spec_prism" },
                    { data: "memo" },
                    { data: "spec_qty" },
                    {
                        data: "state",
                        render: function(data, type, row) {
                            if (data === "ordered") {
                                return '<span class="badge badge-danger">Ordered</span>';
                            } else if (data === "processing") {
                                return '<span class="badge badge-primary">Processing</span>';
                            } else if (data === "completed") {
                                return '<span class="badge badge-success">Completed</span>';
                            } else if (data === "canceled") {
                                return '<span class="badge badge-count">Canceled</span>';
                            } else {
                                return data;
                            }
                        },
                    },
                ],
                rowCallback: function(row, data) {
                    let currentIdx = data.idx;
                    if (prevRowIdx === undefined) {
                        prevRowIdx = currentIdx;
                        isColored = false;
                        return;
                    }

                    if (prevRowIdx !== currentIdx) {
                        isColored = !isColored;
                        prevRowIdx = currentIdx;
                    }

                    if (isColored) {
                        $(row).css('background-color', '');
                    } else {
                        $(row).css('background-color', '#F0F0F0');
                    }
                },
            });

            $("#orderButton").click(function() {
                modalMode = "ADD";
                resetModalForm();
                $('input[name="orderType"][value="1"]').prop('checked', true).trigger('change');
                $("#orderModal").modal('show');
                $("#orderName").focus();
            });

            $("#searchButton").click(function() {
                isFirstRow = true;
                isColored = false;
                $.ajax({
                    url: "../../api/admin/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectOrderListBy",
                        startDate: $("#startDatepicker").val(),
                        endDate: $("#endDatepicker").val(),
                        orderIdx: $("#orderIdx").val(),
                        state: $("#state").val(),
                    },
                    success: function(result) {
                        orderTable.clear();
                        orderTable.rows.add(result.data).draw();
                    },
                    error: function(result, status, error) {},
                });
            });

            $("#orderTable tbody").on("click", "tr", function() {
                modalMode = "UPDATE";
                orderIdx = orderTable.row(this).data().idx;
                resetModalForm();
                $("#deleteButton").removeClass("invisible");
                $.ajax({
                    url: "../../api/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectOne",
                        orderIdx: orderIdx,
                    },
                    success: function(result) {
                        $("#orderName").val(result.name);
                        $('input[name="orderType"][value="' + result.type_idx + '"]').prop('checked', true);
                        if (result.type_idx === "1") {
                            $("#orderCorridor").attr("disabled", false);
                        } else {
                            $("#orderCorridor").attr("disabled", true);
                        }
                        $.each(result.lens_spec, function(index, lensSpec) {
                            if (lensSpec.LR === "R") {
                                $("#orderRSPH").val(lensSpec.sph);
                                $("#orderRCYL").val(lensSpec.cyl);
                                $("#orderRAXIS").val(lensSpec.axis);
                                $("#orderRADD").val(lensSpec.add);
                                $("#orderRDIA").val(lensSpec.dia);
                                $("#orderRPRISM").val(lensSpec.prism);
                                $("#orderRQTY").val(lensSpec.qty);
                            } else if (lensSpec.LR === "L") {
                                $("#orderLSPH").val(lensSpec.sph);
                                $("#orderLCYL").val(lensSpec.cyl);
                                $("#orderLAXIS").val(lensSpec.axis);
                                $("#orderLADD").val(lensSpec.add);
                                $("#orderLDIA").val(lensSpec.dia);
                                $("#orderLPRISM").val(lensSpec.prism);
                                $("#orderLQTY").val(lensSpec.qty);
                            }
                        });
                        $("#orderHBOX").val(result.hbox);
                        $("#orderVBOX").val(result.vbox);
                        $("#orderEDBOX").val(result.edbox);
                        $("#orderDBL").val(result.dbl);
                        $("#orderRSEG").val(result.r_segh);
                        $("#orderRPD").val(result.r_pd);
                        $("#orderLPD").val(result.l_pd);
                        $("#orderPANTO").val(result.panto);
                        $("#orderZTILT").val(result.ztilt);
                        $("#orderINSET").val(result.inset);

                        $.ajax({
                            url: "../../api/order-design.php",
                            type: "post",
                            dataType: "json",
                            data: {
                                flag: "selectAllByType",
                                type_idx: result.type_idx,
                            },
                            success: function(designResult) {
                                $("#orderDesign").empty();
                                $.each(designResult.data, function(index, design) {
                                    $("#orderDesign").append("<option value='" + design.idx + "'>" + design.name + "</option>");
                                });
                                $("#orderDesign").val(result.design_idx);

                                $.ajax({
                                    url: "../../api/order-index.php",
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        flag: "selectAllByTypeAndDesign",
                                        type_idx: result.type_idx,
                                        design_idx: result.design_idx,
                                    },
                                    success: function(indexResult) {
                                        $("#orderIndex").empty();
                                        $.each(indexResult.data, function(index, index) {
                                            $("#orderIndex").append("<option value='" + index.idx + "'>" + index.name + "</option>");
                                        });
                                        $("#orderIndex").val(result.index_idx);

                                        $.ajax({
                                            url: "../../api/order-color.php",
                                            type: "post",
                                            dataType: "json",
                                            data: {
                                                flag: "selectAllByIndex",
                                                index_idx: result.index_idx,
                                            },
                                            success: function(colorResult) {
                                                $("#orderColor").empty();
                                                $.each(colorResult.data, function(index, color) {
                                                    $("#orderColor").append("<option value='" + color.idx + "'>" + color.name + "</option>");
                                                });
                                                $("#orderColor").val(result.color_idx);
                                            },
                                            error: function(result, status, error) {},
                                        });
                                    },
                                    error: function(result, status, error) {},
                                });
                            },
                            error: function(result, status, error) {},
                        });

                        $("#orderCorridor").val(result.corridor);
                        $("input[name='orderFrame'][value='" + result.frame + "']").prop("checked", true);
                        $("#orderCoating").val(result.coating);
                        $("input[name='orderUV']").prop("checked", result.uv === "true");

                        $("input[name='orderTintColor'][value='" + result.tint_color + "']").prop("checked", true);
                        $("#orderTintColorDesc").val(result.tint_color_desc);
                        $("input[name='orderMirror'][value='" + result.mirror + "']").prop("checked", true);
                        $("#orderMirrorDesc").val(result.mirror_desc);
                        $("#orderMemo").val(result.memo);
                        $("#orderState").val(result.state);

                        $("#orderModal").modal('show');
                    },
                    error: function(result, status, error) {},
                });
            });            

            $("input[name='orderType']").change(function() {
                $("#orderDesign").empty();
                $("#orderIndex").empty();
                $("#orderColor").empty();
                $("#orderCorridor").val("");
                $("#orderCoating").val("");
                
                $.ajax({
                    url: "../../api/order-design.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAllByType",
                        type_idx: $(this).val(),
                    },
                    success: function(result) {
                        $("#orderDesign").empty();
                        $.each(result.data, function(index, design) {
                            $("#orderDesign").append("<option value='" + design.idx + "'>" + design.name + "</option>");
                        });
                        $("#orderDesign").val("");
                    },
                    error: function(result, status, error) {},
                });

                if ($(this).val() === "1") {
                    $.ajax({
                        url: "../../api/order-index.php",
                        type: "post",
                        dataType: "json",
                        data: {
                            flag: "selectAllByTypeAndDesign",
                            type_idx: $("input[name='orderType']:checked").val(),
                        },
                        success: function(result) {
                            $("#orderIndex").empty();
                            $.each(result.data, function(index, index) {
                                $("#orderIndex").append("<option value='" + index.idx + "'>" + index.name + "</option>");
                            });
                            $("#orderIndex").val("");
                        },
                        error: function(result, status, error) {},
                    });
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
                if ($("input[name='orderType']:checked").val() !== "1") {
                    $.ajax({
                        url: "../../api/order-index.php",
                        type: "post",
                        dataType: "json",
                        data: {
                            flag: "selectAllByTypeAndDesign",
                            type_idx: $("input[name='orderType']:checked").val(),
                            design_idx: $(this).val(),
                        },
                        success: function(result) {
                            $("#orderIndex").empty();
                            $.each(result.data, function(index, index) {
                                $("#orderIndex").append("<option value='" + index.idx + "'>" + index.name + "</option>");
                            });
                            $("#orderIndex").val("");
                        },
                        error: function(result, status, error) {},
                    });
                }
                $("#orderIndex").val("");
                $("#orderColor").val("");
            });

            $("#orderIndex").change(function() {
                $.ajax({
                    url: "../../api/order-color.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "selectAllByIndex",
                        index_idx: $("#orderIndex").val(),
                    },
                    success: function(result) {
                        $("#orderColor").empty();
                        $.each(result.data, function(index, color) {
                            $("#orderColor").append("<option value='" + color.idx + "'>" + color.name + "</option>");
                        });
                        $("#orderColor").val("");
                    },
                    error: function(result, status, error) {},
                });
                $("#orderColor").val("");
            });

            $("#saveButton").click(function() {
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

                // orderName validation
                if (!orderName) {
                    $("#orderNameFormGroup").addClass("has-error has-feedback");
                    $("#orderNameHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderNameFormGroup").removeClass("has-error has-feedback");
                    $("#orderNameHelp").addClass("d-none");
                }

                // orderRSPH validation
                if (!$("#orderRSPH").val()) {
                    $("#orderRSPHFormGroup").addClass("has-error has-feedback");
                    $("#orderRSPHHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderRSPHFormGroup").removeClass("has-error has-feedback");
                    $("#orderRSPHHelp").addClass("d-none");
                }

                // orderRCYL validation
                if (!$("#orderRCYL").val()) {
                    $("#orderRCYLFormGroup").addClass("has-error has-feedback");
                    $("#orderRCYLHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderRCYLFormGroup").removeClass("has-error has-feedback");
                    $("#orderRCYLHelp").addClass("d-none");
                }

                // orderRQTY validation
                if (!$("#orderRQTY").val()) {
                    $("#orderRQTYFormGroup").addClass("has-error has-feedback");
                    $("#orderRQTYHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderRQTYFormGroup").removeClass("has-error has-feedback");
                    $("#orderRQTYHelp").addClass("d-none");
                }

                // orderLSPH validation
                if (!$("#orderLSPH").val()) {
                    $("#orderLSPHFormGroup").addClass("has-error has-feedback");
                    $("#orderLSPHHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderLSPHFormGroup").removeClass("has-error has-feedback");
                    $("#orderLSPHHelp").addClass("d-none");
                }

                // orderLCYL validation
                if (!$("#orderLCYL").val()) {
                    $("#orderLCYLFormGroup").addClass("has-error has-feedback");
                    $("#orderLCYLHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderLCYLFormGroup").removeClass("has-error has-feedback");
                    $("#orderLCYLHelp").addClass("d-none");
                }

                // orderLQTY validation
                if (!$("#orderLQTY").val()) {
                    $("#orderLQTYFormGroup").addClass("has-error has-feedback");
                    $("#orderLQTYHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderLQTYFormGroup").removeClass("has-error has-feedback");
                    $("#orderLQTYHelp").addClass("d-none");
                }

                // orderFrame validation
                if (!orderFrame) {
                    $("#orderFrameFormGroup").addClass("has-error has-feedback");
                    $("#orderFrameHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderFrameFormGroup").removeClass("has-error has-feedback");
                    $("#orderFrameHelp").addClass("d-none");
                }

                // orderCoating validation
                if (!orderCoating) {
                    $("#orderCoatingFormGroup").addClass("has-error has-feedback");
                    $("#orderCoatingHelp").removeClass("d-none");
                    return;
                } else {
                    $("#orderCoatingFormGroup").removeClass("has-error has-feedback");
                    $("#orderCoatingHelp").addClass("d-none");
                }                

                if (modalMode === "ADD") {
                    $.ajax({
                        url: "../../api/order.php",
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
                        },
                        success: function(result) {
                            alert("Order created successfully");
                            $("#searchButton").click();
                            $("#orderModal").modal('hide');
                        },
                        error: function(result, status, error) {
                            swal("Error", "Order creation failed", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                        },
                    });
                } else if (modalMode === "UPDATE") {
                    $.ajax({
                        url: "../../api/order.php",
                        type: "post",
                        dataType: "json",
                        data: {
                            flag: "updateOne",
                            orderIdx: orderIdx,
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
                            orderState: $("#orderState").val(),
                        },
                        success: function(result) {
                            alert("Order updated successfully");
                            $("#searchButton").click();
                            $("#orderModal").modal('hide');
                        },
                        error: function(result, status, error) {
                            swal("Error", "Order update failed", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                        },
                    });
                }                
            });

            $("#deleteButton").click(function() {
                if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        url: "../../api/admin/order.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        flag: "deleteOne",
                        orderIdx: orderIdx,
                    },
                    success: function(result) {
                        alert("Order deleted successfully");
                        $("#searchButton").click();
                        $("#orderModal").modal('hide');
                        },
                    });
                }
            });

            function resetModalForm() {
                $("#orderName").val("");
                $("#orderDesign").empty();
                $("#orderIndex").empty();
                $("#orderColor").empty();
                $("#orderCorridor").val("");
                $("#orderCoating").val("");
                $("#orderRSPH").val("");
                $("#orderRCYL").val("");
                $("#orderRAXIS").val("");
                $("#orderRADD").val("");
                $("#orderRDIA").val("");
                $("#orderRPRISM").val("");
                $("#orderRQTY").val("");
                $("#orderLSPH").val("");
                $("#orderLCYL").val("");
                $("#orderLAXIS").val("");
                $("#orderLADD").val("");
                $("#orderLDIA").val("");
                $("#orderLPRISM").val("");
                $("#orderLQTY").val("");
                $("#orderHBOX").val("");
                $("#orderVBOX").val("");
                $("#orderEDBOX").val("");
                $("#orderDBL").val("");
                $("#orderRSEG").val("");
                $("#orderRPD").val("");
                $("#orderLPD").val("");
                $("#orderPANTO").val("");
                $("#orderZTILT").val("");
                $("#orderINSET").val("");
                $("input[name='orderFrame']").prop("checked", false);
                $("#orderCoating").val("");
                $("input[name='orderUV']").prop("checked", false);
                $("input[name='orderTintColor']").prop("checked", false);
                $("#orderTintColorDesc").val("");
                $("input[name='orderMirror']").prop("checked", false);
                $("#orderMirrorDesc").val("");
                $("#orderMemo").val("");

                $("#orderName").attr("disabled", false);
                $("input[name='orderType']").attr("disabled", false);
                $("#orderRSPH").attr("disabled", false);
                $("#orderRCYL").attr("disabled", false);
                $("#orderRAXIS").attr("disabled", false);
                $("#orderRADD").attr("disabled", false);
                $("#orderRDIA").attr("disabled", false);
                $("#orderRPRISM").attr("disabled", false);
                $("#orderRQTY").attr("disabled", false);
                $("#orderLSPH").attr("disabled", false);
                $("#orderLCYL").attr("disabled", false);
                $("#orderLAXIS").attr("disabled", false);
                $("#orderLADD").attr("disabled", false);
                $("#orderLDIA").attr("disabled", false);
                $("#orderLPRISM").attr("disabled", false);
                $("#orderLQTY").attr("disabled", false);
                $("#orderHBOX").attr("disabled", false);
                $("#orderVBOX").attr("disabled", false);
                $("#orderEDBOX").attr("disabled", false);
                $("#orderDBL").attr("disabled", false);
                $("#orderRSEG").attr("disabled", false);
                $("#orderRPD").attr("disabled", false);
                $("#orderLPD").attr("disabled", false);
                $("#orderPANTO").attr("disabled", false);
                $("#orderZTILT").attr("disabled", false);
                $("#orderINSET").attr("disabled", false);
                $("#orderDesign").attr("disabled", false);
                $("#orderIndex").attr("disabled", false);
                $("#orderColor").attr("disabled", false);
                $("#orderCorridor").attr("disabled", false);
                $("input[name='orderFrame']").prop("disabled", false);   
                $("#orderCoating").attr("disabled", false);
                $("input[name='orderUV']").prop("disabled", false);
                $("input[name='orderTintColor']").prop("disabled", false);
                $("#orderTintColorDesc").attr("disabled", false);
                $("input[name='orderMirror']").prop("disabled", false);
                $("#orderMirrorDesc").attr("disabled", false);
                $("#orderMemo").attr("disabled", false);

                $("#orderNameFormGroup").removeClass("has-error has-feedback");
                $("#orderNameHelp").addClass("d-none");
                $("#orderCoatingFormGroup").removeClass("has-error has-feedback");
                $("#orderCoatingHelp").addClass("d-none");
                $("#orderFrameFormGroup").removeClass("has-error has-feedback");
                $("#orderFrameHelp").addClass("d-none");
                $("#orderRSPHFormGroup").removeClass("has-error has-feedback");
                $("#orderRSPHHelp").addClass("d-none");
                $("#orderRCYLFormGroup").removeClass("has-error has-feedback");
                $("#orderRCYLHelp").addClass("d-none");
                $("#orderRQTYFormGroup").removeClass("has-error has-feedback");
                $("#orderRQTYHelp").addClass("d-none");
                $("#orderLSPHFormGroup").removeClass("has-error has-feedback");
                $("#orderLSPHHelp").addClass("d-none");
                $("#orderLCYLFormGroup").removeClass("has-error has-feedback");
                $("#orderLCYLHelp").addClass("d-none");
                $("#orderLQTYFormGroup").removeClass("has-error has-feedback");
                $("#orderLQTYHelp").addClass("d-none");

                $("#deleteButton").addClass("invisible");
            }

            function disableModalForm() {
                $("#orderName").attr("disabled", true);
                $("input[name='orderType']").attr("disabled", true);
                $("#orderRSPH").attr("disabled", true);
                $("#orderRCYL").attr("disabled", true);
                $("#orderRAXIS").attr("disabled", true);
                $("#orderRADD").attr("disabled", true);
                $("#orderRDIA").attr("disabled", true);
                $("#orderRPRISM").attr("disabled", true);
                $("#orderRQTY").attr("disabled", true);
                $("#orderLSPH").attr("disabled", true);
                $("#orderLCYL").attr("disabled", true);
                $("#orderLAXIS").attr("disabled", true);
                $("#orderLADD").attr("disabled", true);
                $("#orderLDIA").attr("disabled", true);
                $("#orderLPRISM").attr("disabled", true);
                $("#orderLQTY").attr("disabled", true);
                $("#orderHBOX").attr("disabled", true);
                $("#orderVBOX").attr("disabled", true);
                $("#orderEDBOX").attr("disabled", true);
                $("#orderDBL").attr("disabled", true);
                $("#orderRSEG").attr("disabled", true);
                $("#orderRPD").attr("disabled", true);
                $("#orderLPD").attr("disabled", true);
                $("#orderPANTO").attr("disabled", true);
                $("#orderZTILT").attr("disabled", true);
                $("#orderINSET").attr("disabled", true);
                $("#orderDesign").attr("disabled", true);
                $("#orderIndex").attr("disabled", true);
                $("#orderColor").attr("disabled", true);
                $("#orderCorridor").attr("disabled", true);
                $("input[name='orderFrame']").prop("disabled", true);   
                $("#orderCoating").attr("disabled", true);
                $("input[name='orderUV']").prop("disabled", true);
                $("input[name='orderTintColor']").prop("disabled", true);
                $("#orderTintColorDesc").attr("disabled", true);
                $("input[name='orderMirror']").prop("disabled", true);
                $("#orderMirrorDesc").attr("disabled", true);
                $("#orderMemo").attr("disabled", true);
            }
        });
    </script>
</body>

</html>
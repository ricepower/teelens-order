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
                                            <input id="datepicker1" />
                                        </div>
                                        <div class="col-md-2">
                                            <input id="datepicker2" />
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control form-control" id="defaultInput" placeholder="Order No" />
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-select form-control" id="defaultSelect">
                                                <option disabled hidden selected>State</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
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
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>R</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-danger">Orderd</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>L</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-warning">Orderd</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>L</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-warning">Orderd</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>L</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-warning">Orderd</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>L</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-warning">Orderd</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                                                    <td>Free Form Progressive</td>
                                                    <td>Premium HMC</td>
                                                    <td>L</td>
                                                    <td>1.0</td>
                                                    <td>2.0</td>
                                                    <td>3.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>1.0</td>
                                                    <td>2</td>
                                                    <td><span class="badge badge-warning">Orderd</span></td>
                                                </tr>
                                            </tbody>
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
            let picker1 = $("#datepicker1").datepicker({
                uiLibrary: "bootstrap5"
            });

            let picker2 = $("#datepicker2").datepicker({
                uiLibrary: "bootstrap5"
            });

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
                // ajax: {
                //     type: "post",
                //     url: "api/admin/member.php",
                //     dataType: "json",
                //     data: {
                //         flag: "selectAll",
                //     },
                // },
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
                // columns: [{
                //         data: "idx"
                //     },
                //     {
                //         data: "id"
                //     },
                //     {
                //         data: "name"
                //     },
                //     {
                //         data: "authority",
                //         render: function(data, type, row) {
                //             return data === "0" ? "Admin" : "Customer";
                //         },
                //     },
                //     {
                //         data: "email"
                //     },
                //     {
                //         data: "company"
                //     },
                //     {
                //         data: "memo"
                //     },
                // ],
                rowCallback: function(row, data) {
                    
                }
            });

            $("#orderButton").click(function() {
                modalMode = "ADD";
                resetModalForm();
                $("#orderModal").modal('show');
            });

            $("#searchButton").click(function() {
                console.log("searchButton");
            });

            $("#saveButton").click(function() {
                
            });

            $("#orderTable tbody").on("click", "tr", function() {
                
            });

            function resetModalForm() {
                
            }
        });
    </script>
</body>

</html>
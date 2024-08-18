<?php
include("checkAdmin.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="assets/css/datatables.min.css" />
</head>

<body>
    <div class="wrapper">
        <?php include('sidebar.php') ?>

        <div class="main-panel">
            <?php include('header.php') ?>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">User Manage</h4>
                    </div>
                    <div class="page-category">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <button id="addButton" class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus"></i>
                                            Add User
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="userTable" class="order-column hover">
                                            <thead>
                                                <tr>
                                                    <th>Idx</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Authority</th>
                                                    <th>Email</th>
                                                    <th>Company</th>
                                                    <th>Memo</th>
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

    <?php include("user-modal.html") ?>

    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="assets/js/plugin/datatables/dataTables.select.js"></script>
    <script src="assets/js/plugin/datatables/select.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            let modalMode = "ADD"; // ADD, UPDATE
            let userTable = $("#userTable").DataTable({
                info: false,
                lengthChange: false,
                searching: false,
                pageLength: 15,
                select: {
                    style: "single",
                },
                ajax: {
                    type: "post",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        flag: "selectAll",
                    },
                },
                columns: [{
                        data: "idx"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "authority",
                        render: function(data, type, row) {
                            return data === "0" ? "Admin" : "Customer";
                        },
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "company"
                    },
                    {
                        data: "memo"
                    },
                ],
            });

            $("#addButton").click(function() {
                modalMode = "ADD";
                resetModalForm();
                $("#modal").modal('show');
            });

            $("#saveButton").click(function() {
                let id = $("#id").val().trim();
                let password = $("#password").val().trim();
                let name = $("#name").val().trim();
                let authority = $("#authority").val().trim();
                let email = $("#email").val().trim();
                let company = $("#company").val().trim();
                let memo = $("#memo").val().trim();

                if (modalMode === "ADD") {
                    if (!id) {
                        $("#idFormGroup").addClass("has-error has-feedback");
                        $("#idHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#idFormGroup").removeClass("has-error has-feedback");
                        $("#idHelp").addClass("d-none");
                    }

                    if (!password) {
                        $("#passwordFormGroup").addClass("has-error has-feedback");
                        $("#passwordHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#passwordFormGroup").removeClass("has-error has-feedback");
                        $("#passwordHelp").addClass("d-none");
                    }

                    if (!name) {
                        $("#nameFormGroup").addClass("has-error has-feedback");
                        $("#nameHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#nameFormGroup").removeClass("has-error has-feedback");
                        $("#nameHelp").addClass("d-none");
                    }

                    if (authority === "-") {
                        $("#authorityFormGroup").addClass("has-error has-feedback");
                        $("#authorityHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#authorityFormGroup").removeClass("has-error has-feedback");
                        $("#authorityHelp").addClass("d-none");
                    }

                    $.ajax({
                        type: "post",
                        url: "api.php",
                        dataType: "json",
                        data: {
                            flag: "createOne",
                            id: id,
                            password: password,
                            name: name,
                            authority: authority,
                            email: email,
                            company: company,
                            memo: memo,
                        },
                        success: function(result) {
                            alert("Success");
                            userTable.ajax.reload();
                            $("#modal").modal('hide');
                        },
                        error: function(result, status, error) {
                            alert(error);
                        }
                    });
                } else if (modalMode === "UPDATE") {
                    if (!id) {
                        $("#idFormGroup").addClass("has-error has-feedback");
                        $("#idHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#idFormGroup").removeClass("has-error has-feedback");
                        $("#idHelp").addClass("d-none");
                    }

                    if (!name) {
                        $("#nameFormGroup").addClass("has-error has-feedback");
                        $("#nameHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#nameFormGroup").removeClass("has-error has-feedback");
                        $("#nameHelp").addClass("d-none");
                    }

                    if (authority === "-") {
                        $("#authorityFormGroup").addClass("has-error has-feedback");
                        $("#authorityHelp").removeClass("d-none");
                        return;
                    } else {
                        $("#authorityFormGroup").removeClass("has-error has-feedback");
                        $("#authorityHelp").addClass("d-none");
                    }

                    $.ajax({
                        type: "post",
                        url: "api.php",
                        dataType: "json",
                        data: {
                            flag: "updateOne",
                            id: id,
                            password: password,
                            name: name,
                            authority: authority,
                            email: email,
                            company: company,
                            memo: memo,
                        },
                        success: function(result) {
                            alert("Success");
                            userTable.ajax.reload();
                            $("#modal").modal('hide');
                        },
                        error: function(result, status, error) {
                            alert(error);
                        }
                    });
                }
            });

            $("#userTable tbody").on("click", "tr", function() {
                resetModalForm();
                modalMode = "UPDATE";

                row = userTable.row(this).data();
                $.ajax({
                    type: "post",
                    url: "api.php",
                    dataType: "json",
                    data: {
                        flag: "selectOne",
                        id: row["id"],
                    },
                    success: function(result) {
                        $("#id").val(result.id);
                        $("#name").val(result.name);
                        $("#authority").val(result.auth);
                        $("#email").val(result.email);
                        $("#company").val(result.company);
                        $("#memo").val(result.memo);
                        $("#modal").modal('show');
                    },
                    error: function(result, status, error) {
                        console.log(error);
                    }
                });
                
                $("#id").attr("disabled", true);
                $("#modal").modal('show');
            });

            function resetModalForm() {
                $("#id").val("");
                $("#password").val("");
                $("#name").val("");
                $("#authority").val("-");
                $("#email").val("");
                $("#company").val("");
                $("#memo").val("");

                $("#id").attr("disabled", false);
                $("#idFormGroup").removeClass("has-error has-feedback");
                $("#idHelp").addClass("d-none");
                $("#passwordFormGroup").removeClass("has-error has-feedback");
                $("#passwordHelp").addClass("d-none");
                $("#nameFormGroup").removeClass("has-error has-feedback");
                $("#nameHelp").addClass("d-none");
                $("#authorityFormGroup").removeClass("has-error has-feedback");
                $("#authorityHelp").addClass("d-none");
            }
        });
    </script>
</body>

</html>
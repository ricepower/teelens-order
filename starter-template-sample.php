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
            <h4 class="page-title">My Order List</h4>
          </div>
          <div class="page-category">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="addButton" class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i>
                      kkk
                    </button>
                    <button id="addButton" class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i>
                      Add Row
                    </button>
                    <button id="addButton" class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i>
                      kkk223
                    </button>
                    <button id="addButton" class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i>
                      Add Row123213
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="orderTable" class="display order-column">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>Edinburgh</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>Edinburgh</td>
                        </tr>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>Edinburgh</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>Edinburgh</td>
                        </tr>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>Edinburgh</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>Edinburgh</td>
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

  <script src="assets/js/plugin/datatables/datatables.min.js"></script>
  <script src="assets/js/plugin/datatables/dataTables.buttons.js"></script>
  <script src="assets/js/plugin/datatables/buttons.dataTables.js"></script>
  <script src="assets/js/plugin/datatables/jszip.min.js"></script>
  <script src="assets/js/plugin/datatables/vfs_fonts.js"></script>
  <script src="assets/js/plugin/datatables/buttons.html5.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#orderTable").DataTable({
        info: false,
        lengthChange: false,
        searching: false,
        pageLength: 15,
        layout: {
          bottomStart: {
            // buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5']
            buttons: [{
                extend: 'copyHtml5',
                className: 'btn btn-primary btn-border',
              },
              {
                extend: 'excelHtml5',
                className: 'btn btn-primary btn-border',
              },
              {
                extend: 'csvHtml5',
                className: 'btn btn-primary btn-border',
                title: 'test',
              },
            ]
          }
        }
      });

      $("#addButton").click(function() {
        console.log('test');
      });
    });
  </script>
</body>

</html>
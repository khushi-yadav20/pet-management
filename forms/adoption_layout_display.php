<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Layout Custom Area</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Layout Custom Area" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="../css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- Bootstrap CSS (for styling table) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <!-- Custom CSS for search input size -->
    <style>
      /* Make the DataTables search input smaller */
      .dataTables_filter input {
        width: 150px; /* Adjust as needed */
        height: 25px;
        font-size: 14px;
        padding: 10px 15px;
        border-radius: 4px;
      }
    </style>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-chat-text"></i>
                <span class="navbar-badge badge text-bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!-- Messages omitted for brevity -->
                <!-- ... your message items here ... -->
              </div>
            </li>
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!-- Notifications omitted for brevity -->
                <!-- ... your notifications items here ... -->
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="../assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">Khushi</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!-- User Header -->
                <li class="user-header text-bg-primary">
                  <img
                    src="../assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    Khushi - Web Developer
                    <small>Member since Nov. 2023</small>
                  </p>
                </li>
                <!-- User Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                </li>
                <!-- User Footer -->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!--end::Header-->

      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                        <li class="nav-item">
                            <a href="adoption_layout_display.php" class="nav-link">
                                <p>Adoption Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="grooming_layout_display.php" class="nav-link">
                                <p>Pet grooming</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lost_found_layout_display.php" class="nav-link">
                                <p>Pet lost/found</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="vet_layout_display.php" class="nav-link">
                                <p>Vet of Pet</p>
                            </a>
                        </li>   
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
      </aside>
      <!--end::Sidebar-->
       
      <!--begin::Main Content-->
      <main class="app-main">
        <!-- Top Area -->
        <div class="app-content-top-area">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6"><div>App Content Top Area</div></div>
              <div class="col-md-6 text-end">
                <button type="submit" class="btn btn-primary" name="save" value="create">
                  <a href="create_adoption.html" class="link-light link-underline-opacity-0">Add Your's pet for Adoption</a>                 
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Content Header -->
        <div class="app-content-header py-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-8"><h3 class="mb-0"></h3></div>
              <div class="col-sm-4">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Fixed Layout</li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <!-- Your PHP code to fetch and display table -->
        <div class="container-fluid my-4">
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "internship";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          // Create table if not exists
          $conn->query("CREATE TABLE IF NOT EXISTS adoptions (
              id INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(50),
              phone VARCHAR(15),
              email VARCHAR(50),
              pet_type VARCHAR(20),
              submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          )");

          $sql = "SELECT id, name, phone, email, pet_type, submitted_at FROM adoptions";
          $result = $conn->query($sql);

          echo "<h2>Pet Adoption Records</h2>";
          echo "<table id='adoptions' class='table table-bordered table-striped'>";
          echo "<thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Pet Type</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                  </tr>
                </thead>";
          echo "<tbody>";

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["pet_type"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["submitted_at"]) . "</td>";
                  echo "<td>
                          <button class='btn btn-sm btn-primary' onclick='editRecord(".$row["id"].")'>Edit</button>
                          <button class='btn btn-sm btn-danger' onclick='confirmDelete(".$row["id"].")'>Delete</button>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7' class='text-center'>No adoption records found</td></tr>";
          }

          echo "</tbody>";
          echo "</table>";

          $conn->close();
          ?>
        </div>
      </main>
      <!--end::Main Content-->
    </div>
    <!--end::App Wrapper-->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../js/adminlte.js"></script>

    <!-- Include jQuery and DataTables (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <!-- DataTable Initialization -->
    <script>
      $(document).ready(function() {
        $('#adoptions').DataTable({
            lengthMenu: [[3, 5, 10, 15, -1], [3, 5, 10, 15, "All"]],
            pageLength: 10, // default number of records displayed
            order: [[5, 'desc']], // sort by Submitted At descending
            columnDefs: [
                { targets: [4], type: 'string' } // optional: specify column types if needed
            ]
        });
      });

      function editRecord(id) {
        window.location.href = "edit_adoption.php?id=" + id;
      }

      function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this adoption record?")) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "delete_adoption.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              alert(this.responseText);
              location.reload();
            }
          };
          xhr.send("id=" + id);
        }
      }
    </script>
  </body>
</html>
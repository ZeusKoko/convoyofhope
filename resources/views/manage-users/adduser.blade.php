<!DOCTYPE html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">

    <!--====== Title ======-->
    <title>Admin Dashboard</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/icons/favicon.png" type="image/png">

    <!--====== Google Fonts ======-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!--====== Material Icons ======-->
    <link rel="stylesheet" href="assets/iconfont/material-icons.css">

    <!-- dataTables.bootstrap4.min css-->
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="screen">

    <!-- Chart.min css-->
    <link href="assets/css/Chart.min.css" rel="stylesheet" media="screen">

    <!-- animate css-->
    <link href="assets/css/animate.css" rel="stylesheet" media="screen">
    <!-- normalize css-->
    <link href="assets/css/normalize.css" rel="stylesheet" media="screen">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="assets/css/responsive.css">
  

</head>
<body>

<!-- Prealoder -->
<div class="spinner_body">
   <div class="spinner"></div>  
</div>

<!-- Prealoder -->
<!--====== Start Header Section======-->
<header>
    <div class="header">


      <div class="navigation">
        <nav class="navbar navbar-expand-lg navbar-bg">
          
          <div class="brand-logo">
            <a class="navbar-brand" href="index.html" id="menu-action">
              <div class="user-photo d-desktop"><img src="assets/images/icons/favicon.png" alt=""></div>
              <span>Benzi Admin Panel</span>
            </a>    
            <div id="nav-toggle">
                <div class="cta">
                    <div class="toggle-btn type1"></div>
                </div>
            </div>     
          </div>
        <!--   For Toggle Mobile Nav icon -->
          <div class="for-mobile d-mobile">
              <div class= "toggle-button" id = "toggle-button">
                <span class="material-icons">
                menu
                </span>
              </div>

          </div>
              <!--   For Toggle Mobile Nav Icon -->

          <div class="collapse navbar-collapse pr-3" id="#">

            <ul class="navbar-nav user-info ml-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown show">
                <a href="#" class="navbar-nav-link dropdown-toggle text-light" data-toggle="dropdown" aria-expanded="true">
                  <div class="user-photo"><img src="https://dw3i9sxi97owk.cloudfront.net/uploads/thumbs/db9c4e1327eb8fe5e9395a4b04e1ea4a_70x70.jpg" alt=""></div>
                  admin@admin.com
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="account.html" class="dropdown-item"> 
                    <i class="material-icons">
                    supervisor_account
                    </i>
                  Account Settings</a>
                  <div class="menu-dropdown-divider"></div>
                  <a class="dropdown-item" href="login.html"><i class="material-icons">exit_to_app</i>Logout</a>
                </div>
              </li>
            </ul>

          </div>


        </nav>
        
      </div>
    <!--   For Toggle Mobile Nav -->
     <div class="toggle-user-menu" id = "toggle-user-menu">
        <ul>
          <li><a href="#"><div class="user-photo"><img src="https://dw3i9sxi97owk.cloudfront.net/uploads/thumbs/db9c4e1327eb8fe5e9395a4b04e1ea4a_70x70.jpg" alt=""></div>admin@admin.com</a></li>
          <li><a href="">
            <i class="material-icons mr-2">
                    supervisor_account
                    </i>
                  Account Settings
                </a></li>
          <li><a href=""><i class="material-icons mr-2">exit_to_app</i>Logout</a></li>

        </ul>
      </div>
    <!--   For Toggle Mobile Nav -->
    </div>  
</header>
<!--====== End Header Section======-->

<!--====== Start Left Sidebar Section======-->
  <section id="left-sidebar-area">
  <!--   Left Sidebar  -->
        <div id="left-sidebar-section">

          
            <aside>
              <div class="left-sidebar" id="wrapper-sidebar">
                <ul>
                  <li><a href="index.html"><i class="material-icons">home</i>Dashboard</a></li>
                  <li><a href="users.html"><i class="material-icons">supervisor_account</i>Users</a></li>
                  <li><a href="role.html"><i class="material-icons">perm_data_setting</i>Role</a></li>
                 
                  
                  </ul>
              </div>  
            </aside>
        </div>
  <!--   Left Sidebar  -->
  </section>
<!--====== End Left Sidebar Section======-->



<!--====== Start Main Wrapper Section======-->
<section class="d-flex" id="wrapper">
  


    <div class="page-content-wrapper">
       <!--  Header BreadCrumb -->
        <div class="content-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="material-icons">home</i>Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add new User</li>
              </ol>
            </nav>
        </div>
          <!--  Header BreadCrumb -->   
          <!-- Create New User -->   
        <div class="main-content">

            <div class="card bg-white">
                <div class="card-body mt-5 mb-5">

                    <form action="" method="POST">

                        <div class="form-group row">
                            <div class="col-md-2">Name</div>
                            <div class="col-md-4">
                                <input id="name" type="text" placeholder="Name" class="form-control" name="name" value=""  autofocus="">

                             </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">Phone number</div>
                            <div class="col-md-4">
                                <input id="name" type="text" placeholder="Phone number" class="form-control" name="name" value=""  autofocus="">

                             </div>
                        </div>
                       
                        
                        
                        <div class="form-group row">
                            <div class="col-md-2">E-Mail Address</div>
                            <div class="col-md-4">
                                <input id="name" type="email" placeholder="Enter your Email please" class="form-control" name="name" value=""  autofocus="">

                             </div>
                        </div>
                        

                        
                        <div class="form-group row">
                            <div class="col-md-2">Password</div>
                            <div class="col-md-4">
                                <input id="name" type="email" placeholder="Enter your Password please" class="form-control" name="name" value=""  autofocus="">

                             </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">Confirm Password</div>
                            <div class="col-md-4">
                                <input id="name" type="email" placeholder="Please confirm your password" class="form-control" name="name" value=""  autofocus="">

                             </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">Role</div>
                            <div class="col-md-4">
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Select your Role</option>
                                    <option>user</option>
                                    <option>staff</option>
                                    <option>admin</option>
                                    
                                </select>
                             </div>
                        </div>
                        
                        <div class="form-group pt-2 row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <button class="theme-primary-btn btn btn-success" type="button">Create User</button>
                                <button class="btn btn-warning" type="reset">Reset</button>
                             </div>
                        </div>

                    </form>
              
                </div>
            </div>
        </div>
         <!-- Create New User-->   



        </div>  
        <!--  main-content -->   
    </div> 

</section>

<!--====== End Main Wrapper Section======-->




    <!--====== JQuery from CDN ======-->
    <script src="assets/js/jquery.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== dataTables js ======-->
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>

    <!--====== Chart.min js ======-->
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/Chart.bundle.min.js"></script>
    <script src="assets/js/chartfunction.js"></script>

    <!--====== wow.min js ======-->
    <script src="assets/js/wow.min.js"></script>
    <!--====== Main js ======-->
    <script src="assets/js/script.js"></script>

    <script>
        var color = Chart.helpers.color;
        function createConfig(colorName) {
            return {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'My First dataset',
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ],
                        backgroundColor: color(window.chartColors[colorName]).alpha(0.5).rgbString(),
                        borderColor: window.chartColors[colorName],
                        borderWidth: 1,
                        pointStyle: 'rectRot',
                        pointRadius: 5,
                        pointBorderColor: 'rgb(0, 0, 0)'
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        labels: {
                            usePointStyle: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Normal Legend'
                    }
                }
            };
        }

        function createPointStyleConfig(colorName) {
            var config = createConfig(colorName);
            config.options.legend.labels.usePointStyle = true;
            config.options.title.text = 'Point Style Legend';
            return config;
        }

        window.onload = function() {
            [{
                id: 'chart-legend-normal',
                config: createConfig('red')
            }, {
                id: 'chart-legend-pointstyle',
                config: createPointStyleConfig('blue')
            }].forEach(function(details) {
                var ctx = document.getElementById(details.id).getContext('2d');
                new Chart(ctx, details.config);
            });
        };
    </script>

</body>
</html>
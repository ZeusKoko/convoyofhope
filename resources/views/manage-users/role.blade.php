<!DOCTYPE html>
<html lang="en">

<head>


    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">

    <!--====== Title ======-->
    <title>manage roles</title>

    <!--====== Favicon Icon ======-->
    <link rel="icon" href="data:,">



    <!--====== Google Fonts ======-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!--====== Material Icons ======-->
    <link rel="stylesheet" href="{{asset('assets/iconfont/material-icons.css')}}">

    <!-- dataTables.bootstrap4.min css-->
    <link href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" media="screen">




    <!-- animate css-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" media="screen">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <!--====== CkEditors js ======-->
    <link rel="stylesheet" href="{{asset('assets/js/ckeditor.js')}}">




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
            </a>
            <div id="nav-toggle">
                <div class="cta">
                    <div class="toggle-btn type1"></div>
                </div>
            </div>
          </div>
        <!--   For Toggle Mobile Nav icon -->



              <!--   For Toggle Mobile Nav Icon -->

          <div class="collapse navbar-collapse pr-3" id="#">

          </div>


        </nav>

      </div>
    <!--   For Toggle Mobile Nav -->

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
                  <li><a href="{{route('index')}}"><i class="material-icons">home</i>Dashboard</a></li>
                  <li><a href="{{route('users')}}"><i class="material-icons">supervisor_account</i>Users</a></li>
                  <li><a href="{{route('role')}}"><i class="material-icons">perm_data_setting</i>Role</a></li>


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

                <li class="breadcrumb-item active" aria-current="page">Roles</li>
              </ol>
            </nav>
            <div class="create-item">
                <a href="createrole.html" class="theme-primary-btn btn btn-primary"><i class="material-icons">add</i>Add New Role</a>
            </div>
        </div>
          <!--  Header BreadCrumb -->
          <!--  main-content -->
        <div class="main-content">



        <!-- Users DataTable-->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-body mt-3">
                      <div class="table-responsive">
                          <table id="roleTable" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>

                                <tr>
                                    <td>01</td>
                                    <td>Nababur Rahaman</td>
                                    <td>Nababur</td>
                                    <td><span class="badge badge-lg badge-secondary text-white">Admin</span></td>
                                    <td><span class="badge badge-lg badge-success text-white">Active</span></td>
                                    <td><a class="btn btn-sm btn-secondary" href="">View Role</a>  <a class="btn btn-sm btn-info" href="">Edit Role</a> <a class="btn btn-sm btn-danger" href="">Delete user</a></td>
                                </tr>






                        </table>
                      </div>
                    </div>
                </div>
            </div>

        </div>

         <!-- Users DataTable-->






        </div>
        <!--  main-content -->
    </div>

</section>

<!--====== End Main Wrapper Section======-->




<!--====== JQuery from CDN ======-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!--====== Bootstrap js ======-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>

<!--====== dataTables js ======-->
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

<!--====== Chart.min js ======-->
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/chartfunction.js')}}"></script>

<!--====== wow.min js ======-->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!--====== Main js ======-->
<script src="{{asset('assets/js/script.js')}}"></script>

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

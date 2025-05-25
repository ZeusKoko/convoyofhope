<!DOCTYPE html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">

    <!--====== Title ======-->
    <title>manage users</title>

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
                    <a class="navbar-brand" href="index.blade.php" id="menu-action">
                        <div class="user-photo d-desktop"><img src="assets/images/icons/favicon.png" alt=""></div>
                        <span>user management Panel</span>
                    </a>
                    <div id="nav-toggle">
                        <div class="cta">
                            <div class="toggle-btn type1"></div>
                        </div>
                    </div>
                </div>
                <!--   For Toggle Mobile Nav icon -->

            </nav>
        </div>
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
                    <li><a href="{{route('role')}}"><i class="material-icons">perm_data_setting</i>Roles</a></li>
                    <li><a href="{{ route('admin.index') }}" class="btn btn-danger">
                        Exit to Admin Dashboard
                    </a>
                    </li>

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
                    <li class="breadcrumb-item"><a href=""><i class="material-icons">home</i>Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <!--             <div class="create-item">
                            <a href="" class="btn btn-primary"><i class="material-icons">add</i>Create user</a>
                        </div> -->
        </div>
        <!--  Header BreadCrumb -->
        <!--  main-content -->
        <div class="main-content">
            <div class="row animated fadeInUp">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-orange-600 bg-info o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="material-icons float-right text-orange-600 md-5em">group_add</i>
                            </div>
                            <div class="mr-5">New Users: <span id="new-user-count">0</span></div>
                        </div>
                        <a class="card-footer text-orange-400 clearfix small z-1" href="javascript:void(0);" onclick="fetchNewUserDetails()">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="material-icons">keyboard_arrow_right</i></span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="material-icons float-right text-white md-5em">supervisor_account</i>
                            </div>
                            <div class="mr-5">( 123 ) Active Users</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="material-icons">keyboard_arrow_right</i></span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="material-icons float-right text-white md-5em">people_outline</i>
                            </div>
                            <div class="mr-5">Total Users: <span id="userCount">Loading...</span></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="javascript:void(0);" onclick="fetchTotalUserDetails()">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="material-icons">keyboard_arrow_right</i></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Dashboard Box -->
            <div class="row mt-3">


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Github Users</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td><a href="">yash</a></td>
                                    <td width="1" class="nowrap">Date</td>
                                </tr>
                                <tr>
                                    <td><a href="">test</a></td>
                                    <td width="1" class="">Date</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Facebook Users</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td><a href="">yash</a></td>
                                    <td width="1" class="nowrap">Date</td>
                                </tr>
                                <tr>
                                    <td><a href="">test</a></td>
                                    <td width="1" class="">Date</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Gmail Users</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td><a href="">yash</a></td>
                                    <td width="1" class="nowrap">Date</td>
                                </tr>
                                <tr>
                                    <td><a href="">test</a></td>
                                    <td width="1" class="">Date</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>








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
<!--  Modal Overlay -->
<div id="userModal" style="
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.6);
    z-index: 9999; /* Increase z-index to ensure visibility */
    overflow-y: auto;
">
    <div style="
        background: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        width: 90%;
        max-width: 600px;
        position: relative;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        z-index: 10000; /* Ensure modal content is above overlay */
    ">
        <h4 class="mb-3 text-orange-600">New Users </h4>
        <ul id="user-detail-list" class="mb-3 pl-3" style="max-height:300px; overflow-y:auto;"></ul>
        <button onclick="closeModal()" class="btn btn-sm btn-danger float-right">Close</button>
        
</div>

<!-- Modal Overlay -->
<div id="userModal" style="
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.6);
    z-index: 9999;
    overflow-y: auto;
">
    <div style="
        background: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        width: 90%;
        max-width: 600px;
    ">
        <button onclick="closeModal()" style="
            float: right;
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        ">Close</button>
        <h4>User Details</h4>
        <ul id="user-detail-list">
            <!-- JS will populate this -->
        </ul>
    </div>
</div>
<script>
  function fetchNewUserCount() {
        fetch('/new-user-count')
            .then(response => response.json())
            .then(data => {
                document.getElementById('new-user-count').textContent = data.new_user_count;
            })
            .catch(error => console.error('Error fetching new user count:', error));
    }

    // Fetch count immediately on page load
    fetchNewUserCount();

    // Refresh every 10 seconds
    setInterval(fetchNewUserCount, 10000); // 10000 ms = 10 seconds

    function fetchNewUserCount() {
        fetch('/new-user-count')
            .then(res => res.json())
            .then(data => {
                document.getElementById('new-user-count').textContent = data.new_user_count;
            });
    }

    function fetchNewUserDetails() {
        fetch('/new-user-details')
            .then(res => res.json())
            .then(users => {
                const list = document.getElementById('user-detail-list');
                list.innerHTML = '';
                if (users.length === 0) {
                    list.innerHTML = '<li>No new users this week.</li>';
                } else {
                    users.forEach(user => {
                        const li = document.createElement('li');
                        li.textContent = `${user.name} (${user.email}) - Joined: ${new Date(user.created_at).toLocaleString()}`;
                        list.appendChild(li);
                    });
                }
                document.getElementById('userModal').style.display = 'block';
            });
    }

    function fetchTotalUserDetails() {
        fetch('/total-user-details')
            .then(res => res.json())
            .then(users => {
                const list = document.getElementById('user-detail-list');
                list.innerHTML = '';
                users.forEach(user => {
                    const li = document.createElement('li');
                    li.textContent = `${user.name} (${user.email}) - Joined: ${new Date(user.created_at).toLocaleString()}`;
                    list.appendChild(li);
                });
                document.getElementById('userModal').style.display = 'block';
            });
    }

    function fetchUserCount() {
        fetch('/user-count')
            .then(res => res.json())
            .then(data => {
                document.getElementById('userCount').textContent = data.count;
            });
    }

    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
    }

    fetchNewUserCount();
    fetchUserCount();
    setInterval(fetchNewUserCount, 10000);
    setInterval(fetchUserCount, 5000);
</script>
</body>
</html>

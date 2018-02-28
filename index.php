<!doctype html>
<html class="no-js" lang="">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="Flat, Clean, Responsive, application admin template built with bootstrap 3">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <!-- /meta -->

    <title>Диспетчерское место</title>

    <!-- page level plugin styles -->
    <!-- /page level plugin styles -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/font-awesome.css">
    <link rel="stylesheet" href="styles/themify-icons.css">
    <link rel="stylesheet" href="styles/animate.css">
    <link rel="stylesheet" href="styles/sublime.css">
    <link rel="stylesheet" href="styles/mainpage_controls.css">
    <!-- endbuild -->



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- load modernizer -->
    <script src="vendor/modernizr.js"></script>
</head>

<!-- body -->

<body>
<div class="app small-menu">



    <!-- Modal -->
    <div id="polygon_param" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Параметры полигона</h4>
                </div>
                <div class="modal-body">
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Имя полигона</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Высота</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </form>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Применить</button>
                </div>
            </div>

        </div>
    </div>

    <!-- top header -->
    <header class="header header-fixed navbar">

        <div class="brand">
            <!-- toggle offscreen menu -->
            <a href="javascript:;" class="ti-menu off-left visible-xs" data-toggle="offscreen" data-move="ltr"></a>
            <!-- /toggle offscreen menu -->

            <!-- logo -->
            <a href="index.html" class="navbar-brand">
                <img src="images/logo.png" alt="">
          <span class="heading-font">
                        Sublime
                    </span>
            </a>
            <!-- /logo -->
        </div>

        <ul class="nav navbar-nav">
            <li class="hidden-xs">
                <!-- toggle small menu -->
                <a href="javascript:;" class="toggle-sidebar">
                    <i class="ti-menu"></i>
                </a>
                <!-- /toggle small menu -->
            </li>
            <li class="header-search">
                <!-- toggle search -->
                <a href="javascript:;" class="toggle-search">
                    <i class="ti-search"></i>
                </a>
                <!-- /toggle search -->
                <div class="search-container">
                    <form role="search">
                        <input type="text" class="form-control search" placeholder="type and press enter">
                    </form>
                </div>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown hidden-xs">
                <a href="javascript:;" data-toggle="dropdown">
                    <i class="ti-more-alt"></i>
                </a>
                <ul class="dropdown-menu animated zoomIn">
                    <li class="dropdown-header">Quick Links</li>
                    <li>
                        <a href="javascript:;">Start New Campaign</a>
                    </li>
                    <li>
                        <a href="javascript:;">Review Campaigns</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;">Settings</a>
                    </li>
                    <li>
                        <a href="javascript:;">Wish List</a>
                    </li>
                    <li>
                        <a href="javascript:;">Purchases History</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;">Activity Log</a>
                    </li>
                    <li>
                        <a href="javascript:;">Settings</a>
                    </li>
                    <li>
                        <a href="javascript:;">System Reports</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;">Help</a>
                    </li>
                    <li>
                        <a href="javascript:;">Report a Problem</a>
                    </li>
                </ul>
            </li>

            <li class="notifications dropdown">
                <a href="javascript:;" data-toggle="dropdown">
                    <i class="ti-bell"></i>
                    <div class="badge badge-top bg-danger animated flash">
                        <span>3</span>
                    </div>
                </a>
                <div class="dropdown-menu animated fadeInLeft">
                    <div class="panel panel-default no-m">
                        <div class="panel-heading small"><b>Notifications</b>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="javascript:;">
                    <span class="pull-left mt5 mr15">
                                            <img src="images/face4.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                    <div class="m-body">
                                        <div class="">
                                            <small><b>CRYSTAL BROWN</b></small>
                                            <span class="label label-danger pull-right">ASSIGN AGENT</span>
                                        </div>
                                        <span>Opened a support query</span>
                                        <span class="time small">2 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:;">
                                    <div class="pull-left mt5 mr15">
                                        <div class="circle-icon bg-danger">
                                            <i class="ti-download"></i>
                                        </div>
                                    </div>
                                    <div class="m-body">
                                        <span>Upload Progress</span>
                                        <div class="progress progress-xs mt5 mb5">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            </div>
                                        </div>
                                        <span class="time small">Submited 23 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:;">
                    <span class="pull-left mt5 mr15">
                                            <img src="images/face3.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                    <div class="m-body">
                                        <em>Status Update:</em>
                                        <span>All servers now online</span>
                                        <span class="time small">5 days ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="panel-footer">
                            <a href="javascript:;">See all notifications</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="off-right">
                <a href="javascript:;" data-toggle="dropdown">
                    <img src="images/avatar.jpg" class="header-avatar img-circle" alt="user" title="user">
                    <span class="hidden-xs ml10">Юрий Воробьев</span>
                    <i class="ti-angle-down ti-caret hidden-xs"></i>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <li>
                        <a href="javascript:;">Settings</a>
                    </li>
                    <li>
                        <a href="javascript:;">Upgrade</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="badge bg-danger pull-right">3</div>
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">Help</a>
                    </li>
                    <li>
                        <a href="signin.html">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- /top header -->

    <section class="layout">
        <!-- sidebar menu -->
        <aside class="sidebar offscreen-left">
            <!-- main navigation -->
            <nav class="main-navigation" data-height="auto" data-size="6px" data-distance="0" data-rail-visible="true"
                 data-wheel-step="10">
                <p class="nav-title">КАРТА</p>
                <ul class="nav">
                    <!-- dashboard -->
                    <li>
                        <a href="index.html">
                            <i class="ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- /dashboard -->

                    <!-- customizer -->
                    <li>
                        <a href="http://customizer.nyasha.me/#sublime" target="_blank">
                            <i class="ti-settings"></i>
                            <span>Customizer</span>
                        </a>
                    </li>
                    <!-- /customizer -->

                    <!-- ui -->
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-layout-media-overlay-alt-2"></i>
                            <span>UI Elements</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="buttons.html">
                                    <span>Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="general.html">
                                    <span>General Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="typography.html">
                                    <span>Typography</span>
                                </a>
                            </li>
                            <li>
                                <a href="tabs_accordion.html">
                                    <span>Tabs &amp; Accordions</span>
                                </a>
                            </li>
                            <li>
                                <a href="icons.html">
                                    <span>Fontawesome</span>
                                </a>
                            </li>
                            <li>
                                <a href="themify_icons.html">
                                    <span>Themify Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="grid.html">
                                    <span>Grid Layout</span>
                                </a>
                            </li>
                            <li>
                                <a href="widgets.html">
                                    <span>Widgets</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /ui -->

                    <!-- Components -->
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-support"></i>
                            <span>Components</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="calendar.html">
                                    <span>Calendar</span>
                                </a>
                            </li>
                            <li>
                                <a href="gallery.html">
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li>
                                <a href="sortable.html">
                                    <span>Sortable &amp; Nestable Lists</span>
                                </a>
                            </li>
                            <li>
                                <a href="chart.html">
                                    <span>Charts</span>
                                </a>
                            </li>
                            <li>
                                <a href="progress_slider.html">
                                    <span>Progress bars &amp; Sliders</span>
                                </a>
                            </li>
                            <li>
                                <a href="tree.html">
                                    <span>Tree View</span>
                                </a>
                            </li>
                            <li>
                                <a href="notifications.html">
                                    <span>Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="animated.html">
                                    <span>Animated Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="tour.html">
                                    <span>Tour</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /components -->

                    <!-- forms -->
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-folder"></i>
                            <span>Forms</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="forms.html">
                                    <span>Forms Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_custom.html">
                                    <span>Customized Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_validation.html">
                                    <span>Form Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_wizard.html">
                                    <span>Form Wizards</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_wysiwyg.html">
                                    <span>WYSIWYG/Markdown Editors</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_inline.html">
                                    <span>Content Editable</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_dropzone.html">
                                    <span>Dropzone</span>
                                </a>
                            </li>
                            <li>
                                <a href="xeditable.html">
                                    <span>X-Editable</span>
                                </a>
                            </li>

                            <li>
                                <a href="form_masks.html">
                                    <span>Input Masks</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_pickers.html">
                                    <span>Form Pickers</span>
                                </a>
                            </li>
                            <li>
                                <a href="form_crop.html">
                                    <span>Image Crop</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /forms -->

                    <!-- tables -->
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-window"></i>
                            <span>Tables</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="table_basic.html">
                                    <span>Basic Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="table_responsive.html">
                                    <span>Resonsive Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="datatable.html">
                                    <span>Data Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="table_editable.html">
                                    <span>Editable Table</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /tables -->

                    <!-- maps -->
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-map"></i>
                            <span>Maps</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="google_maps.html">
                                    <span>Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="vector.html">
                                    <span>Vector Maps</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /maps -->
                </ul>

                <p class="nav-title">KML</p>
                <ul class="nav">
                    <!-- pages -->
                    <li class="open">
                        <a onclick="create_kml();">
                            <i class="ti-download"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="open">
                        <a data-toggle="modal" data-target="#polygon_param">
                            <i class="ti-download"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    <li class="open">
                        <a onclick="save_polygons();">
                            <i class="ti-save"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <input type="checkbox" id="kml_layer">
                    </li>

                    <!-- /pages -->

                    <!-- layouts
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-layout"></i>
                            <span>Layouts</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="small_menu.html">
                                    <span>Small Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="right_menu.html">
                                    <span>Right Side Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="push_sidebar.html">
                                    <span>Chat Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="language_bar.html">
                                    <span>Language Switcher</span>
                                </a>
                            </li>
                            <li>
                                <a href="footer_layout.html">
                                    <span>Layout With Footer</span>
                                </a>
                            </li>
                            <li>
                                <a href="horizontal_menu.html">
                                    <span>Horizontal Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="boxed.html">
                                    <span>Boxed Layout</span>
                                </a>
                            </li>
                            <li>
                                <a href="horizontal_menu_boxed.html">
                                    <span>Horizontal Boxed</span>
                                </a>
                            </li>
                            <li>
                                <a href="fixed_scroll.html">
                                    <span>Fixed Header &amp; Scrollable Layout</span>
                                </a>
                            </li>
                            <li>
                                <a href="blank.html">
                                    <span>Blank Page</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /layouts -->

                    <!-- multi level menu
                    <li>
                        <a href="javascript:;">
                            <i class="toggle-accordion"></i>
                            <i class="ti-menu-alt"></i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="toggle-accordion"></i>
                                    <span>Menu Link 1</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 1.1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 1.2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 1.3</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="toggle-accordion"></i>
                                    <span>Menu Link 2</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 2.1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 2.2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span>Menu Link 2.3</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span>Menu Link 3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /multi level menu
                    <li>
                        <a href="http://sublime.nyasha.me/frontend">
                            <i class="ti-layout-media-center"></i>
                            <span>Frontend Template</span>
                        </a>
                    </li>-->
                </ul>
                <p class="nav-title">СЛОИ</p>
                <ul class="nav">
                    <li>
                        <a onclick="create_kml();">
                            <i class="ti-control-record text-warning"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="ti-control-record text-success"></i>
                            <span>Apps</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="ti-control-record text-danger"></i>
                            <span>Support</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- /sidebar menu -->


        <!-- main content -->
        <section class="main-content bg-white ">


            <!-- content wrapper -->
            <div class="content-wrap bl">

                <!-- inner content wrapper -->
                <div class="wrapper">

                    <div id="map"></div>
                </div>
                <!-- /inner content wrapper -->

            </div>

            <!-- /content wrapper

            <footer class="bl bt">
              <p>&copy; Sublime Admin 2014</p>
              <p class="pull-right">All rights reserved
              </p>
            </footer> -->

            <a class="exit-offscreen"></a>
        </section>

        <!-- mail sidebar navigation -->
        <aside class="sidebar-400 canvas-right bg-default ">

            <div class="content-wrap no-p">

                <div class="wrapper">

                    <section class="panel no-b">
                        <div class="box-tab">

                            <div class="col-lg-12" style="position:float">
                                <div class="button-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="small" data-value="plane" tabIndex="-1"><input name="plane" type="checkbox" checked />&nbsp;Самолет <b>(P)</b></a></li>
                                        <li><a href="#" class="small" data-value="copter" tabIndex="-1"><input type="checkbox" checked />&nbsp;Коптер<b>(K)</b></a></li>
                                        <li><a href="#" class="small" data-value="geoscan" tabIndex="-1"><input type="checkbox" checked />&nbsp;Geoscan<b>(G)</b></a></li>
                                        <li><a href="#" class="small" data-value="operator" tabIndex="-1"><input type="checkbox" checked />&nbsp;Оператор<b>(O)</b></a></li>
                                        <li><a href="#" class="small" data-value="emulator" tabIndex="-1"><input type="checkbox" checked />&nbsp;Эмулятор<b>(*)</b></a></li>
                                    </ul>
                                </div>
                            </div>

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home1" data-toggle="tab">Аппараты</a>
                                </li>
                                <li><a href="#profile1" data-toggle="tab">Планирование</a>
                                </li>
                                <li><a href="#images" data-toggle="tab">Изображения</a>
                                </li>
                            </ul>
                            <div class="tab-content text-center">
                                <div class="tab-pane fade active in" id="home1">
                                    <div class="panel-body" id="table_with_param">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile1">
                                    <div class="panel-body" id="table_polygons">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="images">
                                    <div class="panel-body" id="list_photo">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                </div>
        </aside>
        <!-- /mail sidebar navigation -->
        <!-- /main content -->
    </section>

</div>


<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="vendor/slimScroll/jquery.slimscroll.js"></script>
<script src="vendor/jquery.easing/jquery.easing.js"></script>
<script src="vendor/jquery_appear/jquery.appear.js"></script>
<script src="vendor/jquery.placeholder.js"></script>
<script src="vendor/fastclick/lib/fastclick.js"></script>

<!-- endbuild -->

<script src="scripts/table_creator.js"></script>
<script src="scripts/dropdown.js"></script>
<script src="scripts/main_map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5EJVruqYPI0eJbv4KWNQf5S8cpFc6pEk&callback=initMap&libraries=drawing">
</script>

<!-- page level scripts -->
<!-- /page level scripts -->

<!-- template scripts -->
<script src="scripts/offscreen.js"></script>
<script src="scripts/main.js"></script>
<!-- /template scripts -->

<!-- page script -->
<!-- /page script -->

</body>
<!-- /body -->

</html>

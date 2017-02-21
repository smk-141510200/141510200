<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ujikom</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('/master/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(url('/master/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('/master/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo e(url('/master/vendor/morrisjs/morris.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('/master/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <link href="/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" class="column">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">Home</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user fa-fw"></i> <span class="fa fa-caret-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-user" role="menu">
                                    <li>
                                    <li><a href="#"><i class="fa fa-bar-chart-o fa-child"></i> <?php echo e(Auth::user()->name); ?></a></li>
                                    <li class="divider"></li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <p><center> Menu <i class="glyphicon glyphicon-book"></i></center></p>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-male"></i> Golongan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/golongan')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/golongan/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-group"></i> Jabatan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/jabatan')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/jabatan/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-list-ul"></i> Kategori Lembur<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/kategorilembur')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/kategorilembur/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-child"></i> Pegawai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/pegawai')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/pegawai/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-hourglass"></i> Lembur Pegawai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/lemburpegawai')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/lemburpegawai/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-usd"></i> Tunjangan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/tunjangan')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/tunjangan/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#" class="fa fa-bar-chart-o fa-usd"><i class="fa fa-bar-chart-o fa-male"></i> Tunjangan Pegawai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/tunjanganpegawai')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/tunjanganpegawai/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#" class="fa fa-bar-chart-o fa-dollar"></i> Penggajian<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/penggajian')); ?>">Table</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/penggajian/create')); ?>">Buat Baru</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">PENGGAJIAN KARYAWAN</h1>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(url('/master/vendor/jquery/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(url('/master/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(url('/master/vendor/metisMenu/metisMenu.min.js')); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo e(url('/master/vendor/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(url('/master/vendor/morrisjs/morris.min.js')); ?>"></script>
    <script src="<?php echo e(url('/master/data/morris-data.js')); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(url('/master/dist/js/sb-admin-2.js')); ?>"></script>
    <script src="/sweetalert/sweetalert.min.js"></script>
    <?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>

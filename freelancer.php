<!DOCTYPE html>
<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) CodeWork (https://github.com/gaurangkumar/codework).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 *
 * @link          http://codework.ml/
 * @since         1.0.0
 *
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Krunal Bhavsar
 * @filename      freelancer.php
 */
require 'include/config.php';
require 'include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    header('Location: login.php');
    exit;
}
$fid = $_SESSION['USER_ID'];

$result = $mysqli->query("SELECT `lang` FROM `freelancer` WHERE `fid` = $fid");
$row = $result->fetch_assoc();
$lang = $row['lang'];

$result = $mysqli->query("SELECT `pid`, `name`, `detail`, `cost` FROM `post_prj` WHERE `lang` = '$lang'");
$count = $result->num_rows;
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Freelancer - CodeWork</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset/css/stylish-portfolio.min.css" rel="stylesheet">

    <style>
        .brand-name {
            font-family: "Kaushan Script"
        }
        .navbar-brand {
            font-size: 24px;
            text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
        }
        .nav-link {
            font-size: 20px;
            text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
        }
.team-member {
  margin-bottom: 50px;
  text-align: center;
}

.team-member img {
  width: 225px;
  height: 225px;
  border: 7px solid #fff;
}

.team-member h4 {
  margin-top: 25px;
  margin-bottom: 0;
  text-transform: none;
}

.team-member p {
  margin-top: 0;
}
ul.social-buttons {
  margin-bottom: 0;
}

ul.social-buttons li a {
  font-size: 20px;
  line-height: 50px;
  display: block;
  width: 50px;
  height: 50px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  color: white;
  border-radius: 100%;
  outline: none;
  background-color: #212529;
}

ul.social-buttons li a:active, ul.social-buttons li a:focus, ul.social-buttons li a:hover {
  background-color: #fed136;
}
    </style>
    <style>
    .card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:0px solid transparent;border-radius:0px}.card>hr{margin-right:0;margin-left:0}.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:0px;border-top-right-radius:0px}.card>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:0px;border-bottom-left-radius:0px}.card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem}.card-title{margin-bottom:0.75rem}.card-subtitle{margin-top:-0.375rem;margin-bottom:0}.card-text:last-child{margin-bottom:0}.card-link:hover{text-decoration:none}.card-link+.card-link{margin-left:1.25rem}.card-header{padding:0.75rem 1.25rem;margin-bottom:0;background-color:rgba(0, 0, 0, 0.03);border-bottom:0px solid transparent}.card-header:first-child{border-radius:calc(0px - 0px) calc(0px - 0px) 0 0}.card-header+.list-group .list-group-item:first-child{border-top:0}.card-footer{padding:0.75rem 1.25rem;background-color:rgba(0, 0, 0, 0.03);border-top:0px solid transparent}.card-footer:last-child{border-radius:0 0 calc(0px - 0px) calc(0px - 0px)}.card-header-tabs{margin-right:-0.625rem;margin-bottom:-0.75rem;margin-left:-0.625rem;border-bottom:0}.card-header-pills{margin-right:-0.625rem;margin-left:-0.625rem}.card-img-overlay{position:absolute;top:0;right:0;bottom:0;left:0;padding:1.25rem}.card-img{width:100%;border-radius:calc(0px - 0px)}.card-img-top{width:100%;border-top-left-radius:calc(0px - 0px);border-top-right-radius:calc(0px - 0px)}.card-img-bottom{width:100%;border-bottom-right-radius:calc(0px - 0px);border-bottom-left-radius:calc(0px - 0px)}.card-deck{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.card-deck .card{margin-bottom:10px}@media (min-width:576px){.card-deck{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap;margin-right:-10px;margin-left:-10px}.card-deck .card{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-flex:1;-ms-flex:1 0 0%;flex:1 0 0%;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;margin-right:10px;margin-bottom:0;margin-left:10px}}.card-group{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.card-group>.card{margin-bottom:10px}@media (min-width:576px){.card-group{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap}.card-group>.card{-webkit-box-flex:1;-ms-flex:1 0 0%;flex:1 0 0%;margin-bottom:0}.card-group>.card+.card{margin-left:0;border-left:0}.card-group>.card:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.card-group>.card:first-child .card-header,.card-group>.card:first-child .card-img-top{border-top-right-radius:0}.card-group>.card:first-child .card-footer,.card-group>.card:first-child .card-img-bottom{border-bottom-right-radius:0}.card-group>.card:last-child{border-top-left-radius:0;border-bottom-left-radius:0}.card-group>.card:last-child .card-header,.card-group>.card:last-child .card-img-top{border-top-left-radius:0}.card-group>.card:last-child .card-footer,.card-group>.card:last-child .card-img-bottom{border-bottom-left-radius:0}.card-group>.card:only-child{border-radius:0px}.card-group>.card:only-child .card-header,.card-group>.card:only-child .card-img-top{border-top-left-radius:0px;border-top-right-radius:0px}.card-group>.card:only-child .card-footer,.card-group>.card:only-child .card-img-bottom{border-bottom-right-radius:0px;border-bottom-left-radius:0px}.card-group>.card:not(:first-child):not(:last-child):not(:only-child){border-radius:0}.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top{border-radius:0}}.card-columns .card{margin-bottom:0.75rem}@media (min-width:576px){.card-columns{-webkit-column-count:3;column-count:3;-webkit-column-gap:1.25rem;column-gap:1.25rem;orphans:1;widows:1}.card-columns .card{display:inline-block;width:100%}}.accordion .card:not(:first-of-type):not(:last-of-type){border-bottom:0;border-radius:0}.accordion .card:not(:first-of-type) .card-header:first-child{border-radius:0}.accordion .card:first-of-type{border-bottom:0;border-bottom-right-radius:0;border-bottom-left-radius:0}.accordion .card:last-of-type{border-top-left-radius:0;border-top-right-radius:0}

    </style>
    <style>
    .card{margin-bottom:20px;-webkit-box-shadow:0 1px 4px 0 rgba(0, 0, 0, 0.1);box-shadow:0 1px 4px 0 rgba(0, 0, 0, 0.1)}.card .card-subtitle{font-weight:300;margin-bottom:15px;color:#6c757d}.card .card-title{position:relative;font-weight:500}.card .card-actions{float:right}.card .card-actions a{padding:0 5px;cursor:pointer}.card-group{margin-bottom:20px}.card-group .card{border-right:1px solid #e9ecef}.card-fullscreen{position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:9999;overflow:auto}
    </style>
    <style>
    .border-primary{border-color:#fb9678!important}.border-secondary{border-color:#f8f9fa!important}.border-success{border-color:#00c292!important}.border-info{border-color:#03a9f3!important}.border-warning{border-color:#fec107!important}.border-danger{border-color:#e46a76!important}.border-light{border-color:#f8f9fa!important}.border-dark{border-color:#343a40!important}.border-cyan{border-color:#01c0c8!important}.border-purple{border-color:#ab8ce4!important}.border-white{border-color:#fff!important}
    </style>
</head>

<body id="page-top skin-default fixed-layout">

    <!-- Header -->
	<?php
    require 'include/header.php';
    ?>

    <header class="masthead">
        <div class="container text-center my-auto">
            <h1 class="mb-5 h2">Freelancer Dashboard</h1>
            <a class="btn btn-primary btn-xl" href="#projects">Projects</a>
            <a class="btn btn-primary btn-xl" href="include/logout.php">Logout</a>
            <div class="row p-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        if (!isset($_SESSION['msg']) || $_SESSION['msg'] == '') {
                        } else {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </header>

    <section class="content-section bg-light" id="projects">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12 mx-auto">
                    <h2>Find Work</h2>
                    <p class="lead mb-5"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-t-30">
                    <h4 class="m-b-0">Search Result For "<?=$lang?>"</h4>
                    <p class="text-muted m-t-0">About <?=$count?> result</p>
                </div>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                <div class="col-md-6">
                    <div class="card border-info">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="projects.php?pid=<?=$row['pid']?>"><?=ucfirst($row['name'])?></a>
                            </h3>
                            <p class="card-text"><?=substr($row['detail'], 0, 100)?></p>
                            <p class="card-text"><i class="fa fa-rupee"></i> <?=$row['cost']?></p>
                            <?php
                            $res = $mysqli->query("SELECT * FROM `post_req` WHERE `pid` = {$row['pid']} AND `fid` = $fid");
                    if ($res->num_rows) {
                        $r = $res->fetch_assoc();
                        $status = empty($r['status']) ? 'Requested' : $r['status'];
                    } else {
                        $status = '';
                    } ?>
                            <p class="card-text"><span class="badge badge-<?=($status == 'accepted' ? 'success' : 'info')?>"><?=$status?></span></p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row text-center">
                <div class="col-6 m-t-30 offset-5">
                    <nav aria-label="Page navigation example" class="m-t-40">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
	<?php
    require 'include/footer.php';
    ?>
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/stylish-portfolio.min.js"></script>

    <script src="asset/js/jqBootstrapValidation.js"></script>
    <script src="asset/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website&amp;utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"  alt="www.000webhost.com"></a></div>

</body>
</html>
    <script>
    $(document).ready(function(){
        $("[alt='www.000webhost.com']").css("display", "none");
    });
    </script>

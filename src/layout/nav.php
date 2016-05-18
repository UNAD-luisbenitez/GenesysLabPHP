<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 27/04/2016
 * Time: 11:13 PM
 * UNAD 2016 Programacion de sitios web
 * GenesysLab
 */
$nameuser= isset($_SESSION) ? $_SESSION['NamePersonas'] : "Invitado";
$cerrarsesion= isset($close) ? $close : "../utilities/logout_user.php";
$urlimg = isset($img) ? $img:"../img/user-a.png";
$logonav= isset($logo) ? $logo:"../img/lablogo.svg";
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php echo $logonav; ?>" alt="" id="milogo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--<ul class="nav navbar-nav">
                <li class="active"><a href="#">MiLink <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Despliega <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>-->

            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php if(!empty($_SESSION['foto'])){?>
                        <img id="picture" src="data:image/png;base64,<?php echo base64_encode($_SESSION['foto'])?>" alt=""> <?php echo $nameuser; ?> <span class="caret"></span>
                        <?php } else{?>
                        <img id="picture" src="<?php echo $urlimg ?>" alt=""> <?php echo $nameuser; ?> <span class="caret"></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $cerrarsesion ?>">Cerrar Sesion</a></li> <!-- Termina la sesion -->
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

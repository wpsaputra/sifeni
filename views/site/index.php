<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
        <img src="<?php echo Url::to('@web/uploads/'.'1.jpg')?>" alt="Los Angeles" style="min-height: 200px">
        </div>

        <div class="item">
        <img src="<?php echo Url::to('@web/uploads/'.'2.jpg')?>" alt="Chicago" style="min-height: 200px">
        </div>

        <div class="item">
        <img src="<?php echo Url::to('@web/uploads/'.'3.jpg')?>" alt="New York" style="min-height: 200px">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


    <div class="container">
         <!-- Marketing Icons Section -->
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Selamat Datang di SiFENI
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Lihat Fenomena</h4>
                    </div>
                    <div class="panel-body">
                        <p>Menu ini berguna untuk melihat fenomena yang sudah diinput di dalam aplikasi SiFeni. Klik tombol lanjut di bawah untuk masuk ke dalam menu.</p>
                        <a href="<?php echo Url::to(['fenomena/index']);?>" class="btn btn-default">Lanjut</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Entri Fenomena</h4>
                    </div>
                    <div class="panel-body">
                        <p>Menu ini berguna untuk mengentri fenomena di dalam aplikasi SiFeni. Klik tombol lanjut di bawah untuk masuk ke dalam menu.</p>
                        <a href="<?php echo Url::to(['fenomena/create']);?>" class="btn btn-default">Lanjut</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Foto &amp; Dokumen</h4>
                    </div>
                    <div class="panel-body">
                        <p>Menu ini berguna untuk melihat foto &amp; dokumen fenomena di dalam aplikasi SiFeni. Klik tombol lanjut di bawah untuk masuk ke dalam menu.</p>
                        <a href="<?php echo Url::to(['fenomena/list']);?>" class="btn btn-default">Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Untuk kritik & saran terkait pengembangan SiFENI bisa menghubungi saudara <a href="mailto:fito@bps.go.id">Suharjufito Endo, SST</a><br/> (fito@bps.go.id)</p>
                </div>
                <div class="col-md-4"></div>
                    <!-- <a class="btn btn-lg btn-default btn-block" href="mailto:fito@bps.go.id">Call to Action</a> -->
                </div>
            </div>
        </div>

        <hr>
    </div>


</div>

<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$array_image_dokumen = explode(",", $model->upload_foto_dokumen); //image+dokumen
$array_image = array(); //image only

for($i=0; $i<count($array_image_dokumen); $i++){
    $value = substr($array_image_dokumen[$i], -4); 
    if($value===".jpg"||$value===".png"){
        array_push($array_image, $array_image_dokumen[$i]);
    }

}


?>
    <!-- <h2><?= Html::encode($model->id) ?></h2>

    <?= HtmlPurifier::process($model->isi_fenomena) ?>     -->

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- Carousel -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                            <img src="http://localhost/sifeni/web/uploads/1.jpg" alt="Los Angeles">
                            </div>

                            <div class="item">
                            <img src="http://localhost/sifeni/web/uploads/2.jpg" alt="Chicago">
                            </div>

                            <div class="item">
                            <img src="http://localhost/sifeni/web/uploads/3.jpg" alt="New York">
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
                    <p>
                        <br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <div class="dropdown pull-right">
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Download
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

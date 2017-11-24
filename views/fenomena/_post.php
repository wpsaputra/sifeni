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
                    <div id="myCarousel<?php echo $model->id; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <!-- <li data-target="#myCarousel<?php //echo $model->id; ?>" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel<?php //echo $model->id; ?>" data-slide-to="1"></li>
                            <li data-target="#myCarousel<?php //echo $model->id; ?>" data-slide-to="2"></li> -->

                            <?php
                                for($i=0; $i<count($array_image); $i++){
                                    $carousel = '<li data-target="#myCarousel?id" data-slide-to="?i" class="?class"></li>';
                                    if($i==0){
                                        $carousel = str_replace("?id", $model->id, $carousel);
                                        $carousel = str_replace("?i", $i, $carousel);
                                        $carousel = str_replace("?class", "active", $carousel);
                                    }else{
                                        $carousel = str_replace("?id", $model->id, $carousel);
                                        $carousel = str_replace("?i", $i, $carousel);
                                        $carousel = str_replace("?class", "", $carousel);
                                    }
                                    echo $carousel;
    
                                }
            
                            ?>

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <!-- <div class="item active">
                            <img src="http://localhost:1000/sifeni/web/uploads/1.jpg" alt="Los Angeles">
                            </div>

                            <div class="item">
                            <img src="http://localhost:1000/sifeni/web/uploads/2.jpg" alt="Chicago">
                            </div>

                            <div class="item">
                            <img src="http://localhost:1000/sifeni/web/uploads/3.jpg" alt="New York">
                            </div> -->

                            <?php
                                for($i=0; $i<count($array_image); $i++){
                                    $carousel_inner = '
                                        <div class="?class">
                                        ?src
                                        </div>
                                    ';
                                    if($i==0){
                                        $carousel_inner = str_replace("?class", 'item active', $carousel_inner);
                                        $carousel_inner = str_replace("?src", Html::img('@web/uploads/'.$array_image[$i]), $carousel_inner);
                                    }else{
                                        $carousel_inner = str_replace("?class", 'item', $carousel_inner);
                                        $carousel_inner = str_replace("?src", Html::img('@web/uploads/'.$array_image[$i]), $carousel_inner);
                                    }
                                    echo $carousel_inner;
    
                                }
            
                            ?>



                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel<?php echo $model->id; ?>" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel<?php echo $model->id; ?>" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p>
                        <br/> <?php echo $model->isi_fenomena; ?>
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

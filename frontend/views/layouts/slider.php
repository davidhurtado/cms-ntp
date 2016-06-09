<?php
$frase = 'La Open Web ofrece increíbles oportunidades para los desarrolladores';
?>
<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
            <li data-target="#main-slider" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(images/slider/main.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="boxed animation animated-item-1">NUEVAS TÉCNICAS DE PROGRAMACIÓN</h2>
                                <p class="boxed animation animated-item-2"><?= $frase ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/1.png)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="boxed animation animated-item-1">El mundo al alcance de tus manos con prioridades</h2>
                                <p class="boxed animation animated-item-2">No dejes para mañana lo que puedas programar hoy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 class="boxed animation animated-item-1">La mejor forma de predecir el futuro es implementarlo</h2>
                                <p class="boxed animation animated-item-2">No documentes el problema; arréglalo</p>
                                <br>
                                <!--a class="btn btn-md animation animated-item-3" href="#">Learn More</a-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/3.png)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content centered">
                                <h2 class="boxed animation animated-item-1">El software libre tiene problemas de interoperabilidad</h2>
                                <p class="boxed animation animated-item-2">No es que el Linux sea más barato en sí, lo cierto es que se gestiona mejor</p>
                                <!--a class="btn btn-md animation animated-item-3" href="#">Learn More</a-->
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="centered">
                                <div class="embed-container">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/_XI0ODNPqk4" frameborder="0" allowfullscreen></iframe>                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section>
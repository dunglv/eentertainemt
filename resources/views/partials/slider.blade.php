<!-- SLIDER -->
        <section id="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    {!!HTML::image('images/slider/slide_01.jpg', 'slide 01')!!}
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 01
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    {!!HTML::image('images/slider/slide_02.jpg', 'slide 02')!!}
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 02
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    {!!HTML::image('images/slider/slide_03.jpg', 'slide 03')!!}
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 03
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    {!!HTML::image('images/slider/slide_04.jpg', 'slide 04')!!}
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 04
                                        </div>
                                    </div>
                                </div>
                              </div>

                              <!-- Controls -->
                              <a class="left carousel-control slide-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control slide-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <i class="fa fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SLIDER -->
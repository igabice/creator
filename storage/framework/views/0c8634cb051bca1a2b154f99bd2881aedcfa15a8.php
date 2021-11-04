<?php $__env->startSection('content'); ?>


    <!-- BANNER AREA START -->
    <section id="banner">
        <div class="backtotop">
            <a href="#banner"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </div>
        <div class="follow-us">
            <span>Follow us</span>
            <a href="https://www.instagram.com/7dcng"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.twitter.com/7dcng"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/7dcng"><i class="fa fa-facebook" aria-hidden="true"></i></a>

        </div>
        <div class="banner-arrow">
            <i class="fa fa-angle-left arrow-al" aria-hidden="true"></i>
            <i class="fa fa-angle-right arrow-ar" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-8 col-md-6 landscape-m-auto tab-m-auto banner-img">
                    <img src="asset/images/point.png" alt="banner-img" class="img-fluid">
                    <a class="vid-btn venobox" data-autoplay="true" data-vbtype="video" href="../../../../../external.html?link=https://www.youtube.com/embed/mYHSw_Tr3Bc"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-5 m-auto banner-txt">
                    <div class="banner-main">
                        <div class="banner-item">
                            <h3>Sell, Learn</h3>
                            <h3>Create<span>...</span></h3>

                            <a href="#" class="main-btn">LEARN NOW</a>
                        </div>
                        <div class="banner-item">
                            <h3>The 7 Digits</h3>
                            <h3>Call..<span>.</span></h3>

                            <a href="#" class="main-btn">LEARN NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER AREA END -->

    <!-- GAMES AREA START -->
    <section id="games">
        <div class="container game-line">
            <div class="gl-one gl"></div>
            <div class="gl-two gl"></div>
            <div class="row game-pa">

                <div class="col-lg-12">
                    <div class="col-lg-12 col-md-11 tab-m-auto">
                        <div class="game-box">
                            <a href="/courses" class=""><h4><span>Featured Course </span></h4> </a>
                            <br>
                        </div>
                    </div>
                    <div class="game-main">
                        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 game-item text-center">
                                <a href="/course/<?php echo e($feature->id); ?>?ref=2">
                                <div class="game-img">
                                    <img src=" <?php echo e($feature->image ?? 'asset/images/courses/closing.png'); ?>" alt="game-img" class="img-fluid"/>

                                </div> <?php echo e($feature->name); ?> </a>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- GAMES AREA START -->
    <section id="games">
        <div class="container game-line">
            <div class="gl-one gl"></div>
            <div class="gl-two gl"></div>
            <div class="row game-pa">

                <div class="col-lg-12">
                    <div class="col-lg-12 col-md-11 tab-m-auto">
                        <div class="game-box">
                            <a href="#" class=""><h4><span>Featured Coaches </span></h4> </a>

                            <br>
                        </div>
                    </div>
                    <div class="game-main">
                        <?php $__currentLoopData = $coaches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 game-item text-center">

                                    <div class="game-img">
                                        <img src=" <?php echo e($feature->image ?? 'asset/images/courses/closing.png'); ?>" alt="game-img" class="img-fluid"/>

                                    </div> <?php echo e($feature->name); ?> <?php echo e($feature->last_name); ?>



                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="games">
        <div class="container game-line">
            <div class="gl-one gl"></div>
            <div class="gl-two gl"></div>
            <div class="row game-pa">

                <div class="col-lg-12">
                    <div class="col-lg-12 col-md-11 tab-m-auto">
                        <div class="game-box">
                            <a href="/courses" class=""><h4><span>Latest Courses </span></h4> </a>
                            <br>
                        </div>
                    </div>
                    <div class="game-main">

                        <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 game-item text-center">
                                <a href="/course/<?php echo e($feature->id); ?>?ref=2">
                                    <div class="game-img">
                                        <img src=" <?php echo e($feature->image ?? 'asset/images/courses/closing.png'); ?>" alt="game-img" class="img-fluid"/>

                                    </div> <?php echo e($feature->name); ?> </a>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="games">
        <div class="container game-line">
            <div class="gl-one gl"></div>
            <div class="gl-two gl"></div>
            <div class="row game-pa">

                <div class="col-lg-12">
                    <div class="col-lg-12 col-md-11 tab-m-auto">
                        <div class="game-box">
                            <a href="/courses" class=""><h4><span>Best Selling Courses </span></h4> </a>
                            <br>
                        </div>
                    </div>
                    <div class="game-main">
                        <?php $__currentLoopData = $best; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 game-item text-center">
                                <a href="/course/<?php echo e($feature->id); ?>?ref=2">
                                    <div class="game-img">
                                        <img src=" <?php echo e($feature->image ?? 'asset/images/courses/closing.png'); ?>" alt="game-img" class="img-fluid"/>

                                    </div> <?php echo e($feature->name); ?> </a>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h3>About</h3>
                </div>
            </div>
            <div class="row about-pt">
                <div class="col-lg-5 col-sm-9 m-sm-auto about-img">
                    <div class="about-txt-overlay">
                        <h3 class="counter" data-counterup-time="2000" data-counterup-delay="30" data-counterup-beginat="1">12</h3>
                        <span>Years of Leading</span>
                    </div>
                    <img src="asset/images/about.jpg" alt="about-img" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <div class="about-txt">
                        <span>7DC</span>
                        <h3>A Place For Your Dreams To Find Wings<b>.</b></h3>
                        <p>
                            We couldn’t sit around anymore and watch the whole financial system go down in shambles. We had to do something about it. The middle class is fast disappearing and it behoves on us Millenials and Gen Zs to lift our generation out of poverty into a meaningful life. One that is not ridden with tragedy or the misery of scarcity.
                        </p>
                        <p class="mb-3">We thought we would build a system where young people don’t prey on one another’s need for money and desperation. That we could actually build a system that catered for everything lacking in our nurture or  the education system that produced most of us. Now there is actually a platform where true value can be exchanged and everyone is 7 digits better for it.</p>
                        <a href="/about" class="main-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="counter-item">
                        <h3 class="counter" data-counterup-time="2500" data-counterup-delay="30" data-counterup-beginat="20">105</h3>
                        <span>K<b>.</b></span>
                        <p>Community Earning</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="counter-item">
                        <h3 class="counter" data-counterup-time="2500" data-counterup-delay="30" data-counterup-beginat="20">10</h3>
                        <span>K<b>.</b></span>
                        <p>Registered Creators</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="counter-item">
                        <h3 class="counter" data-counterup-time="2500" data-counterup-delay="30" data-counterup-beginat="20">221</h3>
                        <span>K<b>.</b></span>
                        <p>Canpaigns Complete</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <div class="counter-item">
                        <h3 class="counter" data-counterup-time="2500" data-counterup-delay="30" data-counterup-beginat="20">875</h3>
                        <span><b>.</b></span>
                        <p>Products</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="watch">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 watch-item">
                    <div class="video-overlay">
                        <a class="venobox" data-autoplay="true" data-vbtype="video" href="../../../../../external.html?link=https://www.youtube.com/embed/mYHSw_Tr3Bc"><i class="fa fa-play" aria-hidden="true"></i></a>
                    </div>
                    <img src="asset/images/watch-bg.jpg" alt="watch-img" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="brand">
        <div class="row">
            <div class="col-lg-12 text-center pre-match">
                <h3>Partners</h3><br><br>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-main">
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand2.png" alt="brand-img">
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand4.png" alt="brand-img">
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand3.png" alt="brand-img">
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand2.png" alt="brand-img">
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand4.png" alt="brand-img">
                        </div>
                        <div class="col-lg-3 text-center">
                            <img src="asset/images/brand3.png" alt="brand-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="subscribe">
        <div class="container zindex">
            <div class="row">
                <div class="col-lg-6 col-md-8 subscribe-txt">
                    <h3>Get Latest news in your inbox from the 7DC Community<b>.</b></h3>
                </div>
                <div class="col-lg-6 col-md-4 text-center">
                    <a href="#" class="subscribe-btn">Subscribe Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- SUBSCRIBE AREA END -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/index.blade.php ENDPATH**/ ?>
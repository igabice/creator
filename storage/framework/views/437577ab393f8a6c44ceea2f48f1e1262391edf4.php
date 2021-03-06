<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function(){

            var app = <?php echo json_encode($videos, 15, 512) ?>;

            $('#actionPayout').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');

                $("#main-c")
                    .html('<input type="hidden" name="id" value="'+ app[i].id +'">' +
                            '<label>Title</label><br>'+
                        '<input type="text" style="color: black" name="title" placeholder="Title" class="form-control" value="'+ app[i].title +'"><br>' +
                        '<label>Description</label><br>'+
                        '<input type="text" style="color: black" name="description" placeholder="Description" class="form-control" value="'+ app[i].description +'"><br>' +
                        '<input type="file" name="file" >' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });



            $('#make-campaign').on('shown.bs.modal', function (e) {

                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>Name:</td><th><?php echo e($data->name); ?></th></tr>'+
                        '<tr><td>Price:</td><th><?php echo e($data->price); ?></th></tr>\n' +
                        '<tr><td>Commission:</td><th><?php echo e($data->commission); ?></th></tr>\n' +
                        '<input type="hidden" name="product_id" value="<?php echo e($data->id); ?>">' +
                        '<input type="hidden" name="user_id" value="<?php echo e($user != null ? $user->id : ''); ?>">' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });

        });
    </script>

<?php $__env->stopSection(); ?>
    <div class="inner-page">

        <?php
        $user = auth()->user();
        ?>


        <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3><?php echo e($data->name); ?></h3>
                        <a href=/"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Course Detail</span>

                    </div>
                </div>

            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="cart-items text-center">

                            <img src="<?php echo e($data->image ?? 'asset/images/noimage.jpeg'); ?>" alt="product-img" class="img-fluid">
                            <h4><?php echo e($data->name); ?></h4>

                            <div class="checkout-box">
                                <div class="row">
                                    <?php if(session()->has('success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">??</span>
                                            </button>
                                            <strong>Well done!</strong> <?php echo e(session()->get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                        <?php if(session()->has('error')): ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                                <strong>Well done!</strong> <?php echo e(session()->get('error')); ?>

                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 col-lg-12 col-sm-12 text-left">
                                            <h4><?php echo e(new \Illuminate\Support\HtmlString($data->description)); ?> ertyui</h4>
                                        </div>













                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>Price</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4><?php echo e($data->price); ?> <small style="color: grey; text-decoration: line-through">???<?php echo e($data->former_price); ?></small></h4>
                                            </div>
                                        </div>
                                    </div>
                                        <?php if($user != null): ?>
                                            <?php if($user->role == 'A' || $user->verified == 1 || $user->affiliate == 1): ?>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>Commission</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4><?php echo e($data->commission); ?></h4>
                                            </div>
                                        </div>
                                    </div>


                                        <?php endif; ?>
                                                <?php if($user->role == 'A'): ?>

                                                    <div class="col-lg-12 checkout-item">
                                                        <div class="row">
                                                            <div class="col-4 col-lg-4 col-sm-4">
                                                                <h3>7DC Commission</h3>
                                                            </div>
                                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                                <h4><?php echo e($data->d_commission); ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                        <?php endif; ?>

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                        <div class="col-lg-12 checkout-item">
                                            <div class="row">

                                    <?php if($own == null): ?>
                                                    <?php if(session()->has('error')): ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">??</span>
                                                            </button>
                                                            <strong>Error!</strong> <?php echo e(session()->get('error')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                    <form method="POST" action="<?php echo e(route('buyCourse')); ?>" accept-charset="UTF-8" class="form-horizontal" style="width:100%" role="form">
                                        <?php if($user != null): ?>
                                            <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                                            <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                                            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'cart'])); ?>" >
                                        <?php else: ?>
                                            <label for="email">Name</label>
                                            <input value="<?php echo e(old('name')); ?>" id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" required autocomplete="name" autofocus>
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                            <?php endif; ?>
                                            <label for="email"> Email</label>
                                            <input type="email" required name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Email">
                                            <?php if($errors->has('email')): ?>
                                                <span class="text-danger">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                    </span>
                                            <?php endif; ?>
                                            <label for="email">Phone Number</label>
                                            <input type="phone" required name="phone" value="<?php echo e(old('phone')); ?>" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" placeholder="Phone">
                                            <input type="hidden" name="orderID" value="<?php echo e(random_int(12,234).\Illuminate\Support\Facades\Date::now()); ?>">
                                            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['type' => 'course'])); ?>" >
                                        <?php endif; ?>
                                            <input type="hidden" name="amount" value="<?php echo e(str_replace(",","",$data->price) +10); ?>">
                                        <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>">
                                            <?php if(isset(request()->ref)): ?>
                                            <input type="hidden" name="ref_id" value="<?php echo e(request()->ref); ?>">

                                            <?php else: ?>
                                                <input type="hidden" name="ref_id" value="1484">
                                            <?php endif; ?>



                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                        <?php echo e(csrf_field()); ?>

                                            <br>
                                        <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                            <span class="f-s--xs">Make Payment </span>
                                        </button>
                                    </form>
                                        <?php endif; ?>
                                            </div>
                                        </div>
                                </div>
                                <br>
                                <?php if($user != null): ?>
                                    <?php if($user->affiliate == 1 && $refferal < 1): ?>


                                        <a class="btn btn-sm btn-outline-warning" href="/campaign" data-toggle="modal" data-target="#make-campaign" title="Sell this product">
                                            Sell product
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>







                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-5 contact-box">
                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    <?php if($user != null): ?>

                                        <?php if($user->role == 'A' || $user->id == $data->user_id): ?>
                                            <h4>Add Video </h4>
                                            <form class="form-horizontal" method="POST" action="/video-add" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                                <div class="form-group">
                                                                    <input value="<?php echo e(old('title')); ?>" placeholder="Title" id="title" type="text" class="form-control <?php if($errors->has('title')): ?> is-invalid <?php endif; ?>" name="title" required autocomplete="title" autofocus>

                                                                    <?php if($errors->has('title')): ?>
                                                                        <span class="text-danger">
                                                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <input name="course_id" value="<?php echo e($data->id); ?>"  type="hidden" />

                                                                <div class="form-group label-floating  ">
                                                                    <label class="control-label">Video File</label>
                                                                <!--<input value="<?php echo e(old('file')); ?>" id="file" type="text" class="form-control <?php if($errors->has('file')): ?> is-invalid <?php endif; ?>" name="file" required >-->
                                                                    <input class="form-control" name="file" id="image"  type="file" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input value="<?php echo e(old('description')); ?>" placeholder="Description" id="description" type="text" class="form-control" name="description" >
                                                                </div>
                                                                <input type="hidden" name="status" value="closed">
                                                                <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>

                                                            </div>
                                                    <br>
                                                </div>

                                            </form>
                                        <?php endif; ?>

                                            <?php if(isset($video)): ?>
                                                <video width="100%" height="240" controls autoplay>
                                                    <source src="<?php echo e($video->file); ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <h4><?php echo e($video->title); ?></h4>

                                            <?php else: ?>
                                                <video width="100%" height="240" autoplay controls controlsList="nodownload">
                                                    <source src="<?php echo e($data->trailer); ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            <?php endif; ?>

                                            <table class="table table-bordered table-striped">
                                                <?php if($user != null): ?>

                                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <?php if($own != null || auth()->user()->role == 'A'  || $user->id == $data->user_id): ?>
                                                        <tr><th>

                                                                    <a href="/products/<?php echo e($data->id); ?>?video=<?php echo e($video->id); ?>" >







                                                                                <?php echo e($loop->index +1); ?>.   <?php echo e($video->title); ?>

                                                                            </a>
                                                                <?php if($user != null): ?>
                                                                            <?php if(auth()->user()->role == 'A'): ?>
                                                                                <a class="btn btn-outline-success btn-sm" data-index="<?php echo e($loop->iteration -1); ?>"
                                                                                   data-toggle="modal" data-target="#actionPayout"> Edit</a>
                                                                    <?php endif; ?>
                                                            </th>
                                                        </tr>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>


                                            </table>

                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>


                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </section>




































































            <div id="make-campaign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="<?php echo e(url('/campaign')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Sell this product?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                            </div>
                            <div class="modal-body" id="main-content">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div>

            <div id="actionPayout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="<?php echo e(url('/video-edit')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Edit Video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                            </div>
                            <div class="modal-body" id="main-c">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/products/details.blade.php ENDPATH**/ ?>
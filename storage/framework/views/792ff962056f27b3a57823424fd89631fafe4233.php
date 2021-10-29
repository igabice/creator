<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>NEW <b> Notification </b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Notification </a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('/posts')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group">
                                                    <label for="other_names">Title</label>
                                                    <input value="<?php echo e(old('title')); ?>" id="title" type="text" class="form-control <?php if($errors->has('title')): ?> is-invalid <?php endif; ?>" name="title" required autocomplete="title" autofocus>

                                                    <?php if($errors->has('title')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <input type="hidden" name="created_by" value="<?php echo e(Auth::user()->id); ?>">
                                                <div class="form-group">
                                                    <label for="content">Description</label>
                                                    <textarea name="content" class="form-control"><?php echo e(old('content')); ?></textarea>
                                                    <?php if($errors->has('content')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('content')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row m-t-20">
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/tinymce/tinymce.min.js"></script>
    


    <script>
        // $(".select2").select2();

        tinymce.init({
            selector : "textarea",
            height : "480",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        });

    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/posts/create.blade.php ENDPATH**/ ?>
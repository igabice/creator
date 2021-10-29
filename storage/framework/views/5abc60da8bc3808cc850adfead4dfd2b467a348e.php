<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b> Law</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Law</a></li>
                            <li class="breadcrumb-item active">edit</li>
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
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('/laws-update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input value="<?php echo e($data->id); ?>" name="id" type="hidden"/>

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input value="<?php echo e($data->title); ?>" id="title" type="text" class="form-control <?php if($errors->has('title')): ?> is-invalid <?php endif; ?>" name="title" maxlength="50" required autocomplete="title" autofocus>

                                                    <?php if($errors->has('title')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Long Title</label>
                                                    <input value="<?php echo e($data->long_title); ?>" id="long_title" type="text" class="form-control <?php if($errors->has('long_title')): ?> is-invalid <?php endif; ?>" name="long_title" required autocomplete="long_title" autofocus>

                                                    <?php if($errors->has('long_title')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('long_title')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Title</label>
                                                    <input value="<?php echo e($data->title); ?>" id="title" type="text" class="form-control <?php if($errors->has('title')): ?> is-invalid <?php endif; ?>" name="title" required autocomplete="title" >

                                                    <?php if($errors->has('title')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Description</label>
                                                    <input value="<?php echo e($data->description); ?>" id="description" type="text" class="form-control <?php if($errors->has('description')): ?> is-invalid <?php endif; ?>" name="description"  autocomplete="description" >

                                                    <?php if($errors->has('description')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Downloadable?</label>
                                                    <select name="status" id="status" required class="form-control  select2">
                                                        <option value="no" <?php if($data->status == 'no'): ?> selected <?php endif; ?>>No</option>
                                                        <option value="free" <?php if($data->status == 'free'): ?> selected <?php endif; ?>>Yes (Free)</option>
                                                        <option value="paid" <?php if($data->status == 'paid'): ?> selected <?php endif; ?>>Yes (Not-Free)</option>
                                                    </select>
                                                    <?php if($errors->has('status')): ?>
                                                        <span class="text-danger">
                                                <strong><?php echo e($errors->first('status')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Price</label>
                                                    <input value="<?php echo e($data->price); ?>" id="price" type="text" class="form-control <?php if($errors->has('price')): ?> is-invalid <?php endif; ?>" name="price" required autocomplete="price" >

                                                    <?php if($errors->has('price')): ?>
                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('price')); ?></strong>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">WORD Doc. </label>
                                                    <input class="form-control" name="word" id="word"  type="file" />
                                                    <?php if(!empty($data->word)): ?>
                                                        <a href="<?php echo e(url('/').$data->word); ?>" >view</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">PDF format </label>
                                                    <input class="form-control" name="pdf" id="pdf"  type="file" />
                                                    <?php if(!empty($data->pdf)): ?>
                                                        <a href="<?php echo e(url('/').$data->pdf); ?>" >view</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">JSON Format </label>
                                                    <input class="form-control" name="json" id="json"  type="file" />
                                                    <?php if(!empty($data->json)): ?>
                                                        <a href="<?php echo e(url('/').$data->json); ?>" >view</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">Short WORD </label>
                                                    <input class="form-control" name="short_word" id="short_word"  type="file" />
                                                    <?php if(!empty($data->short_word)): ?>
                                                        <a href="<?php echo e(url('/').$data->short_word); ?>" >view</a>
                                                    <?php endif; ?>
                                                </div>











                                                <div class="form-group">
                                                    <label for="date_published">Date Published</label>
                                                    <input value="<?php echo e($data->date_published); ?>" id="date_published" type="text" class="form-control <?php if($errors->has('date_published')): ?> is-invalid <?php endif; ?>" name="date_published"  autocomplete="date_published" >

                                                    <?php if($errors->has('date_published')): ?>
                                                        <span class="text-danger">
                                                            <strong><?php echo e($errors->first('date_published')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
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

    <script>
        $(".select2").select2();
        // $('select[name="role_level"]').on('change', function(){
        //     $('select[name="store_id"]').html('');
        //     var level=$(this).val();
        //     if(level=="")return;
        //     $.LoadingOverlay("show");
        //     $.ajax({
        //         type: "GET",
        //         url: "/getstores/"+level
        //     }).done(function(data){
        //
        //         if(data.length<1){
        //             alert("There is no unit in the selected location");
        //             $('select[name="store_id"]').html('');
        //             var ss="<option value=''></option>";
        //             $('select[name="store_id"]').append(ss);
        //
        //             $.LoadingOverlay("hide");
        //             return;
        //         }
        //
        //         var ss="<option value=''></option>";
        //         $('select[name="store_id"]').append(ss);
        //         $.each(data, function(i, item){
        //             var ss="<option value='"+item.id+"'>"+item.name+"</option>";
        //             $('select[name="store_id"]').append(ss);
        //         });
        //
        //         $.LoadingOverlay("hide");
        //
        //     });
        // });

    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/legool-app/resources/views/laws/edit.blade.php ENDPATH**/ ?>
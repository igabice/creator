<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2> <b> Law > <?php echo e($data->title); ?></b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item "><?php echo e($data->getState()); ?> State</li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Law </a></li>
                        </ol>
                    </div>
                    <div class="col-sm-4">









                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">


                            <table class="table table-bordered table-striped">

                                <tr>
                                    <td>Title:</td><th> <?php echo e($data->title); ?></th>
                                </tr>
                                <tr>
                                    <td>Long Title:</td><th> <?php echo e($data->long_title); ?></th>
                                </tr>
                                <tr>
                                    <td>Description:</td><th> <?php echo e($data->description); ?></th>
                                </tr>




                                <tr>
                                    <td>Date Published:</td><th> <?php echo e($data->date_published); ?></th>
                                </tr>

                                <?php if(!is_null($data->date_created)): ?>
                                    <tr>
                                        <td>Created Date:</td><th> <?php echo e($data->date_created); ?></th>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <?php echo e(url('/').$data->short_word); ?>

                            <div id="example1"></div>



                            



























                          </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<div id="upload-section" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(url('/upload-sections')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload Section File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a  file in the order of Title, Long Title, Citation, Enactment and Date Published
                        </label>
                        <a href="/section-upload-file.xls" class="btn btn-success waves-effect waves-light">Download Format File</a>
                        <br>
                        <br>
                        <input type="file" class="filestyle" name="upload_file" data-buttonname="btn-secondary" required="">
                        <input name="law_id" type="hidden" value="<?php echo e($data->id); ?>">
                        <input name="section_type" type="hidden" value="section">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>
<script src="<?php echo e(asset('js/pdfobject.js')); ?>"></script>
<script>PDFObject.embed("<?php echo e(url('/').$data->pdf); ?>", "#example1", {
        height: "800px",
        fallbackLink: "<p>This is a <a href='<?php echo e(url('/').$data->pdf); ?>'>fallback link</a></p>",
        pdfOpenParams: { view: 'FitV', page: '2' }
    });</script>

        <script>
            $(function () {
                $('#dataTable').DataTable({
                    serverSide: false,
                    processing: false,
                    responsive: false,
                    lengthChange: false,
                    
                       
                        
                        
                    
                    // columns: [
                    //     {data: 'first_name'},
                    //     {data: 'middle_name'},
                    //     {data: 'last_name'},
                    //     {data: 'email'},
                    //     {data: 'phone'},
                    //     {data: 'department_name', name:'departments.name'},
                    //     {data: 'account_name', name:'account_types.name'},
                    //     {data: 'role_name', name:'account_types.name'},
                    //     {data: 'store_name', name:'stores.name'},
                    //     {data: 'status_name',name:'status.name'},
                    //     {data: 'action', orderable: false, searchable: false}
                    // ]
                });
                $('#dataTable1').DataTable({lengthChange: false,});



            });
        </script>
        <!-- /content area -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/legool-app/resources/views/laws/show.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name" class="req_fld">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo e(auth()->user()->name); ?>">
                    

                </div>
                <div class="col-md-4 form-group">
                    <label for="email" class="req_fld">Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo e($user->email); ?>" >

                </div>
                <div class="col-md-4 form-group">
                    <label for="contact_no" class="req_fld">Contact Number</label>
                    <input class="form-control" type="text" name="contact_no" value="<?php echo e($user->contact_no); ?>">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="gender" class="req_fld">Gender</label>

                    <input class="form-control" type="text" name="contact_no" value="<?php echo e($user->gender); ?>">

                </div>


            </div>
        </div>
    </div>    

   <?php $__env->stopSection(); ?>     
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/profile/profile.blade.php ENDPATH**/ ?>
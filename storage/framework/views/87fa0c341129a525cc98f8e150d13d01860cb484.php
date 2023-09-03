
<?php $__env->startSection('title', 'Employee'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="<?php echo e(route('employee.status')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" disabled value="<?php echo e($emp->name); ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email" class="req_fld">Email</label>
                        <input class="form-control" type="text" disabled value="<?php echo e($emp->email); ?>" autocomplete="off">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="contact_no" class="req_fld">Contact Number</label>
                        <input class="form-control" type="text" disabled value="<?php echo e($emp->contact_no); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="gender" class="req_fld">Gender</label>
                        <select id="gender" class="form-control" disabled>
                            <option>Please Select</option>
                            <option value="M" <?php echo e($emp->gender == "M" ? 'selected' : ''); ?>>Male</option>
                            <option value="F" <?php echo e($emp->gender == "F" ? 'selected' : ''); ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="<?php echo e(route('employee.index')); ?>" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <input type="hidden" name="id" value="<?php echo e($emp->id); ?>">
                        <?php if($emp->is_active): ?>
                        <input type="hidden" name="is_active" value="0">
                        <button class="btn btn-danger float-right" type="submit">Deactivate Employee</button>
                        <?php else: ?>
                        <input type="hidden" name="is_active" value="1">
                        <button class="btn btn-primary float-right" type="submit">Activate Employee</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/employee/view.blade.php ENDPATH**/ ?>
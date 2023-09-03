
<?php $__env->startSection('title', 'Make New Request'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <form action="<?php echo e(route('request_earnings.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="amount" class="req_fld">Amount</label>
                        <input class="form-control" type="number" max="40" name="amount" value="<?php echo e(old('amount')); ?>">
                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger small"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="<?php echo e(route('request_earnings.index')); ?>" class="btn btn-info" type="button">Back</a>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/request_earnings/add.blade.php ENDPATH**/ ?>
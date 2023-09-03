
<?php $__env->startSection('title', 'Redeem Request'); ?>


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Stats
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>$<?php echo e(number_format($total_earn, 2)); ?></h3>
                                <p><?php echo e($package?->package?->name ?? '--'); ?>

                                    ($<?php echo e(number_format($package?->package?->fee, 2)); ?>)</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>$<?php echo e(number_format($total_release, 2)); ?></h3>
                                <p>Total Redeems</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>$<?php echo e(number_format($total_earn - $total_release, 2)); ?></h3>
                                <p>Balance</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-dollar-sign"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Redeems
                <a href="<?php echo e(route('request_earnings.create')); ?>" class="btn btn-info float-right" type="button">Make New
                    Request</a>
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $inc_reqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($req->created_at); ?></td>
                                <td>$<?php echo e($req->amount); ?></td>
                                <td><?php echo e($req->status == 'A' ? 'Payout' : ($req->status == 'P' ? 'Pending' : 'Hold')); ?></td>
                                <td><?php echo e($req->registered_package->user->email); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    No Data Available
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/request_earnings/index.blade.php ENDPATH**/ ?>
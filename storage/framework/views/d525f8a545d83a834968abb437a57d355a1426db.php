
<?php $__env->startSection('title', 'Redeem Request'); ?>


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        
        <div class="card">
            <div class="card-header">
                Redeem Requests
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
                            <?php if(auth()->user()->user_role == 'ADMIN'): ?>
                                <th>Action</th>
                            <?php endif; ?>
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
                                <?php if(auth()->user()->user_role == 'ADMIN'): ?>
                                    <td>
                                        <a href="<?php echo e(route('request_earnings.edit', ['request_earning' => $req->id])); ?>"
                                            class="btn btn-warning">Manage</a>
                                    </td>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/request_earnings/index_admin.blade.php ENDPATH**/ ?>
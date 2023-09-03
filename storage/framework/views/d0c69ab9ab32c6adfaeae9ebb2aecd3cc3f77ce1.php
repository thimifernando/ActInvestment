
<?php $__env->startSection('title', 'Dashboard'); ?>


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>$<?php echo e(number_format($package?->package?->daily_income, 2)); ?>/day</h3>
                        <p><?php echo e($package?->package?->name ?? "--"); ?> ($<?php echo e(number_format($package?->package?->fee, 2)); ?>)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-box-open"></i>
                    </div>
                    
                </div>

            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>$<?php echo e($total_earn); ?></h3>
                        <p>Total Earned</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo e(!empty($package) ? now()->diffInDays(Carbon\Carbon::parse($package?->registered_date)->addDays(150)) : '--'); ?></h3>
                        <p>Days Ramaining</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    
                </div>

            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Earnings
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Earned</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo e($income->earning_date); ?></td>
                                        <td style="text-align: center">$<?php echo e($income->amount); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/dashboard.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Employee'); ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="<?php echo e(route('employee.create')); ?>" class="btn btn-info float-right" type="button">Add New Employee</a>
        </div>
        <form action="<?php echo e(url()->current()); ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo e(request()->get('name')); ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="is_active">Status</label>
                        <select id="is_active"  name="is_active" class="form-control">
                            <option value="">All</option>
                            <option value="1" <?php echo e(request()->get('is_active') == "1" ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e(request()->get('is_active') == "0" ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="<?php echo e(request()->get('email')); ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <a href="<?php echo e(url()->current()); ?>" class="btn btn-secondary" type="button">Reset</a>
                        <button class="btn btn-primary float-right" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            Results
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($emp->name); ?></td>
                        <td><?php echo e($emp->is_active ? 'Active' : 'Inactive'); ?></td>
                        <td><?php echo e($emp->email); ?></td>
                        <td><?php echo e($emp->contact_no); ?></td>
                        <td>
                            <a href="<?php echo e(route('employee.show', ['employee' => $emp->id])); ?>"
                                class="btn btn-info">View</a>
                            <a href="<?php echo e(route('employee.edit', ['employee' => $emp->id])); ?>"
                                class="btn btn-warning">Edit</a>
                        </td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/employee/index.blade.php ENDPATH**/ ?>
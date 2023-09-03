
<?php $__env->startSection('title', 'Product Suppliers'); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Search
                <a href="<?php echo e(route('supplier.create')); ?>" class="btn btn-success float-right" type="button">Add New Supplier</a>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="name">Supplier Name</label>
                            <input class="form-control" type="search" name="search" value="<?php echo e(request('search')); ?>">
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
            <div class="card-body">
                <div class="col-md-12">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Supplier Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($supplier->name); ?></td>
                                    <td><?php echo e($supplier->address); ?></td>
                                    <td><?php echo e($supplier->contact_no); ?></td>
                                    <td>
                                        <a href="" class="btn btn-primary mt-2">View</a>
                                        <a href="<?php echo e(route('supplier.edit',$supplier)); ?>" class="btn btn-warning mt-2">Edit</a>
                                        <form class="d-inline" action="<?php echo e(route('supplier.destroy',$supplier)); ?>" method="POST">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('This result permanant delete of your Supplier,Are you sure?')">Delete</button>
                                        </form>
                                    
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\THIMIRA\OneDrive - Sri Lanka Institute of Information Technology\Desktop\teddy\resources\views/supplier/index.blade.php ENDPATH**/ ?>
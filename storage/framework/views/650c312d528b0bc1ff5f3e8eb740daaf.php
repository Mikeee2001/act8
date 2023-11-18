<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Laravel CRUD</title>
    </head>
        
        <h1>Todo list</h1>
        
        <?php if($errors->any()): ?>
       <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
   <?php endif; ?>
       <form action="<?php echo e(url('/todos')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <input type="text" class="form-control" name="task" placeholder="Add new task">
        <button class="btn btn-primary" type="submit">Store</button>
     </form>

        <?php if(session('status')): ?>
         <div class="alert alert-success">
        <?php echo e(session('status')); ?>

       </div>
        <?php endif; ?>

        <h2>Pending tasks</h2>
        <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item">
        <?php echo e($todo->task); ?>

        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($loop->index); ?>" aria-expanded="false">
            Edit
        </button>
        <form action="<?php echo e(url('todos/'.$todo->id)); ?>" method="POST" style="display: inline-block;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button class="btn btn-danger" type="submit">Delete</button>
</form>

        <div class="collapse mt-2" id="collapse-<?php echo e($loop->index); ?>">
            <div class="card card-body">
                <form action="<?php echo e(url('todos/'.$todo->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="text" name="task" value="<?php echo e($todo->task); ?>">
                    <button class="btn btn-secondary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\laravel-crud\resources\views/app.blade.php ENDPATH**/ ?>
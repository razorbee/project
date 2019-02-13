<div class="btn-group ">
    <a href="<?php echo e(url('/edit-patient/'.$id)); ?>" class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
    <a href="<?php echo e(url('/view-patient/'.$id)); ?>" class="btn btn-success"><i class="fa fa-info"></i></a>
    <a href="javascript:void(0)" onclick="$(this).confirmDelete('<?php echo e(url('/delete-patient/'.$id)); ?>')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
</div>

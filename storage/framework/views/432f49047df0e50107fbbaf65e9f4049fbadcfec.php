<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Kategori Lembur</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('kategorilembur.update', $kategori_lembur->id)); ?>" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('kode_lembur') ? ' has-error' : ''); ?>">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode lembur :</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_lembur" value="<?php echo e($kategori_lembur->kode_lembur); ?>" class="form-control">
                                    <?php if($errors->has('kode_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="jabatan_id" class="form-control">
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($jabatans->id); ?>" <?php if ($data->jabatan_id==$jabatans->id) {echo "selected";} ?>><?php echo e($jabatans->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                                    <?php if($errors->has('jabatan_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('golongan_id') ? ' has-error' : ''); ?>">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan :</label>
                                <div class="col-md-6">
                            <select name="golongan_id" class="form-control">
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($golongans->id); ?>" <?php if ($data->golongan_id==$golongans->id) {echo "selected";} ?>><?php echo e($golongans->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                                <div class="col-md-6">
                                    <input type="text" name="besaran_uang" value="<?php echo e($kategori_lembur->besaran_uang); ?>" class="form-control">
                                    <?php if($errors->has('besaran_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
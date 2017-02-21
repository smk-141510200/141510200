<?php $__env->startSection('content'); ?>
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Golongan</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo e(route('golongan.store')); ?>" method="POST">	
					<div class="form-group<?php echo e($errors->has('kode_golongan') ? ' has-error' : ''); ?>">
							<label for="kode_golongan" class="col-md-4 control-label">Kode Golongan :</label>
								<div class="col-md-6">
									<input type="text" name="kode_golongan" placeholder="Kode Golongan" class="form-control" autofocus>
									<?php if($errors->has('kode_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
								</div>
					</div>
					<div class="form-group<?php echo e($errors->has('nama_golongan') ? ' has-error' : ''); ?>">
							<label for="nama_golongan" class="col-md-4 control-label">Nama Golongan :</label>
								<div class="col-md-6">
									<input type="text" name="nama_golongan" placeholder="Nama Golongan" class="form-control">
									<?php if($errors->has('nama_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
								</div>
					</div>
					<div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
							<label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
								<div class="col-md-6">
									<input type="text" name="besaran_uang" placeholder="Besaran Uang" class="form-control">
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
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
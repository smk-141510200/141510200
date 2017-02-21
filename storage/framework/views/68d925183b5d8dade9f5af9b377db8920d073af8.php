<?php $__env->startSection('content'); ?>
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Tunjangan</div>
			<div class="panel-body">
				<form class="form-horizontal" action="<?php echo e(route('tunjangan.store')); ?>" method="POST">	
					<div class="form-group<?php echo e($errors->has('kode_tunjangan') ? ' has-error' : ''); ?>">
							<label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan :</label>
								<div class="col-md-6">
									<input type="text" name="kode_tunjangan" placeholder="Kode Tunjangan" class="form-control" autofocus>
									<?php if($errors->has('kode_tunjangan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                    </span>
                                <?php endif; ?>
								</div>
					</div>
					<div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select type="text" name="jabatan_id" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo $data->id; ?>"><?php echo $data->nama_jabatan; ?></option>
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
                                    <select type="text" name="golongan_id" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo $data->nama_golongan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('golongan_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('golongan_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>

					<div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
							<label for="status" class="col-md-4 control-label">Status :</label>
								<div class="col-md-6">
									<input type="text" name="status" placeholder="Status" class="form-control">
									<?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
								</div>
					</div>
					<div class="form-group<?php echo e($errors->has('jumlah_anak') ? ' has-error' : ''); ?>">
							<label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak :</label>
								<div class="col-md-6">
									<input type="numeric" name="jumlah_anak" placeholder="Jumlah Anak" class="form-control">
									<?php if($errors->has('jumlah_anak')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
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
<?php $__env->startSection('content'); ?>
<div align="center">
	<div class="col-lg-10 col-md-offset-1" >
	    <div class="panel panel-default">
	        <div class="panel-heading">
				<div class="panel-body">
					<div class="table-responsive table-bordered">
						<table class="table">
							<thead >
								<tr class="success">
									<th>NIP</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th>Golongan</th>
									<th>Photo</th>
									<th colspan="3"><center>Aksi</center></th>
								</tr>
							</thead>
							<tbody>
							<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($data->nip); ?></td>
									<td><?php echo e($data->User->name); ?></td>
									<td><?php echo e($data->User->email); ?></td>
									<td><?php echo e($data->jabatan->nama_jabatan); ?></td>
									<td><?php echo e($data->golongan->nama_golongan); ?></td>
									<td><img src="assets/image
									/<?php echo e($data->photo); ?>" width="100" height="100"></td>
									<td align="right">
                                    <a href="<?php echo e(route('pegawai.edit', $data->id)); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('pegawai.destroy', $data->id),
                                    'model' => $data
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
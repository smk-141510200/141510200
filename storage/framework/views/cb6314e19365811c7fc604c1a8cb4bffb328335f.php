<?php $__env->startSection('content'); ?>

<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-head">
			<div class="table-responsive table-border">
				<table class="table">
					<thead>
						<tr class="success">
							<th>Kode golongan</th>
							<th>Nama golongan</th>
							<th>Besaran Uang</th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($data->kode_golongan); ?></td>
							<td><?php echo e($data->nama_golongan); ?></td>
							<td><?php echo e($data->besaran_uang); ?></td>
							<td align="right">
                                    <a href="<?php echo e(route('golongan.edit', $data->id)); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('golongan.destroy', $data->id),
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.aa', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Pegawai</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('pegawai.update', $data->id)); ?>" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e($data->user->name); ?>" >

                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" class="form-control" name="email" value="<?php echo e($data->user->email); ?>">

                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('permission') ? ' has-error' : ''); ?>">
                        <label for="permission" class="col-md-4 control-label">Permisions</label>
                        <div class="col-md-6">
                            <?php 
                                $selection = [$data->user->permission=>$data->user->permission];
                                if (Auth::user()->permission == 'Admin') {
                                    $selection['Admin']='Admin';
                                }
                                    $selection['hrd']='HRD';
                                    $selection['Pegawai']='Pegawai';
                             ?>
                            <?php echo Form::select('permission',$selection,'',['class'=>'form-control']); ?>

                            <?php if($errors->has('permission')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('permission')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="<?php echo e($data->user->password); ?>">

                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('nip') ? ' has-error' : ''); ?>">
                            <label for="nip" class="col-md-4 control-label">NIP :</label>
                                <div class="col-md-6">
                                    <input type="text" name="nip" value="<?php echo e($data->nip); ?>" class="form-control">
                                    <?php if($errors->has('nip')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
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
                    <div class="form-group<?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                            <label for="golongan_id" class="col-md-4 control-label">
                            <img src="/account/foto/<?php echo e($data->photo); ?>" width="100px" height="100px">
                                </label>
                                <div>
                                <input id="photo" type="file" name="photo" style="margin-top: 50px" >
                                    <?php if($errors->has('photo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('photo')); ?></strong>
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
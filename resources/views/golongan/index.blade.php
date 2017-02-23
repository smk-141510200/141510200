@extends('layouts.menu')
@section('content')

<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-head">
			<div class="table-responsive table-border">
				<table class="table">
					<thead>
						<tr class="success">
							<th><center>Kode Golongan</center></th>
							<th><center>Nama Golongan</center></th>
							<th><center>Besaran Uang</center></th>
							<th colspan="3"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
					@foreach($golongan as $data)
						<tr>
							<td><center>{{$data->kode_golongan}}</center></td>
							<td><center>{{$data->nama_golongan}}</center></td>
							<td><?php echo 'Rp.' . number_format($data->besaran_uang, 2,",","."); ?></td>
							<td align="right">
                                    <a href="{{route('golongan.edit', $data->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('golongan.destroy', $data->id),
                                    'model' => $data
                                  ])
                                </td>
                                
						</tr>
					@endforeach		
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
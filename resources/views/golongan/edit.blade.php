@extends('layouts.menu') 
 @section('content') 
<title>Golongan</title> 
 <div class="col-md-6 col-md-offset-3"> 
   <div class="panel panel-default"> 
       <div class="panel-heading">EDIT DATA GOLONGAN</div> 
           <div class="panel-body"> 
              <form class="form-horizontal" action="{{route('golongan.update', $golongan->id)}}" method="POST" > 
              <input name="_method" type="hidden" value="PATCH"> 
                  {{csrf_field()}} 
                 <div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}"> 
                          <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan :</label> 
                              <div class="col-md-6"> 
                                  <input type="text" name="kode_golongan" title="KG...." value="{{$golongan->kode_golongan}}" class="form-control" > 
                                  @if ($errors->has('kode_golongan')) 
                                     <span class="help-block"> 
                                         <strong>{{ $errors->first('kode_golongan') }}</strong> 
                                     </span> 
                                 @endif 
                              </div> 
                  </div> 
                  <div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : '' }}">                           <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan :</label> 
                              <div class="col-md-6"> 
                                  <input type="text" name="nama_golongan" value="{{$golongan->nama_golongan}}" class="form-control"> 
                                  @if ($errors->has('nama_golongan')) 
                                     <span class="help-block"> 
                                         <strong>{{ $errors->first('nama_golongan') }}</strong> 
                                     </span> 
                                 @endif 
                              </div> 
                  </div> 
                  <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}"> 
                          <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label> 
                              <div class="col-md-6"> 
                                  <input type="text" name="besaran_uang" value="{{$golongan->besaran_uang}}" class="form-control"> 
                                  @if ($errors->has('besaran_uang')) 
                                     <span class="help-block"> 
                                         <strong>{{ $errors->first('besaran_uang') }}</strong> 
                                     </span> 
                                 @endif 
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
 @endsection 

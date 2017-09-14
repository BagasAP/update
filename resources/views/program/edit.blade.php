@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
        <header class="panel-heading"><b>Edit Program</b></header>
					<div class="panel-body">
					  <div class="form-horizontal">
              <form action="{{route('program.update', $program->id)}}" method="post" >
                <input type="hidden" name="_method" value="put">
					       {{ csrf_field() }}
						    <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Program</label>
                  <div class="col-sm-4">
                    <input name="kd_program" type="text" class="form-control" required  value="{{$program->kd_program}}" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Program</label>
                  <div class="col-sm-4">
                    <input name="nama_program" type="text" class="form-control" required  value="{{$program->nama_program}}" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Sub Kejuruan</label>
                    <div class="col-sm-4">
                      <input name="kd_sub_kejuruan" type="text" class="form-control" required value="{{$program->kd_sub_kejuruan}}" />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
                    <div class="col-sm-4">
                      <input name="kd_kejuruan" type="text" class="form-control" required value="{{$program->kd_kejuruan}}" />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Paket</label>
                    <div class="col-sm-4">
                      <input name="jumlah_paket" type="number" class="form-control" value="{{$program->jumlah_paket}}" />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lama Pelatihan</label>
                    <div class="col-sm-4">
                      <input name="lama_pelatihan" type="number" class="form-control" value="{{$program->lama_pelatihan}}" />
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Asrama</label>
                  <div class="col-sm-4">
                    <input name="asrama" type="text" class="form-control" value="{{$program->asrama}}" />
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="form-group">
                      <div class="col-md-4">
                        <button type="Submit" value="Simpan" class="btn btn-primary">Simpan</button>
                        <td><a class="btn btn-danger" href="{{URL::previous()}}">Batal</a></td>
                      </div>
                    </div>
                </div>
              </form>                        
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
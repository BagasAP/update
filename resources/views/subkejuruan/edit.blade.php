@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
        <header class="panel-heading"><b>Edit Sub Kejuruan</b>
        </header>
				<div class="panel-body">
					<div class="form-horizontal">
            <form action="{{route('subkejuruan.update', $subkejuruan->id)}}" method="post" >
              <input type="hidden" name="_method" value="put">
					    {{ csrf_field() }}
						  <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Kode Sub Kejuruan</label>
                <div class="col-sm-4">
                  <input name="kd_sub_kejuruan" type="text" class="form-control" required value="{{$subkejuruan->kd_sub_kejuruan}}" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama Sub Kejuruan</label>
                <div class="col-sm-4">
                  <input name="nama_sub_kejuruan" type="text" class="form-control" required  value="{{$subkejuruan->nama_sub_kejuruan}}" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
                <div class="col-sm-4">
                  <select name="kd_kejuruan" class="form-control">
                    @foreach($kejuruan as $data)
                    <option value="{{$data->kd_kejuruan}}" selected="">{{$data->nama_kejuruan}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-4">
                  <input name="keterangan" type="text" class="form-control" required  value="{{$subkejuruan->keterangan}}" />
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
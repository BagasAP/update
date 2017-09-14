@extends('layouts.master')
@section('content')

<div class="container-fluid">
<div class="row-fluid">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Data Program</h2>
        </div>

        <div class="panel-body">
                       <td><a class="btn btn-primary"  id="btn_add" name="btn_add">Create</a></td>
                     <td><a class="btn btn-warning" href="javascript:void(0)" onclick="on_edit()">Edit</a></td>
                <td><a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a></td>  
          <table class="table">
            {!! $html->table(['class'=>'table-striped'])!!}
          </table>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Program</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('program.store')}}" method="post" >
              {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Program</label>
                  <div class="col-sm-4">
                    <input name="kd_program" type="text" class="form-control" required  />
                    {!! $errors->first('kd_program', '<p class="help-block">Data Sudah Ada</p>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Program</label>
                  <div class="col-sm-4">
                    <input name="nama_program" type="text" class="form-control" required  />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Sub Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_sub_kejuruan" class="form-control">
                      @foreach($subkejuruan as $data)
                      <option value="{{$data->kd_sub_kejuruan}}">{{$data->nama_sub_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_kejuruan" class="form-control">
                      @foreach($kejuruan as $data)
                      <option value="{{$data->kd_kejuruan}}">{{$data->nama_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Paket</label>
                  <div class="col-sm-4">
                    <input name="jumlah_paket" type="number" class="form-control"   />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lama Pelatihan</label>
                  <div class="col-sm-4">
                    <input name="lama_pelatihan" type="number" class="form-control"  />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Asrama</label>
                  <div class="col-sm-4">
                    <input name="asrama" type="radio" class="form-control" value="Ya" />Ya<br>
                    <input type="radio" name="asrama" class="form-control" value="Tidak">Tidak
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
    <meta name="_token" content="{!! csrf_token() !!}" />
<script type="text/javascript">
var ids = [];

function addId(obj) {
  //alert("Kode: "+ obj.value + '; ' + (obj.checked? 'terpilih' : 'tidak dipilih'));
  console.log(obj);

  //checkbox terpilih..
  if(obj.checked) {
    ids.push(obj.value);
  } else {
    //checkbox tidak dipilih
    var index = ids.indexOf(obj.value);
    ids.splice(index, 1);
  }
}


function on_edit()
{
  if(ids.length == 0) {
    alert("silahkan pilih data yang ingin di ubah !");
  } else if (ids.length > 1 ){
     alert("silahkan pilih salah satu datanya !");
  }else {
    var konfirmasi = confirm("Apakan anda yakin akan merubah data ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        // $.ajax({
        //     url: "kejuruan",
        //     type: 'get',
        //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //     dataType: 'json',
        //     data: {"ids": ids},
        //     success: function(result) {
              
        //     }
        // });
        setTimeout(function(){
          window.location = "/program/"+ids+"/edit";  
        }, 1000);
        
    } else {
        alert('Eksekusi rubah data dibatalkan..');
    }
  }
}


function on_delete()
{
  if(ids.length == 0) {
    alert("silahkan pilih data yang ingin dihapus !");
  } else {
    var konfirmasi = confirm("Apakan anda yakin akan menghapus ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        $.ajax({
            url: "kejuruan/destroy",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              
            }
        });
        setTimeout(function(){
          window.location = "/program";  
        }, 1000);
        
    } else {
        alert('Eksekusi delete data dibatalkan..');
    }
  }
}

</script>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
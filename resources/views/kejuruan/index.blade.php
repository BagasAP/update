@extends('layouts.master')
<<<<<<< HEAD
@section('contents')
<div class="container-fluid">
  <div class="row-fluid">
    <div class="panel-heading"><h2 class="panel-title">Data Kejuruan</h2></div>
        <td><a class="btn btn-primary"  id="btn_add" name="btn_add">Create</a></td>
        <td><a class="btn btn-warning" href="javascript:void(0)" onclick="on_edit()">Edit</a></td>
        <td><a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a></td> <br>  <br>
          <table class="table" id="app">{!! $html->table(['class'=>'table-striped'])!!}</table>
  </div>
</div>
=======
@section('content')



      <div class="container-fluid">
         <div class="row-fluid">
                 <div class="panel-heading"><h2 class="panel-title">Data Kejuruan</h2></div>

                <td><a class="btn btn-primary"  id="btn_add" name="btn_add">Create</a></td>
                <td><a class="btn btn-warning" href="javascript:void(0)" onclick="on_edit()">Edit</a></td>
                <td><a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a></td> <br>  
                <br>
          <table class="table" id="app">
            {!! $html->table(['class'=>'table-striped'])!!}
          </table>
        </div>
      </div>
>>>>>>> e6e429105909a5b515770c555fef15f9b57979a0
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Kejuruan</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('kejuruan.store')}}" method="post" >
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Kode Kejuruan</label>
              <input name="kd_kejuruan" type="text" class="form-control" required  />
              {!! $errors->first('kd_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
              <input name="nama_kejuruan" type="text" class="form-control" required  />
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
              <textarea name="keterangan" required=""></textarea>
          </div>
          <div class="modal-footer">
            <div class="form-group" style="margin-bottom: 20px;">
              <label class="col-sm-2 col-sm-2 control-label"></label>
                <div class="form-group">
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
          window.location = "/kejuruan/"+ids+"/edit";  
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
          window.location = "/kejuruan";  
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
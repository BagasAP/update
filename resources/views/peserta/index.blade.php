@extends('layouts.master')
@section('content')

<div class="container-fluid">
<div class="row-fluid">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Pendaftaran Peserta Program</h2>
        </div>
          <div class="panel-body">
            <form action="{{route('peserta.store')}}" method="post">
              {{ csrf_field() }}

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_kejuruan" class="form-control">
                      @foreach($kejuruan as $data)
                      <option value="{{$data->kd_kejuruan}}">{{$data->nama_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Sub Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_sub_kejuruan" class="form-control">
                      @foreach($subkejuruan as $data)
                      <option value="{{$data->kd_sub_kejuruan}}">{{$data->nama_sub_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Program</label>
                  <div class="col-sm-4">
                    <select name="kd_program" class="form-control">
                      @foreach($program as $data)
                      <option value="{{$data->kd_program}}">{{$data->nama_program}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Daftar</label>
                  <div class="col-sm-4">
                  <input type="text" name="tgl_daftar" class="tanggal" id="tanggal" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-4">
                    <input name="nama" type="text" class="form-control" required  />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tempat</label>
                  <div class="col-sm-4">
                    <input name="tempat_lahir" type="text" class="form-control" required  />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-4">
                    <input name="tgl_lahir" type="date" class="form-control" required  />
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-4">
                    <select name="jenis_kelamin" class="form-control">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
              </div>

            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tinggi Badan</label>
                  <div class="col-sm-4">
                    <input name="tinggi_badan" type="number" class="form-control" required  />Cm
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Berat Badan</label>
                  <div class="col-sm-4">
                    <input name="berat_badan" type="number" class="form-control" required  />Kg
                  </div>
            </div>

              <div class="form-group">
                <label class="control-lable">Alamat</label>
                <textarea  name="alamat"  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">RT</label>
                  <div class="col-sm-4">
                    <input name="rt" type="number" class="form-control" required  />
                    </div>
              </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">RW</label>
                  <div class="col-sm-4">
                    <input name="rw" type="number" class="form-control" required  />
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Provinvi</label>
                  <div class="col-sm-4">
                    <select name="provinsi" class="form-control">
                      <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kab/Kota</label>
                  <div class="col-sm-4">
                    <select name="kab" class="form-control">
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-4">
                    <select name="kecamatan" class="form-control">
                        <option value="Baleendah">Baleendah</option>
                        <option value="Dayeuhkolot">Dayeuhkolot</option>
                                            </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
                  <div class="col-sm-4">
                    <select name="kelurahan" class="form-control">
                        <option value="Andir">Andir</option>
                        <option value="Palasari">Palasari</option>
                        
                    </select>
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Telp/Hp</label>
                  <div class="col-sm-4">
                    <input name="telp" type="number" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Agama</label>
                  <div class="col-sm-4">
                    <select name="agama" class="form-control">
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kong Hu cu">Kong Hu Cu</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pendidikan Terakhir</label>
                  <div class="col-sm-4">
                    <select name="pendidikan_terakhir" class="form-control">
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA/SMK">SMA/SMK</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="D4">D4</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-lable">Pelatihan Yang Pernah Diikuti</label>
                <textarea  name="pelatihan"  class="form-control"></textarea>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kewarganegaraan<br>(Bagi WNI Keturunan)</label>
                  <div class="col-sm-4">
                    <input name="kewarganegaraan" type="text" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Anak Ke</label>
                  <div class="col-sm-4">
                    <input name="anak_ke" type="number" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status</label>
                  <div class="col-sm-4">
                    <input name="status" type="radio" value="menikah" class="form-control" required  />   Menikah
                    <input name="status" type="radio" value="belum menikah" class="form-control" required  /> Belum Menikah
                  </div>
              </div>
              <br>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Istri/Suami</label>
                  <div class="col-sm-4">
                    <input name="nama_pasangan" type="text" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Anak</label>
                  <div class="col-sm-4">
                    <input name="nama_anak" type="text" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                <label class="control-lable">Pengalaman Kerja</label>
                <textarea  name="pengalaman_kerja"  class="form-control"></textarea>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Orangtua/Wali</label>
                  <div class="col-sm-4">
                    <input name="nama_ortuwali" type="text" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat Orangtua/Wali</label>
                  <div class="col-sm-4">
                    <input name="alamat_ortuwali" type="text" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Telp Orangtua/Wali</label>
                  <div class="col-sm-4">
                    <input name="telp_ortuwali" type="number" class="form-control" required  />
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pas Foto</label>
                  <div class="col-sm-4">
                  
                    <input name="foto" type="file" class="form-control" required  />
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
   
@endsection

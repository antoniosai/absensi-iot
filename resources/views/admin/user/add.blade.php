@extends('layouts.admin.main')

@section('title')
    Tambah Data Pendaftar Baru
@endsection

@section('desc')
    {{-- Manajemen Data Progress Data Kepundudukan Aktif --}}
@endsection

@section('content')
<form id="formProgresif">
    {{ csrf_field() }}
    <div class="row">

        <div class="col-md-8">
            <div class="panel">
                <header class="panel-heading">
                    <span class="tools pull-right">
                        <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                        <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">



                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nik"><span style="color: red">*)</span> NIK (Nomor Induk Keluarga)</label>
                                <input type="number" name="nik" class="form-control" placeholder="Input dengan Nomor NIK Pendaftar">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><span style="color: red">*)</span> Nama Penduduk</label>
                                <input type="text" name="nama" class="form-control" placeholder="Input dengan Nama Lengkap Pendaftar">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"><span style="color: red">*)</span> Nomor Handphone Pendaftar</label>
                                <input type="number" name="no_hp" class="form-control" placeholder="Nomor Handphone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Alamat Email Pendaftar</label>
                                <input type="email" name="email" class="form-control" placeholder="Input dengan alamat Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"><span style="color: red">*)</span> Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Pendaftar">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"><span style="color: red">*)</span> Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat"><span style="color: red">*)</span> Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat Lengkap Pendaftar"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt"><span style="color: red">*)</span> Nomor RT</label>
                                <input type="number" name="rt" class="form-control" placeholder="Nomor RT">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rw"><span style="color: red">*)</span> Nomor RW</label>
                                <input type="number" name="rw" class="form-control" placeholder="Nomor RW">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="golongan_darah"><span style="color: red">*)</span> Golongan Darah</label>
                                <select name="golongan_darah" id="golongan_darah" class="form-control">
                                    @foreach(MY_data::golongan_darah as $golongan_darah)
                                    <option value="{{ $golongan_darah }}">{{ strtoupper($golongan_darah) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agama"><span style="color: red">*)</span> Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    @foreach(MY_data::agama as $agama)
                                    <option value="{{ $agama }}">{{ strtoupper($agama) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelamin"><span style="color: red">*)</span> Kelamin</label>
                                <select name="kelamin" id="kelamin" class="form-control">
                                    @foreach(MY_data::kelamin as $key => $value)
                                    <option value="{{ $key }}">{{ strtoupper($value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="alert alert-warning">
                <p>
                    <ul>
                        <li>Mohon untuk isi data dengan sebenar-benar nya untuk menghindari sengketa informasi</li>
                    </ul>
                </p>
            </div>

            <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> Simpan</button>
            <a class="btn btn-warning btn-lg btn-block"><i class="fa fa-times"></i> Batal</a>

        </div>

    </div>
</form>
@endsection

@section('scripts')
<script>

var formProgresif = $('#formProgresif')

formProgresif.on('submit', function(e){
    e.preventDefault();

    swal({
        title: "Menambah Data Progresif Penduduk Baru?",
        text: "Pastikan Anda telah mengisi data dengan sebenar-benar nya",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((save) => {
        if (save) {
            axios.post("{{ route('admin.progresif.store') }}", formProgresif.serialize())
            .then(function (res) {
                console.log(res.data)
                if(res.data.status == 'success')
                {
                    toastr.success(res.data.message)
                    setTimeout(function(){
                        window.location.href = "{{ route('admin.progresif') }}";
                    }, 5000);

                }
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            toastr.info('Batal menambahkan Data')
            // swal("Your imaginary file is safe!");
        }
    });

});

</script>
@endsection

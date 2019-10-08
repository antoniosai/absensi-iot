@extends('layouts.admin.main')

@section('title')
    Tambah Data Pendaftar Baru
@endsection

@section('desc')
    {{-- Manajemen Data Progress Data Kepundudukan Aktif --}}
@endsection

@section('content')
<form id="formUserAdd">
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
                                <label for="nik"><span style="color: red">*)</span> Nama Lengkap</label>
                                <input type="number" name="name" class="form-control" placeholder="Input dengan Nama lengkap" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role_id"><span style="color: red">*)</span> Pilih Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach(App\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ $role->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="department_id">Pilih Kelas (untuk Siswa)</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    @foreach(App\Department::all() as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rf_id"><span style="color: red">*)</span> RF ID</label>
                                <input type="text" name="name" class="form-control" placeholder="Input dengan Kode RFID (Bisa dilihat dimenu Scan Attempts)" required>
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

var formUserAdd = $('#formUserAdd')

formUserAdd.on('submit', function(e){
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
            axios.post("{{ route('admin.user.save') }}", formUserAdd.serialize())
            .then(function (res) {
                console.log(res.data)
                if(res.data.status == 'success')
                {
                    toastr.success(res.data.message)
                    setTimeout(function(){
                        window.location.href = "{{ route('admin.user') }}";
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

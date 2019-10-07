@extends('layouts.frontend.main')

@section('title')
SI PRODUKTIF DISDUK CAPIL Kab. Garut
@endsection

@section('content')




<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">
                    Selamat Datang di
                    <br><strong>SI PRODUKTIF</strong><br>
                    <span style="font-size: 36px"><small>(Sistem Informasi Progress Data Kepundudukan Aktif)</small></span>
                </h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form id="formSearch">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" name="nik" class="form-control form-control-lg"
                                placeholder="Masukan dengan Kode Pendaftaran Anda">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary"><i class="fa fa-search"></i> Cek!</button>
                        </div>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loadingModal">
                    Open modal
                </button>
            </div>
        </div>
    </div>
</header>


<!-- The Modal -->


@include('frontend.partials.modals.notfound')
@include('frontend.partials.modals.found')
@include('frontend.partials.modals.loading')
@endsection

@section('scripts')
<script>

// Fetching form Data #formSearch
var formSearch = $('#formSearch');

// DOM modal
var loadingModal = $('#loadingModal');
var dataModal = $('#dataIsFound');
var notfoundModal = $('#notfoundModal');

var modal_data_title = $('#modal_data-title');

formSearch.on('submit', function(e){
    e.preventDefault();

    loadingModal.modal('show');

    axios.post('/cek_data/', formSearch.serialize())
    .then(function (res) {

        loadingModal.modal('hide');

        var progresif = res.data.progresif;

        console.log(res.data);

        if(res.data.status == 'success')
        {
            modal_data_title.text('Data ' + progresif.nik + ' ditemukan')

            dataModal.modal('show');
        }
        else if (res.data.status == 'notfound')
        {
            swal(res.data.message, {
                icon: "warning",
            });
        }

    })
});

</script>
@endsection

@section('styles')
<style>
.loader {
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    /* Safari */
    animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
@endsection

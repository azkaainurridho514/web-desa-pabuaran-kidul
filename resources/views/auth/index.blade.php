@extends('auth.layouts.main')
@section("title", 'Dashboard')
@section("title-header", 'Dashboard')
@section('main')
<h1 class="h5 text-gray-600 mb-4">HOME</h1>
<div class="card p-4 mb-4 shadow col-lg-12">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="font-weight-bold text-bold text-uppercase text-gray-800">{{ $home->title_nav }}</h2>
            <h5 class="font-weight-bold text-bold text-uppercase text-gray-800">{{ $home->title_header }}</h5>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <h5 class="card-title">Luas Desa</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $homeInformation->wilayah_administratif }}</h6>
                </div>
                <div class="col-lg-3">
                    <h5 class="card-title">Jumlah Penduduk</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $homeInformation->total_jiwa }}</h6>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <br>
        </div>
        <div class="col-lg-4">
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" src="{{ $home->maps }}"></iframe>
            </div>
            {{-- <iframe src="{{ $home->maps }}" frameborder="0"></iframe> --}}
        </div>
    </div>
</div>
<h1 class="h5 mb-4 text-gray-600">UMUM</h1>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengaduan Masyarakat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Aspirasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $aspirasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-lightbulb fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Usulan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $usulan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<h1 class="h5 mb-4 text-gray-600">UMKM</h1>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Di Setujui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $umkmDiSetujui }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Permintaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $umkmPermintaan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Di Tolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $umkmDiTolak }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-info fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="h5 mb-4 text-gray-600">PENDATAAN</h1>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tamu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $visitor }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<section class="cid-penduduk-ekonomi" style="background-color: #f8f9fa; padding: 60px 20px;">
    <div class="container">
        <div class="text-center mb-5">
        <h3 class="display-5 fw-bold"><strong>Informasi Desa</strong></h3>
        <p class="lead">Data Kependudukan, Wilayah, dan Ekonomi</p>
        </div>

        <div class="row text-center g-4">
        <!-- Penduduk -->
        <div class="col-md-4">
            <div class="card border-0 shadow p-4">
            <i class="fa-solid fa-users fa-3x text-primary mb-3"></i>
            <h5 class="fw-bold">Total Penduduk</h5>
            <p class="mb-1">{{ $homeInformation->total_jiwa ?? "" }} {{ $homeInformation->total_jiwa != ""?"Jiwa":"" }}</p>
            <p>Laki-laki: {{ $homeInformation->total_laki_laki ?? "" }} | Perempuan: {{ $homeInformation->total_perempuan ?? "" }}</p>
            </div>
        </div>

        <!-- KK dan Wilayah -->
        <div class="col-md-4">
            <div class="card border-0 shadow p-4">
                <i class="fa-solid fa-map-location-dot fa-3x text-success mb-3"></i>
                <h5 class="fw-bold">Wilayah Administratif</h5>
                <p class="mb-1">{{ $homeInformation->wilayah_administratif ?? "" }}</p>
                <p>{{ $homeInformation->jumlah_rt_rw ?? "" }}</p>
            </div>
        </div>

        <!-- Ekonomi -->
        <div class="col-md-4">
            <div class="card border-0 shadow p-4">
            <i class="fa-solid fa-chart-line fa-3x text-warning mb-3"></i>
            <h5 class="fw-bold">Pekerjaan Utama</h5>
            <ul class="list-unstyled mb-0">
                @foreach ($homeJobInformation as $item)
                    <li>{{ $item->name }} : {{ $item->total }} ({{ $item->percent }})</li>
                @endforeach
            </ul>
            </div>
        </div>
        </div>
    </div>
</section>
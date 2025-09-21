@extends('guest.layouts.main')
@section('main')
<section class="berita-section"  style="background: url('{{ asset('home/assets/images/pabuaran-1280x720.jpg') }}') no-repeat center center; background-size: 100% 100% !important;">
    <div class="container">
     <div class="mbr-section-head text-center">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2 text-white"><strong>Berita</strong></h4>
        </div>
    <div class="row g-4">
        @foreach ($news as $item)
            <div class="col-md-4">
                <div class="berita-card">
                    <img src="{{ asset($item->photo) }}" class="berita-img" alt="Berita 1">
                    <div class="berita-content">
                        <div class="berita-title">{{ $item->title }}</div>
                        <div class="berita-desc">{{ $item->description }}</div>
                        <a href="" class="btn-berita">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</section>
@endsection
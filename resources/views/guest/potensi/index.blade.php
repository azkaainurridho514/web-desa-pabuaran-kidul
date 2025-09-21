@extends('guest.layouts.main')
@section('main')
    <section data-bs-version="5.1" class="slider5 mbr-embla cid-uRzoOUEuhz" id="slider5-w"  style="background: url('{{ asset('home/assets/images/pabuaran-1280x720.jpg') }}') no-repeat center center; background-size: 100% 100% !important;">

    {{-- <div class="mbr-overlay" style="background-color: rgba(0, 0, 0, 0.4);"></div> --}}

    <div class="position-relative">
        <div class="mbr-section-head text-center">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2 text-white"><strong>Potensi Desa</strong></h4>
        </div>

        <div class="embla mt-4"
            data-skip-snaps="true"
            data-align="center"
            data-contain-scroll="trimSnaps"
            data-loop="false"
            data-draggable="true">
            <div class="embla__viewport container-fluid">
                <div class="embla__container">
                    @foreach ($potentions as $item)
                        <div class="embla__slide slider-image item mx-3">
                            <div class="slide-content">
                                <div class="item-img">
                                    <div class="item-wrapper">
                                        <img src="{{ asset($item->photo) }}" alt="Potensi Design" title="">
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h5 class="item-title mbr-fonts-style display-5"><strong>{{ $item->title }}</strong></h5>
                                </div>
                                <div class="mbr-section-btn item-footer mt-2">
                                    <a href="" class="btn item-btn btn-black display-7">Selengkapnya &gt;</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                </div>
            </div>

            <!-- Navigasi -->
            <button class="embla__button embla__button--prev">
                <span class="mobi-mbri mobi-mbri-arrow-prev mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden">Previous</span>
            </button>
            <button class="embla__button embla__button--next">
                <span class="mobi-mbri mobi-mbri-arrow-next mbr-iconfont" aria-hidden="true"></span>
                <span class="sr-only visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endsection
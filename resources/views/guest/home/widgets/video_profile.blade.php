<section data-bs-version="5.1" class="header15 cid-uRvCnkPvFi" id="header15-8">
    <div class="container-fluid px-5"> <!-- Gunakan container-fluid agar bisa full width -->
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="text-bold">Video Profile</h1>
                <h4 class="text-bold">{{ $home->video_profile_title ?? "" }}</h4>
            </div>
            <div class="col-6">
                <div class="ratio ratio-16x9"> <!-- Gunakan rasio agar video responsif dan proporsional -->
                    <iframe class="mbr-embedded-video" 
                            src="{{ $home->video_profile_link ?? "" }}" 
                            title="YouTube video" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
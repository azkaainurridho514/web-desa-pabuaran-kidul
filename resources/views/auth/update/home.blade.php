{{-- resources/views/admin/home/update.blade.php --}}
@extends('auth.layouts.main')
@section("title", 'Home Update')
@section("title-header", 'Update Home')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .btn-primary {
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 600;
    }
    .modal-content {
        border-radius: 15px;
        border: none;
    }
    .modal-header {
        background: linear-gradient(135deg, #007bff, #6c757d);
        color: white;
        border-radius: 15px 15px 0 0;
    }
    .form-control {
        border-radius: 8px;
        border: 2px solid #e9ecef;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .table {
        border-radius: 10px;
        overflow: hidden;
    }
    .thead-dark th {
        background: linear-gradient(135deg, #343a40, #6c757d);
    }
    .job-item {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        margin-bottom: 15px;
        padding: 15px;
    }
</style>
@endpush

@section('main')
<div class="row px-4 py-2 gap-2 mb-2">
    {{-- left ================================== --}}
    <div class="col-lg-6">
        <div class="card p-3 mb-3">
           <h4 class="text-lg font-weight-bold">
               <i class="fas fa-heading text-primary"></i> Title Navbar & Header
           </h4>
           <h4 class="mb-2 text-lg">{{ $home->title_nav ?? "" }}</h4>
           <h4 class="text-lg font-weight-bold mt-3">
               <i class="fas fa-quote-left text-success"></i> Slogan
           </h4>
           <h4 class="mb-4 text-lg">{{ $home->title_header ?? "" }}</h4>
           <div class="d-flex justify-content-end">
               <button type="button" class="btn btn-primary btn-sm edit-title-btn" 
                       data-title="{{ $home->title_nav ?? '' }}" 
                       data-slogan="{{ $home->title_header ?? '' }}">
                   <i class="fas fa-edit"></i> Update
               </button>
           </div>
        </div>
        
        <div class="card p-3 mb-3">
            <h4 class="text-lg font-weight-bold">
                <i class="fas fa-video text-danger"></i> Video Profil
            </h4>
            <h4 class="mb-4 text-lg">{{ $home->video_profile_title ?? "Profil Desa" }}</h4>
            <iframe class="mbr-embedded-video mb-4" width="100%" height="250"
                src="{{ $home->video_profile_link ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" 
                title="YouTube video" allowfullscreen>
            </iframe>
            <div class="d-flex justify-content-end">
               <button type="button" class="btn btn-primary btn-sm edit-video-btn"
                       data-title="{{ $home->video_profile_title ?? '' }}"
                       data-link="{{ $home->video_profile_link ?? '' }}">
                   <i class="fas fa-edit"></i> Update
               </button>
            </div>
        </div>
        
        <div class="card p-3 mb-3">
           <h4 class="text-lg font-weight-bold">
               <i class="fas fa-briefcase text-info"></i> Pekerjaan
           </h4>
           <div class="table-responsive">
               <table class="table mb-4" id="jobs-table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Presentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($homeJobInformation ?? [] as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->percent }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data pekerjaan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
           </div>
            <div class="d-flex justify-content-end">
               <button type="button" class="btn btn-primary btn-sm edit-jobs-btn">
                   <i class="fas fa-edit"></i> Update
               </button>
            </div>
        </div>
    </div>
    
    {{-- right ================================== --}}
    <div class="col-lg-6">
         <div class="card p-3 mb-3">
            <h4 class="text-lg font-weight-bold">
                <i class="fas fa-user-tie text-warning"></i> Sambutan Kepala Desa
            </h4>
            <div class="mb-4 text-xs p-3" style="background: #f8f9fa; border-radius: 10px; border-left: 4px solid #007bff;">
                {{ $home->sambutan_kepala_desa ?? "Selamat datang di website resmi desa kami. Kami berkomitmen memberikan pelayanan terbaik untuk seluruh masyarakat." }}
            </div>
            <div class="d-flex justify-content-end">
               <button type="button" class="btn btn-primary btn-sm edit-welcome-btn"
                       data-welcome="{{ $home->sambutan_kepala_desa ?? '' }}">
                   <i class="fas fa-edit"></i> Update
               </button>
            </div>
        </div>
        
        <div class="card p-3 mb-3">
           <h4 class="text-lg font-weight-bold">
               <i class="fas fa-chart-bar text-success"></i> Informasi Desa
           </h4>
           <div class="mb-3">
               <h5 class="text-lg font-weight-bold">Total jiwa / Jumlah penduduk</h5>
               <h4 class="mb-3 text-lg">{{ $homeInformation->total_jiwa ?? "0" }} jiwa</h4>
           </div>
           <div class="mb-3">
               <h5 class="text-lg font-weight-bold">Wilayah administratif</h5>
               <h4 class="mb-3 text-lg">{{ $homeInformation->wilayah_administratif ?? "-" }}</h4>
           </div>
           <div class="mb-3">
               <h5 class="text-lg font-weight-bold">Informasi lainya</h5>
               <h4 class="mb-4 text-lg">{{ $homeInformation->jumlah_rt_rw ?? "0" }}</h4>
           </div>
           <div class="d-flex justify-content-end">
               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#statisticsModal">
                   <i class="fas fa-edit"></i> Update
               </button>
           </div>
        </div>
    </div>
</div>

{{-- Statistics Modal --}}
<div class="modal fade" id="statisticsModal" tabindex="-1" aria-labelledby="statisticsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statisticsModalLabel">
            <i class="fas fa-chart-bar"></i> Update Statistik Desa
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="statisticsForm">
            @csrf
            <input type="hidden" id="edit-id-home-information" name="id" value="{{ $homeInformation->id ?? '' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_jiwa" class="font-weight-bold">Total Jiwa / Jumlah Penduduk</label>
                        <input type="text" class="form-control" id="total_jiwa" name="total_jiwa"
                               value="{{ $homeInformation->total_jiwa ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_laki_laki" class="font-weight-bold">Total Laki-Laki</label>
                        <input type="text" class="form-control" id="total_laki_laki" name="total_laki_laki"
                               value="{{ $homeInformation->total_laki_laki ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_perempuan" class="font-weight-bold">Total Perempuan</label>
                        <input type="text" class="form-control" id="total_perempuan" name="total_perempuan"
                               value="{{ $homeInformation->total_perempuan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_anak_anak" class="font-weight-bold">Total Anak-Anak</label>
                        <input type="text" class="form-control" id="total_anak_anak" name="total_anak_anak"
                               value="{{ $homeInformation->total_anak_anak ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_remaja" class="font-weight-bold">Total Remaja</label>
                        <input type="text" class="form-control" id="total_remaja" name="total_remaja"
                               value="{{ $homeInformation->total_remaja ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_dewasa" class="font-weight-bold">Total Dewasa</label>
                        <input type="text" class="form-control" id="total_dewasa" name="total_dewasa"
                               value="{{ $homeInformation->total_dewasa ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_orang_tua" class="font-weight-bold">Total Orang Tua</label>
                        <input type="text" class="form-control" id="total_orang_tua" name="total_orang_tua"
                               value="{{ $homeInformation->total_orang_tua ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_kepala_keluarga" class="font-weight-bold">Total Kepala Keluarga</label>
                        <input type="text" class="form-control" id="total_kepala_keluarga" name="total_kepala_keluarga"
                               value="{{ $homeInformation->total_kepala_keluarga ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="wilayah_administratif" class="font-weight-bold">Wilayah Administratif</label>
                        <input type="text" class="form-control" id="wilayah_administratif" name="wilayah_administratif"
                               value="{{ $homeInformation->wilayah_administratif ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_rt_rw" class="font-weight-bold">Jumlah RT / RW</label>
                        <input type="text" class="form-control" id="jumlah_rt_rw" name="jumlah_rt_rw"
                               value="{{ $homeInformation->jumlah_rt_rw ?? '' }}">
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="save-statistics-btn">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>


{{-- Title Modal --}}
<div class="modal fade" id="titleModal" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModalLabel">
            <i class="fas fa-heading"></i> Update Title & Header
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="titleForm">
            @csrf
            <input type="hidden" name="id" value="{{ $home->id ?? '' }}">
            <div class="form-group">
                <label for="title_nav" class="font-weight-bold">Title Navbar</label>
                <input type="text" class="form-control" id="title_nav" name="title_nav" 
                       value="{{ $home->title_nav ?? '' }}">
            </div>
            <div class="form-group">
                <label for="title_header" class="font-weight-bold">Slogan / Title Header</label>
                <input type="text" class="form-control" id="title_header" name="title_header" 
                       value="{{ $home->title_header ?? '' }}">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="save-btn" data-form="titleForm">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

{{-- Video Modal --}}
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">
            <i class="fas fa-video"></i> Update Video Profil
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="videoForm">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $home->id ?? '' }}">
                <label for="video_profile_title" class="font-weight-bold">Judul Video</label>
                <input type="text" class="form-control" id="video_profile_title" name="video_profile_title" value="{{ $home->video_profile_title ?? '' }}">
            </div>
            <div class="form-group">
                <label for="video_profile_link" class="font-weight-bold">Link Video YouTube</label>
                <input type="text" class="form-control" id="video_profile_link" name="video_profile_link" 
                       value="{{ $home->video_profile_link ?? '' }}">
                <small class="form-text text-muted">Gunakan format embed YouTube (https://www.youtube.com/embed/VIDEO_ID)</small>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="save-btn" data-form="videoForm">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

{{-- Welcome Modal --}}
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeModalLabel">
            <i class="fas fa-user-tie"></i> Update Sambutan Kepala Desa
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="welcomeForm">
            @csrf
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $home->id ?? '' }}">
                <label for="sambutan_kepala_desa" class="font-weight-bold">Sambutan Kepala Desa</label>
                <textarea class="form-control" id="sambutan_kepala_desa" name="sambutan_kepala_desa" 
                          rows="6">{{ $home->sambutan_kepala_desa ?? '' }}</textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="save-btn" data-form="welcomeForm">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

{{-- Jobs Modal --}}
<div class="modal fade" id="jobsModal" tabindex="-1" aria-labelledby="jobsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jobsModalLabel">
            <i class="fas fa-briefcase"></i> Update Data Pekerjaan
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jobsForm">
            @csrf
            <div id="jobs-container">
                {{-- <input type="hidden" id="edit-id-home-job" name="id" value="{{ $homeJobInformation->id ?? '' }}"> --}}
                @forelse ($homeJobInformation ?? [] as $index => $job)
                <div class="job-item" data-index="{{ $index }}">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="jobs[{{ $index }}][name]" 
                                   value="{{ $job->name }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Jumlah</label>
                            <input type="number" class="form-control" name="jobs[{{ $index }}][total]" 
                                   value="{{ $job->total }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Persentase</label>
                            <input type="text" class="form-control" name="jobs[{{ $index }}][percent]" 
                                   value="{{ $job->percent }}" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-job-btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="job-item" data-index="0">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="jobs[0][name]" placeholder="Contoh: Petani" required>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Jumlah</label>
                            <input type="number" class="form-control" name="jobs[0][total]" placeholder="150" required>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Persentase</label>
                            <input type="text" class="form-control" name="jobs[0][percent]" placeholder="45%" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-job-btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-success btn-sm" id="add-job-btn">
                    <i class="fas fa-plus"></i> Tambah Pekerjaan
                </button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="save-jobs-btn">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    
    // Title Modal Handler
    $('.edit-title-btn').on('click', function() {
        const title = $(this).data('title');
        const slogan = $(this).data('slogan');
        
        $('#title_nav').val(title);
        $('#title_header').val(slogan);
        $('#titleModal').modal('show');
    });
    
    // Video Modal Handler
    $('.edit-video-btn').on('click', function() {
        const title = $(this).data('title');
        const link = $(this).data('link');
        
        $('#video_profile_title').val(title);
        $('#video_profile_link').val(link);
        $('#videoModal').modal('show');
    });
    
    // Welcome Modal Handler
    $('.edit-welcome-btn').on('click', function() {
        const welcome = $(this).data('welcome');
        
        $('#sambutan_kepala_desa').val(welcome);
        $('#welcomeModal').modal('show');
    });
    
    // Jobs Modal Handler
    $('.edit-jobs-btn').on('click', function() {
        $('#jobsModal').modal('show');
    });
    
    // Add Job Item
    let jobIndex = {{ count($homeJobInformation ?? []) }};
    $('#add-job-btn').on('click', function() {
        const jobHtml = `
            <div class="job-item" data-index="${jobIndex}">
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="jobs[${jobIndex}][name]" required>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Jumlah</label>
                        <input type="number" class="form-control" name="jobs[${jobIndex}][total]" required>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Persentase</label>
                        <input type="text" class="form-control" name="jobs[${jobIndex}][percent]" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-job-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        $('#jobs-container').append(jobHtml);
        jobIndex++;
    });
    
    // Remove Job Item
    $(document).on('click', '.remove-job-btn', function() {
        if ($('.job-item').length > 1) {
            $(this).closest('.job-item').remove();
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Minimal harus ada satu data pekerjaan!'
            });
        }
    });
    $(document).on('click', '#save-btn', function () {
        const formId = $(this).data('form');
        const $form = $('#' + formId);
        const id = $form.find('[name="id"]').val();
        const formData = $form.serialize();

        // Reset error
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.find('.invalid-feedback').remove();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: `/dashboard-home/${id}`,
            method: 'PUT',
            data: formData,
            success: function (response) {
                $form.closest('.modal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => location.reload());
            },
            error: function (xhr) {
                Swal.fire({ icon: 'error', title: 'Gagal', text: 'Terjadi kesalahan server.' });
            }
        });
    });

    // Save Title
    // $('#save-btn').on('click', function() {
    //     const formData = $('#titleForm').serialize();
    //     const id = $('#edit-id-home').val();
    //     $('#titleForm .is-invalid').removeClass('is-invalid');
    //     $('#titleForm .invalid-feedback').remove();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: `/dashboard-home/${id}`,
    //         method: 'PUT',
    //         data: formData,
    //         success: function(response) {
    //             $('#titleModal').modal('hide');
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Berhasil',
    //                 text: response.message || 'Data berhasil diperbarui!',
    //                 timer: 1500,
    //                 showConfirmButton: false
    //             }).then(() => {
    //                 location.reload();
    //             });
    //         },
    //         error: function(xhr) {
    //             if (xhr.status === 422) {
    //                 const errors = xhr.responseJSON.errors;
    //                 for (const key in errors) {
    //                     const input = $(`#titleForm [name="${key}"]`);
    //                     input.addClass('is-invalid');
    //                     input.after(`<div class="invalid-feedback">${errors[key][0]}</div>`);
    //                 }
    //             } else {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Gagal',
    //                     text: 'Terjadi kesalahan saat menyimpan data.'
    //                 });
    //             }
    //         } 
    //     });
    // });
    
    // Save Video
    // $('#save-video-btn').on('click', function() {
    //     const formData = $('#videoForm').serialize();
    //     const id = $('#edit-id-home').val();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: `/dashboard-home/${id}`,
    //         method: 'PUT',
    //         data: formData,
    //         success: function(response) {
    //             $('#videoModal').modal('hide');
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Berhasil',
    //                 text: 'Video profil berhasil diperbarui!',
    //                 timer: 1500,
    //                 showConfirmButton: false
    //             }).then(() => {
    //                 // location.reload();
    //             });
    //         },
    //         error: function(xhr) {
    //             console.log(xhr)
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Gagal',
    //                 text: 'Terjadi kesalahan saat menyimpan data.'
    //             });
    //         }
    //     });
    // });
    
    // // Save Welcome
    // $('#save-welcome-btn').on('click', function() {
    //     const formData = $('#welcomeForm').serialize();
    //     const id = $('#edit-id-home').val();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: `/dashboard-home/${id}`,
    //         method: 'PUT',
    //         data: formData,
    //         success: function(response) {
    //             $('#welcomeModal').modal('hide');
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Berhasil',
    //                 text: 'Sambutan kepala desa berhasil diperbarui!',
    //                 timer: 1500,
    //                 showConfirmButton: false
    //             }).then(() => {
                    
    //                 location.reload();
    //             });
    //         },
    //         error: function(xhr) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Gagal',
    //                 text: 'Terjadi kesalahan saat menyimpan data.'
    //             });
    //         }
    //     });
    // });
    
    // Save Statistics
    $('#save-statistics-btn').on('click', function() {
        const formData = $('#statisticsForm').serialize();
        const id = $('#edit-id-home-information').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `/dashboard-home-information/${id}`,
            method: 'PUT',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Sambutan kepala desa berhasil diperbarui!',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                   $('#statisticsModal').modal('hide');
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menyimpan data.'
                });
            }
        });
    });
    
    // Save Jobs
    $('#save-jobs-btn').on('click', function() {
        const formData = $('#jobsForm').serialize();
        // const id = $('#edit-id-home-job').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `/dashboard-home-job-information`,
            method: 'PUT',
            data: formData,
            success: function(response) {
                $('#jobsModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data pekerjaan berhasil diperbarui!',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menyimpan data.'
                });
                console.log(xhr.responseText);
            }
        });
    });
    
});
</script>
@endpush
@extends('auth.layouts.main')
@section('title', 'Footer')
@section('title-header', 'Update Footer')

@push('css')
<style>
    .form-label { font-weight: bold; }
</style>
@endpush

@section('main')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5>Data Footer</h5>
            <table class="table">
                <tr><th>Alamat</th><td id="address_text">{{ $footer->address }}</td></tr>
                <tr><th>Facebook</th><td id="fb_link_text">{{ $footer->fb_link }}</td></tr>
                <tr><th>Instagram</th><td id="ig_link_text">{{ $footer->ig_link }}</td></tr>
                <tr><th>YouTube</th><td id="yt_link_text">{{ $footer->yt_link }}</td></tr>
                <tr><th>Telepon</th><td id="telepon_text">{{ $footer->telepon }}</td></tr>
                <tr><th>WhatsApp</th><td id="whatsapp_text">{{ $footer->whatsapp }}</td></tr>
                <tr><th>Telepon Kantor</th><td id="telepon_kantor_text">{{ $footer->telepon_kantor }}</td></tr>
                <tr><th>Jam Kerja Senin-Jumat</th><td id="senin_jumat_text">{{ $footer->senin_jumat }}</td></tr>
                <tr><th>Jam Kerja Sabtu-Minggu</th><td id="sabtu_minggu_text">{{ $footer->sabtu_minggu }}</td></tr>
            </table>
            <button class="btn btn-primary" id="editFooterBtn" data-id="{{ $footer->id }}">Edit Footer</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editFooterModal" tabindex="-1" aria-labelledby="editFooterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statisticsModalLabel">
                    <i class="fas fa-chart-bar"></i> Update Footer
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFooterForm">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="hidden" id="edit-id" name="id" value="{{ $footer->id }}">
                            <label class="form-label">Alamat</label> 
                            <textarea name="address" class="form-control" required>{{ $footer->address }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="fb_link" class="form-control" value="{{ $footer->fb_link }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="ig_link" class="form-control" value="{{ $footer->ig_link }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube</label>
                            <input type="text" name="yt_link" class="form-control" value="{{ $footer->yt_link }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $footer->telepon }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $footer->whatsapp }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telepon Kantor</label>
                            <input type="text" name="telepon_kantor" class="form-control" value="{{ $footer->telepon_kantor }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Senin - Jumat</label>
                            <input type="text" name="senin_jumat" class="form-control" value="{{ $footer->senin_jumat }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sabtu - Minggu</label>
                            <input type="text" name="sabtu_minggu" class="form-control" value="{{ $footer->sabtu_minggu }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="button" class="btn btn-primary" id="save-btn">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

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
$(document).ready(function(){
    // Buka modal + isi data
    $('#editFooterBtn').click(function(){
        $('#editFooterModal').modal('show');
    });

    // Submit update
    $(document).on('click', '#save-btn', function () {
        const $form = $('#editFooterForm');
        const id = $form.find('[name="id"]').val();
        const formData = $form.serialize();

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: `/dashboard-footer/${id}`,
            method: 'PUT',
            data: formData,
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => location.reload());
            },
            error: function(){
                Swal.fire({ icon: 'error', title: 'Gagal', text: 'Terjadi kesalahan server.' });
            }
        });
    });

});
</script>
@endpush

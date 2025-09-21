@extends('auth.layouts.main')
@section("title", 'Umkm')
@section("title-header", 'Pengaduan')
@section('main')
<div class="row">
    <div class="col-lg-6 justify-content-center">
        <div class="card p-3">
            <form action="" method="">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Desc</label>
                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="description">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
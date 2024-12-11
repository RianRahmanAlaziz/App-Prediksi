@extends('home.layouts.app')
@section('container')
    <div class="bg-secondary d-flex justify-content-center align-items-center"
        style="background:url('/assets/img/banner-home.jpg'); background-size:cover; min-height: 100vh;">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 pt-5">
                @forelse ($fasilitas as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="/assets/img/fasilitas/{{ $item->gambar }}" alt="" width="100%" height="225"
                                class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <p class="card-text text-center fw-bold">{{ $item->title }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="text-center">
                            <p class="text-lg font-semibold text-gray-600  alert alert-warning text-center">Tidak ada
                                Data yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

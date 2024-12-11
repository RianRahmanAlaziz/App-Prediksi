@extends('dashboard.layouts.app')
@section('container')
    <div class="container-fluid py-4 px-5">

        <div class="row">
            <div class="col-12">
                <div class="card border shadow-lg mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Fasilitas</h6>
                                <p class="text-sm"></p>
                            </div>
                            <div class="ms-auto d-flex">
                                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2"
                                    data-bs-toggle="modal" data-bs-target="#addkaryawan">
                                    <span class="btn-inner--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 448 512" fill="currentColor"
                                            class="d-block "><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path fill="#ffffff"
                                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                                        </svg>
                                    </span>

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <form action="{{ url()->current() }}" method="get">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                                <div class="input-group w-sm-25 ms-auto">
                                    <span class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input type="text" name="search" id="search" class="form-control"
                                        value="{{ request('search') }}" placeholder="Search">
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7" width="5%">No
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7" width="5%">
                                            Gambar
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold ps-2 opacity-7">
                                            Title</th>

                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($df as $item)
                                        <tr>
                                            <td class="text-center align-middle text-secondary text-sm font-weight-normal">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-center align-middle text-secondary text-sm font-weight-normal">

                                                <img src="/assets/img/fasilitas/{{ $item->gambar }}"
                                                    class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                            </td>
                                            <td>
                                                <p class="text-secondary text-sm font-weight-normal">
                                                    {{ $item->title }}</p>

                                            </td>
                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#editpegawai-{{ $item->id }}"><i
                                                        class="fa-solid fa-pencil"></i></button>

                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-hapus-{{ $item->id }}"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">
                                Page {{ $df->currentPage() }} of {{ $df->lastPage() }}
                            </p>
                            <div class="ms-auto">
                                @if ($df->onFirstPage())
                                    <button class="btn btn-sm btn-white mb-0" disabled>Previous</button>
                                @else
                                    <a href="{{ $df->previousPageUrl() }}" class="btn btn-sm btn-white mb-0">Previous</a>
                                @endif

                                @if ($df->hasMorePages())
                                    <a href="{{ $df->nextPageUrl() }}" class="btn btn-sm btn-white mb-0">Next</a>
                                @else
                                    <button class="btn btn-sm btn-white mb-0" disabled>Next</button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($df as $item)
        <div class="modal fade" id="modal-hapus-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">

                    <div class="modal-body">
                        Anda Yakin Untuk MengHapus?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <form action="/dashboard/data-fasilitas/{{ $item->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-dark" type="submit">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('dashboard.fasilitas.add')
    @include('dashboard.fasilitas.edit')
@endsection

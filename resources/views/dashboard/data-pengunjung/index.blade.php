@extends('dashboard.layouts.app')
@section('container')
    <div class="container-fluid py-4 px-5">

        <div class="row">
            <div class="col-12">
                <div class="card border shadow-lg mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Data Pengunjung</h6>
                                <p class="text-sm"></p>
                            </div>
                            <div class="ms-auto d-flex">
                                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2"
                                    data-bs-toggle="modal" data-bs-target="#add">
                                    <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                            <path
                                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Add Data</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">

                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7" width="5%">No
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold ps-2 opacity-7">Tanggal
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold ps-2 opacity-7">Jumlah
                                            Pengunjung
                                        </th>
                                        <th class="text-secondary text-center text-xs font-weight-semibold opacity-7">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datap as $item)
                                        <tr>
                                            <td class="text-center align-middle text-secondary text-sm font-weight-normal">
                                                {{ $loop->iteration }}</td>
                                            <td class="align-middle text-secondary text-sm font-weight-normal">
                                                {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d-M-Y') }}
                                            </td>
                                            <td class="align-middle text-secondary text-sm font-weight-normal">
                                                {{ $item->pengunjung }}</td>
                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#edit-{{ $item->id }}"><i
                                                        class="fa-solid fa-pencil"></i></button>

                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modal-hapus-{{ $item->id }}"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($datap as $item)
        <div class="modal fade" id="modal-hapus-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">

                    <div class="modal-body">
                        Anda Yakin Untuk MengHapus?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <form action="/dashboard/data-pengunjung/{{ $item->id }}" method="POST">
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

    @include('dashboard.data-pengunjung.add')
    @include('dashboard.data-pengunjung.edit')
@endsection

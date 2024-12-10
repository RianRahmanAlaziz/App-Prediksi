@foreach ($datap as $item)
    <!-- Modal -->
    <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Jabatan</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/data-pengunjung/{{ $item->id }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <main class="form-signin w-100 m-auto">
                            @method('PUT')
                            @csrf
                            <div class="form-group has-danger">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('bulan', $item->bulan) == $i ? 'selected' : '' }}>
                                            {{ $namabulan[$i] }}
                                        </option>
                                    @endfor
                                </select>

                            </div>
                            <div class="form-group has-danger">
                                <label for="tahun">Tahun</label>
                                <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                    name="tahun" id="tahun" required autofocus
                                    value="{{ old('tahun', $item->tahun) }}">
                                @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group has-danger">
                                <label for="pengunjung">Jumlah Pengunjung</label>
                                <input type="number" class="form-control @error('pengunjung') is-invalid @enderror"
                                    name="pengunjung" id="pengunjung" required autofocus
                                    value="{{ old('pengunjung', $item->pengunjung) }}">
                                @error('pengunjung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </main>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

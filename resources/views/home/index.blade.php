@extends('home.layouts.app')
@section('container')
    <div class="bg-secondary d-flex justify-content-center align-items-center"
        style="background:url('/assets/img/banner-home.jpg'); background-size:cover; min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6">
                    <div class="card " id="shadow">
                        <h5 class="card-header text-center">Prediksi</h5>
                        <form action="/prediksi" method="get">
                            @csrf
                            <div class="card-body">
                                <label for="basic-url" class="form-label">Tanggal</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control bg-transparent" id="date" name="date"
                                        aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-outline-dark" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Hasil Prediksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Hasil prediksi akan ditampilkan di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const date = document.getElementById('date').value;

            // Lakukan permintaan AJAX untuk mendapatkan data prediksi
            fetch(`/prediksi?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    // Mengambil tanggal dari data
                    const date = new Date(data.date); // Pastikan data.tanggal adalah string tanggal yang valid

                    // Format tanggal menjadi format Indonesia
                    const options = {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    };
                    const formattedDate = date.toLocaleDateString('id-ID', options);
                    // Tampilkan hasil prediksi di modal
                    document.getElementById('modalBody').innerHTML = `
                        <p>Tanggal : ${formattedDate}</p>
                        <p>Hasil Prediksi Orang: ${data.prediksi}</p>
                    `;
                    // Tampilkan modal
                    var myModal = new bootstrap.Modal(document.getElementById('resultModal'));
                    myModal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection

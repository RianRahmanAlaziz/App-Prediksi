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
                                    <input type="date" class="form-control bg-transparent" id="tanggal" name="tanggal"
                                        aria-describedby="basic-addon3">
                                </div>
                                <label for="cuaca">Cuaca:</label>
                                <select name="cuaca" required>
                                    <option value="cerah">Cerah</option>
                                    <option value="mendung">Mendung</option>
                                </select>
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
@endsection

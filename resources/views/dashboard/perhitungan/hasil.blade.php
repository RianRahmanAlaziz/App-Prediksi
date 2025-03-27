@extends('dashboard.layouts.app')
@section('container')
    <div class="container-fluid py-4 px-5">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-xs border">

                    <div class="card-body p-4">
                        <p>
                            $$
                            \begin{array}{l l}
                            \text{Nilai } \sum x &= {{ $nilaix }} \\
                            \text{Nilai } \sum y &= {{ $nilaiy }} \\
                            \text{Nilai } \sum x \cdot y &= {{ $nilaixy }} \\
                            \text{Nilai } \sum x^2 &= {{ $Xkuadrat }} \\
                            \text{Nilai } n &= {{ $nilain }}
                            \end{array}
                            $$



                        </p>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <h4>Menghitung B</h4>
                                <p class="px-4">
                                    $$
                                    b = \frac{n(\sum(x \cdot y)) - (\sum x)(\sum y)}
                                    {n(\sum x^2) - (\sum x)^2}
                                    $$

                                    $$
                                    b = \frac{ {{ $nilain }} ({{ $nilaixy }}) - ( {{ $nilaix }})(
                                    {{ $nilaiy }})}
                                    { {{ $nilain }} ({{ $Xkuadrat }}) - ({{ $nilaix }})^2}
                                    $$

                                    $$
                                    b = \frac{ {{ $nilain * $nilaixy }} - {{ $nilaix * $nilaiy }} }
                                    { {{ $nilain * $Xkuadrat }} - {{ $nilaix * $nilaix }} }
                                    $$

                                    $$
                                    b = \frac{ {{ $nilain * $nilaixy - $nilaix * $nilaiy }} }
                                    { {{ $nilain * $Xkuadrat - $nilaix * $nilaix }} }
                                    $$

                                    $$
                                    b = {
                                    {{ ($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - $nilaix * $nilaix) }}
                                    }
                                    $$
                                </p>
                            </div>

                            <div style="width: 48%;">
                                <h4 class=""> Menghitung A </h4>
                                <p class="px-4">
                                    $$
                                    a = \frac{ \sum y - b(\sum x)}
                                    {n}
                                    $$

                                    $$
                                    a = \frac{ {{ $nilaiy }} -
                                    {{ ($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - $nilaix * $nilaix) }}
                                    ( {{ $nilaix }} )
                                    }
                                    { {{ $nilain }} }
                                    $$

                                    $$
                                    a = \frac{ {{ $nilaiy }} -
                                    {{ (($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - $nilaix * $nilaix)) * $nilaix }}
                                    }
                                    { {{ $nilain }} }
                                    $$

                                    $$
                                    a = \frac{
                                    {{ $nilaiy - (($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - $nilaix * $nilaix)) * $nilaix }}
                                    }
                                    { {{ $nilain }} }
                                    $$

                                    $$
                                    a = {
                                    {{ ($nilaiy - (($nilain * $nilaixy - $nilaix * $nilaiy) / ($nilain * $Xkuadrat - $nilaix * $nilaix)) * $nilaix) / $nilain }}
                                    }
                                    $$
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card shadow-xs border" id="shadow">
                    <form action="/dashboard/hasil" method="get">
                        <div class="card-body p-4">
                            <h4>Prediksi Jumlah Pengunjung Berdasarkan Tanggal</h4>
                            <label for="basic-url" class="form-label">Tanggal</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control bg-transparent" id="date" name="date"
                                    aria-describedby="basic-addon3" value="{{ old('date', $tanggal) }}">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-outline-dark" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (isset($a) && isset($b))
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card shadow-xs border">
                        <div class="card-body p-4">
                            <h4>Hasil Prediksi untuk Tanggal: {{ $tanggal }}</h4>
                            <p>
                                $$ y = a + b * x $$
                                $$ y = {{ $a }} + {{ $b }} * {{ $x }} $$
                                $$ y = {{ $a }} + {{ $b * $x }} $$
                                $$ y = {{ $a + $b * $x }} $$
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

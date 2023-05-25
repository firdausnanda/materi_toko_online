@extends('layouts.main')

@section('content')
    <h1>Data Produk</h1>

    @php
      $data = 'Data Produk di Gudang A';
    @endphp

    <h5>Lokasi Barang : {{ $data }}</h5>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nama as $n)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>{{ $n }}</td>
                        <td>-</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">Data Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <p>
      Keterangan : <br>
      <p class="fst-italic">
        @if (count($nama) == 1)
            Saya Memiliki 1 Produk
        @elseif (count($nama) > 1)
            Saya Memiliki banyak Produk
        @else
            Saya Tidak Memiliki Produk
        @endif
      </p>
    </p>
@endsection

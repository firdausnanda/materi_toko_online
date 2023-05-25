@extends('layouts.main')

@section('content')
    <h1>Data Produk</h1>

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
        Nama Produk :

    </p>
@endsection

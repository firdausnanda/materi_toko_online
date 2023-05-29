@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    <div class="table-responsive">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">Tambah Data</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customer as $c)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>
                            {{ $c->nama }} <br>
                            @if ($c->order != 'null')
                                @foreach ($c->order as $o)
                                    Tanggal Order : {{ $o->tanggal_order }}
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-id="{{ $c->id }}"
                                data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                            <a href="{{ url('/modal/customer-delete', $c->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">Data Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modal-create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/modal/customer-store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="hidden" name="id" class="form-control">
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/modal/customer-update') }}" method="post">
                    <div class="modal-body">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#modal-edit').on('show.bs.modal', function(event) {

                // Mengambil data dari button yang diklik, cek data-id
                var button = $(event.relatedTarget);
                var id = button.data('id');

                // Fetch data menggunakan ajax
                $.ajax({
                    type: "GET",
                    url: `/modal/customer-edit/${id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#nama').val(response.data.nama);
                        $('#email').val(response.data.email);
                        $('#alamat').val(response.data.alamat);
                    }
                });
            });
        });
    </script>
@endsection

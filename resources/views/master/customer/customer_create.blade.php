@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    <form action="/customer-store" method="post">
      @csrf
      <div class="mb-2">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control">
      </div>
      <div class="mb-2">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="mb-2">
        <label for="">Alamat</label>
        <input type="text" name="alamat" class="form-control">
      </div>
      <input type="submit" class="btn btn-primary" value="simpan">
    </form>
@endsection
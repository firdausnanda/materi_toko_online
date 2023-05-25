@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    <form action="/customer-update" method="post">
      @method('put')
      @csrf
      <label for="">Nama</label>
      <input type="hidden" name="id" value="{{ $customer->id }}" class="form-control">
      <input type="text" name="nama" value="{{ $customer->nama }}" class="form-control">
      <label for="">Email</label>
      <input type="text" name="email" value="{{ $customer->email }}" class="form-control">
      <label for="">Alamat</label>
      <input type="text" name="alamat" value="{{ $customer->alamat }}" class="form-control">
      <input type="submit" class="btn btn-primary" value="simpan">
    </form>
@endsection
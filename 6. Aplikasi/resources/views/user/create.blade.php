@extends('user.main')
@section('content')
<style>
    img {
    max-width:200px;
    max-height:200px;
    width:auto;
    height:auto;
}
</style>
<div class="container-fluid px-4">
  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>

  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Tambah data
    </div>
    <div class="card-body">
      <form action="{{ route('index.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="nama">UserID:</label>
          <input type="text" class="form-control @error('userID') is-invalid @enderror" id="userID" name="userID"
            value="{{ old('UserID') }}">
          @error('UserID')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="jenis">Username:</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
            value="{{ old('username') }}">
          @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="harga_jual">Email:</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
            name="email" value="{{ old('email') }}">
          @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="harga_beli">Role:</label>
          <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}">
          @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input  type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="foto">Foto Profil:</label>
          <input type="file" onchange="preview()" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') }}">
          <img id="frame" src="" width="20%" height="20%"/>
          @error('foto')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
      </form>
    </div>
  </div>
</div>

<script>
    function preview() {
    console.log("Hello");
    frame.src=URL.createObjectURL(event.target.files[0]);
}
</script>
@endsection

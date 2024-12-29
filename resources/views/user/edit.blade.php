@extends('user.main')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Dashboard</h1>

  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>

  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Edit data
    </div>
    <div class="card-body">
      <form action="{{ route('index.update', $id->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="nama">UserID:</label>
          <input type="text" class="form-control @error('userID') is-invalid @enderror" id="userID" name="userID"
            value="{{ $id->userID }}">
          @error('userID')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="jenis">Username:</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
            value="{{ $id->username  }}">
          @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="harga_jual">Role:</label>
          <input type="text" class="form-control @error('role') is-invalid @enderror" id="role"
            name="role" value="{{  $id->role }}">
          @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="harga_beli">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
            name="email" value="{{ $id->email }}">
          @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <div class="form-group">
          <label for="foto">Foto Profil:</label>
          <input type="file" onchange="preview()" class="form-control" id="foto" name="foto">
          {{-- @if(!empty($id->foto))
          <img src="{{url('image')}}/{{$id->foto}}" alt="" class="rounded"
            style="width: 100%; max-width: 100px; height: auto;">
          @endif --}}
          @if(isset($id->picture) && !empty($id->picture))
        <img id="frame" src="{{ url('image/' . $id->picture    ) }}" alt="Foto Produk" class="rounded"
        style="width: 100%; max-width: 100px; height: auto;">
      @else
      <img src="{{ url('image/noimage.png') }}" alt="No Foto" class="rounded"
      style="width: 100%; max-width: 100px; height: auto;">
    @endif

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

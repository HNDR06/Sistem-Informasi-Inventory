@extends('user.main')
@section('content')
<div class="container-fluid px-4">
  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>

  <div class="card mb-4">
    <div class="card-header">
      {{-- <i class=""></i> --}}
      <a href="{{ route('index.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>userID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Email</th>
            <th>Foto Profil</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($user as $k)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $k->userID }}</td>
        <td>{{ $k->username }}</td>
        <td>{{ $k->role }}</td>
        <td>{{ $k->email }}</td>
        <td>
          @empty($k->picture)
        <img src="{{url('image/noimage.png')}}" alt="project-image" class="rounded"
        style="width: 100%; max-width: 100px; height: auto;">
      @else
      <img src="{{url('image')}}/{{$k->picture}}" alt="project-image" class="rounded"
      style="width: 100%; max-width: 100px; height: auto;">
    @endempty
        </td>
        <td>
          <a href="{{ route('index.edit', $k->id) }}" class="btn btn-sm btn-warning">edit</a>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
          data-bs-target="#exampleModal{{$k->id}}">
          Hapus
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data {{$k->nama}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              <form action="{{ route('index.destroy', $k->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
              </form>

            </div>
            </div>
          </div>
          </div>
        </td>
        </tr>
      @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

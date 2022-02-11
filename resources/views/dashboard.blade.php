@extends('layouts.app')
@section('content')    
<main class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
  <div class="align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <form action="{{ route('import') }}" method="POST" class="d-inline-block" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="input">
          <input class="form-control @error('file') ? is-invalid @enderror" type="file" name="file">
          @error('file')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
          <button class="btn btn-success ms-4">Import</button>
        </form>
        <form action="{{ route('export') }}" method="POST" class="d-inline-block">
          @csrf
          <button class="btn btn-warning ms-3">Export</button>
        </form>
        <form action="{{ route('delete') }}" method="POST" class="d-inline-block">
          @csrf
          <button class="btn btn-danger ms-3" onclick="return confirm('Yakin')">Delete  All</button>
        </form>
      </div>
    </div>
  </div>
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    @if (session()->has('msg'))
    <div class="alert alert-success" role="alert">
     {{ session('msg') }}
    </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NPM</th>
          <th scope="col" style="width:25%">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 + (5 * ($users->currentPage() - 1 )) ?>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->npm }}</td>
          <td>{{ $user->email }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
  </div>
  </div>
  </div>
</main>
@endsection
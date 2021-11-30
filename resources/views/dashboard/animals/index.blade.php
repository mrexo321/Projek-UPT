@extends('dashboard.layouts.main')
@section('container')
@if($animals->count() > 0)

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Hewan :)</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

@if(session()->has('failed'))
<div class="alert alert-danger col-lg-8" role="alert">
  {{ session('failed') }}
</div>
@endif

<div class="table-responsive col-lg-8">

  <a href="/dashboard/animals/create" class="btn btn-success mb-3">Tambah Hewan</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">ras</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($animals as $animal)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $animal->name }}</td>

          <td>
              <a class="badge bg-info" href="/dashboard/animals/{{ $animal->slug }}"><span data-feather="eye"></span></a>
              <a class="badge bg-success" href="/dashboard/animals/{{ $animal->slug }}/edit"><span data-feather="edit"></span></a>
              <form action="/dashboard/animals/{{ $animal->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@else
<div class="col-lg text-center">
  <div class="row justify-content-center">
    <h3 class="text-center">Kosong</h3>
  </div>
</div>

@endif
@endsection

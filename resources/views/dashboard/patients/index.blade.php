@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pasien :)</h1>
</div>

@if(session()->has('success'))
  {{ $success }}
@endif



@if($patients->count() > 0)
<div class="table-responsive col-lg-12">

  <a href="/dashboard/pasiens/create" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pemilik</th>
          <th scope="col">Jenis Hewan</th>
          <th scope="col">Nama Hewan</th>
          <th scope="col">Di input pada</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($patients as $patient)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $patient->owner }}</td>
          <td>{{ $patient->animal->name }}</td>
          <td>{{ $patient->pet_name }}</td>
          <td>{{ $patient->created_at->timezone('Asia/jakarta')->format('d M Y H:i:s')}}</td>
          <td>
              <a class="badge bg-info" href="/dashboard/patients/{{ $patient->slug }}"><span data-feather="eye"></span></a>
              <a class="badge bg-success" href="/dashboard/patients/{{ $patient->slug }}/edit"><span data-feather="edit"></span></a>
              <form action="/dashboard/patients/{{ $patient->slug }}" method="post" class="d-inline">
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
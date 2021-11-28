@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah List Hewan </h1>
  </div>

  <div class="col-lg-8">
        <form action="/dashboard/animals" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="name" class="form-label">name Hewan</label>
            <input name="name" required autofocus  value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                <input type="text" class="form-control" required id="slug" value="{{ old('slug') }}"  name="slug" readonly >
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah Hewan</button>
        </form>
</div>

<script>
    const name = document.querySelector('#name');  
    const slug = document.querySelector('#slug');

    name.addEventListener('input', function(){
        slug.value = slugify(name.value)
    });

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }
</script>
@endsection
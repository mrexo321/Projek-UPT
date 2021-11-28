@extends('dashboard.layouts.main')

@section('container')

<div class="row justify-content-center mt-4">
    

    @if(session()->has('same'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('same') }}
    </div>
    @endif
       <div class="col-lg-8">
        <form action="/dashboard/animals/{{ $animal->slug }}" method="post">
            @method('put')
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Hewan :</label>
                <input name="name" required autofocus  value="{{ old('name',$animal->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">slug :</label>
                <input name="slug" readonly required autofocus  value="{{ old('slug' , $animal->slug) }}" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" >
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
       </div>
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
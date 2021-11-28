@extends('dashboard.layouts.main')

@section('container')

<div class="row justify-content-center mt-4">
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif
       <div class="col-lg-8">
        <form action="/dashboard/patients/{{ $patient->slug }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik :</label>
                <input name="owner" required autofocus  value="{{ old('owner' , $patient->owner) }}" type="text" class="form-control @error('owner') is-invalid @enderror" id="owner" >
                @error('owner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">address:</label>
                <input name="address" required autofocus  value="{{ old('address' , $patient->address) }}" type="text" class="form-control @error('address') is-invalid @enderror" id="address" >
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="animal_id" class="form-label">Jenis Hewan :</label>
                <select required class="form-select" name="animal_id">
                    <option selected>Pilih Hewan</option>
                    @foreach($animals as $animal)
                    @if(old('animal_id' , $patient->animal_id) == $animal->id )
                    <option value="{{ $animal->id }}" selected>{{ $animal->name }}</option>
                    @else
                    <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('ras')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pet_name" class="form-label">Nama Hewan :</label>
                <input name="pet_name" required autofocus  value="{{ old('pet_name',$patient->pet_name) }}" type="text" class="form-control @error('pet_name') is-invalid @enderror" id="pet_name" >
                @error('pet_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Umur :</label>
                <input name="age" required autofocus  value="{{ old('age' , $patient->age) }}" type="text" class="form-control @error('age') is-invalid @enderror" id="age" >
                @error('age')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select required class="form-select" name="gender">
                    @if(old('gender') == $patient->gender)
                    <option selected>{{ $patient->gender }}</option>
                    @else
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                    @endif
                </select>
                @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="race_id" class="form-label">Ras Domestik</label>
                <select required class="form-select" name="race_id">
                    @foreach($races as $race)
                    @if(old('race_id', $patient->race_id) == $race->id)
                    <option value="{{ $race->id }}" selected>{{ $race->name }}</option>
                    @else
                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('ras')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">slug :</label>
                <input name="slug" readonly required autofocus  value="{{ old('slug' , $patient->slug) }}" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" >
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
    const pet_name = document.querySelector('#pet_name');  
    const slug = document.querySelector('#slug');

    pet_name.addEventListener('input', function(){
        slug.value = slugify(pet_name.value)
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
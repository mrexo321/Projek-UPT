@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h2 class="">Formulir Pendaftaran</h2>
        </div>
    </div>


    <div class="row justify-content-center mt-4">
        @if (session()->has('success'))
            {{ session('success') }}
        @endif


        <div class="col-lg-8">
            <form action="/daftar" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="owner" class="form-label">Nama Pemilik :</label>
                    <input name="owner" required autofocus value="{{ old('owner') }}" type="text"
                        class="form-control @error('owner') is-invalid @enderror" id="owner">
                    @error('owner')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat :</label>
                    <input name="address" required autofocus value="{{ old('address') }}" type="text"
                        class="form-control @error('address') is-invalid @enderror" id="address">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="animal_id" class="form-label">Jenis Hewan :</label>
                    <select required class="form-select" id="animal_id" name="animal_id">
                        <option selected>Pilih Hewan</option>
                        @foreach ($animals as $animal)
                            <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                        @endforeach
                    </select>
                    @error('animal_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pet_name" class="form-label">Nama Hewan :</label>
                    <input name="pet_name" required autofocus value="{{ old('pet_name') }}" type="text"
                        class="form-control @error('pet_name') is-invalid @enderror" id="pet_name">
                    @error('pet_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Umur :</label>
                    <input name="age" required autofocus value="{{ old('age') }}" type="text"
                        class="form-control @error('age') is-invalid @enderror" id="age">
                    @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select required class="form-select" name="gender">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="race_id" class="form-label">Ras Domestik :</label>
                    <select required id="race_id" class="form-select" name="race_id">
                        <option selected>Pilih Hewan Terlebih Dahulu</option>
                        {{-- @foreach ($races as $race)
                            <option value="{{ $race->id }}">{{ $race->name }}</option>
                        @endforeach --}}
                    </select>
                    @error('race_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">

                    <input name="slug" readonly required autofocus value="{{ old('slug') }}" type="hidden"
                        class="form-control @error('slug') is-invalid @enderror" id="slug">
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
        // Declarations
        const pet_name = document.querySelector('#pet_name');
        const slug = document.querySelector('#slug');
        const animalSelect = document.querySelector('#animal_id');
        const raceSelect = document.querySelector('#race_id');
        // const options;

        // Listeners
        pet_name.addEventListener('input', function() {
            slug.value = slugify(pet_name.value)
        });

        animalSelect.addEventListener('change', function() {
            axios.get('/api/race?id=' + animalSelect.value).then(response => {
                var options = `<option disabled selected>Pilih Ras</option>`;
                var result = response.data;

                if (result.length > 0) {
                    var i = 0;
                    for (i = 0; i < result.length; i++) {
                        options += `<option value="${result[i]['id']}">${result[i]['name']}</option>`;
                    }
                }

                $(raceSelect).html(options);
            })
        })

        // Methods
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

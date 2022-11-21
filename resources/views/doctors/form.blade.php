<x-layouts.base title="Doctor Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Doctor Edit Form</h5>
                <form method="POST" action="{{ route('doctors.save') }}" class="row g-3">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $pServant->email }}" name="email">
                    @endif
                    <div class="col-12">
                        <label for="email" class="form-label">User</label>
                        <select id="email" @if($new) name="email" @else disabled @endif
                        class="form-select form-control @error('email') is-invalid @enderror">
                            @foreach($users as $user)
                                <option value="{{ $user->email }}" {{ $pServant->email == $user->email ? 'selected="' : '' }}>
                                    {{ $user->name . ' ' . $user->surname }}
                                </option>
                            @endforeach
                        </select>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="degree" class="form-label">Degree</label>
                        <input type="text" class="form-control @error('degree') is-invalid @enderror"
                               name="degree" id="degree" value="{{ $pServant?->degree }}">
                        @error('degree')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.base>
1

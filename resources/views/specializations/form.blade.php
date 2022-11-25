<x-layouts.base title="Specialization Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Specialization Edit Form</h5>
                <form method="POST" class="row g-3"
                      action="{{ route('specializations.save', ['email' => $spec->email, 'id' => $spec->id]) }}">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $spec->email }}" name="cname">
                    @endif
                    <div class="col-12">
                        <label for="email" class="form-label">Doctor</label>
                        <select id="email" @if($new) name="email" @else disabled @endif
                        class="form-select form-control @error('email') is-invalid @enderror"
                        >
                            @foreach($users as $user)
                                <option value="{{ $user->email }}" {{ $spec->email == $user->email ? 'selected="' : '' }}>
                                    {{ $user->name . ' ' . $user->surname }}
                                </option>
                            @endforeach
                        </select>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$new)
                        <input type="hidden" value="{{ $spec?->id }}" name="id">
                    @endif
                    <div class="col-12">
                        <label for="id" class="form-label">Disease Code</label>
                        <select id="id" @if($new) name="id" @else disabled @endif
                        class="form-select form-control @error('id') is-invalid @enderror">
                            @foreach($dTypes as $dType)
                                <option value="{{ $dType->id }}" {{ $spec->id == $dType->id ? 'selected="' : '' }}>
                                    {{ $dType->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id')
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

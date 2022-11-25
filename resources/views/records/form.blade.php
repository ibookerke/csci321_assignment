<x-layouts.base title="Record Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Record Edit Form</h5>
                <form method="POST" class="row g-3"
                      action="{{ route('records.save', ['email' => $record->email, 'cname' => $record->cname, 'disease_code' => $record->disease_code]) }}">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $record->email }}" name="email">
                    @endif
                    <div class="col-12">
                        <label for="email" class="form-label">Public Servant</label>
                        <select id="email" @if($new) name="email" @else disabled @endif
                            class="form-select form-control @error('email') is-invalid @enderror"
                        >
                            @foreach($users as $user)
                                <option value="{{ $user->email }}" {{ $record->email == $user->email ? 'selected="' : '' }}>
                                    {{ $user->name . ' ' . $user->surname }}
                                </option>
                            @endforeach
                        </select>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$new)
                        <input type="hidden" value="{{ $record->cname }}" name="cname">
                    @endif
                    <div class="col-12">
                        <label for="cname" class="form-label">Country Name</label>
                        <select id="cname" @if($new) name="cname" @else disabled @endif
                        class="form-select form-control @error('cname') is-invalid @enderror"
                        >
                            @foreach($countries as $country)
                                <option value="{{ $country->cname }}" {{ $record->cname == $country->cname ? 'selected="' : '' }}>
                                    {{ $country->cname }}
                                </option>
                            @endforeach
                        </select>
                        @error('cname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$new)
                        <input type="hidden" value="{{ $record?->disease_code }}" name="disease_code">
                    @endif
                    <div class="col-12">
                        <label for="disease_code" class="form-label">Disease Code</label>
                        <select id="disease_code" @if($new) name="disease_code" @else disabled @endif
                                class="form-select form-control @error('disease_code') is-invalid @enderror">
                            @foreach($diseases as $disease)
                                <option value="{{ $disease->disease_code }}" {{ $record->disease_code == $disease->disease_code ? 'selected="' : '' }}>
                                    {{ $disease->disease_code }}
                                </option>
                            @endforeach
                        </select>
                        @error('disease_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="total_deaths" class="form-label">Total Deaths</label>
                        <input type="number" class="form-control @error('total_deaths') is-invalid @enderror"
                               name="total_deaths" id="total_deaths" value="{{ $record?->total_deaths }}">
                        @error('total_deaths')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="total_patients" class="form-label">Total Patients</label>
                        <input type="number" class="form-control @error('total_patients') is-invalid @enderror"
                               name="total_patients" id="total_patients" value="{{ $record?->total_patients }}">
                        @error('total_patients')
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

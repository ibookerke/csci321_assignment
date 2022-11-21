<x-layouts.base title="Discover Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Discover Edit Form</h5>
                <form method="POST" class="row g-3"
                      action="{{ route('discoveries.save', ['original_cname' => $discover->cname, 'original_d_code' => $discover->disease_code]) }}">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $discover->cname }}" name="cname">
                    @endif
                    <div class="col-12">
                        <label for="cname" class="form-label">Country Name</label>
                        <select id="cname" @if($new) name="cname" @else disabled @endif class="form-select form-control @error('cname') is-invalid @enderror">
                            @foreach($countries as $country)
                                <option value="{{ $country->cname }}" {{ $discover->cname == $country->cname ? 'selected="' : '' }}>
                                    {{ $country->cname }}
                                </option>
                            @endforeach
                        </select>
                        @error('cname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$new)
                        <input type="hidden" value="{{ $discover?->disease_code }}" name="disease_code">
                    @endif
                    <div class="col-12">
                        <label for="disease_code" class="form-label">Country Name</label>
                        <select id="disease_code" @if($new) name="disease_code" @else disabled @endif
                                class="form-select form-control @error('disease_code') is-invalid @enderror">
                            @foreach($diseases as $disease)
                                <option value="{{ $disease->disease_code }}" {{ $discover->disease_code == $disease->disease_code ? 'selected="' : '' }}>
                                    {{ $disease->disease_code }}
                                </option>
                            @endforeach
                        </select>
                        @error('disease_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="first_enc_date" class="form-label">Disease Code</label>
                        <input type="date" class="form-control @error('first_enc_date') is-invalid @enderror"
                               name="first_enc_date" id="first_enc_date" value="{{ $discover?->first_enc_date?->format('Y-m-d') }}">
                        @error('first_enc_date')
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

<x-layouts.base title="Country Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Country Edit Form</h5>
                <form method="POST" action="{{ route('countries.save') }}" class="row g-3">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $country->cname }}" name="cname">
                    @endif
                    <div class="col-12">
                        <label for="cname" class="form-label">Country Name</label>
                        <input type="text" {{ !empty($country->cname) ? 'readonly' : '' }}
                               @if($new) name="cname" @else disabled @endif
                               class="form-control @error('cname') is-invalid @enderror"
                               id="cname" value="{{ $country?->cname }}">
                        @error('cname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="population" class="form-label">Population</label>
                        <input type="number" class="form-control @error('population') is-invalid @enderror" name="population" id="population" value="{{ $country?->population }}">
                        @error('population')
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

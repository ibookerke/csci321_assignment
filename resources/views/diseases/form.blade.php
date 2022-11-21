<x-layouts.base title="Disease Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <form method="POST" action="{{ route('diseases.save') }}" class="row g-3">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $disease->disease_code }}" name="disease_code">
                    @endif
                    <div class="col-12">
                        <label for="disease_code" class="form-label">Disease Code</label>
                        <input type="text" {{ !empty($disease?->disease_code) ? 'readonly' : '' }}
                               class="form-control @error('disease_code') is-invalid @enderror"
                               @if($new) name="disease_code" @else disabled @endif
                               id="disease_code" value="{{ $disease?->disease_code }}">
                        @error('disease_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="pathogen" class="form-label">Pathogen</label>
                        <input type="text" class="form-control @error('pathogen') is-invalid @enderror" name="pathogen" id="pathogen" value="{{ $disease?->pathogen }}">
                        @error('pathogen')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $disease?->description }}">
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="id" class="form-label">Disease Type</label>
                        <select id="id" name="id" class="form-select form-control @error('id') is-invalid @enderror">
                            @foreach($types as $type)
                                <option value="{{ $type?->id }}" {{ $disease?->id == $type?->id ? 'selected="' : '' }}>
                                    {{ $types[$type?->id]?->description ?? 'Unknown type' }}
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

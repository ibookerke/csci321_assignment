<x-layouts.base title="Disease Type Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">Disease Type Edit Form</h5>
                <form method="POST" action="{{ route('disease_types.save', ['id' => $dType->id]) }}" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label">Id</label>
                        <input type="text" id="id" name="id" class="form-control" value="{{ $dType?->id }}" disabled>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $dType?->description }}">
                        @error('description')
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

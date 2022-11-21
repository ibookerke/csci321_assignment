<x-layouts.base title="User Form">
    <div class="d-flex justify-content-center" >
        <div class="card col-6">
            <div class="card-body">
                <h5 class="card-title">User Edit Form</h5>
                <form method="POST" action="{{ route('user.save') }}" class="row g-3">
                    @csrf
                    @if(!$new)
                        <input type="hidden" value="{{ $user->email }}" name="email">
                    @endif
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" @if($new) name="email" @else disabled @endif
                               class="form-control @error('email') is-invalid @enderror"
                               id="email" value="{{ $user?->email }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user?->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname" value="{{ $user?->surname }}">
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" value="{{ $user?->salary }}">
                        @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $user?->phone }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="cname" class="form-label">Country Name</label>
                        <select id="cname" name="cname" class="form-select form-control @error('cname') is-invalid @enderror">
                            @foreach($countries as $country)
                                <option value="{{ $country->cname }}" {{ $user->cname == $country->cname ? 'selected="' : '' }}>
                                    {{ $country->cname }}
                                </option>
                            @endforeach
                        </select>
                        @error('cname')
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

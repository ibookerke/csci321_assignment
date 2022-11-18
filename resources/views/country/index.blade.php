<x-layouts.base title="Countries">

    <div cname="messageField">
        @if(session()->has('message'))
            <div class="alert alert-{{ session('message_color') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>


    <div class="card">
        <div class="card-body p-5">
            <div class="d-flex justify-content-end mb-2">
                <a class="btn btn-toolbar btn-success" href="{{ route('countries.edit', ['cname' => 'new']) }}">
                    Create Country
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">cname</th>
                    <th scope="col">Population</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <th scope="row">{{ $country->cname }}</th>
                        <td>{{ $country->population }}</td>
                        <td>
                            <a  style="font-size: 14px;"
                                class="badge bg-primary rounded-pill text-white"
                                href="{{ route('countries.edit', ['cname' => $country->cname]) }}">
                                Edit
                            </a>
                            <form style="display: inline-block" method="post" action="{{ route('countries.delete') }}">
                                @csrf
                                <input type="hidden" name="cname" value="{{ $country->cname }}">
                                <button style="font-size: 14px; border: none;" type="submit" class="badge bg-danger rounded-pill">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ route('countries.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hcnameden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('countries.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('countries.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hcnameden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

<x-layouts.base title="Discoveries">

    <div id="messageField">
        @if(session()->has('message'))
            <div class="alert alert-{{ session('message_color') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>


    <div class="card">
        <div class="card-body p-5">
            <div class="d-flex justify-content-end mb-2">
                <a class="btn btn-toolbar btn-success" href="{{ route('discoveries.edit', ['cname' => 'new']) }}">
                    Create Discover
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Country Name</th>
                    <th scope="col">Disease Code</th>
                    <th scope="col">First Encountered</th>
                </tr>
                </thead>
                <tbody>
                @foreach($discoveries as $discovery)
                    <tr>
                        <th scope="row">{{ $discovery->cname }}</th>
                        <td>{{ $discovery->disease_code }}</td>
                        <td>{{ \Carbon\Carbon::parse($discovery->first_enc_date)->format('Y-m-d') }}</td>
                        <td>
                            <a  style="font-size: 14px;"
                                class="badge bg-primary rounded-pill text-white"
                                href="{{ route('discoveries.edit', ['cname' => $discovery->cname, 'disease_code' => $discovery->disease_code]) }}">
                                Edit
                            </a>
                            <form style="display: inline-block" method="post" action="{{ route('discoveries.delete') }}">
                                @csrf
                                <input type="hidden" name="cname" value="{{ $discovery->cname }}">
                                <input type="hidden" name="disease_code" value="{{ $discovery->disease_code }}">
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
                            <a class="page-link" href="{{ route('discoveries.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('discoveries.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('discoveries.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

<x-layouts.base title="Countries">

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
                <a class="btn btn-toolbar btn-success" href="{{ route('diseases.edit', ['disease_code' => 'new']) }}">
                    Create Disease
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Disease Code</th>
                    <th scope="col">Pathogen</th>
                    <th scope="col">Description</th>
                    <th scope="col">Disease Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diseases as $disease)
                    <tr>
                        <th scope="row">{{ $disease->disease_code }}</th>
                        <th>{{ $disease->pathogen }}</th>
                        <th>{{ $disease->description }}</th>
                        <th>{{ $types[$disease?->id]?->description ?? 'Unknown Type' }}</th>

                        <td>
                            <a style="font-size: 14px;"
                                class="badge bg-primary rounded-pill text-white"
                                href="{{ route('diseases.edit', ['disease_code' => $disease->disease_code]) }}">
                                Edit
                            </a>
                            <form style="display: inline-block" method="post" action="{{ route('diseases.delete') }}">
                                @csrf
                                <input type="hidden" name="disease_code" value="{{ $disease->disease_code }}">
                                <button style="font-size: 14px; border: none;" type="submit" class="badge bg-danger rounded-pill">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <td>{{ $disease->population }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ route('diseases.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('diseases.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('diseases.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

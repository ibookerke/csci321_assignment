<x-layouts.base title="Public Servants">

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
                <a class="btn btn-toolbar btn-success" href="{{ route('public_servants.edit', ['email' => 'new']) }}">
                    Create Public Servant
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">email</th>
                    <th scope="col">Department</th>
                </tr>
                </thead>
                <tbody>
                @foreach($public_servants as $pServant)
                    <tr>
                        <th scope="row">{{ $pServant->email }}</th>
                        <td>{{ $pServant->department }}</td>
                        <td>
                            <a  style="font-size: 14px;"
                                class="badge bg-primary rounded-pill text-white"
                                href="{{ route('public_servants.edit', ['email' => $pServant->email]) }}">
                                Edit
                            </a>
                            <form style="display: inline-block" method="post" action="{{ route('public_servants.delete') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $pServant->email }}">
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
                            <a class="page-link" href="{{ route('public_servants.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('public_servants.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('public_servants.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

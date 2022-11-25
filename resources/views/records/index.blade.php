<x-layouts.base title="Records">

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
                <a class="btn btn-toolbar btn-success" href="{{ route('records.edit', ['email' => 'new']) }}">
                    Create Record
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Public Servant</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Disease Code</th>
                    <th scope="col">Total Deaths</th>
                    <th scope="col">Total Patients</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <tr>
                        <?php  $user = $users[$record->email]?>
                        <th scope="row">{{ $user->name . ' ' . $user->surname }}</th>
                        <td>{{ $record->cname }}</td>
                        <td>{{ $record->disease_code }}</td>
                        <td>{{ $record->total_deaths }}</td>
                        <td>{{ $record->total_patients }}</td>
                        <td>
                            <a  style="font-size: 14px;"
                                class="badge bg-primary rounded-pill text-white"
                                href="{{ route('records.edit', ['email' => $record->email, 'cname' => $record->cname, 'disease_code' => $record->disease_code]) }}">
                                Edit
                            </a>
                            <form style="display: inline-block" method="post" action="{{ route('records.delete') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $record->email }}">
                                <input type="hidden" name="cname" value="{{ $record->cname }}">
                                <input type="hidden" name="disease_code" value="{{ $record->disease_code }}">
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
                            <a class="page-link" href="{{ route('records.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('records.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('records.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

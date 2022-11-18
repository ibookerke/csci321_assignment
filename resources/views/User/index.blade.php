<x-layouts.base title="Users">

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
                <a class="btn btn-toolbar btn-success" href="{{ route('user.edit', ['email' => 'new']) }}">
                    Create User
                </a>
            </div>
            <table style="min-height: 700px" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->email }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->salary }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->cname }}</td>
                            <td>
                                <a  style="font-size: 14px;"
                                    class="badge bg-primary rounded-pill text-white"
                                    href="{{ route('user.edit', ['email' => $user->email]) }}">
                                    Edit
                                </a>
                                <form style="display: inline-block" method="post" action="{{ route('user.delete') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $user->email }}">
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
                            <a class="page-link" href="{{ route('user.index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('user.index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('user.index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layouts.base>

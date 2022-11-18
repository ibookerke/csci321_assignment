<x-layouts.base title="Users">
    <div class="card">
        <div class="card-body">
            <table style="min-height: 700px" class="table table-striped table-hover">
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
                                <span class="badge bg-success">Edit</span>
                                <span class="badge bg-danger">Delete</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ route('users_index', ['page' => 1]) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for($i = 1; $i <= $lastPage; $i++)
                            <li class="page-item"><a class="page-link" href="{{ route('users_index', ['page' => $i]) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ route('users_index', ['page' => $lastPage]) }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
{{--        <div style="height: 20px;">--}}

{{--        </div>--}}
{{--        {{ $users->withQueryString()->links() }}--}}
{{--        @if(array_key_exists('pagination', $users))--}}
{{--            {{ $data['pagination']->links() }}--}}
{{--        @else--}}
{{--            @if($links)--}}
{{--                {{ $users->withQueryString()->links() }}--}}
{{--            @endif--}}
{{--        @endif--}}
    </div>
</x-layouts.base>

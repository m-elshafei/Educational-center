@extends('layouts.app')
@section('title', 'branches')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">branches </h1>
        @if (Auth::user())
            <div class="d-flex justify-content-end mb-3">
                <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('branch.create') }}"
                        role="button">Add
                        New
                        branch</a></div>
            </div>
        @endif
        {{-- @if (session()->has('message'))
            {{ session('message') }}
        @endif --}}
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @elseif (session()->has('message_err'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ session('message_err') }}</strong>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">location</th>
                        <th scope="col">company</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>
                        @if (Auth::user())
                            <th scope="col">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($branches as $key => $branch)
                        <tr class="">
                            <td scope="row">{{ $key + $branches->firstitem() }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $branch->location }}</td>
                            <td>{{ $branch->company->name }}</td>
                            <td>{{ $branch->created_at }}</td>
                            <td>{{ $branch->updated_at->diffForHumans() }}</td>
                            @if (Auth::user())
                                <td>
                                    <div class="d-flex justify-content-evenly">

                                        <form action='{{ route('branch.destroy', $branch->id) }}' method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('branch.edit', $branch->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>
        {{ $branches->links() }}
        {{-- {{ $branches->links('vendor.pagination.bootstrap-5') }} --}}
        {{-- {{ $branches->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
@endsection

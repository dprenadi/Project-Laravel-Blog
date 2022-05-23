@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Post Categories</h1>
  </div>

  @if(session()->has('success'))
  <div class="col-md-6">
    <div class="alert alert-info" role="alert">
      {{ session('success') }}
    </div>
  </div>
  @endif

    <div class="table-responsive col-md-6">
      <a href="/dashboard/categories/create" class="
      btn btn-sm btn-info mb-3">Create New Category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
  
          @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>

                {{-- SHOW --}}
                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                {{-- END SHOW --}}

                {{-- EDIT --}}
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                {{-- END EDIT --}}
  
                {{-- DELETE --}}
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
                {{-- END DELETE --}}
                
            </td>
          </tr>
          @endforeach
  
          <tbody>
          </tbody>
        </table>
      </div>

@endsection
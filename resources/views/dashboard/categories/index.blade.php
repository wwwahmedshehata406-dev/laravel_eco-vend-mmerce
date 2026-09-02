@extends('layouts.app')

@section('contact')
  <div class="page" id="page-categories">
    <div class="page-header"
      style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> Categories</div>
        <h1 class="page-title">Categories</h1>
        <p class="page-subtitle">Manage product categories and hierarchy.</p>
      </div>
      <a href="{{ route('dashboard.categories.trash') }}">
        <button class="btn btn-secondry borderd">Trashed Categories</button>
      </a>
      <a href="{{ route('dashboard.categories.create') }}">
        <button class="btn btn-primary">+ Add Category</button>
      </a>
    </div>
  </div>




  <div style="align-items:start; margin: 0 20px;">
    @if (session('success'))
      <div class="alert alert-success"> {{ session('success') }}</div>
    @endif
    <div class="panel">
      <div class="panel-header"><span class="panel-title">All Categories</span></div>
      <div style="overflow-x:auto;">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
              <th>Status</th>
              <th>Products</th>
              <th>Actions</th>
            </tr>
          </thead>

          <body>
            @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td><img src="{{ asset('storage/' . $category->image) }}" width="50" height="50" alt="{{ $category->name }}"
                    class="rounded-circle"></td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->products_number }}</td>
                <td>
                  <a href="" class="btn btn-sm btn-outline-primary">show</a>
                  <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                    class="btn btn-sm btn-outline-primary">Edit</a>

                  <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST"
                    style="display:inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger" ">Delete</button>
                        </form>

                      </td>
                    </tr>
            @endforeach
              </body>
            </table>
          </div>
        </div>
        <div style=" margin: 10px 0;">
                    {{ $categories->links() }}
      </div>
    </div>

  </div>
@endsection
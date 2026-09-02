@extends('layouts.app')

@section('contact')

  <div class="page" id="page-categories">
    <div class="page-header" style="display:flex; align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> Categories</div>
        <p class="page-sub">trashd categories</p>
      </div>

      <a href="{{ route('dashboard.categories.index') }}">
        <button class="btn btn-primary">back to all categories</button>
      </a>
    </div>
    </div>


    <div style="align-items:start; margin: 0 20px;"">
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
                  <td><img src="{{ asset('storage/' . $category->image) }}" width="50" height="50" alt="image" class="rounded-circle"></td>
                  <td>{{ $category->description }}</td>
                  <td>{{ $category->status }}</td>
                  <td>{{ $category->products_number }}</td>
              <td>

                <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="POST" style="display:inline-block">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-sm btn-outline-primary">Restore</button>
                </form>

                <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="POST" style="display:inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
                </tr>
              @endforeach
            </body>
          </table>
        </div>
      </div>
    </div>

      <div style="margin: 10px 0 100px;">
          {{ $categories->links() }}
      </div>
  </div>
@endsection
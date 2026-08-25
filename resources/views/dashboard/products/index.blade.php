@extends('layouts.app')

@section('contact')
    <div class="page" id="page-products">
        <div class="page-header"
            style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
            <div>
                <div class="breadcrumb">Home <span>›</span> Products</div>
                <h1 class="page-title">Products</h1>
                <p class="page-subtitle">Manage your product inventory.</p>
            </div>
            <div style="display:flex;gap:8px;">
                <button class="btn btn-secondary btn-sm">Import</button>
                <a href="{{ route('products.create') }}">
                    <button class="btn btn-primary" onclick="navigate('new-product',null)">+ Add Product</button>
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="panel mb-6">
            <div class="panel-header" style="gap:12px;flex-wrap:wrap;">
                <span class="panel-title">Product Catalog</span>
                <div style="display:flex;gap:8px;flex-wrap:wrap;">
                    <input type="text" class="form-control" placeholder="Search products…"
                        style="width:220px;padding:6px 12px;font-size:13px;" />
                    <select class="form-control" style="width:auto;padding:6px 12px;font-size:13px;">
                        <option>All Categories</option>
                        <option>Electronics</option>
                        <option>Clothing</option>
                        <option>Home & Garden</option>
                        <option>Sports</option>
                    </select>
                    <select class="form-control" style="width:auto;padding:6px 12px;font-size:13px;">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Draft</option>
                        <option>Out of Stock</option>
                    </select>
                </div>
            </div>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>compare_price</th>
                            <th>rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Products as $ele)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ele->id }}</td>
                                    <td>{{ $ele->name }}</td>

                                    <td>
                                        <img src="{{ asset('storage/' . $ele->image) }}" width="50" height="50" alt="{{$ele->name . $ele->id }}" class="rounded-circle">
                                    </td>
                                    <td>{{ $ele->description }}</td>
                                    <td>{{ $ele->price }}</td>
                                    <td>{{ $ele->compare_price }}</td>
                                    <td>{{ $ele->rating }}</td>
                                    <td>{{ $ele->status }}</td>
                                    <td>Category</td>
                                    <td>Store</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-primary">show</a>
                                        <a href="{{ route('products.edit', $ele->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                        <form action="{{ route('products.destroy', $ele) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <div style=" margin: 10px 0;">
            {{ $Products->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
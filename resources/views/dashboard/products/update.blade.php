@extends('layouts.app')

@section('contact')

  <div class="page" id="page-new-product">

    <div class="page-header" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> <span style="cursor:pointer;text-decoration:underline;" onclick="navigate('dashboard.products',null)">Products</span> <span>›</span> New Product</div>
        <a href="{{ route('dashboard.products.create') }}"> <h1 class="page-title">Add New Product</h1> </a>
        <p class="page-subtitle">Fill in the details to create a new product listing.</p>
      </div>
      <div style="display:flex;gap:8px;">
        <button class="btn btn-secondary" onclick="navigate('dashboard.products',null)">Cancel</button>
        <button class="btn btn-primary" onclick="submitProductForm()">Publish Product</button>
      </div>
    </div>

    <div class="grid-2" style="align-items:start;">
      <div style="display:flex;flex-direction:column;gap:16px;">

        <form action="{{ route('dashboard.products.update', $Product->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="panel">
            <div class="panel-header"><span class="panel-title">Product Information</span></div>
            <div class="panel-body">
              <div class="form-group">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control" id="prod-name" placeholder="e.g. Wireless Noise-Canceling Headphones" value="{{ $Product->name }}" />
              </div>
              <div class="form-group">
                <label class="form-label">Description *</label>
                <textarea class="form-control" name="description" id="prod-desc" rows="5" placeholder="Describe the product features, benefits, and specifications…">{{ $Product->description }}</textarea>
              </div>
            </div>
          </div>

          <div class="panel" style="margin:16px 0 ;">
            <div class="panel-header"><span class="panel-title">Pricing</span></div>
            <div class="panel-body">
              <div class="grid-2">
                <div class="form-group">
                  <label class="form-label">Regular Price ($) *</label>
                  <input type="number" name="price" class="form-control" id="prod-price" placeholder="0.00" step="0.01" min="0" value="{{ $Product->price }}" />
                </div>
                <div class="form-group">
                  <label class="form-label">Sale Price ($)</label>
                  <input type="number" name="compare_price" class="form-control" id="prod-sale" placeholder="0.00" step="0.01" min="0" value="{{ $Product->compare_price }}" />
                </div>
              </div>
            </div>
          </div>

          <div class="panel" style="margin:16px 0 ;">
            <div class="panel-header"><span class="panel-title">Pricing</span></div>
            <div class="panel-body">
              <div class="form-group">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $categ)
                    <option value="{{ $categ->id }}" {{ $Product->category_id == $categ->id ? 'selected' : '' }}>{{ $categ->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                  <option value="active" {{ $Product->status == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="draft" {{ $Product->status == 'draft' ? 'selected' : '' }}>Draft</option>
                  <option value="archived" {{ $Product->status == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
              </div>
            </div>
          </div>

      </div>


      <div style="display:flex;flex-direction:column;gap:16px;">

        <div class="panel">
          <div class="panel-header"><span class="panel-title">Product Images</span></div>
          <div class="panel-body">
            <div class="upload-area" id="uploadArea" onclick="document.getElementById('imgInput').click()">
              <div class="upload-icon">📸</div>
              <div style="font-size:14px;font-weight:500;margin-bottom:4px;">Click to upload images</div>
              <div style="font-size:12px;color:var(--text-muted);">PNG, JPG, WEBP up to 10MB each</div>
              <input type="file" name="image" id="imgInput" multiple accept="image/*" style="display:none;" onchange="previewImages(event)" />
            </div>
            <div id="imgPreview" style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-top:12px;"></div>
          </div>
        </div>

          <div class="panel">
            <div class="panel-header"><span class="panel-title">Rating</span></div>
            <div class="panel-body">
              <div class="form-group">
                <label class="form-label">Product Rating *</label>
                <input type="number" name="rating" class="form-control" id="prod-name" placeholder="e.g. Rating" value="{{ $Product->rating }}" />
              </div>
            </div>
          </div>


        <div style="display:flex;gap:8px;">
          <button class="btn btn-secondary" style="flex:1;justify-content:center;">Save as Draft</button>
          <button class="btn btn-primary" style="flex:1;justify-content:center;" onclick="submitProductForm()">Publish Product</button>
        </div>

      </div>
      </form>
    </div>
  </div>
@endsection
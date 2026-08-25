@extends('layouts.app')

@section('contact')
  <div class="page" id="page-new-category">
    <div class="page-header"
      style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> <span style="cursor:pointer;text-decoration:underline;"
            onclick="navigate('categories',null)">Categories</span> <span>›</span> New Category</div>
        <h1 class="page-title">Add New Category</h1>
        <p class="page-subtitle">Create a new product category.</p>
      </div>
      <div style="display:flex;gap:8px;">
        <button class="btn btn-secondary" onclick="navigate('categories',null)">Cancel</button>
        <button class="btn btn-primary" onclick="submitCategoryForm()">Create Category</button>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @else
      <div class="alert alert-success">
        <span>no exchanges</span>
      </div>
    @endif
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

      @csrf
      <div class="" style="align-items:start;">

        <div style="display:flex; flex-direction:column; gap:16px; justify-content: center;">
          <div class="panel">
            <div class="panel-header"><span class="panel-title">Category Details</span></div>
            <div class="panel-body">

              <div class="form-group">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" class="form-control" id="cat-name" placeholder="e.g. Electronics"
                  required />
              </div>

              <!-- 
                    <div class="form-group">
                      <label class="form-label">URL Slug *</label>
                      <input type="text" class="form-control" id="cat-slug" placeholder="e.g. electronics" required />
                      <div style="font-size:11px;color:var(--text-muted);margin-top:4px;">Auto-generated from name. Use lowercase letters, numbers and hyphens only.</div>
                    </div> -->

              <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" id="cat-desc" rows="4"
                  placeholder="Brief description of this category…"></textarea>
              </div>

              <div class="form-group">
                <label class="form-label">Parent Category</label>

                <select name="status" id="parent_id" class="form-control form-select">
                  <option value=""> Category Status</option>
                  <option value="active">Active</option>
                  <option value="archived">Archived</option>
                  </option>
                </select>
              </div>


              <div class="form-group">
                <label class="form-label">Parent Category</label>

                <select name="parent_id" id="parent_id" class="form-control form-select">
                  <option value="">Select Parent Category</option>
                  @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @selected(old('parent_id') == $parent->id)>{{ $parent->name }}</option>
                    {{ $parent->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <!-- <div class="form-group">
                  <label class="form-label">Display Order</label>
                  <input type="number" class="form-control" placeholder="0" min="0" />
                  <div style="font-size:11px;color:var(--text-muted);margin-top:4px;">Lower numbers appear first.</div>
                </div> -->
            </div>
          </div>
        </div>

        <div class="panel" style="margin:16px 0 ;">
          <div class="panel-header"><span class="panel-title">Category Image</span></div>
          <div class="panel-body">
            <div class="upload-area" onclick="document.getElementById('catImg').click()">

              <div class="upload-icon">🖼</div>
              <div style="font-size:14px;font-weight:500;margin-bottom:4px;">Upload category image</div>
              <div style="font-size:12px;color:var(--text-muted);">Recommended: 600×400px</div>

              <input type="file" id="catImg" name="image" value="{{ $categories->image}}" accept="image/*" />


            </div>
            @if ($categories->image)
              <div class="mt-2">
                <img src="{{asset('storage/' . $categories->image)}}" width="100" height="60" alt="Category Image">
              </div>
            @endif
            @error('image')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>


        <!-- <div class="panel">
            <div class="panel-header"><span class="panel-title">Settings</span></div>
            <div class="panel-body" style="display:flex;flex-direction:column;gap:14px;">
              <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                  <div style="font-size:13px;font-weight:500;">Active</div>
                  <div style="font-size:11px;color:var(--text-muted);">Show this category on the store</div>
                </div>
                <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                  <div style="font-size:13px;font-weight:500;">Featured</div>
                  <div style="font-size:11px;color:var(--text-muted);">Show on homepage featured section</div>
                </div>
                <label class="toggle-switch"><input type="checkbox" /><span class="toggle-slider"></span></label>
              </div>
              <div style="display:flex;align-items:center;justify-content:space-between;">
                <div>
                  <div style="font-size:13px;font-weight:500;">Show in menu</div>
                  <div style="font-size:11px;color:var(--text-muted);">Include in navigation menu</div>
                </div>
                <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
              </div>
            </div>
          </div> -->

        <div style="display:flex;gap:8px; margin: 16px 0;">
          <button class="btn btn-secondary" style="flex:1;justify-content:center;"
            onclick="navigate('categories',null)">Cancel</button>
          <button class="btn btn-primary" style="flex:1;justify-content:center;"
            onclick="submitCategoryForm()">CreateCategory</button>
        </div>
      </div>
    </form>
  </div>
  </div>

@endsection
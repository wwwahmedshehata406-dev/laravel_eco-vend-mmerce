@extends('layouts.app')

@section('contact')

  <div class="page" id="page-new-category">
    <div class="page-header"
      style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> <span style="cursor:pointer;text-decoration:underline;"
            onclick="navigate('categories',null)">Categories</span> <span>›</span> Update Category</div>
        <h1 class="page-title">UpdateCategory</h1>
        <p class="page-subtitle">Update product category.</p>
      </div>
      <div style="display:flex;gap:8px;">
        <button class="btn btn-secondary" onclick="navigate('categories',null)">Cancel</button>
        <button class="btn btn-primary" onclick="submitCategoryForm()">Update Category</button>
      </div>
    </div>

    <form action="{{ route('categories.update' ,  $categories->id) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="" style="align-items:start;">

        <div style="display:flex; flex-direction:column; gap:16px; justify-content: center;">
          <div class="panel">
            <div class="panel-header"><span class="panel-title">Category Details</span></div>
            <div class="panel-body">


              <div class="form-group">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" value="{{old('name',$categories->name)}}" class="form-control" id="cat-name" placeholder="e.g. Electronics"
                  required />
              </div>


              <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" id="cat-desc" rows="4" placeholder="Brief description of this category…">{{ $categories->description }}</textarea>
              </div>


              <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" id="status" class="form-control form-select">
                  <option value="">Category Status</option>
                  <option value="active" {{ old('status', $categories->status) == 'active' ? 'selected' : '' }}>
                    Active
                  </option>
                  <option value="archived" {{ old('status', $categories->status) == 'archived' ? 'selected' : '' }}>
                    Archived
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


            </div>
          </div>
        </div>

        <div class="panel" style="margin:16px 0 ;">
          <div class="panel-header"><span class="panel-title">Category Image</span></div>
          <div class="panel-body" style="display:flex; justify-content: center; flex-direction: column; align-items: center;>
            <div class="upload-area" onclick="document.getElementById('catImg').click()">
              <div class="upload-icon" >@if ($categories->image)
              <div class="mt-2 " >
                <img src="{{asset('storage/' . $categories->image)}}" width="100" height="60" alt="Category Image">
              </div>
            @endif
            @error('image')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

              <div style="font-size:14px;font-weight:500;margin-bottom:4px;">Upload category image</div>
              <div style="font-size:12px;color:var(--text-muted);">Recommended: 600×400px</div>
              <input type="file" id="catImg" style="display: none;" name="image" value="{{ $categories->image}}" accept="image/*" />
            </div>
            
          </div>
        </div>

        <div style="display:flex;gap:8px; margin: 16px 0;">
          <button class="btn btn-secondary" style="flex:1;justify-content:center;"
            onclick="navigate('categories',null)">Cancel</button>
          <button class="btn btn-primary" style="flex:1;justify-content:center;"
            onclick="submitCategoryForm()">CreateCategory</button>
        </div>

      </div>
    </form>
  </div>
@endsection
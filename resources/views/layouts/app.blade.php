

@include('inc.sideBar')
@include('inc.header')

@include('inc.topBar')

<!-- MAIN CONTENT -->
<main id="main">

@yield('contact')
  <!-- ==================== PRODUCTS ==================== -->

  <!-- ==================== NEW PRODUCT FORM ==================== -->

  <!-- ==================== CATEGORIES ==================== -->

  <!-- ==================== NEW CATEGORY FORM ==================== -->
  <!-- <div class="page" id="page-new-category">
    <div class="page-header" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> <span style="cursor:pointer;text-decoration:underline;" onclick="navigate('categories',null)">Categories</span> <span>›</span> New Category</div>
        <h1 class="page-title">Add New Category</h1>
        <p class="page-subtitle">Create a new product category.</p>
      </div>
      <div style="display:flex;gap:8px;">
        <button class="btn btn-secondary" onclick="navigate('categories',null)">Cancel</button>
        <button class="btn btn-primary" onclick="submitCategoryForm()">Create Category</button>
      </div>
    </div>

    <div class="grid-2" style="max-width:900px;align-items:start;">
      <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="panel">
          <div class="panel-header"><span class="panel-title">Category Details</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Category Name *</label>
              <input type="text" class="form-control" id="cat-name" placeholder="e.g. Electronics" required />
            </div>
            <div class="form-group">
              <label class="form-label">URL Slug *</label>
              <input type="text" class="form-control" id="cat-slug" placeholder="e.g. electronics" required />
              <div style="font-size:11px;color:var(--text-muted);margin-top:4px;">Auto-generated from name. Use lowercase letters, numbers and hyphens only.</div>
            </div>
            <div class="form-group">
              <label class="form-label">Description</label>
              <textarea class="form-control" id="cat-desc" rows="4" placeholder="Brief description of this category…"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Parent Category</label>
              <select class="form-control" id="cat-parent">
                <option value="">None (Top-level category)</option>
                <option>Electronics</option><option>Clothing</option><option>Home & Garden</option><option>Sports</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Display Order</label>
              <input type="number" class="form-control" placeholder="0" min="0" />
              <div style="font-size:11px;color:var(--text-muted);margin-top:4px;">Lower numbers appear first.</div>
            </div>
          </div>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="panel">
          <div class="panel-header"><span class="panel-title">Category Image</span></div>
          <div class="panel-body">
            <div class="upload-area" onclick="document.getElementById('catImg').click()">
              <div class="upload-icon">🖼</div>
              <div style="font-size:14px;font-weight:500;margin-bottom:4px;">Upload category image</div>
              <div style="font-size:12px;color:var(--text-muted);">Recommended: 600×400px</div>
              <input type="file" id="catImg" accept="image/*" style="display:none;" />
            </div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header"><span class="panel-title">Appearance</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Category Color</label>
              <div style="display:flex;align-items:center;gap:10px;">
                <input type="color" class="form-control" value="#1168a0" style="width:60px;height:40px;padding:4px;cursor:pointer;" id="cat-color" />
                <input type="text" class="form-control" value="#1168a0" style="font-family:'Space Mono',monospace;font-size:13px;" id="cat-color-text" oninput="syncColor(this)" />
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Icon / Emoji</label>
              <input type="text" class="form-control" placeholder="e.g. 🔌 or use an icon class" />
            </div>
          </div>
        </div>

        <div class="panel">
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
        </div>

        <div class="panel">
          <div class="panel-header"><span class="panel-title">SEO</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Meta Title</label>
              <input type="text" class="form-control" placeholder="SEO title (60 chars)" maxlength="60" />
            </div>
            <div class="form-group">
              <label class="form-label">Meta Description</label>
              <textarea class="form-control" rows="3" placeholder="SEO description (160 chars)" maxlength="160"></textarea>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:8px;">
          <button class="btn btn-secondary" style="flex:1;justify-content:center;" onclick="navigate('categories',null)">Cancel</button>
          <button class="btn btn-primary" style="flex:1;justify-content:center;" onclick="submitCategoryForm()">Create Category</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- ==================== CUSTOMERS ==================== -->
  <!-- <div class="page" id="page-customers">
    <div class="page-header" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> Customers</div>
        <h1 class="page-title">Customers</h1>
        <p class="page-subtitle">View and manage your customer base.</p>
      </div>
      <button class="btn btn-secondary btn-sm">Export CSV</button>
    </div>

    <div class="grid-4 mb-6">
      <div class="stat-card">
        <div class="stat-label">Total Customers</div>
        <div class="stat-value">5,834</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">New This Month</div>
        <div class="stat-value">+241</div>
        <div class="stat-delta delta-up">▲ 14% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Avg. Order Value</div>
        <div class="stat-value">$67.58</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Repeat Buyers</div>
        <div class="stat-value">68%</div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-header" style="flex-wrap:wrap;gap:10px;">
        <span class="panel-title">Customer List</span>
        <input type="text" class="form-control" placeholder="Search customers…" style="width:240px;padding:6px 12px;font-size:13px;" />
      </div>
      <div style="overflow-x:auto;">
        <table>
          <thead><tr><th>Customer</th><th>Email</th><th>Location</th><th>Orders</th><th>Total Spent</th><th>Joined</th><th>Status</th><th>Actions</th></tr></thead>
          <tbody id="customers-tbody"></tbody>
        </table>
      </div>
    </div>
  </div> -->

  <!-- ==================== ANALYTICS ==================== -->
  <!-- <div class="page" id="page-analytics">
    <div class="page-header">
      <div class="breadcrumb">Home <span>›</span> Analytics</div>
      <h1 class="page-title">Analytics</h1>
      <p class="page-subtitle">Insights and performance metrics for your store.</p>
    </div>

    <div class="grid-4 mb-6">
      <div class="stat-card">
        <div class="stat-label">Conversion Rate</div>
        <div class="stat-value">3.42%</div>
        <div class="stat-delta delta-up">▲ 0.12% this week</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Avg Session Duration</div>
        <div class="stat-value">4m 18s</div>
        <div class="stat-delta delta-up">▲ 22s vs last week</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Bounce Rate</div>
        <div class="stat-value">38.2%</div>
        <div class="stat-delta delta-down">▼ 2.1% (good)</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Cart Abandon Rate</div>
        <div class="stat-value">68.4%</div>
        <div class="stat-delta delta-down">▼ 1.3% vs last month</div>
      </div>
    </div>

    <div class="grid-2 mb-6">
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Monthly Revenue</span></div>
        <div class="panel-body">
          <div style="display:flex;align-items:flex-end;gap:6px;height:140px;margin-bottom:8px;">
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:52%;opacity:0.6;"></div><div style="font-size:8px;color:var(--text-muted);">Jan</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:60%;opacity:0.6;"></div><div style="font-size:8px;color:var(--text-muted);">Feb</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:45%;opacity:0.6;"></div><div style="font-size:8px;color:var(--text-muted);">Mar</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:70%;opacity:0.6;"></div><div style="font-size:8px;color:var(--text-muted);">Apr</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--neon);border-radius:3px 3px 0 0;width:100%;height:88%;box-shadow:var(--neon-glow);"></div><div style="font-size:8px;color:var(--neon);">May</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:62%;opacity:0.3;"></div><div style="font-size:8px;color:var(--text-muted);">Jun</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:30%;opacity:0.3;"></div><div style="font-size:8px;color:var(--text-muted);">Jul</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:20%;opacity:0.2;"></div><div style="font-size:8px;color:var(--text-muted);">Aug</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:15%;opacity:0.2;"></div><div style="font-size:8px;color:var(--text-muted);">Sep</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:10%;opacity:0.2;"></div><div style="font-size:8px;color:var(--text-muted);">Oct</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:8%;opacity:0.2;"></div><div style="font-size:8px;color:var(--text-muted);">Nov</div></div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;align-items:center;gap:4px;flex:1;"><div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:5%;opacity:0.2;"></div><div style="font-size:8px;color:var(--text-muted);">Dec</div></div>
          </div>
          <div style="text-align:right;font-size:12px;color:var(--text-muted);">YTD: <span class="accent-text mono">$284,720</span></div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header"><span class="panel-title">Traffic Sources</span></div>
        <div class="panel-body">
          <div style="display:flex;flex-direction:column;gap:12px;">
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:5px;font-size:13px;"><span>🔍 Organic Search</span><span class="mono">42%</span></div>
              <div class="progress-bar"><div class="progress-fill" style="width:42%;"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:5px;font-size:13px;"><span>📣 Social Media</span><span class="mono">28%</span></div>
              <div class="progress-bar"><div class="progress-fill" style="width:28%;background:linear-gradient(90deg,#1168a0,#5bb8ff)"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:5px;font-size:13px;"><span>📧 Email Campaigns</span><span class="mono">18%</span></div>
              <div class="progress-bar"><div class="progress-fill" style="width:18%;background:linear-gradient(90deg,#004d14,#00cc33)"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:5px;font-size:13px;"><span>💰 Paid Ads</span><span class="mono">12%</span></div>
              <div class="progress-bar"><div class="progress-fill" style="width:12%;background:linear-gradient(90deg,#6b3000,#ffbb33)"></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-header"><span class="panel-title">Top Selling Products</span></div>
      <div style="overflow-x:auto;">
        <table>
          <thead><tr><th>#</th><th>Product</th><th>Category</th><th>Units Sold</th><th>Revenue</th><th>Rating</th><th>Trend</th></tr></thead>
          <tbody>
            <tr><td class="mono accent-text">01</td><td style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">🎧</div><span>Pro Headphones X1</span></td><td>Electronics</td><td class="mono">1,248</td><td class="mono accent-text">$124,800</td><td>⭐ 4.9</td><td class="accent-text">▲ 18%</td></tr>
            <tr><td class="mono accent-text">02</td><td style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">⌚</div><span>Smart Watch Ultra</span></td><td>Electronics</td><td class="mono">984</td><td class="mono accent-text">$246,000</td><td>⭐ 4.8</td><td class="accent-text">▲ 12%</td></tr>
            <tr><td class="mono accent-text">03</td><td style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">🎮</div><span>Gaming Controller Pro</span></td><td>Electronics</td><td class="mono">820</td><td class="mono accent-text">$57,400</td><td>⭐ 4.7</td><td class="accent-text">▲ 9%</td></tr>
            <tr><td class="mono accent-text">04</td><td style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">👟</div><span>Trail Runner X9</span></td><td>Sports</td><td class="mono">640</td><td class="mono accent-text">$76,800</td><td>⭐ 4.6</td><td style="color:#ff6666;">▼ 3%</td></tr>
            <tr><td class="mono accent-text">05</td><td style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">🖥</div><span>4K Monitor Stand</span></td><td>Home & Garden</td><td class="mono">590</td><td class="mono accent-text">$47,200</td><td>⭐ 4.5</td><td class="accent-text">▲ 5%</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->

  <!-- ==================== COUPONS ==================== -->
  <!-- <div class="page" id="page-coupons">
    <div class="page-header" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> Coupons</div>
        <h1 class="page-title">Coupons</h1>
        <p class="page-subtitle">Manage discount codes and promotions.</p>
      </div>
    </div>

    <div class="grid-2" style="align-items:start;">
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Create Coupon</span></div>
        <div class="panel-body">
          <div class="form-group">
            <label class="form-label">Coupon Code *</label>
            <div style="display:flex;gap:8px;">
              <input type="text" class="form-control" id="coupon-code" placeholder="e.g. SUMMER20" style="text-transform:uppercase;font-family:'Space Mono',monospace;font-weight:700;letter-spacing:2px;" />
              <button class="btn btn-secondary btn-sm" onclick="genCode()">Generate</button>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Discount Type *</label>
            <select class="form-control" id="coupon-type" onchange="toggleCouponType()">
              <option value="percent">Percentage discount</option>
              <option value="fixed">Fixed cart discount</option>
              <option value="fixed_product">Fixed product discount</option>
              <option value="free_shipping">Free shipping</option>
            </select>
          </div>
          <div class="form-group" id="coupon-amount-group">
            <label class="form-label">Discount Amount *</label>
            <div style="position:relative;">
              <span id="coupon-symbol" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:14px;">%</span>
              <input type="number" class="form-control" placeholder="0" min="0" style="padding-left:28px;" />
            </div>
          </div>
          <div class="grid-2">
            <div class="form-group">
              <label class="form-label">Min Order Amount ($)</label>
              <input type="number" class="form-control" placeholder="0.00" min="0" step="0.01" />
            </div>
            <div class="form-group">
              <label class="form-label">Max Discount ($)</label>
              <input type="number" class="form-control" placeholder="No limit" min="0" step="0.01" />
            </div>
          </div>
          <div class="grid-2">
            <div class="form-group">
              <label class="form-label">Usage Limit</label>
              <input type="number" class="form-control" placeholder="Unlimited" min="1" />
            </div>
            <div class="form-group">
              <label class="form-label">Per User Limit</label>
              <input type="number" class="form-control" placeholder="Unlimited" min="1" />
            </div>
          </div>
          <div class="grid-2">
            <div class="form-group">
              <label class="form-label">Valid From</label>
              <input type="date" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label">Expires</label>
              <input type="date" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Apply To</label>
            <select class="form-control">
              <option>All products</option><option>Specific categories</option><option>Specific products</option>
            </select>
          </div>
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
            <label class="toggle-switch"><input type="checkbox" /><span class="toggle-slider"></span></label>
            <span style="font-size:13px;">First purchase only</span>
          </div>
          <button class="btn btn-primary" style="width:100%;justify-content:center;" onclick="submitCoupon()">Create Coupon</button>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header"><span class="panel-title">Active Coupons</span></div>
        <div style="overflow-x:auto;">
          <table>
            <thead><tr><th>Code</th><th>Type</th><th>Value</th><th>Used</th><th>Expires</th><th>Status</th><th></th></tr></thead>
            <tbody>
              <tr>
                <td class="mono" style="color:var(--neon);font-weight:700;">SUMMER20</td>
                <td>20% off</td><td class="mono">20%</td><td class="mono">142/500</td>
                <td class="muted">Jun 30, 2026</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
              <tr>
                <td class="mono" style="color:var(--neon);font-weight:700;">SAVE15</td>
                <td>Fixed $15</td><td class="mono">$15</td><td class="mono">67/200</td>
                <td class="muted">May 31, 2026</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
              <tr>
                <td class="mono" style="color:var(--text-muted);font-weight:700;">WINTER10</td>
                <td>10% off</td><td class="mono">10%</td><td class="mono">318/300</td>
                <td class="muted">Jan 31, 2026</td>
                <td><span class="badge badge-danger">Expired</span></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
              <tr>
                <td class="mono" style="color:var(--neon);font-weight:700;">FREESHIP</td>
                <td>Free Shipping</td><td class="mono">—</td><td class="mono">29/100</td>
                <td class="muted">Jul 15, 2026</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> -->

  <!-- ==================== REVIEWS ==================== -->
  <!-- <div class="page" id="page-reviews">
    <div class="page-header">
      <div class="breadcrumb">Home <span>›</span> Reviews</div>
      <h1 class="page-title">Reviews</h1>
      <p class="page-subtitle">Moderate customer product reviews.</p>
    </div>

    <div class="grid-4 mb-6">
      <div class="stat-card"><div class="stat-label">Total Reviews</div><div class="stat-value">4,821</div></div>
      <div class="stat-card"><div class="stat-label">Average Rating</div><div class="stat-value" style="color:var(--neon);">4.6 ⭐</div></div>
      <div class="stat-card"><div class="stat-label">Pending</div><div class="stat-value" style="color:#ffbb33;">18</div></div>
      <div class="stat-card"><div class="stat-label">Flagged</div><div class="stat-value" style="color:#ff6666;">3</div></div>
    </div>

    <div class="panel">
      <div class="panel-header" style="flex-wrap:wrap;gap:10px;">
        <span class="panel-title">All Reviews</span>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
          <select class="form-control" style="width:auto;padding:6px 12px;font-size:13px;">
            <option>All Ratings</option><option>5 ⭐</option><option>4 ⭐</option><option>3 ⭐</option><option>2 ⭐</option><option>1 ⭐</option>
          </select>
          <select class="form-control" style="width:auto;padding:6px 12px;font-size:13px;">
            <option>All Status</option><option>Approved</option><option>Pending</option><option>Flagged</option>
          </select>
        </div>
      </div>
      <div style="display:flex;flex-direction:column;">
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;flex-wrap:wrap;">
            <div>
              <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                <div class="avatar" style="width:32px;height:32px;font-size:11px;">SC</div>
                <span style="font-size:14px;font-weight:500;">Sarah Connor</span>
                <span style="color:#ffd700;">★★★★★</span>
                <span class="badge badge-success">Approved</span>
              </div>
              <div style="font-size:12px;color:var(--text-muted);margin-bottom:8px;">Re: Pro Headphones X1 · May 10, 2026</div>
              <p style="font-size:14px;color:var(--text-primary);">Absolutely incredible sound quality. The noise cancellation is best-in-class and the build quality feels premium. Worth every penny!</p>
            </div>
            <div style="display:flex;gap:6px;flex-shrink:0;">
              <button class="btn btn-secondary btn-sm">Approve</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
        <div style="padding:16px 20px;border-bottom:1px solid var(--border);">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;flex-wrap:wrap;">
            <div>
              <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                <div class="avatar" style="width:32px;height:32px;font-size:11px;">ML</div>
                <span style="font-size:14px;font-weight:500;">Marcus Lee</span>
                <span style="color:#ffd700;">★★★★</span><span style="color:var(--text-muted);">★</span>
                <span class="badge badge-warning">Pending</span>
              </div>
              <div style="font-size:12px;color:var(--text-muted);margin-bottom:8px;">Re: Smart Watch Ultra · May 9, 2026</div>
              <p style="font-size:14px;color:var(--text-primary);">Great watch overall. Battery life is excellent, but the strap could be more comfortable for long-term wear. App integration works seamlessly.</p>
            </div>
            <div style="display:flex;gap:6px;flex-shrink:0;">
              <button class="btn btn-primary btn-sm">Approve</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
        <div style="padding:16px 20px;">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;flex-wrap:wrap;">
            <div>
              <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                <div class="avatar" style="width:32px;height:32px;font-size:11px;">AP</div>
                <span style="font-size:14px;font-weight:500;">Aisha Patel</span>
                <span style="color:#ffd700;">★★★</span><span style="color:var(--text-muted);">★★</span>
                <span class="badge badge-danger">Flagged</span>
              </div>
              <div style="font-size:12px;color:var(--text-muted);margin-bottom:8px;">Re: Trail Runner X9 · May 8, 2026</div>
              <p style="font-size:14px;color:var(--text-primary);">Decent shoes but sizing runs small. Ordered my usual size and they were too tight. Customer service was helpful though.</p>
            </div>
            <div style="display:flex;gap:6px;flex-shrink:0;">
              <button class="btn btn-secondary btn-sm">Approve</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- ==================== SETTINGS ==================== -->
  <!-- <div class="page" id="page-settings">
    <div class="page-header">
      <div class="breadcrumb">Home <span>›</span> Settings</div>
      <h1 class="page-title">Settings</h1>
      <p class="page-subtitle">Configure your store settings and preferences.</p>
    </div>

    <div class="grid-2" style="align-items:start;">
      <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="panel">
          <div class="panel-header"><span class="panel-title">Store Information</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Store Name</label>
              <input type="text" class="form-control" value="NexCart Store" />
            </div>
            <div class="form-group">
              <label class="form-label">Store Email</label>
              <input type="email" class="form-control" value="hello@nexcart.io" />
            </div>
            <div class="form-group">
              <label class="form-label">Store Phone</label>
              <input type="tel" class="form-control" placeholder="+1 (555) 000-0000" />
            </div>
            <div class="form-group">
              <label class="form-label">Store Address</label>
              <textarea class="form-control" rows="3" placeholder="Enter store address…"></textarea>
            </div>
            <div class="grid-2">
              <div class="form-group">
                <label class="form-label">Country</label>
                <select class="form-control"><option>Egypt</option><option>United States</option><option>United Kingdom</option></select>
              </div>
              <div class="form-group">
                <label class="form-label">Currency</label>
                <select class="form-control"><option>USD ($)</option><option>EUR (€)</option><option>GBP (£)</option><option>EGP (£E)</option></select>
              </div>
            </div>
            <button class="btn btn-primary" onclick="showToast('Store settings saved!')">Save Changes</button>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header"><span class="panel-title">Payment Methods</span></div>
          <div class="panel-body" style="display:flex;flex-direction:column;gap:14px;">
            <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:rgba(0,77,20,0.15);border:1px solid rgba(0,204,51,0.1);border-radius:8px;">
              <div style="display:flex;align-items:center;gap:10px;">
                <span style="font-size:20px;">💳</span>
                <div><div style="font-size:13px;font-weight:500;">Stripe</div><div style="font-size:11px;color:var(--text-muted);">Credit/Debit Cards</div></div>
              </div>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:rgba(17,104,160,0.1);border:1px solid var(--border);border-radius:8px;">
              <div style="display:flex;align-items:center;gap:10px;">
                <span style="font-size:20px;">🅿</span>
                <div><div style="font-size:13px;font-weight:500;">PayPal</div><div style="font-size:11px;color:var(--text-muted);">PayPal &amp; Pay Later</div></div>
              </div>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;padding:12px;background:rgba(17,104,160,0.1);border:1px solid var(--border);border-radius:8px;">
              <div style="display:flex;align-items:center;gap:10px;">
                <span style="font-size:20px;">🏦</span>
                <div><div style="font-size:13px;font-weight:500;">Bank Transfer</div><div style="font-size:11px;color:var(--text-muted);">Manual bank payment</div></div>
              </div>
              <label class="toggle-switch"><input type="checkbox" /><span class="toggle-slider"></span></label>
            </div>
          </div>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="panel">
          <div class="panel-header"><span class="panel-title">Email Notifications</span></div>
          <div class="panel-body" style="display:flex;flex-direction:column;gap:14px;">
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">New order received</span>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">Order cancelled</span>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">Low stock alert</span>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">New customer registered</span>
              <label class="toggle-switch"><input type="checkbox" /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">Product review submitted</span>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;">
              <span style="font-size:13px;">Weekly sales report</span>
              <label class="toggle-switch"><input type="checkbox" checked /><span class="toggle-slider"></span></label>
            </div>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header"><span class="panel-title">Security</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Current Password</label>
              <input type="password" class="form-control" placeholder="••••••••" />
            </div>
            <div class="form-group">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control" placeholder="••••••••" />
            </div>
            <div class="form-group">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control" placeholder="••••••••" />
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
              <span style="font-size:13px;">Two-factor authentication</span>
              <label class="toggle-switch"><input type="checkbox" /><span class="toggle-slider"></span></label>
            </div>
            <button class="btn btn-primary" onclick="showToast('Password updated successfully!')">Update Password</button>
          </div>
        </div>

        <div class="panel">
          <div class="panel-header"><span class="panel-title">API Keys</span></div>
          <div class="panel-body">
            <div class="form-group">
              <label class="form-label">Public API Key</label>
              <div style="display:flex;gap:8px;">
                <input type="text" class="form-control mono" value="pk_live_4Xc9mN2sK8pQ7wR3" readonly style="font-size:12px;" />
                <button class="btn btn-secondary btn-sm" onclick="showToast('Copied to clipboard!')">Copy</button>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Secret API Key</label>
              <div style="display:flex;gap:8px;">
                <input type="password" class="form-control mono" value="sk_live_••••••••••••••••••••" readonly style="font-size:12px;" />
                <button class="btn btn-secondary btn-sm">Reveal</button>
              </div>
            </div>
            <button class="btn btn-danger btn-sm">Regenerate Keys</button>
          </div>
        </div>
      </div>
    </div>
  </div> -->

</main>

@include('inc.footer')
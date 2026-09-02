<!-- SIDEBAR -->
<aside id="sidebar">
  <div class="sidebar-header">
    <div class="logo-mark">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
        <path d="M3 10L10 3L17 10L10 17Z" fill="#00ff41" opacity="0.9"/>
        <circle cx="10" cy="10" r="3" fill="#004d14"/>
      </svg>
    </div>
    <span class="sidebar-logo-text">NexCart</span>
  </div>


  <div style="overflow-y:auto;flex:1;">
    <div class="sidebar-section-title">Main</div>
  
    <a href="">
    <div class="nav-item active" onclick="navigate('dashboard',this)">
      <span class="nav-icon">⬡</span>
        <span class="nav-label">Dashboard</span>
      </div>
    </a>

    <a href="{{ route('dashboard.orders.index') }}">
      <div class="nav-item" onclick="navigate('orders',this)">
        <span class="nav-icon">📦</span>
        <span class="nav-label">Orders</span>
        <span class="nav-badge">12</span>
      </div>
    </a>

    <a href="{{ route('dashboard.products.index') }}">
      <div class="nav-item" onclick="navigate('products',this)">
        <span class="nav-icon">🏷</span>
        <span class="nav-label">Products</span>
      </div>
    </a>
  
    <a href="{{ route('dashboard.categories.index') }}">
          <div class="nav-item" onclick="navigate('categories',this)">
      <span class="nav-icon">🗂</span>
      <span class="nav-label">Categories</span>
    </div>
    </a>

      <div class="nav-item" onclick="navigate('customers',this)">
        <span class="nav-icon">👥</span>
        <span class="nav-label">Customers</span>
      </div>

    <div class="sidebar-section-title">Commerce</div>
    <div class="nav-item" onclick="navigate('analytics',this)">
      <span class="nav-icon">📊</span>
      <span class="nav-label">Analytics</span>
    </div>
    <div class="nav-item" onclick="navigate('coupons',this)">
      <span class="nav-icon">🎟</span>
      <span class="nav-label">Coupons</span>
    </div>
    <div class="nav-item" onclick="navigate('reviews',this)">
      <span class="nav-icon">⭐</span>
      <span class="nav-label">Reviews</span>
    </div>

    <div class="sidebar-section-title">System</div>
    <div class="nav-item" onclick="navigate('settings',this)">
      <span class="nav-icon">⚙</span>
      <span class="nav-label">Settings</span>
    </div>
  </div>

  <div class="sidebar-bottom">
    <div class="nav-item" style="background:rgba(0,77,20,0.2);border:1px solid rgba(0,204,51,0.1);">
      <div style="width:28px;height:28px;border-radius:6px;background:var(--dark-green);border:1px solid var(--dim-green);display:flex;align-items:center;justify-content:center;font-size:11px;font-family:'Space Mono',monospace;color:var(--neon);flex-shrink:0;">AD</div>
      <div class="nav-label" style="flex:1;overflow:hidden;">
        <div style="font-size:13px;font-weight:600;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Admin User</div>
        <div style="font-size:11px;color:var(--text-muted);">Super Admin</div>
      </div>
    </div>
  </div>
</aside>


@extends('layouts.app')

@section('contact')
  <div class="page active" id="page-dashboard">
    <div class="page-header">
      <div class="breadcrumb">Home <span>›</span> Dashboard</div>
      <h1 class="page-title">Dashboard</h1>
      <p class="page-subtitle">Welcome back, Admin — here's what's happening today.</p>
    </div>

    <div class="grid-4 mb-6">
      <div class="stat-card">
        <div class="stat-icon">💰</div>
        <div class="stat-label">Total Revenue</div>
        <div class="stat-value">$84,290</div>
        <div class="stat-delta delta-up">▲ 12.4% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">📦</div>
        <div class="stat-label">Total Orders</div>
        <div class="stat-value">1,247</div>
        <div class="stat-delta delta-up">▲ 8.1% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-label">Customers</div>
        <div class="stat-value">5,834</div>
        <div class="stat-delta delta-up">▲ 3.7% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">🏷</div>
        <div class="stat-label">Products</div>
        <div class="stat-value">342</div>
        <div class="stat-delta delta-down">▼ 2 out of stock</div>
      </div>
    </div>

    <div class="grid-2 mb-6">
      <div class="panel">
        <div class="panel-header">
          <span class="panel-title">Revenue Overview</span>
          <select class="form-control" style="width:auto;padding:4px 10px;font-size:12px;">
            <option>Last 7 days</option><option>Last 30 days</option><option>This year</option>
          </select>
        </div>
        <div class="panel-body">
          <div style="display:flex;align-items:flex-end;gap:4px;height:120px;margin-bottom:8px;">
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;" title="Mon">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:40%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Mon</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:65%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Tue</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:50%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Wed</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:80%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Thu</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--neon);border-radius:3px 3px 0 0;width:100%;height:100%;box-shadow:var(--neon-glow);"></div>
              <div style="font-size:9px;color:var(--neon);">Fri</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:72%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Sat</div>
            </div>
            <div style="display:flex;flex-direction:column;justify-content:flex-end;gap:4px;align-items:center;flex:1;">
              <div style="background:var(--cyan);border-radius:3px 3px 0 0;width:100%;height:55%;opacity:0.7;"></div>
              <div style="font-size:9px;color:var(--text-muted);">Sun</div>
            </div>
          </div>
          <div style="display:flex;justify-content:space-between;font-size:12px;">
            <span class="muted">Week total:</span>
            <span class="accent-text mono">$18,472</span>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header"><span class="panel-title">Top Categories</span></div>
        <div class="panel-body">
          <div style="display:flex;flex-direction:column;gap:14px;">
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;font-size:13px;">
                <span>Electronics</span><span class="accent-text mono">$34,120</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:85%"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;font-size:13px;">
                <span>Clothing</span><span class="accent-text mono">$22,850</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:57%;background:linear-gradient(90deg,var(--cyan),#5bb8ff)"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;font-size:13px;">
                <span>Home & Garden</span><span class="accent-text mono">$15,320</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:38%;background:linear-gradient(90deg,#1168a0,#4499cc)"></div></div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;margin-bottom:6px;font-size:13px;">
                <span>Sports</span><span class="accent-text mono">$12,000</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:30%;background:linear-gradient(90deg,#004d14,#00cc33)"></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel mb-6">
      <div class="panel-header">
        <span class="panel-title">Recent Orders</span>
        <button class="btn btn-secondary btn-sm" onclick="navigate('orders', document.querySelector('[data-page=orders]'))">View all →</button>
      </div>
      <div style="overflow-x:auto;">
        <table>
          <thead><tr>
            <th>Order ID</th><th>Customer</th><th>Products</th><th>Total</th><th>Status</th><th>Date</th><th>Actions</th>
          </tr></thead>
          <tbody>
            <tr>
              <td class="mono" style="color:var(--cyan);">#ORD-1092</td>
              <td>Sarah Connor</td>
              <td>3 items</td>
              <td class="mono accent-text">$248.00</td>
              <td><span class="badge badge-success">Delivered</span></td>
              <td class="muted">May 10, 2026</td>
              <td><button class="btn btn-secondary btn-sm" onclick="navigate('orders',null)">View</button></td>
            </tr>
            <tr>
              <td class="mono" style="color:var(--cyan);">#ORD-1091</td>
              <td>Marcus Lee</td>
              <td>1 item</td>
              <td class="mono accent-text">$89.99</td>
              <td><span class="badge badge-info">Shipped</span></td>
              <td class="muted">May 9, 2026</td>
              <td><button class="btn btn-secondary btn-sm">View</button></td>
            </tr>
            <tr>
              <td class="mono" style="color:var(--cyan);">#ORD-1090</td>
              <td>Aisha Patel</td>
              <td>5 items</td>
              <td class="mono accent-text">$524.50</td>
              <td><span class="badge badge-warning">Processing</span></td>
              <td class="muted">May 9, 2026</td>
              <td><button class="btn btn-secondary btn-sm">View</button></td>
            </tr>
            <tr>
              <td class="mono" style="color:var(--cyan);">#ORD-1089</td>
              <td>Tom Rivera</td>
              <td>2 items</td>
              <td class="mono accent-text">$135.00</td>
              <td><span class="badge badge-danger">Cancelled</span></td>
              <td class="muted">May 8, 2026</td>
              <td><button class="btn btn-secondary btn-sm">View</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="grid-2">
      <div class="panel">
        <div class="panel-header"><span class="panel-title">Low Stock Alert</span></div>
        <div class="panel-body" style="display:flex;flex-direction:column;gap:10px;">
          <div style="display:flex;align-items:center;gap:12px;padding:10px;background:rgba(100,0,0,0.15);border:1px solid rgba(200,0,0,0.15);border-radius:8px;">
            <div class="product-thumb">🖱</div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:500;">Wireless Mouse Pro</div>
              <div style="font-size:11px;color:#ff6666;">Only 2 left in stock</div>
            </div>
            <button class="btn btn-secondary btn-sm">Restock</button>
          </div>
          <div style="display:flex;align-items:center;gap:12px;padding:10px;background:rgba(120,80,0,0.15);border:1px solid rgba(200,140,0,0.15);border-radius:8px;">
            <div class="product-thumb">🎧</div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:500;">Pro Headphones X1</div>
              <div style="font-size:11px;color:#ffbb33;">Only 5 left in stock</div>
            </div>
            <button class="btn btn-secondary btn-sm">Restock</button>
          </div>
          <div style="display:flex;align-items:center;gap:12px;padding:10px;background:rgba(120,80,0,0.15);border:1px solid rgba(200,140,0,0.15);border-radius:8px;">
            <div class="product-thumb">⌨</div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:500;">Mechanical Keyboard RGB</div>
              <div style="font-size:11px;color:#ffbb33;">Only 8 left in stock</div>
            </div>
            <button class="btn btn-secondary btn-sm">Restock</button>
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header"><span class="panel-title">Quick Actions</span></div>
        <div class="panel-body" style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
          <button class="btn btn-primary" style="justify-content:center;" onclick="navigate('new-product',null)">+ New Product</button>
          <button class="btn btn-secondary" style="justify-content:center;" onclick="navigate('new-category',null)">+ New Category</button>
          <button class="btn btn-secondary" style="justify-content:center;" onclick="navigate('orders',null)">View Orders</button>
          <button class="btn btn-secondary" style="justify-content:center;" onclick="navigate('analytics',null)">Analytics</button>
          <button class="btn btn-secondary" style="justify-content:center;" onclick="navigate('coupons',null)">Coupons</button>
          <button class="btn btn-secondary" style="justify-content:center;" onclick="navigate('settings',null)">Settings</button>
        </div>
      </div>
    </div>
  </div>
@endsection
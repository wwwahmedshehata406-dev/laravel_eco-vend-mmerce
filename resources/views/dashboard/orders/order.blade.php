@extends('layouts.app')

@section('contact')
  <div class="page" id="page-orders">
    <div class="page-header" style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
      <div>
        <div class="breadcrumb">Home <span>›</span> Orders</div>
        <h1 class="page-title">Orders</h1>
        <p class="page-subtitle">Manage and track all customer orders.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <select class="form-control" style="width:auto;padding:8px 12px;font-size:13px;">
          <option>All Status</option><option>Pending</option><option>Processing</option><option>Shipped</option><option>Delivered</option><option>Cancelled</option>
        </select>
        <input type="date" class="form-control" style="width:auto;padding:8px 12px;font-size:13px;" />
        <button class="btn btn-secondary btn-sm">Export CSV</button>
      </div>
    </div>

    <div class="grid-4 mb-6">
      <div class="stat-card">
        <div class="stat-label">Pending</div>
        <div class="stat-value" style="font-size:22px;color:#ffbb33;">24</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Processing</div>
        <div class="stat-value" style="font-size:22px;color:#5bb8ff;">38</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Shipped</div>
        <div class="stat-value" style="font-size:22px;color:var(--neon);">92</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Delivered</div>
        <div class="stat-value" style="font-size:22px;color:var(--dim-green);">1,093</div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-header" style="gap:12px;flex-wrap:wrap;">
        <span class="panel-title">All Orders</span>
        <div style="flex:1;max-width:280px;">
          <input type="text" class="form-control" placeholder="Search orders…" style="padding:6px 12px;font-size:13px;" />
        </div>
      </div>
      <div style="overflow-x:auto;">
        <table>
          <thead><tr>
            <th>Order ID</th><th>Customer</th><th>Email</th><th>Items</th><th>Total</th><th>Payment</th><th>Status</th><th>Date</th><th>Actions</th>
          </tr></thead>
          <tbody id="orders-tbody">
          </tbody>
        </table>
      </div>
      <div style="padding:16px 20px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
        <span class="muted" style="font-size:12px;">Showing 1–10 of 1,247 orders</span>
        <div class="pagination">
          <div class="page-btn">‹</div>
          <div class="page-btn active">1</div>
          <div class="page-btn">2</div>
          <div class="page-btn">3</div>
          <div class="page-btn">…</div>
          <div class="page-btn">125</div>
          <div class="page-btn">›</div>
        </div>
      </div>
    </div>
  </div>

@endsection


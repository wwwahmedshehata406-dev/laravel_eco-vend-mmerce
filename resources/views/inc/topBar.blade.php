<!-- TOPBAR -->
<header id="topbar">
  <div class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
      <rect y="2" width="16" height="1.5" rx="1" fill="currentColor"/>
      <rect y="7" width="16" height="1.5" rx="1" fill="currentColor"/>
      <rect y="12" width="16" height="1.5" rx="1" fill="currentColor"/>
    </svg>
  </div>
  <div class="topbar-search">
    <span class="search-icon">🔍</span>
    <input type="text" placeholder="Search products, orders, customers…" />
  </div>
  <div class="topbar-spacer"></div>
  <div class="topbar-actions">
    <div class="icon-btn" style="position:relative;" onclick="toggleNotif()">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
      <div class="notif-dot"></div>
      <div class="notif-panel" id="notifPanel">
        <div style="padding:12px 16px;border-bottom:1px solid var(--border);font-size:13px;font-weight:600;color:var(--text-primary);">Notifications</div>
        <div class="notif-item">
          <div class="notif-title">🟢 New order #ORD-1092 received</div>
          <div class="notif-time">2 minutes ago</div>
        </div>
        <div class="notif-item">
          <div class="notif-title">⚠ Low stock: Wireless Mouse Pro</div>
          <div class="notif-time">18 minutes ago</div>
        </div>
        <div class="notif-item">
          <div class="notif-title">⭐ New 5-star review submitted</div>
          <div class="notif-time">1 hour ago</div>
        </div>
        <div class="notif-item">
          <div class="notif-title">💰 Daily revenue target achieved</div>
          <div class="notif-time">3 hours ago</div>
        </div>
      </div>
    </div>
    <div class="avatar">AD</div>
  </div>
</header>

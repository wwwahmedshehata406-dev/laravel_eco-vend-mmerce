
// ======== SIDEBAR TOGGLE ========
let sidebarCollapsed = false;
function toggleSidebar() {
  const isMobile = window.innerWidth <= 768;
  if (isMobile) {
    document.getElementById('sidebar').classList.toggle('mobile-open');
    document.getElementById('overlay').classList.toggle('show');
  } else {
    sidebarCollapsed = !sidebarCollapsed;
    document.getElementById('sidebar').classList.toggle('collapsed', sidebarCollapsed);
    document.getElementById('topbar').classList.toggle('shifted', sidebarCollapsed);
    document.getElementById('main').classList.toggle('shifted', sidebarCollapsed);
  }
}
function closeMobileSidebar() {
  document.getElementById('sidebar').classList.remove('mobile-open');
  document.getElementById('overlay').classList.remove('show');
}

// ======== NAVIGATION ========
function navigate(pageId, navEl) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const target = document.getElementById('page-' + pageId);
  if (target) target.classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  if (navEl) navEl.classList.add('active');
  else {
    const map = { orders:'orders', products:'products', 'new-product':'products', categories:'categories', 'new-category':'categories', customers:'customers', analytics:'analytics', coupons:'coupons', reviews:'reviews', settings:'settings' };
    const target2 = map[pageId];
    document.querySelectorAll('.nav-item').forEach(n => {
      if (n.querySelector('.nav-label') && n.querySelector('.nav-label').textContent.toLowerCase() === (target2 || pageId).toLowerCase()) n.classList.add('active');
    });
  }
  closeMobileSidebar();
  window.scrollTo(0,0);
}

// ======== NOTIFICATIONS ========
function toggleNotif() {
  document.getElementById('notifPanel').classList.toggle('open');
}
document.addEventListener('click', e => {
  if (!e.target.closest('.icon-btn')) document.getElementById('notifPanel').classList.remove('open');
});

// ======== TOAST ========
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  t.style.transform = 'translateY(0)';
  t.style.opacity = '1';
  setTimeout(() => { t.style.transform = 'translateY(80px)'; t.style.opacity = '0'; }, 3000);
}

// ======== FORM SUBMISSIONS ========
function submitProductForm() {
  const name = document.getElementById('prod-name').value;
  const sku = document.getElementById('prod-sku').value;
  const price = document.getElementById('prod-price').value;
  const stock = document.getElementById('prod-stock').value;
  const cat = document.getElementById('prod-cat').value;
  if (!name || !sku || !price || !stock || !cat) {
    showToast('⚠ Please fill all required fields');
    return;
  }
  showToast('✓ Product "' + name + '" published successfully!');
  document.getElementById('prod-name').value = '';
  document.getElementById('prod-sku').value = '';
  document.getElementById('prod-price').value = '';
  document.getElementById('prod-stock').value = '';
  document.getElementById('prod-cat').value = '';
  document.getElementById('prod-desc').value = '';
  setTimeout(() => navigate('products', null), 1200);
}

function submitCategoryForm() {
  const name = document.getElementById('cat-name').value;
  const slug = document.getElementById('cat-slug').value;
  if (!name || !slug) {
    showToast('⚠ Please fill all required fields');
    return;
  }
  showToast('✓ Category "' + name + '" created!');
  document.getElementById('cat-name').value = '';
  document.getElementById('cat-slug').value = '';
  document.getElementById('cat-desc').value = '';
  setTimeout(() => navigate('categories', null), 1200);
}

function submitCoupon() {
  const code = document.getElementById('coupon-code').value;
  if (!code) { showToast('⚠ Please enter a coupon code'); return; }
  showToast('✓ Coupon ' + code.toUpperCase() + ' created!');
  document.getElementById('coupon-code').value = '';
}

// ======== IMAGE PREVIEW ========
function previewImages(event) {
  const preview = document.getElementById('imgPreview');
  preview.innerHTML = '';
  Array.from(event.target.files).slice(0, 6).forEach(file => {
    const reader = new FileReader();
    reader.onload = e => {
      const div = document.createElement('div');
      div.style.cssText = 'aspect-ratio:1;border-radius:6px;overflow:hidden;border:1px solid var(--border);position:relative;';
      div.innerHTML = '<img src="' + e.target.result + '" style="width:100%;height:100%;object-fit:cover;" /><div onclick="this.parentNode.remove()" style="position:absolute;top:4px;right:4px;width:20px;height:20px;border-radius:50%;background:rgba(200,0,0,0.7);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:10px;color:#fff;">✕</div>';
      preview.appendChild(div);
    };
    reader.readAsDataURL(file);
  });
}

// ======== COUPON HELPERS ========
function genCode() {
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  let code = '';
  for (let i = 0; i < 8; i++) code += chars[Math.floor(Math.random() * chars.length)];
  document.getElementById('coupon-code').value = code;
}
function toggleCouponType() {
  const type = document.getElementById('coupon-type').value;
  const sym = document.getElementById('coupon-symbol');
  const group = document.getElementById('coupon-amount-group');
  sym.textContent = type === 'percent' ? '%' : '$';
  group.style.display = type === 'free_shipping' ? 'none' : 'block';
}

// ======== AUTO SLUG ========
document.addEventListener('DOMContentLoaded', () => {
  const nameInput = document.getElementById('cat-name');
  const slugInput = document.getElementById('cat-slug');
  if (nameInput && slugInput) {
    nameInput.addEventListener('input', () => {
      slugInput.value = nameInput.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
    });
  }

  // Color sync
  const colInput = document.getElementById('cat-color');
  const colText = document.getElementById('cat-color-text');
  if (colInput && colText) {
    colInput.addEventListener('input', () => { colText.value = colInput.value; });
  }
});

function syncColor(el) {
  const c = document.getElementById('cat-color');
  if (c && /^#[0-9A-Fa-f]{6}$/.test(el.value)) c.value = el.value;
}

// ======== POPULATE TABLES ========
const orders = [
  ['#ORD-1092','Sarah Connor','sarah@email.com','3','$248.00','Card','Delivered','May 10, 2026'],
  ['#ORD-1091','Marcus Lee','marcus@email.com','1','$89.99','PayPal','Shipped','May 9, 2026'],
  ['#ORD-1090','Aisha Patel','aisha@email.com','5','$524.50','Card','Processing','May 9, 2026'],
  ['#ORD-1089','Tom Rivera','tom@email.com','2','$135.00','Card','Cancelled','May 8, 2026'],
  ['#ORD-1088','Yuki Tanaka','yuki@email.com','4','$312.00','Bank','Delivered','May 8, 2026'],
  ['#ORD-1087','Carlos Mendez','carlos@email.com','1','$49.99','PayPal','Delivered','May 7, 2026'],
  ['#ORD-1086','Emma Wilson','emma@email.com','7','$892.00','Card','Shipped','May 7, 2026'],
  ['#ORD-1085','David Kim','david@email.com','2','$178.50','Card','Processing','May 6, 2026'],
  ['#ORD-1084','Fatima Al-Zahra','fatima@email.com','3','$245.00','Card','Delivered','May 6, 2026'],
  ['#ORD-1083','James O\'Brien','james@email.com','1','$67.00','PayPal','Pending','May 5, 2026'],
];
const statusMap = { Delivered:'badge-success', Shipped:'badge-info', Processing:'badge-warning', Cancelled:'badge-danger', Pending:'badge-warning' };
const tbody = document.getElementById('orders-tbody');
if (tbody) orders.forEach(o => {
  tbody.innerHTML += `<tr>
    <td class="mono" style="color:var(--cyan);">${o[0]}</td>
    <td>${o[1]}</td><td class="muted" style="font-size:12px;">${o[2]}</td>
    <td class="mono">${o[3]}</td><td class="mono accent-text">${o[4]}</td>
    <td>${o[5]}</td>
    <td><span class="badge ${statusMap[o[6]]}">${o[6]}</span></td>
    <td class="muted" style="font-size:12px;">${o[7]}</td>
    <td><button class="btn btn-secondary btn-sm">View</button></td>
  </tr>`;
});

const products = [
  ['🎧','Pro Headphones X1','SKU-0001','Electronics','$99.99','124','Active','1,248'],
  ['⌚','Smart Watch Ultra','SKU-0002','Electronics','$249.99','56','Active','984'],
  ['🖱','Wireless Mouse Pro','SKU-0003','Electronics','$45.00','2','Active','620'],
  ['⌨','Mechanical Keyboard RGB','SKU-0004','Electronics','$89.99','8','Active','410'],
  ['🎮','Gaming Controller Pro','SKU-0005','Electronics','$69.99','43','Active','820'],
  ['👟','Trail Runner X9','SKU-0006','Sports','$120.00','30','Active','640'],
  ['🏠','Bamboo Desk Organizer','SKU-0007','Home & Garden','$34.99','98','Active','280'],
  ['📚','Learning React 5th Ed.','SKU-0008','Books','$29.99','200','Draft','—'],
  ['🧴','Premium Moisturizer SPF','SKU-0009','Clothing','$24.99','0','Out of Stock','190'],
  ['🎽','Performance Dry-Fit Tee','SKU-0010','Clothing','$19.99','74','Active','510'],
];
const ptbody = document.getElementById('products-tbody');
if (ptbody) products.forEach(p => {
  const stMap = { Active:'badge-success', Draft:'badge-warning', 'Out of Stock':'badge-danger' };
  ptbody.innerHTML += `<tr>
    <td><div style="display:flex;align-items:center;gap:10px;"><div class="product-thumb">${p[0]}</div><span style="font-weight:500;">${p[1]}</span></div></td>
    <td class="mono muted" style="font-size:12px;">${p[2]}</td>
    <td>${p[3]}</td>
    <td class="mono accent-text">${p[4]}</td>
    <td class="mono ${parseInt(p[5]) <= 5 ? 'style="color:#ff6666;"' : ''}">${p[5]}</td>
    <td><span class="badge ${stMap[p[6]]}">${p[6]}</span></td>
    <td class="mono">${p[7]}</td>
    <td><div style="display:flex;gap:4px;"><button class="btn btn-secondary btn-sm">Edit</button><button class="btn btn-danger btn-sm">Del</button></div></td>
  </tr>`;
});

const customers = [
  ['Sarah Connor','sarah@email.com','Cairo, EG','12','$1,240','Jan 2025'],
  ['Marcus Lee','marcus@email.com','New York, US','8','$892','Mar 2025'],
  ['Aisha Patel','aisha@email.com','London, UK','24','$3,120','Nov 2024'],
  ['Tom Rivera','tom@email.com','Madrid, ES','3','$215','Apr 2026'],
  ['Yuki Tanaka','yuki@email.com','Tokyo, JP','18','$2,450','Sep 2024'],
  ['Carlos Mendez','carlos@email.com','Mexico City, MX','5','$380','Feb 2026'],
  ['Emma Wilson','emma@email.com','Sydney, AU','31','$4,850','Aug 2024'],
  ['David Kim','david@email.com','Seoul, KR','9','$760','Dec 2024'],
];
const ctbody = document.getElementById('customers-tbody');
if (ctbody) customers.forEach(c => {
  const initials = c[0].split(' ').map(w=>w[0]).join('');
  ctbody.innerHTML += `<tr>
    <td><div style="display:flex;align-items:center;gap:10px;"><div class="avatar" style="width:32px;height:32px;font-size:11px;">${initials}</div><span style="font-weight:500;">${c[0]}</span></div></td>
    <td class="muted" style="font-size:12px;">${c[1]}</td>
    <td class="muted">${c[2]}</td>
    <td class="mono">${c[3]}</td>
    <td class="mono accent-text">${c[4]}</td>
    <td class="muted">${c[5]}</td>
    <td><span class="badge badge-success">Active</span></td>
    <td><button class="btn btn-secondary btn-sm">View</button></td>
  </tr>`;
});

const cats = [
  ['Electronics','🔌','#1168a0',128,'Active'],
  ['Clothing','👗','#004d14',94,'Active'],
  ['Home & Garden','🏠','#00cc33',62,'Active'],
  ['Sports','⚽','#0a2035',48,'Active'],
  ['Books','📚','#1168a0',31,'Draft'],
  ['Toys','🧸','#00ff41',22,'Active'],
];
const cattbody = document.getElementById('categories-tbody');
const catTree = document.getElementById('cat-tree');
if (cattbody) cats.forEach(c => {
  cattbody.innerHTML += `<tr>
    <td><div style="display:flex;align-items:center;gap:10px;"><div class="cat-color" style="background:${c[2]};"></div><span>${c[1]} ${c[0]}</span></div></td>
    <td class="mono">${c[3]}</td>
    <td><span class="badge ${c[4]==='Active'?'badge-success':'badge-warning'}">${c[4]}</span></td>
    <td><div style="display:flex;gap:4px;"><button class="btn btn-secondary btn-sm" onclick="navigate('new-category',null)">Edit</button><button class="btn btn-danger btn-sm">Del</button></div></td>
  </tr>`;
});
if (catTree) {
  catTree.innerHTML = cats.map(c => `
    <div style="display:flex;align-items:center;gap:8px;padding:8px 10px;border-radius:6px;margin-bottom:4px;background:rgba(17,104,160,0.08);border-left:3px solid ${c[2]};">
      <span style="font-size:18px;">${c[1]}</span>
      <span style="font-size:13px;font-weight:500;flex:1;">${c[0]}</span>
      <span class="mono muted" style="font-size:11px;">${c[3]} products</span>
    </div>
  `).join('');
}

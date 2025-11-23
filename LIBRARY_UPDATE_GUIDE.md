# 📚 Library Update Guide - PPID Kabupaten Sumedang

**Last Updated:** 2025-11-23
**Purpose:** Manual update guide for vulnerable JavaScript/PHP libraries

---

## ⚠️ **CRITICAL UPDATES REQUIRED**

The following libraries have known security vulnerabilities (CVEs) and **MUST** be updated:

---

## 1. 🔴 **jQuery v2.1.4 → v3.7.1** (CRITICAL)

### Current Status:
- **Location:** `inverse/plugins/bower_components/jquery/dist/`
- **Current Version:** 2.1.4 (Released 2015)
- **Target Version:** 3.7.1 (Latest stable)

### Known Vulnerabilities:
- **CVE-2015-9251:** XSS via `$.ajax()`
- **CVE-2019-11358:** Prototype pollution
- **CVE-2020-11022:** XSS via HTML manipulation
- **CVE-2020-11023:** XSS in htmlPrefilter

### Update Steps:

#### Option A: Download & Replace (Recommended)
```bash
# 1. Download jQuery 3.7.1
wget https://code.jquery.com/jquery-3.7.1.min.js -O inverse/plugins/bower_components/jquery/dist/jquery.min.js
wget https://code.jquery.com/jquery-3.7.1.min.map -O inverse/plugins/bower_components/jquery/dist/jquery.min.map
wget https://code.jquery.com/jquery-3.7.1.js -O inverse/plugins/bower_components/jquery/dist/jquery.js

# 2. Verify file sizes
ls -lh inverse/plugins/bower_components/jquery/dist/

# 3. Test website functionality
# - Test admin panel
# - Test DataTables
# - Test modals/popups
# - Test AJAX forms
```

#### Option B: Use CDN (Easier but requires internet)
Replace in `application/views/dev/admin/partials/head.php`:
```html
<!-- OLD (vulnerable) -->
<script src="<?= base_url()?>inverse/plugins/bower_components/jquery/dist/jquery.min.js"></script>

<!-- NEW (secure) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
```

### Testing Checklist:
- [ ] Admin login works
- [ ] DataTables load correctly
- [ ] Modal popups work
- [ ] AJAX form submissions work
- [ ] File upload interface works
- [ ] No JavaScript console errors

---

## 2. 🔴 **Bootstrap v3.3.6 → v4.6.2** (HIGH)

### Current Status:
- **Location:** `inverse/bootstrap/dist/`
- **Current Version:** 3.3.6 (Released 2015)
- **Target Version:** 4.6.2 (Bootstrap 4 - easier migration than v5)

### Known Vulnerabilities:
- **CVE-2016-10735:** XSS in data-target
- **CVE-2018-14040:** XSS in Collapse component
- **CVE-2018-14041:** XSS in tooltip/popover
- **CVE-2018-14042:** XSS in data-container

### Update Steps:

#### ⚠️ WARNING: Bootstrap 4 is NOT backward compatible!

**Before upgrading, you MUST:**
1. Read migration guide: https://getbootstrap.com/docs/4.6/migration/
2. Update HTML classes (`.panel` → `.card`, `.btn-default` → `.btn-secondary`, etc.)
3. Update JavaScript event names
4. Test ALL pages thoroughly

#### Quick Update (Use CDN):
```html
<!-- In application/views/dev/admin/partials/head.php -->

<!-- OLD Bootstrap 3 -->
<link href="<?= base_url()?>inverse/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- NEW Bootstrap 4.6.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- OLD Bootstrap 3 JS -->
<script src="<?= base_url()?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- NEW Bootstrap 4.6.2 JS (requires jQuery first) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
```

### Major Breaking Changes:
| Bootstrap 3 | Bootstrap 4 |
|-------------|-------------|
| `.panel` | `.card` |
| `.panel-heading` | `.card-header` |
| `.panel-body` | `.card-body` |
| `.panel-footer` | `.card-footer` |
| `.btn-default` | `.btn-secondary` |
| `.label` | `.badge` |
| `.pull-left` | `.float-left` |
| `.pull-right` | `.float-right` |
| `.navbar-default` | `.navbar-light` |
| `.hidden-xs` | `.d-none .d-sm-block` |

### Testing Checklist:
- [ ] Layout not broken on all pages
- [ ] Navigation menus work
- [ ] Buttons styled correctly
- [ ] Forms render properly
- [ ] Modals/dialogs work
- [ ] Responsive design works on mobile
- [ ] Admin panel layout intact
- [ ] Public pages layout intact

---

## 3. 🟡 **CodeIgniter v3.1.10 → v3.1.13** (HIGH)

### Current Status:
- **Location:** `system/` folder
- **Current Version:** 3.1.10 (Released 2019)
- **Target Version:** 3.1.13 (Latest 3.x)

### Known Issues:
- **CVE-2020-7799:** SQL Injection in Query Builder
- Missing security patches
- Framework is End-of-Life (last update 2019)

### Update Steps:

```bash
# 1. Backup current system folder
cp -r system system.backup.3.1.10

# 2. Download CodeIgniter 3.1.13
wget https://github.com/bcit-ci/CodeIgniter/archive/3.1.13.zip
unzip 3.1.13.zip

# 3. Replace system folder
rm -rf system
cp -r CodeIgniter-3.1.13/system ./

# 4. Copy index.php (check for changes)
diff index.php CodeIgniter-3.1.13/index.php
# If different, merge changes carefully

# 5. Test application
# Navigate to website and test all functionality
```

### Testing Checklist:
- [ ] Homepage loads without errors
- [ ] Admin login works
- [ ] Database queries work
- [ ] Forms submit correctly
- [ ] File uploads work
- [ ] Session management works
- [ ] No PHP errors in logs

---

## 4. 🟡 **DataTables v1.10.10 → v1.13.8** (MEDIUM)

### Current Status:
- **Location:** `inverse/plugins/bower_components/datatables/`
- **Current Version:** 1.10.10 (Released 2015)
- **Target Version:** 1.13.8

### Update Steps:

#### Use CDN (Recommended):
```html
<!-- In application/views/dev/admin/partials/js.php -->

<!-- OLD (local file) -->
<script src="<?= base_url()?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>

<!-- NEW (CDN - latest) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
```

### Testing Checklist:
- [ ] DataTables render on admin pages
- [ ] Sorting works
- [ ] Searching works
- [ ] Pagination works
- [ ] Export buttons (PDF, Excel, CSV) work
- [ ] No JavaScript errors

---

## 5. 🟢 **Dropzone v4.3.0 → v5.9.3** (LOW)

### Current Status:
- **Location:** `inverse/plugins/bower_components/dropzone-master/`
- **Current Version:** 4.3.0 (Released 2017)
- **Target Version:** 5.9.3

### Update Steps:

```bash
# Download latest Dropzone
wget https://github.com/dropzone/dropzone/releases/download/v5.9.3/dist.zip
unzip dist.zip -d dropzone-5.9.3

# Replace files
cp dropzone-5.9.3/dropzone.min.js inverse/plugins/bower_components/dropzone-master/dist/
cp dropzone-5.9.3/dropzone.min.css inverse/plugins/bower_components/dropzone-master/dist/
```

---

## ✅ **Already Fixed** (No Action Needed)

- ✅ **SSL Verification:** Enabled (fixed in commit 75f76021)
- ✅ **Path Traversal:** Fixed with validation (commit 75f76021)
- ✅ **Upload Folder Protection:** .htaccess added (commit 75f76021)
- ✅ **CSP Headers:** Added to .htaccess (commit 75f76021)
- ✅ **Encryption Key:** Generated (commit 75f76021)
- ✅ **rawgit.com CDN:** Replaced with jsdelivr.net (commit 74c84319)

---

## 📊 **Priority Order**

Execute updates in this order:

1. **CRITICAL (Do First):**
   - [ ] jQuery 2.1.4 → 3.7.1
   - [ ] CodeIgniter 3.1.10 → 3.1.13

2. **HIGH (Do Soon):**
   - [ ] Bootstrap 3.3.6 → 4.6.2 (requires UI testing)
   - [ ] DataTables 1.10.10 → 1.13.8

3. **MEDIUM (Do When Possible):**
   - [ ] Dropzone 4.3.0 → 5.9.3

---

## 🧪 **Testing Workflow**

After each update:

1. **Clear Browser Cache:** `Ctrl+Shift+R` (hard reload)
2. **Check Browser Console:** F12 → Console (look for errors)
3. **Test Core Functionality:**
   - Login/logout
   - Form submissions
   - DataTables on all admin pages
   - File uploads
   - PDF exports
4. **Test All Pages:**
   - Public homepage
   - All admin pages
   - Permohonan forms
   - Keberatan forms
   - DIP management
5. **Check Application Logs:** `application/logs/log-YYYY-MM-DD.php`

---

## 🔄 **Rollback Plan**

If updates break the application:

```bash
# Rollback jQuery
git checkout HEAD^ -- inverse/plugins/bower_components/jquery/

# Rollback Bootstrap
git checkout HEAD^ -- inverse/bootstrap/

# Rollback CodeIgniter
rm -rf system
mv system.backup.3.1.10 system

# Restart web server
sudo systemctl restart apache2  # or nginx/httpd
```

---

## 📝 **Notes**

- **Backup first:** Always backup before updating
- **Test in staging:** Update dev environment first, then production
- **One at a time:** Update one library at a time to isolate issues
- **Document changes:** Keep notes on what breaks and fixes

---

## 🆘 **Support**

If you encounter issues:

1. Check browser console for JavaScript errors
2. Check `application/logs/` for PHP errors
3. Verify file paths and CDN URLs
4. Test with browser cache disabled
5. Revert to previous version if needed

---

**END OF GUIDE**

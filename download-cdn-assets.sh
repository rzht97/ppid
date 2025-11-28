#!/bin/bash
# Script untuk download semua CDN assets ke local
# Jalankan di server: bash download-cdn-assets.sh

# Warna untuk output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo "========================================="
echo "📥 Downloading CDN Assets to Local"
echo "========================================="
echo ""

# Pastikan berada di root folder aplikasi
if [ ! -f "index.php" ]; then
    echo "❌ Error: Jalankan script ini dari root folder aplikasi!"
    echo "   cd /var/www/html/ppid"
    exit 1
fi

# Buat folder vendor
echo "📁 Creating vendor directories..."
mkdir -p assets/vendor/bootstrap/{css,js}
mkdir -p assets/vendor/datatables/{css,js}
mkdir -p assets/vendor/jquery/js
mkdir -p assets/vendor/pdfmake/js
mkdir -p assets/vendor/jszip/js
mkdir -p assets/vendor/js-cookie/js

echo -e "${GREEN}✅ Directories created${NC}"
echo ""

# Download Bootstrap
echo "📥 Downloading Bootstrap 4.6.2..."
curl -sL "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" \
     -o assets/vendor/bootstrap/css/bootstrap.min.css
curl -sL "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" \
     -o assets/vendor/bootstrap/js/bootstrap.bundle.min.js
echo -e "${GREEN}✅ Bootstrap downloaded${NC}"

# Download Popper.js
echo "📥 Downloading Popper.js 2.11.8..."
curl -sL "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" \
     -o assets/vendor/bootstrap/js/popper.min.js
echo -e "${GREEN}✅ Popper.js downloaded${NC}"

# Download jQuery
echo "📥 Downloading jQuery 3.7.1..."
curl -sL "https://code.jquery.com/jquery-3.7.1.min.js" \
     -o assets/vendor/jquery/js/jquery-3.7.1.min.js
echo -e "${GREEN}✅ jQuery downloaded${NC}"

# Download DataTables CSS
echo "📥 Downloading DataTables CSS..."
curl -sL "https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css" \
     -o assets/vendor/datatables/css/jquery.dataTables.min.css
curl -sL "https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" \
     -o assets/vendor/datatables/css/buttons.dataTables.min.css
echo -e "${GREEN}✅ DataTables CSS downloaded${NC}"

# Download DataTables JS
echo "📥 Downloading DataTables JS..."
curl -sL "https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js" \
     -o assets/vendor/datatables/js/jquery.dataTables.min.js
curl -sL "https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" \
     -o assets/vendor/datatables/js/dataTables.buttons.min.js
curl -sL "https://cdn.datatables.net/buttons/2.4.2/js/buttons.flash.min.js" \
     -o assets/vendor/datatables/js/buttons.flash.min.js
curl -sL "https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" \
     -o assets/vendor/datatables/js/buttons.html5.min.js
curl -sL "https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" \
     -o assets/vendor/datatables/js/buttons.print.min.js
echo -e "${GREEN}✅ DataTables JS downloaded${NC}"

# Download JSZip
echo "📥 Downloading JSZip 3.10.1..."
curl -sL "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" \
     -o assets/vendor/jszip/js/jszip.min.js
echo -e "${GREEN}✅ JSZip downloaded${NC}"

# Download PDFMake
echo "📥 Downloading PDFMake 0.2.7..."
curl -sL "https://cdn.jsdelivr.net/npm/pdfmake@0.2.7/build/pdfmake.min.js" \
     -o assets/vendor/pdfmake/js/pdfmake.min.js
curl -sL "https://cdn.jsdelivr.net/npm/pdfmake@0.2.7/build/vfs_fonts.js" \
     -o assets/vendor/pdfmake/js/vfs_fonts.js
echo -e "${GREEN}✅ PDFMake downloaded${NC}"

# Download js-cookie
echo "📥 Downloading js-cookie 2.1.2..."
curl -sL "https://cdn.jsdelivr.net/npm/js-cookie@2.1.2/src/js.cookie.min.js" \
     -o assets/vendor/js-cookie/js/js.cookie.min.js
echo -e "${GREEN}✅ js-cookie downloaded${NC}"

echo ""
echo "========================================="
echo -e "${GREEN}✅ All CDN assets downloaded!${NC}"
echo "========================================="
echo ""
echo "📋 Downloaded files:"
echo "  - Bootstrap 4.6.2 (CSS + JS)"
echo "  - jQuery 3.7.1"
echo "  - Popper.js 2.11.8"
echo "  - DataTables 1.13.8 (CSS + JS + Buttons)"
echo "  - JSZip 3.10.1"
echo "  - PDFMake 0.2.7"
echo ""
echo "📁 Location: assets/vendor/"
echo ""
echo "⚠️  Next steps:"
echo "   1. Update view files to use local assets"
echo "   2. Test semua halaman (admin dan public)"
echo "   3. Remove CDN references dari CSP jika tidak diperlukan"
echo ""

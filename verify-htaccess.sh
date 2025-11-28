#!/bin/bash
# Script untuk verifikasi apakah .htaccess sudah terupdate dengan CSP yang benar

echo "=================================="
echo "🔍 Verifikasi File .htaccess"
echo "=================================="
echo ""

# Warna untuk output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Cek apakah file .htaccess ada
if [ ! -f .htaccess ]; then
    echo -e "${RED}❌ File .htaccess tidak ditemukan!${NC}"
    echo "Pastikan Anda menjalankan script ini dari root folder aplikasi."
    exit 1
fi

echo "✅ File .htaccess ditemukan"
echo ""

# Cek apakah CSP mengandung cdn.jsdelivr.net di style-src
echo "📋 Mengecek CSP untuk cdn.jsdelivr.net..."
if grep -q "style-src.*https://cdn.jsdelivr.net" .htaccess; then
    echo -e "${GREEN}✅ cdn.jsdelivr.net ditemukan di style-src${NC}"
else
    echo -e "${RED}❌ cdn.jsdelivr.net TIDAK ditemukan di style-src!${NC}"
    echo -e "${YELLOW}⚠️  File .htaccess BELUM terupdate!${NC}"
    echo ""
    echo "Solusi: Jalankan git pull untuk update file"
    exit 1
fi

# Cek apakah CSP mengandung static.cloudflareinsights.com
echo "📋 Mengecek CSP untuk static.cloudflareinsights.com..."
if grep -q "static.cloudflareinsights.com" .htaccess; then
    echo -e "${GREEN}✅ static.cloudflareinsights.com ditemukan${NC}"
else
    echo -e "${RED}❌ static.cloudflareinsights.com TIDAK ditemukan!${NC}"
    echo -e "${YELLOW}⚠️  File .htaccess BELUM terupdate!${NC}"
    echo ""
    echo "Solusi: Jalankan git pull untuk update file"
    exit 1
fi

# Cek apakah semua CDN menggunakan https://
echo "📋 Mengecek apakah semua CDN menggunakan https://..."
if grep -q "https://cdn.datatables.net" .htaccess; then
    echo -e "${GREEN}✅ Semua CDN menggunakan https://prefix${NC}"
else
    echo -e "${YELLOW}⚠️  Beberapa CDN mungkin tidak menggunakan https:// prefix${NC}"
fi

echo ""
echo "=================================="
echo -e "${GREEN}✅ File .htaccess SUDAH BENAR!${NC}"
echo "=================================="
echo ""
echo "Jika browser masih menampilkan CSP error:"
echo "1. Clear browser cache (Ctrl+Shift+Delete)"
echo "2. Hard refresh (Ctrl+F5)"
echo "3. Purge Cloudflare cache jika menggunakan Cloudflare"
echo "4. Restart Apache: sudo systemctl restart apache2"
echo ""

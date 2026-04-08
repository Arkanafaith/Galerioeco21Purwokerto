g # Testing Checklist - Galeri Eco 21 Admin & Frontend

✅ **Server running:** http://127.0.0.1:8000  
✅ **Fixed:** AdminReviewController created  

## 1. Admin Login & Navigation
- [ ] Buka http://127.0.0.1:8000/admin/login  
- [ ] Login: `admin` / `eco21` → Dashboard muncul?  
- [ ] Sidebar: Klik semua menu (Dashboard, Produk, Ulasan, Konten, Sosmed, Settings) → Load tanpa error?  
- [ ] Topbar Logout → Kembali ke login?  

## 2. Dashboard
- [ ] Stat cards: Total Produk / Pengunjung / Rating → Angka masuk akal?  
- [ ] Greeting berdasarkan waktu (Pagi/Siang/Sore/Malam)?  
- [ ] Quick actions & Recent Products → Link jalan?  

## 3. Produk (Full CRUD)
- [ ] Index: List produk, pagination, filter All/Best?  
- [ ] Add Product: Klik "Add" → Form → Upload foto → Centang "Best" → Save → Berhasil & muncul di list?  
- [ ] Edit: Klik Edit → Ubah harga/nama/link Tokopedia → Ganti foto → Save → Update sukses?  
- [ ] Delete: Klik Delete → Konfirm → Hilang dari list?  
- [ ] Filter Best: Switch filter → Hanya best muncul?  

## 4. Ulasan (Review Management)
- [ ] Index: List review, filter Status (Semua/Tampil/Sembunyi)/Produk?  
- [ ] Hide: Klik "Sembunyikan" → Status berubah ✕?  
- [ ] Show: Klik "Tampilkan" → Status berubah ✓?  
- [ ] Delete: Klik "Hapus" → Konfirm → Hilang permanen?  
- [ ] Pagination & search → Works?  

## 5. Kelola Konten
- [ ] Index: List sections/konten → Tombol Edit muncul?  
- [ ] Edit: Klik Edit → Ubah teks → Save → Update di homepage?  
- [ ] Edit Image: Upload gambar baru → Preview update?  

## 6. Media Sosial
- [ ] Settings/Social: Form link WA/Tokopedia/Tiktok/etc → Ubah → Save → Update di footer homepage?  

## 7. Pengaturan Admin
- [ ] Settings: Ganti username/new password → Save → Logout → Login baru works?  

## 8. Frontend Features
- [ ] Homepage: http://127.0.0.1:8000/ → Produk load, pagination klik → Next page?  
- [ ] Product detail: Klik produk → Reviews muncul? Qty +/- → Total harga update? Whatsapp link benar?  
- [ ] Submit Review: Isi form → Submit → Muncul di product page (visible)?  
- [ ] Top products (best) di hero → Muncul?  

## Error Logs
- [ ] Buka terminal lain: `cd galeroleh-oleheco21-main && tail -f storage/logs/laravel.log`  
- [ ] Test sambil pantau error → Copy paste kalo ada  

**Report balik:** Centang yang ✅ jalan, ❌ error + screenshot/deskripsi!**


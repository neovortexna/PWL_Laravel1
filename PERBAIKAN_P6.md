# Perbaikan P6 SIM-Surat

1. migration baru `2026_11_25_000001_ensure_columns_on_outgoing_letters.php` (menambah category_id & lampiran
   di outgoing_letters hanya jika belum ada) -> memperbaiki error "Unknown column 'category_id'".
2. `surat-keluar/create.blade.php`: typo `<<form` diperbaiki menjadi `<form`.
3. `.env`: `DB_PORT=3306ar` -> `3306`.
4. Controller: `withQueryString()` -> `appends($request->query())`; `update()` membersihkan file baru jika simpan gagal.
5. `public/hot` dihapus (agar tidak memaksa memuat Vite dev server yang tidak aktif).

## Cara pakai (salin ke folder C:\laragon\www\laravel1, timpa file yang sama)
    composer install        (jika folder vendor belum ada)
    php artisan config:clear
    php artisan migrate     (JANGAN migrate:fresh)
    php artisan db:seed --class=CategorySeeder   (jika kategori masih kosong)
    php artisan storage:link  (jika belum ada)
    php artisan view:clear
    npm run dev   (atau npm run build)

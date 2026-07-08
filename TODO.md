# TODO - Products CRUD (admin)

## Step 0: Khảo sát
- [x] Đọc ProductController, routes/web.php, view product-list/add/edit/detail
- [x] Đọc migration products và ProductSeeder

## Step 1: Sửa routes để hỗ trợ CRUD theo id
- [x] Cập nhật routes/web.php:
  - [x] GET  /admin/products/edit/{id}
  - [x] PUT  /admin/products/update/{id}
  - [x] DELETE /admin/products/delete/{id}
  - [x] POST /admin/products/create
  - [x] GET  /admin/products/detail/{id}

## Step 2: Cập nhật ProductController
- [x] Thêm validate + create/update/delete
- [x] Thay productList() để load products từ DB
- [x] Thay productEdit/productDetail để nhận id và load model

## Step 3: Cập nhật Model Product
- [ ] Kiểm tra quan hệ category
- [ ] Thêm $fillable cho name/price/stock/categoryId

## Step 4: Cập nhật views đúng “format dashboard”
- [ ] resources/views/admin/product/product-list.blade.php
  - [x] Replace data cứng bằng @foreach
  - [ ] Gắn link View/Edit/Trash vào route thật
- [x] resources/views/admin/product/product-add.blade.php
  - [x] Tạo form create (CSRF + inputs + select category)
- [x] resources/views/admin/product/product-edit.blade.php
  - [x] Tạo form update (PUT + prefill + select category)
- [x] resources/views/admin/product/product-detail.blade.php
  - [x] Render thông tin product thật

## Step 5: Test 
- [ ] Migrate/seed nếu cần
- [ ] Test UI add/edit/delete trên /admin/products/list


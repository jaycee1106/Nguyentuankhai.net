# Website cá nhân nguyentuankhai.net (Jaycee)

Trang web thương hiệu cá nhân của Nguyễn Tuấn Khải (aka Jaycee) — marketer tại Đồng Nai.
Chủ site làm marketing, không phải lập trình viên → luôn trả lời bằng tiếng Việt, giải thích ngắn gọn, dễ hiểu.

## Cấu trúc
- `index.html` — khung trang + CSS + JS (single page, không framework, không build step).
- `noi-dung.js` — TOÀN BỘ chữ (vi/en), link mạng xã hội, cấu hình ảnh. Người dùng tự sửa file này bằng Notepad.
  - `LIEN_KET`, `ANH` (phienBan, file, viTri, moTa), `CHUNG` (chữ dùng chung 2 ngôn ngữ), `CHU_DE`, `NOI_DUNG.vi` / `NOI_DUNG.en`.
  - Trong HTML, phần tử có `data-t="ten.o"` lấy chữ từ đây (render bằng innerHTML); `data-anh="hero"` lấy ảnh; `data-link="zalo"` lấy link.
- `images/` — hero.jpg (khung dọc), learn.jpg / build.jpg / inspire.jpg (khung 4:3), share.jpg (og:image 1200x630).
- `HUONG-DAN.txt` — hướng dẫn cho chủ site tự sửa. Cập nhật file này khi thay đổi cách sửa nội dung.
- `Ảnh Khải/` — ảnh gốc (không upload lên hosting).
- `index_ban-cu.html` — bản cũ để dự phòng.

## Quy tắc khi chỉnh
- Chữ mới → thêm vào `noi-dung.js` (cả vi và en), KHÔNG viết cứng vào index.html. Giữ comment tiếng Việt dễ hiểu trong noi-dung.js.
- Giữ tên ô (key) tiếng Việt không dấu, kiểu `phan.so.loai` (vd `duAn.2.noiDung`).
- Ảnh mới: nén JPG ~ rộng 700–900px, < 300KB; nhớ tăng `ANH.phienBan`.
- Giữ nhận diện: nền navy #07142b, gradient #1d5cff → #00c2ff, font Montserrat (tiêu đề) + Be Vietnam Pro (chữ thường); phải đẹp trên điện thoại.
- Meta SEO (title, description, og:*) nằm cứng trong `<head>` của index.html.

## Triển khai (bản HTML cũ)
Chủ site upload thủ công bằng WinSCP vào thư mục gốc web trên hosting (public_html):
`index.html`, `noi-dung.js`, `images/`. Sau khi sửa, nhắc rõ cần upload lại những file nào.

## Bản WordPress (đang chuyển sang – thay thế bản HTML)
- WordPress local chạy bằng Laragon (`D:\laragon`): site ở `D:\laragon\www\nguyentuankhai`, URL `http://localhost/nguyentuankhai`, DB `nguyentuankhai` (root, không mật khẩu). Tài khoản admin local: `wordpress/TAI-KHOAN-LOCAL.txt` (không upload, không chép vào chat).
- WP-CLI: `D:\laragon\usr\wpcli\wp.cmd` (đã gắn sẵn --path).
- Mã nguồn nằm trong `wordpress/` của dự án, được nối (junction) vào wp-content:
  - `wordpress/jaycee/` — block theme (theme.json, templates/, parts/, inc/, assets/). Chữ trang chủ gốc vi/en ở `inc/noi-dung.php`, các phần trang chủ dạng khối ở `inc/sections.php` (cũng là pattern "Jaycee – …").
  - `wordpress/jaycee-core/` — plugin loại nội dung "Dự án" (`du-an`, meta `jc_nhan`).
  - `wordpress/setup/khoi-tao.php` — script dựng nội dung lần đầu (đã chạy; có cờ `jaycee_setup_done`). `lam-moi-cache.php` — làm mới cache Polylang.
- Song ngữ bằng Polylang: VI mặc định (không tiền tố), EN ở `/en/`. Trang chủ VI = "Trang chủ", EN = "Home"; Blog VI `/blog/`, EN `/en/journal/`; menu mỗi ngôn ngữ một menu (vị trí `primary`).
- Chữ trong template dùng khối `jaycee/text` (thuộc tính vi/en, hỗ trợ {home} {blog} {projects} {year}). Trong JSON thuộc tính khối, link dùng nháy đơn `href='…'` (không dùng \u0022).
- Hiệu ứng: thuộc tính `jcAnim` / `jcDelay` / `jcStagger` cho mọi khối (inc/animation.php + assets/js/editor.js + CSS mục HIỆU ỨNG).
- Hướng dẫn cho chủ site: `wordpress/HUONG-DAN-WORDPRESS.txt` (cập nhật khi đổi cách sửa nội dung).
- Chuyển lên hosting cPanel bằng plugin All-in-One WP Migration (xem hướng dẫn). Nhớ xóa/đổi tên `index.html` cũ trên hosting, nếu không Apache sẽ ưu tiên mở file HTML.

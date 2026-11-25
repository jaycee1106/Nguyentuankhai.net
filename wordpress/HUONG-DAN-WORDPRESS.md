# Hướng dẫn quản trị website nguyentuankhai.net (WordPress)

> Dành cho chủ site (Jaycee). Viết cho người không phải lập trình viên.
> Tên menu trong tài liệu theo giao diện **tiếng Việt** của WordPress.

---

## Mục lục

0. [Bắt đầu: mở web & đăng nhập](#0-bắt-đầu-mở-web--đăng-nhập)
1. [Làm quen trang quản trị](#1-làm-quen-trang-quản-trị)
2. [Trình soạn thảo khối (Gutenberg) – kỹ năng cơ bản](#2-trình-soạn-thảo-khối-gutenberg--kỹ-năng-cơ-bản)
   - ⭐ [2A. Tô màu chữ – tiêu đề – đoạn văn (chi tiết)](#2a--tô-màu-chữ--tiêu-đề--đoạn-văn-chi-tiết)
   - ⭐ [2B. Tạo nội dung cho một trang website (từng bước)](#2b--tạo-nội-dung-cho-một-trang-website-từng-bước)
3. [Menu **Bảng tin**](#3-menu-bảng-tin)
4. [Menu **Bài viết** (Blog)](#4-menu-bài-viết-blog)
5. [Menu **Dự án** (Portfolio)](#5-menu-dự-án-portfolio)
6. [Menu **Media** (Thư viện ảnh/video)](#6-menu-media-thư-viện-ảnhvideo)
7. [Menu **Trang** (Trang chủ, trang con)](#7-menu-trang-trang-chủ-trang-con)
8. [Menu **Bình luận**](#8-menu-bình-luận)
9. [Menu **Giao diện**](#9-menu-giao-diện)
10. [Menu **Plugin**](#10-menu-plugin)
11. [Menu **Thành viên**](#11-menu-thành-viên)
12. [Menu **Công cụ**](#12-menu-công-cụ)
13. [Menu **Cài đặt**](#13-menu-cài-đặt)
14. [Menu **Ngôn ngữ** (Polylang – song ngữ VI/EN)](#14-menu-ngôn-ngữ-polylang--song-ngữ-vien)
15. [Hiệu ứng, icon, video, chữ gradient](#15-hiệu-ứng-icon-video-chữ-gradient)
16. [Các việc thường làm – làm nhanh](#16-các-việc-thường-làm--làm-nhanh)
17. [Lỡ tay làm hỏng thì sao?](#17-lỡ-tay-làm-hỏng-thì-sao)
18. [Chuyển lên hosting nguyentuankhai.net](#18-chuyển-lên-hosting-nguyentuankhainet)
19. [Những điều KHÔNG nên làm](#19-những-điều-không-nên-làm)

---

## 0. Bắt đầu: mở web & đăng nhập

**Trên máy (local):**

1. Mở **Laragon** → bấm **Start All** (Bắt đầu tất cả). Đợi 2 ô Apache và MySQL chuyển xanh.
2. Mở trình duyệt:

| Mục | Địa chỉ |
|---|---|
| Web tiếng Việt | http://localhost/nguyentuankhai |
| Web tiếng Anh | http://localhost/nguyentuankhai/en/ |
| Trang quản trị | http://localhost/nguyentuankhai/wp-admin |

3. Tên đăng nhập và mật khẩu: xem file `TAI-KHOAN-LOCAL.txt` (cùng thư mục với file này).

**Sau khi đã lên hosting:** thay `http://localhost/nguyentuankhai` bằng `https://nguyentuankhai.net`.

---

## 1. Làm quen trang quản trị

```
┌───────────────────────────────────────────────────────────────┐
│ Thanh công cụ đen (trên cùng): tên site · + Thêm mới · Xem trang│
├──────────────┬────────────────────────────────────────────────┤
│ MENU TRÁI    │                                                │
│ Bảng tin     │          Khu vực làm việc                      │
│ Bài viết     │                                                │
│ Dự án        │                                                │
│ Media        │                                                │
│ Trang        │                                                │
│ Bình luận    │                                                │
│ Giao diện    │                                                │
│ Plugin       │                                                │
│ Thành viên   │                                                │
│ Công cụ      │                                                │
│ Cài đặt      │                                                │
│ Ngôn ngữ     │                                                │
└──────────────┴────────────────────────────────────────────────┘
```

- Rê chuột vào một mục menu trái → hiện các mục con.
- Nút **Xem trang** (thanh đen trên cùng) → mở web ra xem.
- Khi đang xem web mà đã đăng nhập → thanh đen có nút **Sửa trang / Sửa bài** để sửa nhanh.

---

## 2. Trình soạn thảo khối (Gutenberg) – kỹ năng cơ bản

Mọi trang, bài viết, dự án đều soạn bằng **khối** (block): mỗi đoạn văn, tiêu đề, ảnh, nút… là 1 khối.

### 2.1. Các nút trên thanh trên cùng

| Nút | Tác dụng |
|---|---|
| **+** (xanh, góc trái) | Mở kho khối & **Mẫu** (pattern) để chèn |
| ↶ ↷ | Hoàn tác / Làm lại (Ctrl+Z / Ctrl+Shift+Z) |
| ☰ (Dạng xem danh sách) | Xem cây các khối – rất tiện để chọn khối nằm sâu bên trong |
| Biểu tượng màn hình | Xem trước trên Máy tính / Máy tính bảng / Điện thoại |
| Biểu tượng ô vuông chia đôi | Bật/tắt thanh bên phải (Cài đặt) |
| **Lưu bản nháp** / **Đăng** / **Lưu thay đổi** | Lưu |

### 2.2. Thao tác với khối

- **Thêm khối:** bấm vào cuối đoạn → Enter → gõ **/** + tên khối, ví dụ:
  - `/doan van` · `/tieu de` · `/anh` · `/thu vien` (nhiều ảnh) · `/nut` · `/youtube` · `/video` · `/trich dan` · `/danh sach` · `/cot` · `/nhom` · `/anh bia` (Cover) · `/khoang cach` (Spacer) · `/icon`
- **Chọn khối:** bấm vào nó. Thanh công cụ nhỏ hiện ngay trên khối:
  - mũi tên ↑↓ hoặc biểu tượng ⋮⋮ (kéo) → di chuyển khối
  - **B** / *I* / 🔗 → đậm / nghiêng (= gradient, xem mục 15) / gắn link
  - **⋮** → Nhân bản, Chèn trước/sau, Sao chép, **Xóa**
- **Chọn khối cha:** bấm biểu tượng ở đầu thanh công cụ nhỏ, hoặc dùng thanh "Trang › Nhóm › Nhóm…" ở đáy màn hình.
- **Thanh bên phải** (tab **Khối**): chỉnh **Kiểu**, màu, cỡ chữ, khoảng cách, **✨ Hiệu ứng xuất hiện**, **Nâng cao**.

### 2.3. Phím tắt hay dùng

| Phím | Việc |
|---|---|
| Ctrl+S | Lưu |
| Ctrl+Z | Hoàn tác |
| Ctrl+B / Ctrl+I | Đậm / Nghiêng (gradient) |
| Ctrl+K | Gắn link |
| Shift+Enter | Xuống dòng trong cùng đoạn |
| Ctrl+Shift+D | Nhân bản khối |
| Shift+Alt+Z | Xóa khối |

### 2.4. "Kiểu" riêng của theme Jaycee

Chọn khối → thanh bên phải → mục **Kiểu**:

| Loại khối | Kiểu có sẵn |
|---|---|
| **Nhóm** | Phần nền tối · Phần nền sáng · Thẻ tối · Thẻ trắng |
| **Đoạn văn** | Nhãn nhỏ có gạch · Đoạn mô tả lớn · Câu nghiêng nhấn · Nhãn bo tròn · Nhãn có chấm sáng |
| **Nút** | Gradient + icon chat · Trong suốt + mũi tên · Xanh Zalo · Nền trắng + Messenger |
| **Tiêu đề** | Chữ gradient · Siêu to, in hoa |
| **Ảnh** | Bo góc + bóng |

### 2.5. Mẫu (Pattern) – chèn nguyên một phần có sẵn

Nút **+** → tab **Mẫu** → nhóm **Jaycee – Các phần trang chủ**:
Hero, Dải chữ chạy, Về mình, Triết lý, Hành trình, Dự án đang xây, Biểu tượng, Mạng xã hội, Bài viết mới nhất, Manifesto, Liên hệ, hoặc **Trang chủ đầy đủ**.
Bấm vào mẫu là chèn vào chỗ đang đứng, rồi sửa chữ/ảnh như bình thường.

> 💡 Mẫu luôn được chèn **bằng tiếng Việt** – nếu chèn vào trang "Home" (tiếng Anh) thì nhớ dịch lại chữ.

---

## 2A. ⭐ Tô màu chữ – tiêu đề – đoạn văn (chi tiết)

### 2A.1. Bảng màu của thương hiệu (đã cài sẵn)

Khi chọn màu, WordPress hiện các ô màu dưới đây – **luôn chọn từ bảng này** để web đồng bộ nhận diện:

| Tên trong bảng màu | Mã màu | Dùng cho |
|---|---|---|
| Navy (nền tối) | `#07142b` | Nền chính của web |
| Navy nhạt (thẻ) | `#0c1f42` | Nền thẻ trên nền tối |
| Navy đậm (chân trang) | `#040d1d` | Chân trang |
| Nền sáng | `#f5f9ff` | Nền các phần sáng |
| Trắng | `#ffffff` | Chữ trên nền tối, thẻ trắng |
| Chữ đậm | `#0b1b33` | Chữ/tiêu đề trên nền sáng |
| Chữ phụ (nền sáng) | `#51627d` | Đoạn văn phụ trên nền sáng |
| Chữ phụ (nền tối) | `#9fb0cc` | Đoạn văn phụ trên nền tối |
| Xanh dương | `#1d5cff` | Nhấn mạnh, link trên nền sáng |
| Xanh cyan | `#00c2ff` | Nhấn mạnh, nhãn nhỏ trên nền tối |
| Xanh Zalo | `#0068ff` | Nút Zalo |
| **Gradient thương hiệu** | `#1d5cff → #00c2ff` | Nền nút, nền dải, chữ nổi bật |
| Đêm | gradient navy | Nền thẻ đặc biệt |

> Nguyên tắc dễ nhớ: **nền tối → chữ Trắng / Cyan / Chữ phụ (nền tối)** · **nền sáng → Chữ đậm / Xanh dương / Chữ phụ (nền sáng)**.

### 2A.2. Đổi màu CẢ KHỐI (cả tiêu đề / cả đoạn văn)

1. Bấm vào tiêu đề hoặc đoạn văn cần tô.
2. Mở thanh bên phải (nút ô vuông chia đôi góc trên phải) → tab **Khối**.
3. Bấm biểu tượng **Kiểu** (hình nửa vòng tròn ◐, cạnh biểu tượng bánh răng ⚙).
4. Mục **Màu sắc** có các dòng:
   - **Văn bản** → màu chữ
   - **Nền** → màu nền phía sau khối (có tab **Gradient** để chọn *Gradient thương hiệu*)
   - **Liên kết** → màu chữ có link
5. Bấm vào dòng muốn đổi → chọn ô màu. Muốn mã màu riêng: bấm **Tùy chỉnh** (ô cầu vồng) → gõ mã `#...`.
6. Bỏ màu: bấm dòng đó → **Xóa** (Clear) → trở về màu mặc định.

> Nếu không thấy mục *Màu sắc*: bấm **⋮** cạnh chữ "Màu sắc"/"Kiểu chữ" để bật thêm tùy chọn đang ẩn.

### 2A.3. Tô màu VÀI CHỮ trong câu

**Cách 1 – Chữ gradient (khuyên dùng, đúng nhận diện):**
Bôi đen chữ → **Ctrl+I** (hoặc nút *I*). Áp dụng cho:
- mọi **tiêu đề**,
- đoạn văn nằm trong khối kiểu **Phần nền tối / Phần nền sáng** (toàn bộ trang chủ).

**Cách 2 – Tô màu bất kỳ (Đánh dấu / Highlight):**
1. Bôi đen chữ cần tô.
2. Trên thanh công cụ nhỏ, bấm **mũi tên ▾** (Thêm) → chọn **Đánh dấu** (Highlight).
3. Tab **Văn bản** → chọn màu chữ. (Tab **Nền** → tô nền phía sau chữ, như bút dạ quang.)
4. Bỏ: bôi đen lại → Đánh dấu → **Xóa**.

**Cách 3 – In đậm làm nổi:** bôi đen → **Ctrl+B**. Trên nền sáng, chữ đậm tự có màu *Chữ đậm* nổi hơn đoạn xung quanh.

### 2A.4. Tô gradient cả một tiêu đề / đoạn

| Muốn | Làm |
|---|---|
| Cả tiêu đề gradient | Chọn tiêu đề → tab Khối → **Kiểu** (ô chọn kiểu phía trên) → **Chữ gradient** |
| Cả đoạn văn / khối bất kỳ | Chọn khối → mục **Nâng cao** (cuối thanh bên phải) → **Lớp CSS bổ sung** → gõ `jc-gradient-text` |
| Nền gradient cho nút/nhóm | Chọn khối → **Màu sắc → Nền → tab Gradient** → *Gradient thương hiệu* |

### 2A.5. Cỡ chữ, font, độ đậm, giãn chữ

Chọn khối → thanh bên phải → mục **Kiểu chữ** (Typography):

| Tùy chọn | Gợi ý |
|---|---|
| **Cỡ chữ** | Có sẵn: *Rất nhỏ 13 · Nhỏ 15 · Vừa 18 · Lớn 24 · Rất lớn 40 · Khổng lồ 64 · Tiêu đề trang chủ 128*. Các cỡ lớn **tự thu nhỏ trên điện thoại** |
| **Phông chữ** | *Montserrat (tiêu đề)* – cho tiêu đề, nhãn · *Be Vietnam Pro (chữ thường)* – cho đoạn văn |
| **Giao diện** (độ đậm) | 400 thường · 600 hơi đậm · 800 đậm · 900 rất đậm (tiêu đề lớn) |
| **Chiều cao dòng** | Đoạn văn 1.6–1.8 · Tiêu đề to 1–1.1 |
| **Khoảng cách chữ** | Tiêu đề to nên âm nhẹ: `-0.03em` · Nhãn nhỏ in hoa nên giãn: `0.2em` |
| **Kiểu chữ hoa** | IN HOA / chữ thường / Viết Hoa Đầu Từ |

### 2A.6. Cấp tiêu đề (H1–H4) – dùng đúng để tốt cho SEO

- **H1:** mỗi trang chỉ **1 cái** – tiêu đề chính (trang chủ đã có "Vẫn đang trở thành", trang/bài thường thì tiêu đề trang tự là H1). **Không** thêm H1 trong nội dung bài.
- **H2:** tiêu đề từng phần lớn.
- **H3:** tiêu đề nhỏ trong phần (tên thẻ, ý con).
- **H4:** nhãn nhỏ.
Đổi cấp: chọn tiêu đề → thanh công cụ nhỏ → nút **H2 ▾** → chọn cấp khác.

### 2A.7. Các "kiểu" chữ đẹp có sẵn (1 cú bấm)

Chọn đoạn văn → tab Khối → **Kiểu**:

| Kiểu | Trông như | Dùng khi |
|---|---|---|
| **Nhãn nhỏ có gạch** | `—— VỀ MÌNH` (chữ nhỏ, in hoa, có gạch gradient) | Nhãn phía trên tiêu đề mỗi phần |
| **Đoạn mô tả lớn** | Đoạn chữ to hơn, màu nhạt, rộng vừa phải | Câu mô tả ngay dưới tiêu đề phần |
| **Câu nghiêng nhấn** | *Chữ nghiêng Montserrat màu xanh* | Câu trích, khẩu hiệu, chữ ký |
| **Nhãn bo tròn** | `( Learn · Build · Inspire )` | Nhãn nhỏ, chủ đề |
| **Nhãn có chấm sáng** | `( ● Nguyễn Tuấn Khải )` | Dòng giới thiệu đầu trang |

Màu của các kiểu này **tự đổi** theo nền tối/sáng của phần chứa nó – không cần chỉnh màu.

### 2A.8. Lỗi hay gặp

| Hiện tượng | Lý do / cách sửa |
|---|---|
| Chọn màu xong nhưng web không đổi | Khối đang có "Kiểu" hoặc lớp CSS ép màu → thử đổi Kiểu về *Mặc định*, hoặc chọn đúng khối (dùng Dạng xem danh sách ☰) |
| Chữ trắng trên nền trắng, không thấy | Khối nằm trong phần nền sáng → đổi màu chữ sang *Chữ đậm* |
| Ctrl+I mà chữ chỉ nghiêng, không gradient | Đoạn văn không nằm trong *Phần nền tối/sáng* (vd trong bài blog) → dùng **Đánh dấu** hoặc lớp `jc-gradient-text` |
| Màu trên điện thoại khác máy tính | Thường do chế độ tiết kiệm/đọc của trình duyệt; tải lại trang |

---

## 2B. ⭐ Tạo nội dung cho một trang website (từng bước)

### 2B.1. Hiểu cách một trang được "xếp"

Một trang đẹp trên site này = **các PHẦN xếp chồng từ trên xuống, xen kẽ nền tối – sáng**:

```
┌──────────── PHẦN 1 · nền tối ─────────────┐
│  —— NHÃN NHỎ                               │
│  Tiêu đề lớn có chữ gradient               │
│  Đoạn mô tả lớn                            │
│  [ Nút ]                                   │
└────────────────────────────────────────────┘
┌──────────── PHẦN 2 · nền sáng ────────────┐
│  —— NHÃN NHỎ                               │
│  Tiêu đề H2                                │
│  ┌ Thẻ ┐ ┌ Thẻ ┐ ┌ Thẻ ┐   ← lưới 3 cột     │
└────────────────────────────────────────────┘
┌──────────── PHẦN 3 · nền tối ─────────────┐
│  ...                                       │
└────────────────────────────────────────────┘
```

Mỗi **PHẦN** = 1 khối **Nhóm** với kiểu *Phần nền tối* hoặc *Phần nền sáng*. Bên trong là nhãn, tiêu đề, đoạn văn, ảnh, nút, thẻ…

### 2B.2. Bước 1 – Tạo trang & chọn bố cục

1. **Trang → Thêm trang mới** → gõ tiêu đề (vd "Khóa học").
2. Thanh bên phải, tab **Trang** → mục **Giao diện** (Template) → chọn:

| Bố cục | Trông như | Dùng khi |
|---|---|---|
| **Trang** (mặc định) | Dải tối trên đầu có tiêu đề trang + phần nội dung nền sáng, chữ đọc dễ (cột ~760px) | Trang chữ là chính: Giới thiệu dài, Chính sách, FAQ |
| **Trang trống toàn màn hình** | Chỉ có menu + chân trang, ở giữa **tự dựng bằng các phần** | Trang kiểu landing page đẹp như trang chủ: Khóa học, Dịch vụ, Sự kiện |

3. Mục **Ngôn ngữ** → *Tiếng Việt*.

### Cách A – Nhanh nhất: lắp ghép từ Mẫu có sẵn

1. Chọn bố cục **Trang trống toàn màn hình**.
2. Nút **+** → tab **Mẫu** → nhóm **Jaycee – Các phần trang chủ**.
3. Bấm lần lượt các mẫu muốn dùng (vd *Hero* → *Triết lý – 3 thẻ ảnh* → *Hành trình* → *Liên hệ*). Mỗi mẫu là 1 phần hoàn chỉnh, đã có màu, hiệu ứng.
4. Sửa chữ, thay ảnh, đổi link nút. Xóa thẻ/dòng thừa (chọn → **⋮** → Xóa), nhân bản thẻ nếu cần thêm (**⋮** → Nhân bản).
5. Sắp xếp lại thứ tự phần: **Dạng xem danh sách (☰)** → kéo thả.

> Mẹo: phần **Triết lý** rất hợp để giới thiệu 3 gói/3 lợi ích · **Hành trình** hợp làm lộ trình/các bước · **Liên hệ** hợp làm phần kêu gọi cuối trang.

### Cách B – Tự dựng một phần từ đầu

**Bước 1. Tạo khung phần**
1. Bấm **+** → gõ `nhom` → chọn **Nhóm** (Group).
2. Thanh bên phải → **Kiểu** → chọn **Phần nền tối** hoặc **Phần nền sáng**.
   → Khối tự có khoảng cách trên/dưới rộng, nội dung canh giữa khung 1200px, màu chữ đúng.
3. Thanh công cụ nhỏ → nút **Căn chỉnh** → **Toàn bộ chiều rộng** (Full width) để nền tràn hết màn hình.

**Bước 2. Thêm phần đầu (nhãn – tiêu đề – mô tả)** – bấm vào trong Nhóm:
1. `/doan van` → gõ "Khóa học" → Kiểu **Nhãn nhỏ có gạch**.
2. `/tieu de` → gõ tiêu đề → bôi đen vài chữ cuối → **Ctrl+I** (gradient). Cấp **H2**.
3. `/doan van` → gõ câu mô tả → Kiểu **Đoạn mô tả lớn**.

**Bước 3. Thêm thẻ dạng lưới (2–3 cột)**
1. `/luoi` → chọn **Lưới** (Grid) – hoặc chèn Nhóm rồi chọn biến thể *Lưới*.
2. Thanh bên phải → **Bố cục** → *Số cột* = 3 (máy tính); trên điện thoại tự xuống 1 cột.
3. Trong lưới: chèn **Nhóm** → Kiểu **Thẻ tối** (trên nền tối) hoặc **Thẻ trắng** (trên nền sáng).
4. Trong thẻ: thêm ảnh (`/anh`), tiêu đề **H3**, đoạn văn, có thể thêm **Icon (Jaycee)** hoặc **Nút**.
5. Làm xong 1 thẻ → chọn thẻ → **⋮** → **Nhân bản** → sửa chữ thẻ 2, thẻ 3.

> Muốn thẻ hover đổi sang nền gradient như phần Triết lý: chọn thẻ → **Nâng cao → Lớp CSS bổ sung** → thêm `jc-hover-grad`.

**Bước 4. Thêm nút kêu gọi**
1. `/nut` → gõ chữ nút → 🔗 dán link (Zalo: `https://zalo.me/0989333907`).
2. Kiểu nút: *Gradient + icon chat* (nút chính) · *Trong suốt + mũi tên* (nút phụ) · *Xanh Zalo* · *Nền trắng + Messenger*.
3. Mở tab mới: trong ô link bật **Mở trong tab mới**.

**Bước 5. Thêm hiệu ứng**
- Tiêu đề, đoạn mô tả: **✨ Hiệu ứng → Hiện dần + trượt lên** (mô tả đặt *Chờ 120*).
- Nhóm Lưới chứa thẻ: bật **Các khối con xuất hiện lần lượt**.

**Bước 6. Thêm phần tiếp theo**
Chọn cả phần vừa làm → **⋮** → **Nhân bản** → đổi Kiểu sang nền ngược lại (tối ↔ sáng) → thay nội dung. Cứ thế xen kẽ.

**Bước 7. Canh giữa một phần** (như phần Biểu tượng, Liên hệ)
Chọn Nhóm của phần → **Nâng cao → Lớp CSS bổ sung** → thêm `jc-center` (cách nhau bằng dấu cách nếu đã có lớp khác).

### 2B.3. Các khối hay dùng để dựng nội dung

| Muốn có | Khối (gõ sau dấu /) | Ghi chú |
|---|---|---|
| Đoạn văn | `doan van` | |
| Tiêu đề | `tieu de` | Chọn H2/H3 |
| Ảnh | `anh` | Kiểu *Bo góc + bóng* cho đẹp |
| Nhiều ảnh | `thu vien` | Gallery, tự xếp lưới |
| Ảnh + chữ cạnh nhau | `media van ban` (Media & Text) | Ảnh trái, chữ phải (hoặc ngược) |
| 2–3 cột chữ | `cot` (Columns) | Trên điện thoại tự xếp dọc |
| Lưới thẻ | `luoi` (Grid) | Xem bước 3 |
| Hàng ngang (icon + chữ, nhiều nút) | `hang` (Row) | |
| Nền ảnh/video có chữ đè | `anh bia` (Cover) | Chỉnh *Độ mờ lớp phủ* |
| Nút | `nut` | |
| Icon | `icon` → Icon (Jaycee) | |
| Danh sách gạch đầu dòng | `danh sach` | |
| Trích dẫn | `trich dan` | |
| Câu hỏi thường gặp (mở/đóng) | `chi tiet` (Details) | Mỗi khối = 1 câu hỏi |
| Khoảng trống | `khoang cach` (Spacer) | Kéo để chỉnh độ cao |
| Đường kẻ | `dau phan cach` (Separator) | |
| Video YouTube | dán link | |
| Danh sách bài mới | `vong lap truy van` (Query Loop) – hoặc dùng mẫu *Bài viết mới nhất* | |
| Mạng xã hội | `bieu tuong mang xa hoi` hoặc Icon (Jaycee) | |

### 2B.4. Hoàn thiện trang

1. **Ảnh đại diện** (bên phải) → ảnh hiện khi chia sẻ Facebook/Zalo (1200×630).
2. **Tóm tắt** → câu mô tả trên Google (~150 ký tự).
3. **Đường dẫn** → ngắn, không dấu, vd `khoa-hoc`.
4. Bấm **Xem trước** → kiểm tra cả **Điện thoại** (biểu tượng màn hình trên thanh trên cùng).
5. **Đăng**.
6. **Tạo bản tiếng Anh:** Trang → Tất cả trang → **+** ở cột 🇺🇸.
   Mẹo nhanh: trong trang tiếng Việt, bấm **⋮** (góc trên phải) → **Trình soạn thảo mã** → Ctrl+A, Ctrl+C → mở trang tiếng Anh vừa tạo → **⋮** → Trình soạn thảo mã → dán → quay lại **Trình soạn thảo trực quan** → dịch từng chữ. (Giữ nguyên bố cục, chỉ việc dịch.)
7. **Đưa lên menu:** Giao diện → Menu → thêm trang vào **cả 2 menu** (VI và EN) – xem mục 9.3.

### 2B.5. Công thức mẫu: trang "Khóa học" 5 phần

| # | Phần | Nền | Nội dung |
|---|---|---|---|
| 1 | Mở đầu | Tối | Nhãn có chấm sáng · Tiêu đề H1/H2 lớn có gradient · Đoạn mô tả lớn · 2 nút (Đăng ký qua Zalo / Xem nội dung) |
| 2 | Bạn sẽ học được gì | Sáng | Nhãn nhỏ · H2 · Lưới 3 **Thẻ trắng** (Icon + H3 + đoạn) |
| 3 | Lộ trình | Tối | Dùng mẫu **Hành trình** → sửa thành Buổi 1…Buổi 5 |
| 4 | Câu hỏi thường gặp | Sáng | Nhiều khối **Chi tiết** (Details) |
| 5 | Kêu gọi | Tối | Dùng mẫu **Liên hệ** → đổi chữ thành "Sẵn sàng bắt đầu?" |

### 2B.6. Quy tắc để trang luôn đẹp

- Xen kẽ **tối – sáng**, không để 2 phần cùng màu đứng cạnh nhau.
- Mỗi phần chỉ **1 ý chính**: nhãn → tiêu đề → mô tả → nội dung → (nút).
- Gradient chỉ cho **2–4 chữ quan trọng** trong tiêu đề, đừng tô cả đoạn dài.
- Đoạn văn ngắn (2–4 câu). Ảnh cùng tỉ lệ trong một lưới (cùng ngang 4:3 hoặc cùng vuông).
- Tối đa 2 nút cạnh nhau: 1 nút chính (gradient/Zalo) + 1 nút phụ (trong suốt).
- Luôn **Xem trước trên điện thoại** trước khi Đăng.

---

## 3. Menu **Bảng tin**

Trang đầu tiên sau khi đăng nhập.

- **Bảng tin → Trang chủ:** tóm tắt số bài, bình luận, "Bản nháp nhanh".
- **Bảng tin → Cập nhật:** cập nhật WordPress, plugin, bản dịch.
  - Nên cập nhật **plugin** và **bản dịch** khi có thông báo.
  - Trước khi cập nhật **WordPress** lớn (vd 7.1 → 7.2) trên hosting: sao lưu trước (xem mục 18).
  - **Không** có cập nhật cho theme "Jaycee" – đây là theme riêng, chỉ sửa trong máy.

---

## 4. Menu **Bài viết** (Blog)

Bài viết hiện ở: `/blog/` (VI), `/en/journal/` (EN) và phần **"Ghi chép mới nhất"** trên trang chủ (3 bài mới nhất).

### 4.1. Bài viết → Tất cả bài viết

- Danh sách bài. Rê chuột vào tên bài → **Chỉnh sửa · Sửa nhanh · Thùng rác · Xem**.
- **Sửa nhanh:** đổi tiêu đề, đường dẫn (slug), ngày, trạng thái, chuyên mục mà không mở bài.
- **Cột cờ 🇻🇳 🇺🇸** (của Polylang): ✏️ = đã có bản dịch (bấm để sửa) · **+** = chưa có (bấm để tạo).
- Bộ lọc phía trên: lọc theo ngày, chuyên mục, ngôn ngữ (nút chọn ngôn ngữ trên thanh đen).

### 4.2. Bài viết → Viết bài mới

1. Gõ **Tiêu đề**.
2. Viết nội dung bằng khối (xem mục 2).
3. Thanh bên phải, tab **Bài viết**:

| Ô | Ý nghĩa |
|---|---|
| **Trạng thái / Xuất bản** | Đăng ngay, hoặc bấm vào để **hẹn giờ** đăng |
| **Đường dẫn (URL)** | Tự tạo từ tiêu đề – có thể sửa ngắn gọn, không dấu, vd `bai-hoc-marketing-dau-tien` |
| **Ảnh đại diện** | Ảnh trên thẻ bài viết + ảnh khi chia sẻ Facebook/Zalo. Ảnh ngang, ~1200px |
| **Tóm tắt** (Excerpt) | 1–2 câu – hiện trên thẻ bài & làm mô tả trên Google |
| **Chuyên mục** | Nhóm lớn (vd Marketing, Cuộc sống) |
| **Thẻ** | Từ khóa nhỏ (vd ielts, ai, branding) |
| **Ngôn ngữ** | Tiếng Việt / English – **phải chọn đúng** |
| **Bình luận** | Cho phép / không cho phép bình luận (mục Thảo luận) |

4. **Lưu bản nháp** (chưa công khai) hoặc **Đăng**.

### 4.3. Tạo bản tiếng Anh của bài

- Cách 1: **Tất cả bài viết** → bấm **+** ở cột 🇺🇸 của bài.
- Cách 2: đang sửa bài → thanh bên phải → mục **Ngôn ngữ** → ô **Bản dịch** → **+** cạnh English.

→ Trang mới mở ra, đã gắn sẵn ngôn ngữ English và liên kết với bài tiếng Việt. Viết nội dung → **Đăng**.
Người đọc bấm **VI / EN** trên bài sẽ nhảy qua đúng bản dịch.

### 4.4. Bài viết → Chuyên mục / Thẻ

- Thêm/sửa/xóa chuyên mục, thẻ. Ô **Mô tả** của chuyên mục sẽ hiện ở đầu trang chuyên mục.
- Mỗi ngôn ngữ cần chuyên mục riêng: tạo chuyên mục tiếng Việt → bấm **+** ở cột 🇺🇸 để tạo bản tiếng Anh.

### 4.5. Gợi ý trình bày bài đẹp

- Đoạn văn ngắn 2–4 câu. Dùng **Tiêu đề H2** cho các ý lớn, H3 cho ý nhỏ.
- Chèn ảnh xen kẽ, viết **chú thích** dưới ảnh.
- Câu đáng nhớ → khối **Trích dẫn** (`/trich dan`).
- Kêu gọi hành động cuối bài → khối **Nút** kiểu "Xanh Zalo".

---

## 5. Menu **Dự án** (Portfolio)

Hiện ở: `/du-an/` (danh sách), `/du-an/ten-du-an/` (chi tiết), và phần **"Những thứ mình đang xây"** trên trang chủ (4 dự án mới nhất).

### 5.1. Dự án → Tất cả dự án
Giống danh sách bài viết (có cột cờ VI/EN).

### 5.2. Dự án → Thêm dự án

| Ô | Hiện ở đâu |
|---|---|
| **Tiêu đề** | Tên trên thẻ và tiêu đề trang chi tiết |
| **Nội dung** | Trang chi tiết – viết thoải mái: bối cảnh, việc đã làm, kết quả, ảnh, video |
| **Tóm tắt** | Câu mô tả ngắn trên thẻ dự án + dưới tiêu đề trang chi tiết |
| **Nhãn nhỏ trên thẻ dự án** (thanh bên phải) | Nhãn bo tròn, vd `LUẬT VIỆT Á`. Để trống = không hiện |
| **Ảnh đại diện** | Ảnh trên thẻ ở trang `/du-an/` và ảnh lớn ở trang chi tiết |
| **Ngày đăng** | Quyết định **thứ tự**: mới nhất hiện trước |
| **Ngôn ngữ / Bản dịch** | Giống bài viết (mục 4.3) |

### 5.3. Đổi thứ tự dự án
Mở dự án → thanh bên phải → **Xuất bản** (ngày) → đổi ngày → **Lưu thay đổi**. Dự án có ngày gần nhất đứng đầu.

### 5.4. Ẩn một dự án
Mở dự án → **Trạng thái** → chuyển về **Bản nháp** (hoặc Riêng tư). Không cần xóa.

---

## 6. Menu **Media** (Thư viện ảnh/video)

### 6.1. Media → Thư viện
- Xem tất cả ảnh/video đã tải lên. Bấm vào 1 ảnh → sửa **Văn bản thay thế (Alt)** – mô tả ảnh cho Google & người khiếm thị (vd "Jaycee trong ngày tốt nghiệp").
- **Xóa vĩnh viễn** ảnh: chỉ xóa khi chắc chắn không bài/trang nào dùng.

### 6.2. Media → Thêm tệp media mới
Kéo thả ảnh vào. (Thường không cần – chèn ảnh thẳng trong bài cũng tự lưu vào thư viện.)

### 6.3. Quy tắc ảnh để web nhanh
| Loại ảnh | Kích thước gợi ý | Dung lượng |
|---|---|---|
| Ảnh trong bài, ảnh thẻ | rộng 1200px | < 300KB |
| Ảnh chân dung lá bài (Hero) | ảnh dọc, rộng ~800px | < 300KB |
| Ảnh Triết lý (3 thẻ) | ngang 4:3, rộng ~900px | < 300KB |
| Ảnh chia sẻ (share) | đúng 1200 × 630px | < 300KB |
| Video nền | .mp4, 10–20 giây | < 10MB |

Nén ảnh miễn phí: **tinypng.com** hoặc **squoosh.app**. Tên file nên không dấu, vd `jaycee-tot-nghiep.jpg`.

---

## 7. Menu **Trang** (Trang chủ, trang con)

### 7.1. Các trang đang có

| Trang | Ngôn ngữ | Địa chỉ | Ghi chú |
|---|---|---|---|
| **Trang chủ** | VI | `/` | Toàn bộ trang chủ – sửa ở đây |
| **Home** | EN | `/en/` | Bản tiếng Anh của trang chủ |
| **Blog** | VI | `/blog/` | Trang trống – tự hiện danh sách bài. **Không cần viết gì** |
| **Blog** | EN | `/en/journal/` | Như trên, tiếng Anh |

### 7.2. Sửa trang chủ
**Trang → Tất cả trang → Trang chủ** (hoặc **Home** cho tiếng Anh).

Trang chủ gồm các phần (khối Nhóm) xếp từ trên xuống:

| # | Phần | Có gì để sửa |
|---|---|---|
| 1 | **Hero** | Nhãn tên, tiêu đề lớn, mô tả, 2 nút, 2 nhãn tròn, **ảnh lá bài** |
| 2 | **Dải chữ chạy** | 1 dòng chữ (chữ nghiêng = chữ viền rỗng) |
| 3 | **Về mình** (`#about`) | Tiêu đề, 4 đoạn, chữ ký, 4 ô thông tin nhanh |
| 4 | **Triết lý** (`#philosophy`) | Tiêu đề, mô tả, 3 thẻ (ảnh + chú thích ảnh + tên + câu + đoạn) |
| 5 | **Hành trình** (`#journey`) | 5 chương (nhãn, tên, đoạn) + câu kết |
| 6 | **Đang xây** (`#building`) | Tiêu đề, mô tả. Các thẻ **tự lấy từ menu Dự án** – sửa ở menu Dự án |
| 7 | **Biểu tượng** (`#code`) | 3 thẻ 1 / 13 / 777 |
| 8 | **Theo dõi** (`#world`) | 3 thẻ mạng xã hội (link nằm ở tiêu đề thẻ), các nhãn chủ đề |
| 9 | **Manifesto** | Câu tuyên ngôn, 4 dòng, 3 nhãn |
| 10 | **Nhật ký** (`#blog`) | Tiêu đề, mô tả. Các thẻ **tự lấy từ Bài viết** |
| 11 | **Trò chuyện** (`#contact`) | Tiêu đề, mô tả, nút Zalo + Messenger |

**Các thao tác hay dùng:**
- **Đổi ảnh:** bấm ảnh → thanh công cụ nhỏ → **Thay thế** → chọn từ Thư viện hoặc tải lên.
- **Đổi link nút / link mạng xã hội:** bấm vào nút (hoặc chữ có link) → biểu tượng 🔗 → dán link mới → Enter.
- **Thêm 1 ô thông tin / 1 chương / 1 thẻ:** chọn ô có sẵn → **⋮** → **Nhân bản** → sửa chữ.
- **Đổi thứ tự các phần:** mở **Dạng xem danh sách (☰)** → kéo thả các khối Nhóm.
- **Ẩn tạm 1 phần:** chọn khối Nhóm của phần đó → **⋮** → **Ẩn** (nếu có) hoặc cắt (Ctrl+X) dán sang trang nháp.
- **Thêm/bớt nhãn chủ đề** ("01 Cuộc sống"…): nhân bản/xóa đoạn văn trong phần Theo dõi.

> ⚠️ Nhớ sửa **cả 2 trang**: "Trang chủ" (VI) và "Home" (EN).

### 7.3. Mô tả Google / ảnh chia sẻ của trang chủ
Mở trang **Trang chủ** → thanh bên phải:
- **Tóm tắt** (bấm "Thêm mô tả ngắn" / "Sửa mô tả ngắn") = mô tả hiện trên Google, Facebook, Zalo.
- **Ảnh đại diện** = ảnh hiện khi chia sẻ link (chuẩn 1200 × 630).

Làm tương tự cho trang **Home** (tiếng Anh).

### 7.4. Tạo trang mới (vd "Liên hệ", "Khóa học")
**Trang → Thêm trang mới** → gõ tiêu đề + nội dung → bên phải:
- **Giao diện (Template):**
  - *Trang* (mặc định): đầu trang tối có tiêu đề + nội dung nền sáng, dễ đọc.
  - *Trang trống toàn màn hình*: tự dựng bằng các khối/mẫu, giống trang chủ (chèn mẫu Jaycee).
- **Ngôn ngữ**, rồi tạo bản dịch như bài viết.
- Muốn trang hiện trên menu → xem mục 9.3.

---

## 8. Menu **Bình luận**

- Duyệt / trả lời / đánh dấu spam / xóa bình luận.
- Muốn **tắt bình luận toàn site**: **Cài đặt → Thảo luận** → bỏ chọn "Cho phép mọi người gửi bình luận cho bài viết mới".
- Hiện theme chưa hiển thị khung bình luận dưới bài (blog cá nhân thường để mọi người nhắn Zalo/Messenger). Muốn bật thì nhờ thêm khối Bình luận vào mẫu "Bài viết đơn".

---

## 9. Menu **Giao diện**

### 9.1. Giao diện → Giao diện (Themes)
Theme đang dùng: **Jaycee**. **Không** bấm kích hoạt theme khác (Twenty Twenty-…) – web sẽ đổi hết giao diện.

### 9.2. Giao diện → Trình chỉnh sửa (Site Editor)
Sửa những phần **dùng chung cho mọi trang**:

| Mục | Dùng để |
|---|---|
| **Kiểu (Styles)** | Đổi màu, font, cỡ chữ toàn site. *Cẩn thận* – thay đổi áp dụng toàn bộ web |
| **Mẫu (Templates)** | Bố cục từng loại trang: Trang chủ, Trang, Bài viết đơn, Blog, Lưu trữ, Dự án (danh sách/chi tiết), Tìm kiếm, 404 |
| **Mẫu → Phần mẫu (Template parts)** | **Đầu trang (menu)** và **Chân trang + nút chat nổi** |

**Sửa link nút chat nổi Zalo/Messenger (góc phải dưới):**
Trình chỉnh sửa → **Mẫu** → **Chân trang + nút chat nổi** → bấm icon Zalo/Messenger → thanh bên phải → ô **Link khi bấm** → **Lưu**.

**Sửa câu chân trang / bản quyền:** cùng chỗ trên → bấm vào chữ → sửa.
(Dòng bản quyền dùng khối **Chữ song ngữ**: chữ Việt gõ trực tiếp, chữ Anh ở thanh bên phải. `{year}` = tự điền năm hiện tại.)

**Sửa chữ trên đầu trang Blog / Dự án** ("Nhật ký", "Ghi chép trên hành trình"…):
Trình chỉnh sửa → **Mẫu** → **Blog** (hoặc *Lưu trữ: Dự án*) → bấm vào chữ → chữ Việt sửa trực tiếp, **chữ Anh sửa ở thanh bên phải** (ô "Bản tiếng Anh (EN)") → **Lưu**.

> 🔄 **Lỡ sửa hỏng 1 mẫu?** Trình chỉnh sửa → Mẫu → di chuột vào mẫu → **⋮** → **Đặt lại** (Reset) → quay về bản gốc của theme.

### 9.3. Giao diện → Menu
Có 2 menu:
- **Menu chính (Tiếng Việt)** – vị trí *Menu chính (đầu trang)*, ngôn ngữ Tiếng Việt
- **Main menu (English)** – cùng vị trí, ngôn ngữ English

**Thêm mục menu:**
1. Chọn menu cần sửa ở ô **Chọn menu để sửa** → **Chọn**.
2. Cột trái: tích chọn **Trang** / **Bài viết** / **Dự án**, hoặc mở **Liên kết tự tạo** (dán URL + tên).
3. **Thêm vào menu** → kéo thả sắp xếp → **Lưu menu**.

Link tới 1 phần trên trang chủ: dùng **Liên kết tự tạo** với URL `trang-chủ#ten-phan`, ví dụ:
- VI: `http://localhost/nguyentuankhai/#contact`
- EN: `http://localhost/nguyentuankhai/en/#contact`

Tên các phần: `#about` `#philosophy` `#journey` `#building` `#code` `#world` `#blog` `#contact`.

> Khi lên hosting, plugin chuyển site sẽ tự đổi `localhost/nguyentuankhai` thành `nguyentuankhai.net`.

---

## 10. Menu **Plugin**

Plugin đang dùng:

| Plugin | Vai trò | Ghi chú |
|---|---|---|
| **Polylang** | Song ngữ VI/EN | **Không được tắt** |
| **Jaycee Core** | Loại nội dung "Dự án" | **Không được tắt** – tắt là mất menu Dự án (dữ liệu vẫn còn) |

**Cài plugin mới:** Plugin → **Cài mới** → tìm tên → **Cài đặt** → **Kích hoạt**.
Plugin gợi ý (cài khi cần):
- **All-in-One WP Migration** – chuyển site / sao lưu (mục 18).
- **Rank Math SEO** hoặc **Yoast SEO** – tối ưu SEO nâng cao. (Theme tự tắt phần mô tả Google của nó khi có plugin này.)
- **Contact Form 7** hoặc **WPForms Lite** – form liên hệ.
- **Site Kit by Google** – gắn Google Analytics / Search Console.

> Mỗi plugin làm web nặng thêm một chút → chỉ cài cái thật cần, xóa cái không dùng.

---

## 11. Menu **Thành viên**

- **Hồ sơ:** đổi **email**, **mật khẩu**, tên hiển thị. *Khi lên hosting nhớ đổi mật khẩu mạnh và email thật.*
- **Thêm thành viên mới:** cho người khác vào viết bài. Chọn vai trò phù hợp:

| Vai trò | Được làm |
|---|---|
| Quản trị viên | Toàn quyền – chỉ dành cho chủ site |
| Biên tập viên | Sửa mọi bài/trang |
| Tác giả | Viết & đăng bài của mình |
| Cộng tác viên | Viết bài, không tự đăng được (chờ duyệt) |

---

## 12. Menu **Công cụ**

- **Xuất (Export):** tải file XML chứa bài viết/trang/dự án – dùng để lưu trữ nội dung.
- **Nhập (Import):** nhập nội dung từ file XML.
- **Tình trạng website (Site Health):** WordPress tự kiểm tra và gợi ý sửa (bảo mật, tốc độ). Trên local có vài cảnh báo là bình thường.
- **All-in-One WP Migration** (nếu cài) nằm ở menu riêng – xem mục 18.

---

## 13. Menu **Cài đặt**

| Mục | Nên để |
|---|---|
| **Tổng quan** | *Tên website*: Jaycee – Nguyễn Tuấn Khải · *Khẩu hiệu*: Learn. Build. Inspire. · *Múi giờ*: Hồ Chí Minh · *Định dạng ngày*: d/m/Y · *Email quản trị*: đổi sang email thật |
| **Viết** | Giữ mặc định |
| **Đọc** | *Trang chủ hiển thị*: **Một trang tĩnh** → Trang chủ = "Trang chủ", Trang bài viết = "Blog". **Không đổi.** Ô "Ngăn chặn công cụ tìm kiếm…" **bỏ chọn** khi lên hosting |
| **Thảo luận** | Bật/tắt bình luận |
| **Media** | Giữ mặc định |
| **Đường dẫn tĩnh** | **Tên bài viết** (`/%postname%/`). **Không đổi** – đổi là hỏng link cũ. Khi link /en/ hoặc /du-an/ lỗi 404 → vào đây bấm **Lưu thay đổi** 1–2 lần |
| **Quyền riêng tư** | Tạo trang Chính sách bảo mật nếu cần |

---

## 14. Menu **Ngôn ngữ** (Polylang – song ngữ VI/EN)

### 14.1. Cách song ngữ hoạt động
- **Tiếng Việt** là mặc định, địa chỉ không có tiền tố: `/blog/`, `/du-an/`…
- **Tiếng Anh** có `/en/` phía trước: `/en/`, `/en/journal/`, `/en/du-an/`…
- Mỗi bài/trang/dự án có **2 bản riêng** được nối với nhau. Nút **VI / EN** trên đầu trang chuyển qua bản tương ứng; nếu chưa có bản dịch thì về trang chủ của ngôn ngữ kia.

### 14.2. Ngôn ngữ → Ngôn ngữ
Danh sách ngôn ngữ (Tiếng Việt, English). **Không xóa** ngôn ngữ – xóa là mất liên kết bản dịch.

### 14.3. Ngôn ngữ → Cài đặt
Đã cấu hình sẵn – **không cần đổi**:
- URL: ngôn ngữ theo thư mục (`/en/`), ẩn mã ngôn ngữ mặc định.
- Trang chủ tiếng Anh dùng `/en/` (không phải `/en/home/`).
- Loại nội dung **Dự án** được dịch.

### 14.4. Ngôn ngữ → Dịch chuỗi
Dịch các câu nhỏ của WordPress/plugin (ít khi cần). Chữ của theme Jaycee **không** sửa ở đây – sửa trực tiếp trong trang hoặc trong Trình chỉnh sửa (mục 9.2).

### 14.5. Bộ lọc ngôn ngữ trên thanh đen
Trên thanh đen có ô chọn **Hiện tất cả ngôn ngữ / Tiếng Việt / English** → lọc danh sách bài/trang theo ngôn ngữ.

---

## 15. Hiệu ứng, icon, video, chữ gradient

### 15.1. Hiệu ứng xuất hiện (mọi khối)
Chọn khối → thanh bên phải → **✨ Hiệu ứng xuất hiện**:

| Tùy chọn | Ý nghĩa |
|---|---|
| **Kiểu hiệu ứng** | Hiện dần + trượt lên · Hiện dần · Phóng to nhẹ · Trượt vào từ trái · Trượt vào từ phải · Mờ → rõ · *(Lặp)* Bay lơ lửng · *(Lặp)* Nhịp đập |
| **Chờ trước khi chạy** | Độ trễ (mili-giây). 200 = 0,2 giây. Dùng để các khối hiện nối tiếp |
| **Các khối con xuất hiện lần lượt** | Bật cho **nhóm chứa nhiều thẻ** → từng thẻ hiện nối đuôi nhau |

- Hiệu ứng chạy **khi cuộn tới** khối đó, chỉ chạy ngoài web → bấm **Xem trước** để thử.
- Người dùng bật "giảm chuyển động" trên điện thoại sẽ không thấy hiệu ứng (để thân thiện).
- Đừng lạm dụng: mỗi phần 1–2 hiệu ứng là đẹp.

### 15.2. Chữ màu gradient
| Muốn | Làm |
|---|---|
| Vài chữ trong câu | Bôi đen → **Ctrl+I** (chữ nghiêng). Áp dụng cho mọi **tiêu đề** và đoạn văn trong khối kiểu *Phần nền tối/sáng* |
| Cả tiêu đề | Chọn tiêu đề → **Kiểu** → **Chữ gradient** |
| Cả 1 đoạn/khối bất kỳ | Chọn khối → **Nâng cao** → **Lớp CSS bổ sung**: `jc-gradient-text` |

Bỏ gradient: bôi đen → Ctrl+I lần nữa.

### 15.3. Icon
Nút **+** → tìm **Icon (Jaycee)** → thanh bên phải:
- **Chọn icon:** Zalo, Messenger, Facebook, Instagram, TikTok, YouTube, LinkedIn, Bong bóng chat, Email, Điện thoại, Mũi tên, Bích ♠, Vương miện, Ngôi sao, Lấp lánh, Dấu tích, Phát video, Máy quay, Máy ảnh, Sách, Cặp công việc, Quả địa cầu, Ghim bản đồ, Trái tim, Bóng đèn, Mục tiêu, Tăng trưởng, Tên lửa, Code, Bút viết, Mọi người, Lịch.
- **Kích thước**, **Link khi bấm**, **Mở tab mới**, **Màu** (mục Màu sắc).

Đặt icon cạnh chữ: chèn khối **Hàng** (`/hang` – Row) → bỏ icon + đoạn văn vào trong.

### 15.4. Video
| Loại | Cách |
|---|---|
| Video YouTube | Dán link YouTube vào một dòng trống → tự thành khối video |
| Video tự tải lên | `/video` → Tải lên file .mp4 |
| **Video làm nền** cho một phần | `/anh bia` (Ảnh bìa – Cover) → chọn file video → gõ chữ/thêm nút lên trên. Chỉnh **Độ mờ lớp phủ** để chữ dễ đọc |

### 15.5. Khối "Chữ song ngữ (VI/EN)"
Dùng trong **Trình chỉnh sửa** (đầu trang Blog, Dự án, chân trang, 404) – nơi một khối phải hiện cả 2 ngôn ngữ.
- Gõ chữ **tiếng Việt** trực tiếp trên khối.
- Chữ **tiếng Anh**: thanh bên phải → ô **Bản tiếng Anh (EN)**.
- Mã tự thay: `{home}` link trang chủ · `{blog}` link Blog · `{projects}` link Dự án · `{year}` năm hiện tại (link tự đổi theo ngôn ngữ).

> Trong trang/bài thường **không cần** khối này – vì mỗi ngôn ngữ đã có trang riêng.

---

## 16. Các việc thường làm – làm nhanh

| Việc | Đường đi |
|---|---|
| Viết bài blog | Bài viết → Viết bài mới → (ảnh đại diện + tóm tắt) → Đăng |
| Dịch bài sang tiếng Anh | Bài viết → Tất cả bài viết → **+** cột 🇺🇸 |
| Thêm dự án | Dự án → Thêm dự án → (tóm tắt + nhãn nhỏ + ảnh đại diện) → Đăng |
| Sửa chữ trang chủ | Trang → Trang chủ (VI) / Home (EN) → bấm vào chữ |
| Đổi ảnh chân dung lá bài | Trang → Trang chủ → bấm ảnh trong lá bài → Thay thế |
| Đổi số Zalo | Trang chủ & Home (2 nút) **+** Giao diện → Trình chỉnh sửa → Mẫu → Chân trang (icon Zalo) |
| Sửa menu | Giao diện → Menu (sửa cả 2 menu VI & EN) |
| Đổi mô tả Google | Trang → Trang chủ → Tóm tắt (và Home) |
| Đổi ảnh chia sẻ Facebook/Zalo | Trang → Trang chủ → Ảnh đại diện (và Home) |
| Chèn lại 1 phần trang chủ | Trong trang → **+** → Mẫu → Jaycee |
| Thêm hiệu ứng | Chọn khối → ✨ Hiệu ứng xuất hiện |
| Facebook vẫn hiện ảnh/mô tả cũ | Dán link vào developers.facebook.com/tools/debug → **Scrape Again** |

---

## 17. Lỡ tay làm hỏng thì sao?

1. **Chưa lưu:** Ctrl+Z (hoàn tác) nhiều lần, hoặc thoát không lưu.
2. **Đã lưu – trang/bài:** thanh bên phải → **Bản sửa đổi** (Revisions) → kéo thanh thời gian về bản cũ → **Khôi phục bản này**.
3. **Mẫu/đầu trang/chân trang:** Giao diện → Trình chỉnh sửa → Mẫu → **⋮** → **Đặt lại** (về bản gốc theme).
4. **Thấy "Khối này có nội dung không mong muốn":** bấm **Khôi phục khối** (Attempt recovery).
5. **Xóa nhầm bài/trang:** vào mục **Thùng rác** của danh sách → **Khôi phục** (thùng rác giữ 30 ngày).
6. **Mất cả một phần trang chủ:** chèn lại từ **Mẫu → Jaycee** (mục 2.5).
7. **Hỏng nặng:** khôi phục từ file sao lưu `.wpress` (mục 18) → nên **sao lưu trước mỗi lần sửa lớn**.

---

## 18. Chuyển lên hosting nguyentuankhai.net

### 18.1. Trên máy (xuất site)
1. **Plugin → Cài mới** → tìm **All-in-One WP Migration** → Cài đặt → Kích hoạt.
2. Menu trái **All-in-One WP Migration → Xuất (Export)** → **Xuất ra → Tệp (File)** → tải file `.wpress`.

### 18.2. Trên hosting (cPanel)
3. **Sao lưu bản HTML cũ:** cPanel → **File Manager** → `public_html` → chọn `index.html`, `noi-dung.js`, `images` → **Compress** → tải file zip về máy.
4. **Xóa (hoặc đổi tên) `index.html`** trong `public_html`.
   ⚠️ *Còn file này thì hosting vẫn mở trang HTML cũ, không mở WordPress.*
5. cPanel → **Softaculous** (hoặc *WordPress Manager*) → cài WordPress cho `https://nguyentuankhai.net` (ô thư mục để trống). Tài khoản tạo lúc này chỉ dùng tạm.
6. Đăng nhập WordPress mới → cài **All-in-One WP Migration** → **Nhập (Import)** → kéo file `.wpress` vào → **Tiếp tục** → **Hoàn tất**.
7. Đăng nhập lại bằng **tài khoản local** (trong `TAI-KHOAN-LOCAL.txt`).
8. **Cài đặt → Đường dẫn tĩnh** → **Lưu thay đổi** 2 lần.
9. **Thành viên → Hồ sơ:** đổi **mật khẩu mạnh** + **email thật**.
10. **Cài đặt → Đọc:** đảm bảo **bỏ chọn** "Ngăn chặn công cụ tìm kiếm đánh chỉ mục".
11. Kiểm tra: trang chủ, `/en/`, `/blog/`, `/du-an/`, nút Zalo, xem trên điện thoại.
12. Facebook debugger → **Scrape Again** để cập nhật ảnh chia sẻ.

> File `.wpress` quá lớn so với giới hạn tải lên? Nén bớt ảnh, hoặc nhờ hỗ trợ hosting tăng `upload_max_filesize`.

### 18.3. Sao lưu định kỳ
Mỗi tháng (hoặc trước khi cập nhật lớn): **All-in-One WP Migration → Xuất → Tệp** → cất file `.wpress` vào Google Drive.

---

## 19. Những điều KHÔNG nên làm

- ❌ Kích hoạt theme khác thay cho **Jaycee**.
- ❌ Tắt/xóa plugin **Polylang** hoặc **Jaycee Core**.
- ❌ Xóa ngôn ngữ trong **Ngôn ngữ → Ngôn ngữ**.
- ❌ Đổi **Cài đặt → Đọc** (trang chủ/trang bài viết) hoặc **Đường dẫn tĩnh**.
- ❌ Xóa trang **Blog** (dù nó trống – nó là "khung" cho danh sách bài).
- ❌ Sửa file trong `wp-content/themes/jaycee` bằng **Giao diện → Trình sửa file** – dễ làm sập web. Cần sửa thì nhờ người hỗ trợ.
- ❌ Upload ảnh gốc nặng vài MB – nén trước.
- ❌ Upload file `TAI-KHOAN-LOCAL.txt` lên hosting hay gửi cho người khác.

---

*Cập nhật: 11/2026 · Theme Jaycee 1.0 · WordPress 7.1 · Polylang 3.9*

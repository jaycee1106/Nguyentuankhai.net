/* ============================================================================
   NỘI DUNG WEBSITE nguyentuankhai.net
   ----------------------------------------------------------------------------
   Muốn sửa chữ / link / ảnh trên web → chỉ sửa file này, KHÔNG cần đụng index.html.

   QUY TẮC VÀNG (đọc 1 lần là nhớ):
   1. Chỉ sửa phần chữ NẰM GIỮA hai dấu ngoặc kép  "..."  ở bên PHẢI dấu hai chấm.
        "hero.moTa": "Sửa chữ ở đây thôi",
         ^^^^^^^^^    ^^^^^^^^^^^^^^^^^^^
         TÊN Ô – giữ   CHỮ HIỂN THỊ – sửa thoải mái
   2. Giữ nguyên dấu ngoặc kép "  và dấu phẩy ,  ở cuối dòng.
   3. Muốn dùng dấu ngoặc kép bên trong câu → dùng “ ” (ngoặc kép cong) hoặc ' '.
   4. Ký hiệu đặc biệt dùng được trong chữ:
        <br>               = xuống dòng
        <em>chữ</em>       = chữ màu gradient xanh (nhấn mạnh)
        <strong>chữ</strong> = chữ đậm
        <small>chữ</small> = dòng chữ nhỏ bên dưới (dùng ở ô "Thông tin nhanh")
   5. Sửa xong: lưu file (Ctrl+S) → mở index.html bằng Chrome để xem thử
      → đúng ý thì upload file này lên hosting, đè file cũ.
   6. Lỡ sửa sai làm web hiện thông báo đỏ "Lỗi file noi-dung.js"
      → kiểm tra lại dấu ngoặc kép / dấu phẩy ở dòng vừa sửa.
   ============================================================================ */


/* ---------------------------------------------------------------------------
   1. LINK LIÊN HỆ & MẠNG XÃ HỘI
   --------------------------------------------------------------------------- */
const LIEN_KET = {
  zalo:      "https://zalo.me/0989333907",
  messenger: "https://m.me/callme.tkhai",
  facebook:  "https://www.facebook.com/callme.tkhai/",
  instagram: "https://instagram.com/jaycee_777",
  tiktok:    "https://www.tiktok.com/@jaycee_777_"
};


/* ---------------------------------------------------------------------------
   2. ẢNH
   Cách đổi ảnh: chép ảnh mới vào thư mục images/, đặt ĐÚNG TÊN file cũ
   (hero.jpg, learn.jpg, build.jpg, inspire.jpg) → dán đè → upload đè lên hosting.

   - phienBan: mỗi lần đổi ảnh, TĂNG số này lên 1 (1 → 2 → 3...) để trình duyệt
     của người xem tải ảnh mới, không hiện ảnh cũ còn lưu trong bộ nhớ đệm.
   - viTri: chọn phần nào của ảnh được giữ lại khi khung cắt bớt.
       "50% 50%" = giữa ảnh   |  "50% 20%" = lệch lên trên  |  "50% 80%" = lệch xuống dưới
       "30% 50%" = lệch sang trái  |  "70% 50%" = lệch sang phải
   - moTa: mô tả ngắn nội dung ảnh (tốt cho Google, người xem không thấy).

   Khung ảnh: hero = khung DỌC (nên dùng ảnh dọc, thấy rõ mặt)
              learn / build / inspire = khung NGANG 4:3
   --------------------------------------------------------------------------- */
const ANH = {
  phienBan: 1,
  hero:    { file: "images/hero.jpg",    viTri: "50% 30%", moTa: "Nguyễn Tuấn Khải (Jaycee) trong ngày lễ tốt nghiệp" },
  learn:   { file: "images/learn.jpg",   viTri: "50% 35%", moTa: "Jaycee trong ngày lễ tốt nghiệp cùng bạn bè" },
  build:   { file: "images/build.jpg",   viTri: "50% 40%", moTa: "Jaycee trên đường phố trong một chuyến đi" },
  inspire: { file: "images/inspire.jpg", viTri: "40% 58%", moTa: "Jaycee bên cung đường đèo" }
};


/* ---------------------------------------------------------------------------
   3. CHỮ DÙNG CHUNG CHO CẢ TIẾNG VIỆT & TIẾNG ANH
   (Các khẩu hiệu tiếng Anh, tên kênh... hiển thị giống nhau ở 2 ngôn ngữ.
    Nếu muốn khác nhau, thêm cùng tên ô vào phần tiếng Việt / tiếng Anh bên dưới.)
   --------------------------------------------------------------------------- */
const CHUNG = {
  // Logo góc trái trên cùng
  "logo.chu": "JC",
  "logo.ten": "Jaycee",

  // Hai nhãn nhỏ dưới nút ở đầu trang
  "hero.nhan1": "Learn · Build · Inspire",
  "hero.nhan2": "1 → 13 → 777",

  // Dải chữ chạy ngang màu xanh
  "dai.chu": "Learn ✦ Build ✦ Inspire ✦ <span class=\"o\">Still becoming</span> ✦ JC ✦",

  // Chữ ký cuối phần "Về mình"
  "gioiThieu.chuKy": "Learn. Build. Inspire.",

  // Phần Triết lý
  "trietLy.tieuDe": "Learn. Build. <em>Inspire.</em>",
  "trietLy.1.ten": "Learn",
  "trietLy.1.cau": "“Learn like a student.”",
  "trietLy.2.ten": "Build",
  "trietLy.2.cau": "“Build like an entrepreneur.”",
  "trietLy.3.ten": "Inspire",
  "trietLy.3.cau": "“Inspire through the process, not through preaching.”",

  // Phần Hành trình – tên 5 chương (chữ to)
  "hanhTrinh.1.ten": "Learn",
  "hanhTrinh.2.ten": "Experience",
  "hanhTrinh.3.ten": "Return",
  "hanhTrinh.4.ten": "Build",
  "hanhTrinh.5.ten": "<em>Become</em>",
  "hanhTrinh.ketThuc": "Still learning. Still building. Still becoming.",

  // Phần Dự án – tên thẻ & nhãn nhỏ (để trống "" nếu không muốn hiện nhãn)
  "duAn.1.ten": "Marketing",   "duAn.1.nhan": "",
  "duAn.2.ten": "Business",    "duAn.2.nhan": "LUẬT VIỆT Á",
  "duAn.3.ten": "Digital",     "duAn.3.nhan": "",
                               "duAn.4.nhan": "",

  // Phần Biểu tượng – câu tiếng Anh in nghiêng
  "bieuTuong.1.cau": "One king. One self.",
  "bieuTuong.2.cau": "The next chapter begins.",
  "bieuTuong.3.cau": "Keep spinning. Keep building.",

  // Phần Theo dõi – tên tài khoản
  "kenh.instagram.ten": "@jaycee_777",
  "kenh.tiktok.ten":    "@jaycee_777",
  "kenh.facebook.ten":  "Nguyễn Tuấn Khải",

  // Phần Manifesto
  "tuyenNgon.nhan": "Manifesto",
  "tuyenNgon.ky1": "Learn", "tuyenNgon.ky2": "Build", "tuyenNgon.ky3": "Inspire",

  // Chân trang
  "chanTrang.cau": "Still learning. Still building. Still becoming.",
  "chanTrang.banQuyen": "© 2026 Nguyễn Tuấn Khải · nguyentuankhai.net"
};


/* ---------------------------------------------------------------------------
   4. CHỦ ĐỀ (các nhãn tròn nhỏ trong phần "Theo dõi")
   Thêm/bớt chủ đề: thêm/xóa một mục "..." – nhớ dấu phẩy giữa các mục.
   --------------------------------------------------------------------------- */
const CHU_DE = {
  vi: ["Cuộc sống", "Học tập", "Sự nghiệp", "Marketing", "Kinh doanh", "Xây dựng", "Suy ngẫm", "Phong cách sống"],
  en: ["Life", "Learning", "Career", "Marketing", "Business", "Building", "Reflection", "Lifestyle"]
};


/* ---------------------------------------------------------------------------
   5. NỘI DUNG THEO NGÔN NGỮ
   vi = tiếng Việt (mặc định khi mở web) · en = tiếng Anh (khi bấm EN)
   Sửa tiếng Việt xong, nhớ sửa câu tương ứng ở phần tiếng Anh (nếu cần).
   --------------------------------------------------------------------------- */
const NOI_DUNG = {

  /* ======================= TIẾNG VIỆT ======================= */
  vi: {
    // --- Menu ---
    "menu.gioiThieu": "Về mình",
    "menu.trietLy":   "Triết lý",
    "menu.hanhTrinh": "Hành trình",
    "menu.duAn":      "Dự án",
    "menu.bieuTuong": "Biểu tượng",
    "menu.lienHe":    "Trò chuyện",

    // --- Đầu trang (Hero) ---
    "hero.nhanTen": "Nguyễn Tuấn Khải — aka Jaycee",
    "hero.tieuDe":  "Vẫn đang<br><em>trở thành.</em>",
    "hero.moTa":    "Marketer tại Đồng Nai. Mình học, mình xây — và ghi lại hành trình đó: từng bài học, từng lần bắt đầu lại.",
    "hero.nutPhu":  "Đọc câu chuyện",

    // --- Nút liên hệ (dùng ở đầu trang & cuối trang) ---
    "nut.zalo":      "Nhắn Zalo cho mình",
    "nut.messenger": "Chat qua Messenger",

    // --- Về mình ---
    "gioiThieu.nhan":   "Về mình",
    "gioiThieu.tieuDe": "Một người trẻ đang học, đang xây và <em>đang trở thành.</em>",
    "gioiThieu.doan1":  "Mình là Tuấn Khải, thường được biết đến với cái tên <strong>Jaycee</strong>.",
    "gioiThieu.doan2":  "Mình đang ở một giai đoạn khá thú vị của cuộc đời: vừa học, vừa làm, vừa thử xây dựng những thứ của riêng mình.",
    "gioiThieu.doan3":  "Mình học Marketing, làm marketing tại một doanh nghiệp gia đình và đang tìm cách biến những gì mình học được thành những thứ có giá trị trong thực tế.",
    "gioiThieu.doan4":  "Mình không nghĩ mình đã có tất cả câu trả lời. Mình chỉ muốn ghi lại quá trình tìm kiếm chúng.",

    // --- Thông tin nhanh (4 ô bên phải phần Về mình) ---
    "thongTin.1.nhan": "Học",  "thongTin.1.noiDung": "Cao học Marketing<small>UFM — Đại học Tài chính – Marketing · đang hoàn thành đề án</small>",
    "thongTin.2.nhan": "Làm",  "thongTin.2.noiDung": "Marketing & truyền thông<small>LUẬT VIỆT Á — doanh nghiệp gia đình</small>",
    "thongTin.3.nhan": "Luyện","thongTin.3.noiDung": "Tiếng Anh / IELTS<small>Mục tiêu hiện tại: 6.5</small>",
    "thongTin.4.nhan": "Xây",  "thongTin.4.noiDung": "Chính mình<small>Learn → Build → Become → Inspire</small>",

    // --- Triết lý ---
    "trietLy.nhan":  "Triết lý",
    "trietLy.moTa":  "Không phải khẩu hiệu cho đẹp — mà là ba giá trị định hướng cách mình sống, học, làm việc và tạo nội dung.",
    "trietLy.1.anhChu": "Ngày tốt nghiệp",
    "trietLy.1.noiDung": "Luôn học những thứ mình chưa biết: marketing, business, tiếng Anh, AI, giao tiếp, quản lý — và cả những bài học từ công việc lẫn cuộc sống.",
    "trietLy.2.anhChu": "Đi để lớn",
    "trietLy.2.noiDung": "Không dừng ở lý thuyết. Biến kiến thức thành thứ thực tế: sự nghiệp, hệ thống marketing, dự án cá nhân và chính bản thân mình.",
    "trietLy.3.anhChu": "Trên đường đi",
    "trietLy.3.noiDung": "Không dạy đời. Chỉ chia sẻ những gì mình đang trải qua — những lần thất bại, những lần bắt đầu lại, những thứ đang xây dựng.",

    // --- Hành trình ---
    "hanhTrinh.nhan":   "Hành trình",
    "hanhTrinh.tieuDe": "Đi ra ngoài. Học hỏi.<br>Quay về. <em>Xây dựng.</em>",
    "hanhTrinh.1.nhan": "Chương 01 — Học",        "hanhTrinh.1.noiDung": "Học Marketing, học tiếng Anh, học business. Học từ công việc — và từ những điều mình chưa biết.",
    "hanhTrinh.2.nhan": "Chương 02 — Trải nghiệm", "hanhTrinh.2.noiDung": "Bước vào môi trường làm việc thực tế, và hiểu rằng kiến thức trên giấy với vận hành thực tế khác nhau rất nhiều.",
    "hanhTrinh.3.nhan": "Chương 03 — Quay về",    "hanhTrinh.3.noiDung": "Quay về với doanh nghiệp gia đình — không phải để kế thừa một vị trí, mà để thử chứng minh những gì mình học có thể tạo ra giá trị thật.",
    "hanhTrinh.4.nhan": "Chương 04 — Xây dựng",   "hanhTrinh.4.noiDung": "Bắt đầu xây: marketing, thương hiệu, sự hiện diện số, nội dung, hệ thống và các dự án.",
    "hanhTrinh.5.nhan": "Chương 05 — Trở thành",  "hanhTrinh.5.noiDung": "Không tuyên bố đã thành công. Mình vẫn đang trên đường.",

    // --- Dự án ---
    "duAn.nhan":   "Đang xây",
    "duAn.tieuDe": "Những thứ mình <em>đang xây.</em>",
    "duAn.moTa":   "Không phải portfolio agency — chỉ là những gì một người thích xây dựng đang làm mỗi ngày.",
    "duAn.1.noiDung": "Chiến lược marketing, nội dung, thương hiệu và sự hiện diện số — từ góc nhìn của một marketer trong doanh nghiệp vừa và nhỏ.",
    "duAn.2.noiDung": "Phát triển doanh nghiệp gia đình trong lĩnh vực thuế, kế toán và luật — và những bài học vận hành rút ra từ thực tế.",
    "duAn.3.noiDung": "Website, mạng xã hội, hệ thống số và những thử nghiệm với AI.",
    "duAn.4.ten":     "Dự án cá nhân",
    "duAn.4.noiDung": "Thương hiệu cá nhân, nhận diện hình ảnh và các thử nghiệm sáng tạo — kể cả trang web bạn đang xem.",

    // --- Biểu tượng cá nhân ---
    "bieuTuong.nhan": "Biểu tượng cá nhân",
    "bieuTuong.moTa": "Không phải thần số học, cũng không phải định mệnh. Đây là những ý nghĩa mình tự chọn — để nhắc bản thân về hành trình.",
    "bieuTuong.1.ten": "1 — Quân Vua",
    "bieuTuong.1.noiDung": "Trên bàn cờ vua chỉ có một quân Vua — quân quan trọng nhất, ván cờ còn khi Vua còn đứng vững. Số 1 nhắc mình: bắt đầu từ chính mình và giữ vững chính mình.",
    "bieuTuong.2.ten": "13 — Lá K bích",
    "bieuTuong.2.noiDung": "Trong bộ bài, K là lá thứ 13. 12 là một chu kỳ trọn vẹn — 13 là bước ra khỏi chu kỳ cũ để bắt đầu chương mới, hướng tới người mình muốn trở thành.",
    "bieuTuong.3.ten": "777 — Jackpot",
    "bieuTuong.3.noiDung": "Ba số 7 thẳng hàng trên máy quay thưởng là khoảnh khắc jackpot. Nhưng với mình, jackpot không đến từ may mắn — mà từ việc kiên trì quay tiếp, xây tiếp.",

    // --- Theo dõi (mạng xã hội) ---
    "kenh.nhan":   "Theo dõi",
    "kenh.tieuDe": "Hành trình được ghi lại <em>mỗi ngày.</em>",
    "kenh.moTa":   "Mỗi nơi một màu sắc — nhưng vẫn là cùng một người đang xây dựng chính mình.",
    "kenh.instagram.moTa": "Hình ảnh, lifestyle, những khoảnh khắc cá nhân và suy nghĩ ngắn.",
    "kenh.tiktok.moTa":    "Đời thường và gần gũi: chuyện học, chuyện làm, chuyện sống.",
    "kenh.facebook.moTa":  "Chia sẻ dài hơn về marketing, business và hành trình trưởng thành.",
    "kenh.nut": "Theo dõi →",

    // --- Manifesto ---
    "tuyenNgon.cau":  "Mình không muốn xây thương hiệu cá nhân quanh một người <strong>đã thành công.</strong><br>Mình muốn ghi lại <em>quá trình trở thành.</em>",
    "tuyenNgon.dong": "Học những gì mình chưa biết.<br>Xây những thứ chưa tồn tại.<br>Thất bại. Xây lại.<br>Và mong rằng, truyền cảm hứng cho ai đó trên đường đi.",

    // --- Liên hệ (cuối trang) ---
    "lienHe.nhan":   "Trò chuyện",
    "lienHe.tieuDe": "Có điều gì muốn chia sẻ? <em>Nhắn cho mình nhé.</em>",
    "lienHe.moTa":   "Về marketing, business, chuyện học — hay đơn giản chỉ là chào nhau. Mình luôn sẵn lòng."
  },

  /* ======================= TIẾNG ANH ======================= */
  en: {
    "menu.gioiThieu": "About",
    "menu.trietLy":   "Philosophy",
    "menu.hanhTrinh": "Journey",
    "menu.duAn":      "Projects",
    "menu.bieuTuong": "Symbols",
    "menu.lienHe":    "Say hi",

    "hero.nhanTen": "Nguyễn Tuấn Khải — aka Jaycee",
    "hero.tieuDe":  "Still<br><em>becoming.</em>",
    "hero.moTa":    "A marketer based in Đồng Nai. I learn, I build — and I document the process: every lesson, every fresh start.",
    "hero.nutPhu":  "Read the story",

    "nut.zalo":      "Message me on Zalo",
    "nut.messenger": "Chat on Messenger",

    "gioiThieu.nhan":   "About",
    "gioiThieu.tieuDe": "A young person learning, building and <em>becoming.</em>",
    "gioiThieu.doan1":  "I'm Tuấn Khải, better known as <strong>Jaycee</strong>.",
    "gioiThieu.doan2":  "I'm at an interesting stage of life: learning, working and trying to build things of my own — all at once.",
    "gioiThieu.doan3":  "I study marketing, work in marketing at a family business, and I'm figuring out how to turn what I learn into real-world value.",
    "gioiThieu.doan4":  "I don't think I have all the answers. I just want to document the search for them.",

    "thongTin.1.nhan": "Study",    "thongTin.1.noiDung": "Master's in Marketing<small>UFM — University of Finance and Marketing · finishing thesis</small>",
    "thongTin.2.nhan": "Work",     "thongTin.2.noiDung": "Marketing & communications<small>LUẬT VIỆT Á — family business</small>",
    "thongTin.3.nhan": "Practice", "thongTin.3.noiDung": "English / IELTS<small>Current goal: 6.5</small>",
    "thongTin.4.nhan": "Build",    "thongTin.4.noiDung": "Myself<small>Learn → Build → Become → Inspire</small>",

    "trietLy.nhan":  "Philosophy",
    "trietLy.moTa":  "Not a pretty slogan — three values that guide how I live, learn, work and create.",
    "trietLy.1.anhChu": "Graduation day",
    "trietLy.1.noiDung": "Always learning what I don't know yet: marketing, business, English, AI, communication, management — and lessons from work and life.",
    "trietLy.2.anhChu": "Go out, grow up",
    "trietLy.2.noiDung": "Not stopping at theory. Turning knowledge into real things: a career, marketing systems, personal projects, and myself.",
    "trietLy.3.anhChu": "On the road",
    "trietLy.3.noiDung": "No preaching. Just sharing what I'm going through — the failures, the fresh starts, the things I'm building.",

    "hanhTrinh.nhan":   "Journey",
    "hanhTrinh.tieuDe": "Go out. Learn.<br>Come back. <em>Build.</em>",
    "hanhTrinh.1.nhan": "Chapter 01", "hanhTrinh.1.noiDung": "Learning marketing, English, business. Learning from work — and from everything I don't know yet.",
    "hanhTrinh.2.nhan": "Chapter 02", "hanhTrinh.2.noiDung": "Stepping into real work, and realising that knowledge on paper and real operations are very different things.",
    "hanhTrinh.3.nhan": "Chapter 03", "hanhTrinh.3.noiDung": "Returning to the family business — not to inherit a position, but to prove that what I've learned can create real value.",
    "hanhTrinh.4.nhan": "Chapter 04", "hanhTrinh.4.noiDung": "Starting to build: marketing, brand, digital presence, content, systems and projects.",
    "hanhTrinh.5.nhan": "Chapter 05", "hanhTrinh.5.noiDung": "Not claiming success. Still on the way.",

    "duAn.nhan":   "Building",
    "duAn.tieuDe": "What I'm <em>building.</em>",
    "duAn.moTa":   "Not an agency portfolio — just what someone who loves building is working on every day.",
    "duAn.1.noiDung": "Marketing strategy, content, brand and digital presence — from the perspective of a marketer inside an SME.",
    "duAn.2.noiDung": "Developing a family business in tax, accounting and law — and the operational lessons that come with it.",
    "duAn.3.noiDung": "Websites, social media, digital systems and experiments with AI.",
    "duAn.4.ten":     "Personal projects",
    "duAn.4.noiDung": "Personal brand, visual identity and creative experiments — including the site you're looking at.",

    "bieuTuong.nhan": "Personal symbols",
    "bieuTuong.moTa": "Not numerology, not destiny. These are meanings I chose for myself — reminders of the journey.",
    "bieuTuong.1.ten": "1 — The King",
    "bieuTuong.1.noiDung": "A chessboard has only one King — the most important piece; the game goes on as long as the King stands. The number 1 reminds me: start with yourself, and hold your ground.",
    "bieuTuong.2.ten": "13 — King of Spades",
    "bieuTuong.2.noiDung": "In a deck of cards, the King is the 13th. 12 is a complete cycle — 13 is stepping out of it into a new chapter, towards the person I want to become.",
    "bieuTuong.3.ten": "777 — Jackpot",
    "bieuTuong.3.noiDung": "Three sevens lined up on a slot machine is the jackpot moment. But to me, the jackpot isn't luck — it comes from spinning again and building again.",

    "kenh.nhan":   "Follow",
    "kenh.tieuDe": "The journey, documented <em>daily.</em>",
    "kenh.moTa":   "Each channel has its own colour — but it's the same person building himself.",
    "kenh.instagram.moTa": "Visuals, lifestyle, personal moments and short thoughts.",
    "kenh.tiktok.moTa":    "Everyday and down-to-earth: studying, working, living.",
    "kenh.facebook.moTa":  "Longer reflections on marketing, business and growing up.",
    "kenh.nut": "Follow →",

    "tuyenNgon.cau":  "I don't want to build a personal brand around someone who has <strong>already made it.</strong><br>I want to document <em>the process of becoming.</em>",
    "tuyenNgon.dong": "Learning what I don't know.<br>Building what doesn't exist yet.<br>Failing. Rebuilding.<br>And hopefully inspiring someone along the way.",

    "lienHe.nhan":   "Say hi",
    "lienHe.tieuDe": "Something to share? <em>Drop me a message.</em>",
    "lienHe.moTa":   "About marketing, business, learning — or just to say hello. Always happy to talk."
  }
};

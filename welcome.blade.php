<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lawar Plek Gungde</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <style>
    /* ========== VARIABLES ========== */
    :root{
      --bg-1: #fffaf5;
      --bg-2: #fff3e0;
      --accent: #f57c00;
      --accent-dark: #d35400;
      --muted: #6b6b6b;
      --card: rgba(255,255,255,0.9);
      --shadow: 0 18px 50px rgba(15,15,15,0.08);
      --radius-lg: 20px;
      --max-width: 1200px;
      --glass: rgba(255,255,255,0.6);
    }

    /* ========== RESET ========== */
    *{box-sizing:border-box;margin:0;padding:0;font-family:"Poppins",sans-serif}
    html,body{height:100%;scroll-behavior:smooth;}
    body{
      background: radial-gradient(circle at 10% 10%, #fff8f0 0%, #fff0da 30%, #fff3e0 100%);
      color:#222;
      overflow-x:hidden;
      line-height:1.5;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }

    /* ========== HEADER ========== */
    header{
      position:sticky;top:12px;z-index:9999;
      margin: 0 3%;
      width:calc(100% - 6%);
      background:linear-gradient(180deg, rgba(255,255,255,0.62), rgba(255,255,255,0.45));
      backdrop-filter:blur(8px);
      box-shadow:0 8px 30px rgba(0,0,0,0.06);
      padding:10px 18px;
      display:flex;align-items:center;justify-content:space-between;gap:20px;
      border-radius:16px;
      transform:translateY(0);
      transition:all .28s ease;
    }
    .brand{display:flex;align-items:center;gap:12px;}
    .brand .logo{
      width:48px;height:48px;border-radius:12px;
      background:linear-gradient(135deg,var(--accent),#ff9800);
      display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;
      box-shadow:0 8px 22px rgba(245,124,0,0.14);
    }
    header h2{font-weight:800;font-size:1.15rem;color:#222;margin-left:6px}
    header h2 span{color:var(--accent);}

    nav ul{display:flex;gap:18px;list-style:none;align-items:center}
    nav a{
      text-decoration:none;color:#444;font-weight:600;padding:8px 10px;border-radius:10px;transition:all .22s;
      position:relative;font-size:0.95rem;
    }
    nav a::after{content:"";position:absolute;left:50%;transform:translateX(-50%);bottom:-8px;width:0;height:3px;background:var(--accent);border-radius:20px;transition:width .22s}
    nav a:hover{color:var(--accent)} nav a:hover::after{width:60%}

    .header-cta{
      display:inline-flex;align-items:center;gap:8px;background:linear-gradient(90deg,var(--accent),#ff9800);
      padding:8px 12px;border-radius:999px;color:#fff;font-weight:700;box-shadow:0 10px 30px rgba(245,124,0,0.2);
      cursor:pointer;transition:transform .18s;
    }
    .header-cta:hover{transform:translateY(-4px)}

    /* ========== FLOATING MUSIC CONTROL ========== */
    .music-control{
      position:fixed;right:18px;bottom:18px;z-index:2000;
      background:linear-gradient(180deg,var(--accent),#ff9800);
      color:#fff;padding:12px;border-radius:999px;box-shadow:0 12px 30px rgba(0,0,0,0.18);
      display:flex;gap:10px;align-items:center;font-weight:700;cursor:pointer;
    }
    .music-btn{background:transparent;border:none;color:inherit;font-weight:800;font-size:1rem;cursor:pointer}

    /* ========== SECTIONS ========== */
    section{display:none;padding:48px 3% 96px;min-height:calc(100vh - 160px);opacity:0;transform:translateY(18px);transition:all .6s ease;}
    section.active{display:block;opacity:1;transform:translateY(0)}
    .container{max-width:var(--max-width);margin:0 auto;width:100%}

    /* ========== HERO / BERANDA ========== */
    .beranda-keren{
      display:flex;align-items:center;justify-content:center;
      padding:120px 3% 80px;
      background:linear-gradient(135deg,var(--bg-1) 0%, var(--bg-2) 100%);
      position:relative;overflow:hidden;
    }

    /* decorative animated blobs */
    .blob{
      position:absolute;filter:blur(40px);opacity:0.95;border-radius:50%;
      z-index:0;pointer-events:none;mix-blend-mode:screen;
    }
    .blob.a{width:420px;height:420px;left:-140px;top:-120px;background:radial-gradient(circle, rgba(255,200,120,0.28), rgba(245,124,0,0.08));animation:float 7s ease-in-out infinite;}
    .blob.b{width:320px;height:320px;right:-100px;bottom:-80px;background:radial-gradient(circle, rgba(255,220,170,0.22), rgba(245,124,0,0.06));animation:float 9s ease-in-out infinite reverse;}

    .hero-container{display:flex;gap:48px;align-items:center;width:100%;max-width:var(--max-width);z-index:2}
    .hero-text{flex:1;animation:fadeInLeft .9s both}
    .hero-text h1{font-size:2.8rem;margin-bottom:12px;color:#111;line-height:1.02}
    .hero-text h1 span{color:var(--accent)}
    .hero-text p{color:var(--muted);font-size:1.05rem;margin-bottom:18px}
    .btns{display:flex;gap:14px;flex-wrap:wrap}
    .btn{display:inline-flex;align-items:center;gap:10px;padding:12px 22px;border-radius:999px;background:linear-gradient(90deg,var(--accent),#ff9800);color:#fff;text-decoration:none;font-weight:700;box-shadow:0 12px 35px rgba(245,124,0,0.22);transition:transform .22s}
    .btn:hover{transform:translateY(-6px);box-shadow:0 20px 60px rgba(245,124,0,0.26)}
    .btn-outline{display:inline-flex;align-items:center;gap:10px;padding:12px 22px;border-radius:999px;background:transparent;border:2px solid rgba(245,124,0,0.18);color:var(--accent);font-weight:700;transition:all .22s}
    .btn-outline:hover{background:var(--accent);color:#fff;transform:translateY(-4px)}

    .hero-img{flex:1;display:flex;align-items:center;justify-content:center;animation:fadeInRight .9s both}
    .img-frame{position:relative;border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow);transform:rotate(-3deg);transition:transform .5s}
    .img-frame:hover{transform:rotate(0deg) scale(1.035)}
    .img-frame img{width:100%;max-width:520px;display:block;border-radius:var(--radius-lg);transition:transform .5s}
    .img-frame:hover img{transform:scale(1.04)}

    /* small ribbon label */
    .ribbon{
      position:absolute;left:26px;top:26px;padding:8px 12px;border-radius:999px;background:linear-gradient(90deg,#fff,#fff);color:var(--accent);font-weight:800;box-shadow:0 6px 20px rgba(0,0,0,0.06);z-index:3;
      transform:translateY(-8px);
    }

    /* ========== MENU SECTION ========== */
    .menu-section{background:linear-gradient(180deg,var(--bg-2),#fff);padding:60px 3% 100px}
    .menu-header{text-align:center;margin-bottom:24px;z-index:2}
    .menu-header h2{font-size:2.2rem;color:#222;font-weight:800;margin-bottom:8px}
    .menu-header h2 span{color:var(--accent)}
    .menu-header p{color:var(--muted);margin-bottom:24px}
    .menu-container{
      display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:26px;max-width:1100px;margin:0 auto;
    }

    .menu-item{
      background:linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.82));
      border-radius:16px;overflow:hidden;border:1px solid rgba(245,124,0,0.06);
      box-shadow:0 20px 40px rgba(15,15,15,0.06);transition:transform .36s,box-shadow .36s;
      transform:translateY(14px);
      opacity:0;
    }
    .menu-item.in-view{opacity:1;transform:translateY(0)}
    .menu-img-frame img{width:100%;height:220px;object-fit:cover;transition:transform .5s}
    .menu-item:hover .menu-img-frame img{transform:scale(1.06)}
    .menu-info{padding:16px;display:flex;flex-direction:column;gap:8px}
    .menu-info h3{font-size:1.1rem;color:#2e2e2e}
    .menu-info p{color:var(--muted);font-size:0.95rem}
    .menu-info .price{color:var(--accent);font-weight:800;font-size:1.05rem}

    /* ========== PESAN (keberadaan form tetap dipertahankan) ========== */
    .pesan{display:block;text-align:center;padding-bottom:80px}
    form{
      width:100%;max-width:560px;margin:10px auto 6px;background:rgba(255,255,255,0.95);
      border-radius:14px;padding:22px;box-shadow:0 12px 30px rgba(15,15,15,0.06);
    }
    label{display:block;font-weight:600;color:#444;margin-bottom:6px}
    input,textarea,select{width:100%;padding:12px;border-radius:10px;border:1px solid #e9e1d8;margin-bottom:12px;outline:none}
    input:focus,textarea:focus,select:focus{box-shadow:0 10px 30px rgba(245,124,0,0.06);border-color:rgba(245,124,0,0.14)}

    table{margin-top:12px;width:100%;max-width:980px;margin-inline:auto;border-collapse:collapse;border-radius:12px;overflow:hidden;background:var(--card);box-shadow:0 12px 30px rgba(15,15,15,0.06)}
    th,td{padding:12px 10px;text-align:center;border-bottom:1px solid rgba(0,0,0,0.04)}
    th{background:linear-gradient(90deg,var(--accent),#ff9800);color:#fff;font-weight:700}

    /* ========== KONTAK & FOOTER ========== */
    .kontak{text-align:center;padding-bottom:80px}
    .kontak h2{font-size:1.6rem;color:#222;margin-bottom:6px}
    footer{padding:28px 3%;text-align:center;color:var(--muted);font-weight:600}

    /* ========== RESPONSIVE ========== */
    @media (max-width:980px){
      header{margin:12px 4%;padding:10px 14px}
      .hero-container{flex-direction:column-reverse;gap:18px}
      .hero-text{text-align:center}
      .hero-text h1{font-size:2.2rem}
      .img-frame img{max-width:360px}
    }
    @media (max-width:560px){
      .hero-text h1{font-size:1.6rem}
      nav ul{display:none}
    }

    /* ========== ANIMATIONS ========== */
    @keyframes float{0%{transform:translateY(0)}50%{transform:translateY(-18px)}100%{transform:translateY(0)}}
    @keyframes fadeInLeft{from{opacity:0;transform:translateX(-30px)}to{opacity:1;transform:translateX(0)}}
    @keyframes fadeInRight{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}
  </style>
</head>
<body>
  <!-- header tetap sama -->
  <header>
    <div class="brand">
      <div class="logo">L</div>
      <h2>Lawar <span>Plek</span></h2>
    </div>

    <nav>
      <ul>
        <li><a href="#" onclick="tampilkan('beranda')">Beranda</a></li>
        <li><a href="#" onclick="tampilkan('menu')">Menu</a></li>
        <li><a href="#" onclick="tampilkan('kontak')">Kontak</a></li>
      </ul>
    </nav>

    <div class="header-cta" onclick="tampilkan('pesan')">
      🍽️ <small>Pesan Sekarang</small>
    </div>
  </header>

  <!-- HERO -->
  <section id="beranda" class="active beranda-keren">
    <div class="blob a" aria-hidden="true"></div>
    <div class="blob b" aria-hidden="true"></div>

    <div class="container hero-container">
      <div class="hero-text">
        <h1>Selamat Datang di <span>Lawar Plek Gungde</span></h1>
        <p>Lawar plek adalah hidangan khas Bali dari daging babi & ayam, dicampur dengan darah segar dan bumbu tradisional khas Bali. Rasakan cita rasa autentik Bali di setiap gigitan!</p>
        <div class="btns">
          <a href="#" class="btn" onclick="tampilkan('pesan')">🍽️ Pesan Sekarang</a>
          <a href="#" class="btn-outline" onclick="tampilkan('menu')">📜 Lihat Menu</a>
        </div>
      </div>

      <div class="hero-img">
        <div class="img-frame">
          <img src="images/lawar.jpg" alt="Lawar" />
        </div>
      </div>
    </div>
  </section>

  <!-- === MENU === -->
<section id="menu" class="menu-section">
  <div class="menu-header">
    <h2>🍽️ Menu <span>Lawar Plek Gungde</span></h2>
    <div class="header-line"></div>
    <p>Temukan berbagai pilihan menu lezat khas Bali yang menggugah selera.</p>
  </div>

  <div class="menu-container">
    <div class="menu-item" style="animation-delay: 0.1s">
      <div class="menu-img-frame">
        <img src="images/lawar plek babi biasa.jpg" alt="Lawar Plek Babi Biasa">
      </div>
      <div class="menu-info">
        <h3>Lawar Plek Babi Biasa</h3>
        <div class="rating">⭐️⭐️⭐️⭐️☆</div>
        <div class="price">Rp 25.000</div>
        <button onclick="pesanDariMenu('Lawar Plek Babi Biasa')">🛒 Pesan Sekarang</button>
      </div>
    </div>

    <div class="menu-item" style="animation-delay: 0.2s">
      <div class="menu-img-frame">
        <img src="images/babi pisah.jpg" alt="Lawar Babi Pisah">
      </div>
      <div class="menu-info">
        <h3>Lawar Babi Pisah</h3>
        <div class="rating">⭐️⭐️⭐️⭐️⭐️</div>
        <div class="price">Rp 35.000</div>
        <button onclick="pesanDariMenu('Lawar Babi Pisah')">🛒 Pesan Sekarang</button>
      </div>
    </div>

    <div class="menu-item" style="animation-delay: 0.3s">
      <div class="menu-img-frame">
        <img src="images/lawar ayam.jpg" alt="Lawar Ayam Biasa">
      </div>
      <div class="menu-info">
        <h3>Lawar Ayam Biasa</h3>
        <div class="rating">⭐️⭐️⭐️⭐️☆</div>
        <div class="price">Rp 25.000</div>
        <button onclick="pesanDariMenu('Lawar Ayam Biasa')">🛒 Pesan Sekarang</button>
      </div>
    </div>

    <div class="menu-item" style="animation-delay: 0.4s">
      <div class="menu-img-frame">
        <img src="images/ayam piisah.jpg" alt="Lawar Ayam Pisah">
      </div>
      <div class="menu-info">
        <h3>Lawar Ayam Pisah</h3>
        <div class="rating">⭐️⭐️⭐️⭐️⭐️</div>
        <div class="price">Rp 35.000</div>
        <button onclick="pesanDariMenu('Lawar Ayam Pisah')">🛒 Pesan Sekarang</button>
      </div>
    </div>

    <div class="menu-item" style="animation-delay: 0.5s">
      <div class="menu-img-frame">
        <img src="images/es teh.jpg" alt="Es Teh">
      </div>
      <div class="menu-info">
        <h3>Es Teh</h3>
        <div class="rating">⭐️⭐️⭐️⭐️☆</div>
        <div class="price">Rp 10.000</div>
        <button onclick="pesanDariMenu('Es Teh')">🛒 Pesan Sekarang</button>
      </div>
    </div>

    <div class="menu-item" style="animation-delay: 0.6s">
      <div class="menu-img-frame">
        <img src="images/temu lawak.jpg" alt="Es Temulawak">
      </div>
      <div class="menu-info">
        <h3>Es Temulawak</h3>
        <div class="rating">⭐️⭐️⭐️⭐️⭐️</div>
        <div class="price">Rp 10.000</div>
        <button onclick="pesanDariMenu('Es Temulawak')">🛒 Pesan Sekarang</button>
      </div>
    </div>
  </div>
</section>

  <!-- PESAN (form tetap ada sesuai permintaan awal) -->
  <section id="pesan" class="pesan">
    <div class="container">
      <h2>🛍️ Formulir Pemesanan</h2>
      <p>Isi data pesanan Anda dengan lengkap di bawah ini:</p><br>
      <form id="formPemesanan" onsubmit="return tambahPesanan(event)">
        <label>Nama Pelanggan:</label><input type="text" id="nama" required>
        <label>Pilih Menu:</label>
        <select id="menuSelect" required>
          <option value="">-- Pilih Menu --</option>
          <option value="Lawar Plek Babi Biasa">Lawar Plek Babi Biasa</option>
          <option value="Lawar Babi Pisah">Lawar Babi Pisah</option>
          <option value="Lawar Ayam Biasa">Lawar Ayam Biasa</option>
          <option value="Lawar Ayam Pisah">Lawar Ayam Pisah</option>
          <option value="Es Teh">Es Teh</option>
          <option value="Es Temulawak">Es Temulawak</option>
        </select>
        <label>Jumlah:</label><input type="number" id="jumlah" required min="1">
        <label>Catatan (opsional):</label><textarea id="catatan" rows="3"></textarea>
        <button type="submit" class="btn">Tambah ke Pesanan</button>
      </form>

      <table id="tabelPesanan">
        <thead><tr><th>No</th><th>Nama</th><th>Menu</th><th>Jumlah</th><th>Catatan</th></tr></thead>
        <tbody></tbody>
      </table>
    </div>
  </section>

  <!-- === KONTAK === -->
  <section id="kontak" class="kontak">
    <h2>Hubungi Kami 📞</h2>
    <p>📍 Jl. Erlangga No.11, Bangli, Bali</p>
    <p>📧 lawarplekgungde@warungmakan.com</p>
    <p>📱 0877-6148-3450</p>
  </section>

  <footer>
    <p>© 2025 Lawar Plek Gungde | All Rights Reserved</p>
  </footer>

  <!-- === EMBED MUSIK TIKTOK === -->
  <blockquote class="tiktok-embed" cite="https://vt.tiktok.com/ZSUun2xpP/" data-video-id="ZSUun2xpP" style="display:none;"></blockquote>
  <script async src="https://www.tiktok.com/embed.js"></script>

  <!-- === AUDIO BACKUP (jika embed gagal dimuat) === -->
  <audio id="bgMusic" loop preload="auto">
    <source src="public/images/lagu.mp4" type="audio/mpeg" />
  </audio>

  <script>
    /* ========== preserve original functions and behavior ========== */

    function tampilkan(id){
      document.querySelectorAll("section").forEach(sec=>sec.classList.remove("active"));
      const target = document.getElementById(id);
      if(target) target.classList.add("active");
      window.scrollTo({top:0,behavior:"smooth"});
    }

    function tambahPesanan(e){
      e.preventDefault();
      const nama=document.getElementById("nama").value.trim();
      const menu=document.getElementById("menuSelect").value;
      const jumlah=document.getElementById("jumlah").value;
      const catatan=document.getElementById("catatan").value;
      if(!nama||!menu||!jumlah) return;
      const tbody=document.querySelector("#tabelPesanan tbody");
      const row=tbody.insertRow();
      row.insertCell(0).innerText=tbody.rows.length;
      row.insertCell(1).innerText=nama;
      row.insertCell(2).innerText=menu;
      row.insertCell(3).innerText=jumlah;
      row.insertCell(4).innerText=catatan;
      e.target.reset();
    }

    function pesanDariMenu(menu){
      tampilkan("pesan");
      document.getElementById("menuSelect").value=menu;
      window.scrollTo({top:0,behavior:"smooth"});
    }

    // expose globally as original code expected
    window.tampilkan = tampilkan;
    window.tambahPesanan = tambahPesanan;
    window.pesanDariMenu = pesanDariMenu;

    /* ========== Playful UI enhancements (non-destructive) ========== */

    document.addEventListener('DOMContentLoaded', ()=>{

      // 1) Scroll-trigger reveal for .menu-item
      const observer = new IntersectionObserver((entries)=>{
        entries.forEach(entry=>{
          if(entry.isIntersecting){
            entry.target.classList.add('in-view');
          }
        });
      }, {threshold: 0.18});
      document.querySelectorAll('.menu-item').forEach(el => observer.observe(el));

      // 2) Floating blob parallax on mousemove (subtle)
      const blobA = document.querySelector('.blob.a');
      const blobB = document.querySelector('.blob.b');
      document.addEventListener('mousemove', (e)=>{
        const w = window.innerWidth;
        const h = window.innerHeight;
        const nx = (e.clientX - w/2) / (w/2);
        const ny = (e.clientY - h/2) / (h/2);
        if(blobA) blobA.style.transform = `translate(${nx * 12}px, ${ny * 10}px)`;
        if(blobB) blobB.style.transform = `translate(${nx * -8}px, ${ny * -12}px)`;
      });

      // 3) subtle scroll parallax for hero image
      const heroImg = document.querySelector('.img-frame img');
      window.addEventListener('scroll', ()=>{
        const rect = document.querySelector('.hero-container')?.getBoundingClientRect();
        if(rect){
          const offset = Math.max(-100, Math.min(100, rect.top));
          if(heroImg) heroImg.style.transform = `translateY(${offset * -0.06}px) scale(1)`;
        }
      }, {passive:true});

      // 4) music control behavior
      const audio = document.getElementById('bgMusic');
      const toggle = document.getElementById('musicToggle');
      const muteToggle = document.getElementById('muteToggle');

      // try autoplay muted for better UX — many browsers allow autoplay if muted
      audio.muted = true;
      // start playing muted automatically (may still be blocked on some browsers; user can press play)
      const tryPlay = async ()=>{
        try { await audio.play(); toggle.innerText = '⏸'; } catch(e) { toggle.innerText = '▶'; }
      };
      tryPlay();

      // toggle play/pause: when unmuted and play, show ⏸
      toggle.addEventListener('click', ()=>{
        if(audio.paused){ audio.play().then(()=>{ toggle.innerText = '⏸'; }).catch(()=>{ toggle.innerText='▶'; }); }
        else { audio.pause(); toggle.innerText = '▶'; }
      });

      // mute/unmute toggle
      muteToggle.addEventListener('click', ()=>{
        audio.muted = !audio.muted;
        muteToggle.innerText = audio.muted ? '🔇' : '🔊';
        // if unmuted and paused, start playing
        if(!audio.muted && audio.paused){
          audio.play().then(()=>{ toggle.innerText='⏸'; }).catch(()=>{ toggle.innerText='▶'; });
        }
      });

      // show/hide music control on small screens less intrusive (optional)
      if(window.innerWidth < 520){
        const mc = document.getElementById('musicControl');
        mc.style.right = '12px';
        mc.style.bottom = '12px';
      }

      // 5) make header slightly shrink on scroll for nicer effect
      const header = document.querySelector('header');
      let lastScroll = 0;
      window.addEventListener('scroll', ()=>{
        const s = window.scrollY;
        if(s > 40){ header.style.transform = 'translateY(-4px) scale(0.995)'; header.style.boxShadow = '0 18px 48px rgba(0,0,0,0.08)'; }
        else { header.style.transform = 'translateY(0) scale(1)'; header.style.boxShadow = '0 8px 30px rgba(0,0,0,0.06)'; }
        lastScroll = s;
      }, {passive:true});

    }); // DOMContentLoaded
  </script>
</body>
</html>

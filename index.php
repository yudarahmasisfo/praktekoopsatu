<!-- <?php
// index.php
$nama = "Peserta Praktik";
$waktu = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website PHP di Hugging Face</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .container { max-width: 600px; margin: 0 auto; }
        .box { background: #f0f8ff; padding: 20px; border-radius: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Belajar OOP</h1>
        <p>Halo <strong><?= htmlspecialchars($nama) ?></strong></p>
        <div class="box">
            <p>Waktu server: <code><?= $waktu ?></code></p>
            <p>Dijalankan di <strong>Docker</strong> di Hugging Face Spaces ✅</p>
        </div>
    </div>
</body>
</html> -->
<?php
// Definisikan variabel untuk kontrol menu
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelajaran Pemrograman Berorientasi Objek</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            transition: all 0.3s ease;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid #34495e;
        }
        
        .sidebar-header h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .sidebar-header p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .menu {
            list-style: none;
            padding: 20px 0;
        }
        
        .menu-item {
            position: relative;
        }
        
        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .menu-link:hover, .menu-link.active {
            background-color: #3498db;
        }
        
        .menu-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .submenu {
            list-style: none;
            background-color: #34495e;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .submenu.open {
            max-height: 500px;
        }
        
        .submenu-link {
            display: block;
            padding: 10px 20px 10px 50px;
            color: #ecf0f1;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }
        
        .submenu-link:hover, .submenu-link.active {
            background-color: #2980b9;
        }
        
        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }
        
        .content-header {
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        
        .content-header h1 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .content-header p {
            color: #7f8c8d;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .card h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        .card p {
            margin-bottom: 15px;
        }
        
        .highlight {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
        }
        
        .code-block {
            background-color: #2c3e50;
            color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            overflow-x: auto;
            margin: 20px 0;
        }
        
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h1>PBO Online</h1>
                <p>Pembelajaran Interaktif</p>
            </div>
            
            <ul class="menu">
                <li class="menu-item">
                    <a href="?page=home" class="menu-link <?php echo $page == 'home' ? 'active' : ''; ?>">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="#" class="menu-link" id="teori-pbo">
                        <i class="fas fa-book"></i> Teori PBO
                        <i class="fas fa-chevron-down" style="margin-left: auto;"></i>
                    </a>
                    <ul class="submenu" id="submenu-teori">
                        <li><a href="?page=teori&subject=dasar-php" class="submenu-link <?php echo ($page == 'teori' && $subject == 'dasar-php') ? 'active' : ''; ?>">Materi Dasar PHP</a></li>
                        <li><a href="?page=teori&subject=class" class="submenu-link <?php echo ($page == 'teori' && $subject == 'class') ? 'active' : ''; ?>">Class</a></li>
                        <li><a href="?page=teori&subject=object" class="submenu-link <?php echo ($page == 'teori' && $subject == 'object') ? 'active' : ''; ?>">Objek</a></li>
                        <li><a href="?page=teori&subject=property-method" class="submenu-link <?php echo ($page == 'teori' && $subject == 'property-method') ? 'active' : ''; ?>">Property & Method</a></li>
                        <li><a href="?page=teori&subject=encapsulation" class="submenu-link <?php echo ($page == 'teori' && $subject == 'encapsulation') ? 'active' : ''; ?>">Enkapsulasi</a></li>
                    </ul>
                </li>
                
                <li class="menu-item">
                    <a href="#" class="menu-link" id="praktek-pbo">
                        <i class="fas fa-laptop-code"></i> Praktek PBO
                        <i class="fas fa-chevron-down" style="margin-left: auto;"></i>
                    </a>
                    <ul class="submenu" id="submenu-praktek">
                        <li><a href="?page=praktek&subject=implementasi" class="submenu-link <?php echo ($page == 'praktek' && $subject == 'implementasi') ? 'active' : ''; ?>">Implementasi Class</a></li>
                        <li><a href="?page=praktek&subject=inheritance" class="submenu-link <?php echo ($page == 'praktek' && $subject == 'inheritance') ? 'active' : ''; ?>">Pewarisan</a></li>
                        <li><a href="?page=praktek&subject=polymorphism" class="submenu-link <?php echo ($page == 'praktek' && $subject == 'polymorphism') ? 'active' : ''; ?>">Polimorfisme</a></li>
                        <li><a href="?page=praktek&subject=latihan" class="submenu-link <?php echo ($page == 'praktek' && $subject == 'latihan') ? 'active' : ''; ?>">Latihan Soal</a></li>
                    </ul>
                </li>
                
                <li class="menu-item">
                    <a href="#" class="menu-link" id="database">
                        <i class="fas fa-database"></i> Database
                        <i class="fas fa-chevron-down" style="margin-left: auto;"></i>
                    </a>
                    <ul class="submenu" id="submenu-database">
                        <li><a href="?page=database&subject=koneksi" class="submenu-link <?php echo ($page == 'database' && $subject == 'koneksi') ? 'active' : ''; ?>">Koneksi Database</a></li>
                        <li><a href="?page=database&subject=crud" class="submenu-link <?php echo ($page == 'database' && $subject == 'crud') ? 'active' : ''; ?>">CRUD dengan OOP</a></li>
                        <li><a href="?page=database&subject=orm" class="submenu-link <?php echo ($page == 'database' && $subject == 'orm') ? 'active' : ''; ?>">ORM Dasar</a></li>
                    </ul>
                </li>
                
                <li class="menu-item">
                    <a href="?page=about" class="menu-link <?php echo $page == 'about' ? 'active' : ''; ?>">
                        <i class="fas fa-info-circle"></i> Tentang
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="content">
            <div class="content-header">
                <h1>
                    <?php
                    switch($page) {
                        case 'home': echo 'Selamat Datang di Pembelajaran PBO'; break;
                        case 'teori': 
                            switch($subject) {
                                case 'dasar-php': echo 'Materi Dasar PHP'; break;
                                case 'class': echo 'Konsep Class dalam PBO'; break;
                                case 'object': echo 'Konsep Objek dalam PBO'; break;
                                case 'property-method': echo 'Property dan Method'; break;
                                case 'encapsulation': echo 'Enkapsulasi dalam PBO'; break;
                                default: echo 'Teori Pemrograman Berorientasi Objek';
                            }
                            break;
                        case 'praktek': 
                            switch($subject) {
                                case 'implementasi': echo 'Implementasi Class'; break;
                                case 'inheritance': echo 'Pewarisan (Inheritance)'; break;
                                case 'polymorphism': echo 'Polimorfisme'; break;
                                case 'latihan': echo 'Latihan Soal PBO'; break;
                                default: echo 'Praktek Pemrograman Berorientasi Objek';
                            }
                            break;
                        case 'database': 
                            switch($subject) {
                                case 'koneksi': echo 'Koneksi Database'; break;
                                case 'crud': echo 'CRUD dengan OOP'; break;
                                case 'orm': echo 'ORM Dasar'; break;
                                default: echo 'Database dengan PBO';
                            }
                            break;
                        case 'about': echo 'Tentang Pembelajaran PBO'; break;
                        default: echo 'Pembelajaran Pemrograman Berorientasi Objek';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    switch($page) {
                        case 'home': echo 'Pelajari konsep dasar Pemrograman Berorientasi Objek dengan PHP'; break;
                        case 'teori': echo 'Pelajari teori dasar Pemrograman Berorientasi Objek'; break;
                        case 'praktek': echo 'Terapkan konsep PBO dalam kode PHP'; break;
                        case 'database': echo 'Integrasikan PBO dengan operasi database'; break;
                        case 'about': echo 'Informasi tentang pembelajaran PBO'; break;
                        default: echo 'Pembelajaran interaktif Pemrograman Berorientasi Objek';
                    }
                    ?>
                </p>
            </div>
            
            <div class="card">
                <?php
                // Konten berdasarkan halaman yang dipilih
                switch($page) {
                    case 'home':
                        include('content/home.php');
                        break;
                    case 'teori':
                        switch($subject) {
                            case 'dasar-php': include('content/teori/dasar-php.php'); break;
                            case 'class': include('content/teori/class.php'); break;
                            case 'object': include('content/teori/object.php'); break;
                            case 'property-method': include('content/teori/property-method.php'); break;
                            case 'encapsulation': include('content/teori/encapsulation.php'); break;
                            default: include('content/teori/default.php');
                        }
                        break;
                    case 'praktek':
                        switch($subject) {
                            case 'implementasi': include('content/praktek/implementasi.php'); break;
                            case 'inheritance': include('content/praktek/inheritance.php'); break;
                            case 'polymorphism': include('content/praktek/polymorphism.php'); break;
                            case 'latihan': include('content/praktek/latihan.php'); break;
                            default: include('content/praktek/default.php');
                        }
                        break;
                    case 'database':
                        switch($subject) {
                            case 'koneksi': include('content/database/koneksi.php'); break;
                            case 'crud': include('content/database/crud.php'); break;
                            case 'orm': include('content/database/orm.php'); break;
                            default: include('content/database/default.php');
                        }
                        break;
                    case 'about':
                        include('content/about.php');
                        break;
                    default:
                        include('content/home.php');
                }
                ?>
            </div>
            
            <div class="footer">
                <p>&copy; <?php echo date('Y'); ?> Pembelajaran Pemrograman Berorientasi Objek | Dibuat oleh [Nama Dosen]</p>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu toggle functionality
            const menuLinks = document.querySelectorAll('.menu-link');
            
            menuLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Skip if it's a direct link
                    if (this.getAttribute('href') !== '#') return;
                    
                    e.preventDefault();
                    
                    const submenu = this.nextElementSibling;
                    const icon = this.querySelector('.fa-chevron-down');
                    
                    // Toggle submenu
                    submenu.classList.toggle('open');
                    
                    // Rotate icon
                    if (submenu.classList.contains('open')) {
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        icon.style.transform = 'rotate(0)';
                    }
                });
            });
            
            // Open submenu if active
            const activeSubmenuLinks = document.querySelectorAll('.submenu-link.active');
            activeSubmenuLinks.forEach(link => {
                const submenu = link.parentElement;
                const menuLink = submenu.previousElementSibling;
                const icon = menuLink.querySelector('.fa-chevron-down');
                
                submenu.classList.add('open');
                icon.style.transform = 'rotate(180deg)';
            });
        });
    </script>
</body>
</html>
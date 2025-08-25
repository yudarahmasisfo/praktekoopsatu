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
        
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            display: block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
            border-radius: 4px;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: #3498db;
        }
        
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #34495e;
            min-width: 200px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 0 0 4px 4px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-link {
            display: block;
            padding: 10px 15px;
            color: #ecf0f1;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }
        
        .dropdown-link:hover, .dropdown-link.active {
            background-color: #2980b9;
        }
        
        .content {
            padding: 30px 0;
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
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }
        
        .footer p {
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            .logo {
                margin-bottom: 15px;
            }
            
            .nav-menu {
                flex-direction: column;
                width: 100%;
            }
            
            .nav-item {
                width: 100%;
            }
            
            .dropdown {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                display: none;
                background-color: #2c3e50;
            }
            
            .nav-item:hover .dropdown {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">PBO Online</div>
                <nav>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="?page=home" class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>">
                                <i class="fas fa-home"></i> Beranda
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book"></i> Teori PBO
                            </a>
                            <div class="dropdown">
                                <a href="slideoop.html" class="dropdown-link active">Materi Dasar PHP</a>
                                <a href="?page=teori&subject=class" class="dropdown-link <?php echo ($page == 'teori' && $subject == 'class') ? 'active' : ''; ?>">Class</a>
                                <a href="?page=teori&subject=object" class="dropdown-link <?php echo ($page == 'teori' && $subject == 'object') ? 'active' : ''; ?>">Objek</a>
                                <a href="?page=teori&subject=property-method" class="dropdown-link <?php echo ($page == 'teori' && $subject == 'property-method') ? 'active' : ''; ?>">Property & Method</a>
                                <a href="?page=teori&subject=encapsulation" class="dropdown-link <?php echo ($page == 'teori' && $subject == 'encapsulation') ? 'active' : ''; ?>">Enkapsulasi</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-laptop-code"></i> Praktek PBO
                            </a>
                            <div class="dropdown">
                                <a href="?page=praktek&subject=implementasi" class="dropdown-link <?php echo ($page == 'praktek' && $subject == 'implementasi') ? 'active' : ''; ?>">Implementasi Class</a>
                                <a href="?page=praktek&subject=inheritance" class="dropdown-link <?php echo ($page == 'praktek' && $subject == 'inheritance') ? 'active' : ''; ?>">Pewarisan</a>
                                <a href="?page=praktek&subject=polymorphism" class="dropdown-link <?php echo ($page == 'praktek' && $subject == 'polymorphism') ? 'active' : ''; ?>">Polimorfisme</a>
                                <a href="?page=praktek&subject=latihan" class="dropdown-link <?php echo ($page == 'praktek' && $subject == 'latihan') ? 'active' : ''; ?>">Latihan Soal</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-database"></i> Database
                            </a>
                            <div class="dropdown">
                                <a href="?page=database&subject=koneksi" class="dropdown-link <?php echo ($page == 'database' && $subject == 'koneksi') ? 'active' : ''; ?>">Koneksi Database</a>
                                <a href="?page=database&subject=crud" class="dropdown-link <?php echo ($page == 'database' && $subject == 'crud') ? 'active' : ''; ?>">CRUD dengan OOP</a>
                                <a href="?page=database&subject=orm" class="dropdown-link <?php echo ($page == 'database' && $subject == 'orm') ? 'active' : ''; ?>">ORM Dasar</a>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="?page=about" class="nav-link <?php echo $page == 'about' ? 'active' : ''; ?>">
                                <i class="fas fa-info-circle"></i> Tentang
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <div class="content">
        <div class="container">
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
                        include(__DIR__ . '/content/home.php');
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
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Pembelajaran Pemrograman Berorientasi Objek | Dibuat oleh [Nama Dosen]</p>
        </div>
    </footer>
</body>
</html>
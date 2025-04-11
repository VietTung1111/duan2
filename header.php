
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="tên_tiệm">
        <a href="index.php" class="logo">MEEBOOK</a> <!-- Logo của trang -->
        <div class="dropdown">
            <a href="#">THỂ LOẠI TRUYỆN</a>
            <div class="dropdown-content">
                <a href="sachnoibat.php">Sách Nổi Bật</a>
                <a href="ngontinh.php">Ngôn Tình</a>
                <a href="kinhdi.php">Kinh Dị</a>
                <a href="trinhtham.php">Trinh Thám</a>
            </div>
        </div>
        <a href="dangky_nhap.php">ĐĂNG NHẬP/ĐĂNG KÝ</a>
        <a href="cart.html">GIỎ HÀNG</a>
        <div class="tentk"> <!-- Hiển thị tên tài khoản -->
           <?php session_start();?>
            <ul>
              <?php if (isset($_SESSION["username"])): ?>
                <li >XIN CHÀO, <b><?php echo $_SESSION["username"]; ?></b></li>
                <li ><a href="logout.php">ĐĂNG XUẤT</a></li>
              <?php else: ?>
              <?php endif; ?>
            </ul>
        </div>
        <div class="searchbar">
        <input class="search_input" type="text" name="" placeholder="Tìm kiếm...">
        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
    </div>
    
    
    <style>
        *{
            margin: 0;
            
        }
        @media only screen and (max-width: 412px) {
            body {
              background-color: lightblue;
            }
          }
        body h2 {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        } 
        
        .tên_tiệm {
            position:sticky;
            background-color: #10b1b6; /* Màu nền */
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            font-family: Arial, sans-serif;
            flex-wrap: wrap; /* Để hỗ trợ responsive */
            z-index: 1000;
            opacity:0.8;
            top:0;
            height: 60px;
            margin-bottom: 1px;
        }

        /* Logo */
        .tên_tiệm .logo {
            font-size: 1.9em;
            color: #FFFFFF;
            font-weight: bold;
            text-decoration: none;
            font-family: Curlz MT;
        }

        /* Menu items */
        .tên_tiệm a {
            color: #FFFFFF;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1em;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s; /* Thêm hiệu ứng chuyển tiếp */
            position: relative; /* Cần thiết cho menu thả xuống */
        }

        /* Hiệu ứng hover */
        .tên_tiệm a:hover {
            background-color: #10b1b6;
        }
        
        /* Dropdown menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.5);
            z-index: 1;
            border-radius: 10px;
            padding: 10px 0;
        }
        
        .dropdown-content a {
            color:black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background-color:  #075f62;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .tên_tiệm {
                flex-direction: column;
                align-items: flex-start;
            }
            .tên_tiệm a {
                margin: 3px 0; /* Giảm khoảng cách cho các liên kết trên màn hình nhỏ */
            }
        }
        
        .searchbar{
        height: 20px;
        background-color: transparent;
        border-radius: 30px;
        padding: 10px;
        border: #5A5D63 1px solid;
        }

        .search_input{
        color: rgb(14, 14, 14);
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        caret-color:transparent;
        line-height: 20px;
        transition: width 0.4s linear;
        font-weight: bold;
        font-size: 15px;
        }

        .searchbar:hover > .search_input{
        padding: 0 10px;
        width: 150px;
        caret-color:red;
        transition: width 0.4s linear;
        }

        .searchbar:hover > .search_icon{
        background: white;
        color: #e74c3c;
        }

        .search_icon{
        height: 7px;
        width: 10px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color:white;
        text-decoration:none;
        }
        .tentk {
         
         list-style: none; /* Loại bỏ dấu chấm */
         padding: 0;
         margin: 0;
        }
        .tentk  li {
         display: inline-block; /* Hiển thị theo hàng ngang */
         padding: 10px;
         background-color: #10b1b6;
         color: white;
        }
    </style>
    <script>
        function toggleDropdown(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định
            const dropdown = document.getElementById('genreDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block'; // Chuyển đổi hiển thị
        }
    
        // Đóng dropdown nếu người dùng nhấp ra ngoài
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                const dropdown = document.getElementById('genreDropdown');
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }
    </script>
    
</body>
</html>

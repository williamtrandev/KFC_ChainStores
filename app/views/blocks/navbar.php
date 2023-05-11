<nav class="my-sidebar close">
    <header>
        <a href="<?php echo _WEB_ROOT ?>/home">
            <div class="logo">
                <div class="brand">KFC</div>
                <div class="text header-text">
                    <span class="name">KFC</span>
                </div>
            </div>
        </a>
        <i class="fa-solid fa-angle-right toggle"></i>
    </header>
    <div class="my-menu-bar">
        <div class="my-menu">
            <ul class="my-menu-links">
                <li class="my-nav-link">
                    <a href="<?php echo _WEB_ROOT ?>/home">
                        <i class="fas fa-hamburger icon"></i>
                        <span class="nav-text text">Order</span>
                        <span class="tooltip-text">Order</span>
                    </a>
                </li>
                <li class="my-nav-link">
                    <a href="<?php echo _WEB_ROOT ?>/home/listOrder">
                        <i class="fa-regular fa-rectangle-list icon"></i>
                        <span class="nav-text text">Danh sách đơn đặt</span>
                        <span class="tooltip-text">Danh sách đơn đặt hàng</span>
                    </a>
                </li>
                <li class="my-nav-link">
                    <a href="<?php echo _WEB_ROOT ?>/home/listShip">
                        <i class="fa-sharp fa-solid fa-truck-fast icon"></i>
                        <span class="nav-text text">Phân bổ đơn hàng</span>
                        <span class="tooltip-text">Phân bổ đơn hàng online</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <?php
            if (!isset($_SESSION['user'])) {
                echo
                "<li>
                    <a href='" . _WEB_ROOT . "/nhanVien/login'>
                        <i class='fa-solid fa-right-to-bracket icon'></i>
                        <span class='nav-text text'>Đăng nhập</span>
                        <span class='tooltip-text'>Đăng nhập</span>
                    </a>
                </li>";
            } else {
                echo
                "<li>
                    <a href='" . _WEB_ROOT . "/nhanVien/logout'>
                        <i class='fa-solid fa-right-from-bracket icon logout-icon'></i>
                        <span class='nav-text text'>Đăng xuất</span>
                        <span class='tooltip-text'>Đăng xuất</span>
                    </a>
                </li>";
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['user'])) {
            $name = json_decode($_SESSION['user'])->tenNhanVien;
            // echo $_SESSION['user'];
            echo "<div class='user-icon'>
                <a>
                    <img src='" . _WEB_ROOT . "/public/assets/client/img/user.png' alt='' />
                    <span class='text'>$name</span>
                </a>
            </div>";
        }
        ?>
    </div>
</nav>
<nav class="my-sidebar-bottom">
    <ul class="my-menu-bottom-links">
        <li class="my-nav-bottom-link">
            <a href="<?php echo _WEB_ROOT ?>/home">
                <i class=" fa-solid fa-house-chimney icon"></i>
                <span class="nav-text text">Trang chủ</span>
            </a>
        </li>
        <li class="my-nav-bottom-link has-sub-menu">
            <i class="fa-sharp fa-solid fa-gear icon"></i>
            <span class="nav-text text">Cài đặt</span>
            <ul class="sub-menu-nav">
                <li class="theme-mode d-flex flex-column justify-content-center">
                    <div class="wrapper-toggle-switch d-flex flex-column justify-content-center">
                        <div class="toggle-switch">
                            <div class="switch"></div>
                        </div>
                        <span class="sub-menu-text">Dark Mode</span>
                    </div>
                </li>


                <?php
                if (!isset($_SESSION['user'])) {
                    echo
                    "<li>
                    <a href='" . _WEB_ROOT . "/nhanVien/login'>
                        <i class='fa-solid fa-right-to-bracket icon'></i>
                        <span class='nav-text text'>Đăng nhập</span>
                        <span class='tooltip-text'>Đăng nhập</span>
                    </a>
                </li>";
                } else {
                    echo "<li>
                    <a href='" . _WEB_ROOT . "/nhanVien'><i class=' fa-solid fa-user icon sub-icon'></i>
                        <span class='sub-menu-text'>Thông tin</span></a>
                </li>";
                    echo
                    "<li>
                    <a href='" . _WEB_ROOT . "/nhanVien/logout'>
                        <i class='fa-solid fa-right-from-bracket icon logout-icon'></i>
                        <span class='nav-text text'>Đăng xuất</span>
                        <span class='tooltip-text'>Đăng xuất</span>
                    </a>
                </li>";
                }
                ?>
            </ul>
        </li>
    </ul>
</nav>
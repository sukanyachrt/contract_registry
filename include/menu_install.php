<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bold ms-0">ระบบทะเบียนสัญญา</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">จัดการข้อมูล</span></li>
        
        <li class="menu-item" data-menu="contract">
            <a href="../contract/index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18n="Basic">ข้อมูลทะเบียนสัญญา</div>
            </a>
        </li>


    </ul>
</aside>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleMenuItemClick(clickedItem) {
            document.querySelectorAll('.menu-item').forEach(function(item) {
                item.classList.remove('active');
            });
            clickedItem.classList.add('active');
            sessionStorage.setItem('menu', clickedItem.getAttribute('data-menu'));
        }

        document.querySelectorAll('.menu-item').forEach(function(item) {
            item.addEventListener('click', function() {
                handleMenuItemClick(item);
            });
        });

        var storedMenu = sessionStorage.getItem('menu');
        if (storedMenu) {
            document.querySelectorAll('.menu-item').forEach(function(item) {
                if (item.getAttribute('data-menu') === storedMenu) {
                    handleMenuItemClick(item);
                }
            });
        }
    });
</script>
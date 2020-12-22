<!-- Main Sidebar Container -->
<?php
    $role_id = $this->session->userdata('kode_role');
    $q_menu = "SELECT *
                FROM user_menu JOIN  user_access_menu
                ON user_menu.kode_menu = user_access_menu.kode_menu
                WHERE user_access_menu.kode_role = '$role_id'
                ORDER BY user_access_menu.kode_menu ASC
    ";

    $menu = $this->db->query($q_menu)->result_array();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/'); ?>dist/img/coffee-bean.png" alt="ProCoffee Logo" class=" brand-image img-circle elevation-3">
        <span class=" brand-text font-weight-light">ProCoffee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <!-- Catatan sebelum buat looping, nanti dibuat looping nya seperti starterpack disini + pengefix an beberapa -->
                <?php
                    foreach($menu as $m) :
                    
                    $menu_id = $m['kode_menu'];
                    $q_submenu = "SELECT * 
                                    FROM user_sub_menu JOIN user_menu
                                    ON user_sub_menu.kode_menu = user_menu.kode_menu
                                    WHERE user_sub_menu.kode_menu = '$menu_id'
                                    AND user_sub_menu.is_active = 1
                    ";
                    $submenu = $this->db->query($q_submenu)->result_array();
                  
                    $ci = get_instance();
                    $url = $this->uri->segment(1);
                    if($m['menu'] == $url) :
                ?>    
                <li class="nav-item has-treeview menu-open">    
                    <a href="#" class="nav-link active">
                <?php else: ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                <?php endif; ?>
                    <i class="nav-icon fas <?= $m['icon']; ?>"></i>
                    <p>
                        <?= $m['menu']; ?><i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                    <?php foreach($submenu as $sm) : ?>
                        <ul class="nav nav-treeview">
                        <?php if($sm['sub_menu'] == $title): ?>
                        <li class="nav-item">
                            <a href="<?= base_url() . $sm['url']; ?>" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= $sm['sub_menu']; ?></p>
                            </a>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a href="<?= base_url() . $sm['url']; ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?= $sm['sub_menu']; ?></p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php endforeach; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
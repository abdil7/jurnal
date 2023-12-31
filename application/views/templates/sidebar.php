<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-newspaper"></i>
        </div>
        <div class="sidebar-brand-text mx-3">W. Jurnal</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- query menu ey -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                  FROM `user_menu` JOIN `user_access_menu`
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
            FROM `user_sub_menu`
            WHERE `menu_id` = $menuId
            AND `is_active` = 1;
            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif ?>
                <?php if ($sm['title'] == 'Jurusan') : ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Jurusan</h6>
                            <a class="collapse-item" href="<?= base_url('agenda_remake'); ?>">MP</a>
                            <a class="collapse-item" href="#">AK</a>
                            <a class="collapse-item" href="#">LP</a>
                            <a class="collapse-item" href="#">BD</a>
                            <a class="collapse-item" href="#">TKJ</a>
                            <a class="collapse-item" href="<?= base_url('jurusan/rpl'); ?>">RPL</a>
                            <a class="collapse-item" href="#">DKV</a>
                            <a class="collapse-item" href="#">PSPTv</a>
                        </div>
                    </div>
                <?php else : ?>
                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>
                <?php endif ?>
                </li>
            <?php endforeach ?>

            <hr class="sidebar-divider">

        <?php endforeach ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout/'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
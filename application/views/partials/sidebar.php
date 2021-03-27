<!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a target="_blank" href="<?= base_url('assets/index.html') ?>">GPickUp<a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?= base_url('assets/assets/images/users/avatar.jpg') ?>" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?= base_url('assets/assets/images/users/fatoni.png')?>" alt="<?= $this->session->userdata('nama_lengkap'); ?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $this->session->userdata('nama_lengkap'); ?></div>
                                <div class="profile-data-title"><?= $this->session->userdata('nama_akses'); ?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    
                    <?php 
                        $menu_title = $this->db->get_where('menus', array('sub_menu' => 1010, 'level' => $this->session->userdata('id')));
                        foreach ($menu_title->result() as $mt) {
                            echo '<li class="xn-title" style="background-color:black;">'.$mt->nama_menu.'</li>';
                            $menu = $this->db->get_where('menus', array('sub_menu' => $mt->id, 'level' => $this->session->userdata('id')));
                            foreach ($menu->result() as $mn) {
                                $sub_menu = $this->db->get_where('menus', array('sub_menu' => $mn->id, 'level' => $this->session->userdata('id')));
                                if ($sub_menu->num_rows() > 0) { ?>
                                    <li class="xn-openable">
                                        <a href="#"><span class="<?= $mn->icon ?>"></span>
                                            <span class="xn-text"><?= $mn->nama_menu ?></span></a>
                                        <ul>
                                            <?php 
                                                foreach ($sub_menu->result() as $sb) {
                                                    echo '<li class="">
                                                            <a href="'.$sb->link.'"><span class="'.$sb->icon.'"></span> '.$sb->nama_menu.'</a>
                                                        </li>'; 
                                                }
                                             ?>                        
                                        </ul>
                                    </li>
                                <?php }else{ ?>
                                <li class="">
                                    <a href="<?= $mn->link ?>"><span class="<?= $mn->icon ?>"></span> 
                                    <span class="xn-text"><?= $mn->nama_menu ?></span></a>                  
                                </li>       
                                <?php }           
                            }
                        }
                    ?>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
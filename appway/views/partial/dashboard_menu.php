<a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> Dashboard Sidebar Menu</a>
<div class="utf_dashboard_navigation js-scrollbar">
    <div class="utf_dashboard_navigation_inner_block">
        <ul>
            <li class="<?= ($this->uri->segment('2') == '') ? 'active' : '' ?>"><a href="<?=base_url('backend');?>"><i class="sl sl-icon-grid"></i> Dashboard</a></li>
            <li class="<?= ($this->uri->segment('2') == 'message') ? 'active' : '' ?>"><a href="<?=base_url('backend/message');?>"><i class="sl sl-icon-envelope-open"></i> Pesan</a></li>
            <li class="<?= ($this->uri->segment('2') == 'wishlist') ? 'active' : '' ?>"><a href="<?=base_url('backend/wishlist');?>"><i class="sl sl-icon-heart"></i> Wishlist</a></li>
            <li class="<?= ($this->uri->segment('2') == 'rating') ? 'active' : '' ?>"><a href="<?=base_url('backend/rating');?>"><i class="sl sl-icon-star"></i> Rating</a></li>
            <li class="<?= ($this->uri->segment('2') == 'report') ? 'active' : '' ?>"><a href="<?=base_url('backend/report');?>"><i class="sl sl-icon-star"></i> Laporan</a></li>
            <!-- <li class="<?= ($this->uri->segment('2') == 'user_profile' || $this->uri->segment('2') == 'change_password') ? 'active' : '' ?>">
                <a href="#"><i class="sl sl-icon-user"></i> Akun Saya</a>
                <ul>
                    <li><a href="<?=base_url('backend/user_profile');?>"><i class="sl sl-icon-user"></i> Profil</a></li>
                    <li><a href="<?=base_url('backend/change_password');?>"><i class="sl sl-icon-lock"></i> Ubah Password</a></li>
                    <li><a href="<?=base_url('logout');?>"><i class="sl sl-icon-logout"></i> Keluar</a></li>
                </ul>	
            </li>	 -->
        </ul>
    </div>
</div>
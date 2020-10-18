<div class="utf_user_name"><span><img src="<?= base_url('uploads/setting/avatar.png') ?>" alt=""></span><?= get_user_data('full_name'); ?></div>
<ul>
    <li><a href="<?= base_url('backend'); ?>"><i class="sl sl-icon-grid"></i> Dashboard</a></li>
    <li><a href="<?= base_url('backend/profile'); ?>"><i class="sl sl-icon-user"></i> Profil</a></li>
    <li><a href="<?= base_url('backend/change_password'); ?>"><i class="sl sl-icon-key"></i> Ubah Password</a></li>
    <li><a href="<?= base_url('logout'); ?>"><i class="sl sl-icon-logout"></i> Keluar</a></li>
</ul>
<nav id="navigation" class="style_one">
    <ul id="responsive">
        <li><a class="<?= ($this->uri->segment('2') == '' || $this->uri->segment('2') == 'index') ? 'current' : '' ?>" href="<?= base_url('landing'); ?>">Beranda</a>
        </li>
        <li><a class="<?= ($this->uri->segment('2') == 'faq') ? 'current' : '' ?>" href="<?= base_url('landing/faq'); ?>">FAQs</a>
        </li>
        <li><a class="<?= ($this->uri->segment('2') == 'testimonial') ? 'current' : '' ?>" href="<?= base_url('landing/testimonial'); ?>">Testimoni</a>
        </li>
        <li><a class="<?= ($this->uri->segment('2') == 'contact') ? 'current' : '' ?>" href="<?= base_url('landing/contact'); ?>">Kontak</a>
        </li>
    </ul>
</nav>
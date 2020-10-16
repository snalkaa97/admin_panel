<div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
    <div class="small_dialog_header">
        <h3>Sign In</h3>
    </div>
    <div class="utf_signin_form style_one">
        <!-- <ul class="utf_tabs_nav">
            <li class=""><a href="#tab1">Log In</a></li>
            <li><a href="#tab2">Register</a></li>
        </ul> -->
        <div class="tab_container alt">
            <div class="tab_content" id="tab1" style="display:none;">
                <form method="post" class="login">
                    <!-- <a href="javascript:void(0);" class="social_bt facebook_btn"><i class="fa fa-facebook"></i>Login with Facebook</a> -->
                    <a href="<?= base_url('oauth/v/google'); ?>" class="social_bt google_btn"><i class="fa fa-google-plus"></i>Login with Google</a>
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="username">
                            <input type="text" class="input-text" name="username" id="username" value="" placeholder="Username" />
                        </label>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="password">
                            <input class="input-text" type="password" name="password" id="password" placeholder="Password" />
                        </label>
                    </p>
                    <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span class="lost_password fl_left"> <a href="javascript:void(0);">Forgot Password?</a> </span>
                        <div class="checkboxes fl_right">
                            <input id="remember-me" type="checkbox" name="check">
                            <label for="remember-me">Remember Me</label>
                        </div>
                    </div>
                    <div class="utf_row_form">
                        <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                    </div>
                </form>
            </div>

            <div class="tab_content" id="tab2" style="display:none;">
                <form method="post" class="register">
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="username2">
                            <input type="text" class="input-text" name="username" id="username2" value="" placeholder="Username" />
                        </label>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="email2">
                            <input type="text" class="input-text" name="email" id="email2" value="" placeholder="Email" />
                        </label>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="password1">
                            <input class="input-text" type="password" name="password1" id="password1" placeholder="Password" />
                        </label>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="password2">
                            <input class="input-text" type="password" name="password2" id="password2" placeholder="Confirm Password" />
                        </label>
                    </p>
                    <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                </form>
            </div>
        </div>
    </div>
</div>

<div id="dialog_search_part" class="zoom-anim-dialog mfp-hide">
    <div class="small_dialog_header">
        <h3>Pencarian</h3>
    </div>
    <div class="utf_signin_form style_one ">
        <div class="tab_container alt">
            <div class="tab_content" id="tab1">
                <form method="get" id="search_form2" action="<?= base_url(); ?>landing/search?layout=grid" class="login">
                    <p class="utf_row_form utf_form_wide_block">
                        <label for="q">
                            <input name="q" type="text" placeholder="Kata Kunci" value="" />
                        </label>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <select name="f" data-placeholder="Semua Tipe" class="selectpicker default" title="Semua Tipe" data-live-search="true" data-selected-text-format="count" data-size="3">
                            <option value="<?= JUDUL; ?>" selected><?= JUDUL_LABEL; ?></option>
                            <option value="<?= PENGARANG; ?>"><?= PENGARANG_LABEL; ?></option>
                            <option value="<?= TAHUN; ?>"><?= TAHUN_LABEL; ?></option>
                            <option value="<?= SUBJEK; ?>"><?= SUBJEK_LABEL; ?></option>
                            <option value="<?= CATALOGID; ?>"><?= CATALOGID_LABEL; ?></option>
                            <option value="<?= BIBID; ?>"><?= BIBID_LABEL; ?></option>
                            </option>
                        </select>
                    </p>
                    <p class="utf_row_form utf_form_wide_block">
                        <select name="fq" data-placeholder="Semua Kategori" class="selectpicker default" title="Semua Kategori" data-live-search="true" data-selected-text-format="count" data-size="3">
                            <option value="-1">Semua Kategori</option>
                            <option value="<?= OPAC_NASKAH_KUNO ?>"><?= ucwords(OPAC_NASKAH_KUNO_LABEL); ?></option>
                            <option value="<?= OPAC_BUKU_LANGKA ?>"><?= ucwords(OPAC_BUKU_LANGKA_LABEL); ?></option>
                            <option value="<?= OPAC_PETA ?>"><?= ucwords(OPAC_PETA_LABEL); ?></option>
                            <option value="<?= OPAC_MIKRO_FILM ?>"><?= ucwords(OPAC_MIKRO_FILM_LABEL); ?>
                            <option value="<?= OPAC_FOTO_GAMBAR_LUKISAN ?>"><?= ucwords(OPAC_FOTO_GAMBAR_LUKISAN_LABEL); ?></option>
                            <option value="<?= OPAC_MAJALAH_SURAT_KABAR_LANGKA ?>"><?= ucwords(OPAC_MAJALAH_SURAT_KABAR_LANGKA_LABEL); ?></option>
                            <option value="<?= OPAC_SUMBER_LAINNYA ?>"><?= ucwords(OPAC_SUMBER_LAINNYA_LABEL); ?></option>
                        </select>
                    </p>
                    <div class="utf_row_form margin-top-35 margin-bottom-35">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <button class="button" onclick="window.location.">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
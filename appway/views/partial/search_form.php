<form method="get" class="search_form" action="<?= base_url(); ?>landing/search?layout=grid" style="display:none;">
    <div class="main_input_search_part" style="margin-top:0px !important;">
        <div class="main_input_search_part_item">
            <input name="q" type="text" placeholder="Kata Kunci" value="<?=$this->input->get('q');?>" />
        </div>
        <div class="main_input_search_part_item intro-search-field">
            <select name="f" data-placeholder="Berdasarkan" class="selectpicker default" title="Berdasarkan" data-live-search="true" data-selected-text-format="count" data-size="5">
                <option value="<?=JUDUL;?>" <?=(empty($this->input->get('f'))) ? 'selected':'';?>><?=JUDUL_LABEL;?></option>
                <option value="<?=PENGARANG;?>" <?=($this->input->get('f') == PENGARANG) ? 'selected':'';?>><?=PENGARANG_LABEL;?></option>
                <option value="<?=TAHUN;?>" <?=($this->input->get('f') == TAHUN) ? 'selected':'';?>><?=TAHUN_LABEL;?></option>
                <option value="<?=SUBJEK;?>" <?=($this->input->get('f') == SUBJEK) ? 'selected':'';?>><?=SUBJEK_LABEL;?></option>
                <option value="<?=CATALOGID;?>" <?=($this->input->get('f') == CATALOGID) ? 'selected':'';?>><?=CATALOGID_LABEL;?></option>
                <option value="<?=BIBID;?>" <?=($this->input->get('f') == BIBID) ? 'selected':'';?>><?=BIBID_LABEL;?></option>
            </select>
        </div>
        <div class="main_input_search_part_item intro-search-field">
            <select name="fq" data-placeholder="Kategori" class="selectpicker default" title="Kategori" data-live-search="true" data-selected-text-format="count" data-size="5">
                <option value="<?=OPAC_SEMUA_KOLEKSI;?>" <?=(empty($this->input->get('fq'))) ? 'selected':'';?>><?=OPAC_SEMUA_KOLEKSI_LABEL;?></option>
                <option value="<?=OPAC_NASKAH_KUNO;?>" <?=($this->input->get('fq') == OPAC_NASKAH_KUNO) ? 'selected':'';?>><?= ucwords(OPAC_NASKAH_KUNO_LABEL);?></option>
                <option value="<?=OPAC_BUKU_LANGKA;?>" <?=($this->input->get('fq') == OPAC_BUKU_LANGKA) ? 'selected':'';?>><?= ucwords(OPAC_BUKU_LANGKA_LABEL);?></option>
                <option value="<?=OPAC_PETA;?>" <?=($this->input->get('fq') == OPAC_PETA) ? 'selected':'';?>><?= ucwords(OPAC_PETA_LABEL);?></option>
                <option value="<?=OPAC_MIKRO_FILM;?>" <?=($this->input->get('fq') == OPAC_MIKRO_FILM) ? 'selected':'';?>><?= ucwords(OPAC_MIKRO_FILM_LABEL);?>
                <option value="<?=OPAC_FOTO_GAMBAR_LUKISAN;?>" <?=($this->input->get('fq') == OPAC_FOTO_GAMBAR_LUKISAN) ? 'selected':'';?>><?= ucwords(OPAC_FOTO_GAMBAR_LUKISAN_LABEL);?></option>
                <option value="<?=OPAC_MAJALAH_SURAT_KABAR_LANGKA;?>" <?=($this->input->get('fq') == OPAC_MAJALAH_SURAT_KABAR_LANGKA) ? 'selected':'';?>><?= ucwords(OPAC_MAJALAH_SURAT_KABAR_LANGKA_LABEL);?></option>
                <option value="<?=OPAC_SUMBER_LAINNYA;?>" <?=(!empty($this->input->get('fq')) && $this->input->get('fq') == OPAC_SUMBER_LAINNYA) ? 'selected':'';?>><?= ucwords(OPAC_SUMBER_LAINNYA_LABEL);?></option>
            </select>
        </div>
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <button class="button" onclick="window.location">Cari</button>
    </div>
</form>
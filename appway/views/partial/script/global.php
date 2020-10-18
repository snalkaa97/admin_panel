<script>
    function get_alias(worksheet) {
        var alias_name = '';
        switch (worksheet.toUpperCase()) {
            case 'MANUSKRIP':
                alias_name = "Naskah Kuno";
                break;
            case 'MONOGRAF':
                alias_name = "Buku Langka";
                break;
            case 'BAHAN KARTOGRAFIS':
                alias_name = "Peta";
                break;
            case 'BAHAN CAMPURAN':
                alias_name = "Foto, Gambar & Lukisan";
                break;
            case 'TERBITAN BERKALA':
                alias_name = "Majalah & Surat Kabar Langka";
                break;
            case 'SUMBER ELEKTRONIK':
                alias_name = "Sumber Lainnya";
                break;
            case 'REKAMAN SUARA':
                alias_name = "Sumber Lainnya";
                break;
            case 'BENTUK MIKRO':
                alias_name = "Mikro Film";
                break;
            default:
                alias_name = worksheet;
        }
        return alias_name.toUpperCase();
    }

    function get_latest(limit, domID) {
        $.ajax({
            url: BASE_URL + 'opac/get_latest/' + limit,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(xhr) {
                $('#'+domID).html('Loading...');
            },
            success: function(response) {
                var output = '';
                var noimage = BASE_URL + 'uploads/setting/noimage.png';
                $.each(response.response.response.docs, function(index, itemData) {
                    output +=
                        '<div class="col-lg-4 col-md-6">' +
                        '<a href="' + BASE_URL + 'landing/detail/' + itemData.catalogid + '" class="utf_listing_item-container" data-marker-id="1">' +
                        '<div class="utf_listing_item"> <img src="' + itemData.coverurl + '" alt="" onerror="this.onerror=null;this.src=`' + noimage + '`;" width="100">' +
                        '<span class="tag"><i class="sl sl-icon-folder-alt"></i> ' + get_alias(itemData.worksheet) + '</span>' +
                        '<span class="utf_open_now">' + itemData.catalogid + '</span>' +
                        '<div class="utf_listing_item_content">' +
                        '<h3 style="font-size:16px">' + itemData.title[0].substr(0, 125) + '...</h3>' +
                        '<span><i class="fa fa-calendar"></i> ' + itemData.createdate + '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="utf_star_rating_section" data-rating="4.5">' +
                        '<div class="utf_counter_star_rating">(4.5)</div>' +
                        '<span class="utf_view_count"><i class="fa fa-eye"></i> 25+</span>' +
                        '<span class="like-icon"></span>' +
                        '</div>' +
                        '</a>' +
                        '</div>';
                });
                $('#'+domID).html('');
                $('#'+domID).html(output);
            }
        });
    }

    function get_summary(opacID, domID) {
        $.ajax({
            url: BASE_URL + 'opac/get_summary?fq=' + opacID,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(xhr) {
                $('#'+domID).html('Loading...');
            },
            success: function(response) {
                $('#'+domID).html('');
                $('#'+domID).html(response.response.response.numFound + ' koleksi ');
            }
        });
    }
</script>
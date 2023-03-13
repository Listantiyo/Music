$(function () {

    // for packet_list_item
    $("form#item-data").submit(function (e) { 
        e.preventDefault();
        let formData = new FormData(this);
        let url = $(this).attr('action'); // /admin/packet_list_item/create
        let dataurl = $(this).data("url");
        let array ;
        $('div.item-list').empty();
        // ALUR Create
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (rsp) {
                
                let image = 
                '<div class="mx-1">'+
                '<img src="URL" width="100px" alt="">'+
                '<p>NAME</p>'+
                '</div>'; 

                array = JSON.parse(rsp);

                for (const ix in array) {
                    image = image.replace("URL",dataurl+array[ix].path);
                    image = image.replace("NAME",array[ix].name);
                    $('div.item-list').append(image);
                    image = 
                    '<div class="mx-1">'+
                    '<img src="URL" width="100px" alt="">'+
                    '<p>NAME</p>'+
                    '</div>'; 
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $("a.bitem").click(function (e) { 
        e.preventDefault();
        $('select.category-pick').empty();
        $('div.item-list').empty();
        $('div.checkbox-item-list').empty();
        let url = $(this).data('url');
        let type = $(this).data('type');
        let array;
        $.ajax({
            url: url+'admin/packet_list_item/getAll',
            type: 'POST',
            data:{type:type},
            success: function (rsp) {
                let syntax; 

                array = JSON.parse(rsp);
                console.table(array.category);
                //? get data untuk form create item
                if (type === 'create') {
                    syntax =  
                    '<div class="mx-1">'+
                    '<img src="URL" width="100px" alt="">'+
                    '<p>NAME</p>'+
                    '</div>'; 

                    for (const ix in array.items) {
                        syntax = syntax.replace("URL",url+array.items[ix].path);
                        syntax = syntax.replace("NAME",array.items[ix].name);

                        $('div.item-list').append(syntax);
                        syntax = 
                        '<div class="mx-1">'+
                        '<img src="URL" width="100px" alt="">'+
                        '<p>NAME</p>'+
                        '</div>'; 
                    }
                }
                //? get data untuk form create packet-list
                if (type === 'use') {

                    $('select.category-pick').append('<option disabled selected hidden>Pilih</option>');

                    syntax = '<option value="ID">CATEGORY</option>'

                    for (const ix in array.category) {

                        syntax = syntax.replace("ID",array.category[ix].id);
                        syntax = syntax.replace("CATEGORY",array.category[ix].title);

                        $('select.category-pick').append(syntax);
                        syntax = '<option value="ID">CATEGORY</option>'; 
                    }

                    syntax =  
                    '<div><input class="form-check-input"'+ 'type="checkbox" name="item[]" value="ID" id="FOR">'+
                    '<label class="form-check-label"'+ 'for="FOR">NAME'+
                    '</label></div>';

                    for (const ix in array.items) {
                        syntax = syntax.replace("ID",array.items[ix].id);
                        syntax = syntax.replace("FOR",'defaultCheck'+array.items[ix].id);
                        syntax = syntax.replace("NAME",array.items[ix].name);

                        $('div.checkbox-item-list').append(syntax);
                        syntax = 
                        '<div><input class="form-check-input"'+ 'type="checkbox" name="item[]" value="ID" id="FOR">'+
                        '<label class="form-check-label"'+ 'for="FOR">NAME'+
                        '</label></div>'; 
                    }
                }
            },
        });

    });



});
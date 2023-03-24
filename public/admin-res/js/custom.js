//? for packet_list_item
$(function () {
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
//? end packet list

//? for team
$(function () {
    $('button.team-link-button').click(function (e) { 
        e.preventDefault();
        let id = $(this).data('id');
        let url = $(this).data('url');
        $('input.team-link-input').val(null);
        $('#staticBackdropLinkLabel.modal-title').html('Team Sosmed');
        $('input.team-link-input[name=id_team]').val(id);
        $.ajax({
            type: 'POST',
            url: url+'admin/team/getLink',
            data: {id:id},
            success: function (rsp) {
                let array = JSON.parse(rsp).get_link;

                if (array !== false) {
                    if (array.twitter != null) {
                        $('input.team-link-input[name=twitter]').val(array.twitter);
                    }
                    if (array.facebook != null) {
                        $('input.team-link-input[name=facebook]').val(array.facebook);
                    }
                    if (array.instagram != null) {
                        $('input.team-link-input[name=instagram]').val(array.instagram);
                    }
                    if (array.linkedin != null) {
                        $('input.team-link-input[name=linkedin]').val(array.linkedin);
                    }
                }
            }
        });
    });

    $('a.team-button.add').click(function (e) { 
        e.preventDefault();
        const url = $('#FormModalTeam').attr('action');
        $('#TeamModalLabel').html('Tambah');
        $('.team-input[name=name]').val(null);
        $('.team-input[name=title]').val(null);
        $('#FormModalTeam').attr('action', url+'admin/team/tambah');
    });

    $('button.team-button.update').click(function (e) { 
        e.preventDefault();
        $('.team-input[name=name]').val(null);
        $('.team-input[name=title]').val(null);
        const url = $(this).data('url');
        const id = $(this).data('id');
        $('#FormModalTeam').attr('action');

        $.ajax({
            type: "POST",
            url: url+'admin/team/getTeam',
            data: {id:id},
            success: function (rsp) {
                let array = JSON.parse(rsp).get_team;
                $('#TeamModalLabel').html('Update '+ array.name);
                $('.team-input[name=name]').val(array.name);
                $('.team-input[name=title]').val(array.title);
                $('.team-input[name=id]').val(array.id);
                $('.team-input[name=old_image]').val(array.img);
                $('.team-input[name=old_path]').val(array.path);
                $('#FormModalTeam').attr('action', url+'admin/team/update');
            }
        });
    });
});

function trash(id,url) {
    
    $.ajax({
        type: 'POST',
        url: url+'admin/team/delete',
        data: {id:id},
        success: function (response) {
            location.reload();
        }
    });
}
//? end team
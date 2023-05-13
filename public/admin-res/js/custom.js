$url = $('body').data('url');

//? for packet
function packetCreate() {
    
    $('#form-packet').attr('action',$url+'admin/packet/create');
    $('.modal-title').html('Tambah Paket');
    $('.form-control[name=id]').val('');
    $('.form-control[name=title]').val('');
    $('.form-control[name=old_path]').val('');
    $('.form-control[name=descrb]').val('');
    $('.preview').attr('src','https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg');

}
function packetUpdate(id) {
    
    $.ajax({
        type: "post",
        url: $url+"admin/packet/getSingle",
        data: {id:id},
        dataType: "JSON",
        success: function (rsp) {
            
            $('.modal-title').html('Ubah Paket');
            $('#form-packet').attr('action',$url+'admin/packet/update');
            $('#form-packet').append('<input type="hidden" class="form-control" name="id" value="'+rsp.id+'">');
            $('#form-packet').append('<input type="hidden" class="form-control" name="old_path" value="'+rsp.path+'">');
                
            $('.form-control[name=title]').val(rsp.title);
            $('.form-control[name=descrb]').val(rsp.descrb);
            $('.preview').attr('src',$url+rsp.path);
        }
    });
}
function packetDelete(id,path) {
    $('#packet-delete input[name=id_packet]').val(id);
    $('#packet-delete input[name=path]').val(path);

    $('#packet-delete').submit();
}

//? for packet_list_item
$(function () {

    $("form#item-data").submit(function (e) { 
        e.preventDefault();

        if ($('.alert-item-list')[0] != undefined) {
            $('.alert-item-list').remove();
        }

        const $this = $(this);
        const formData = new FormData(this);
        $.ajax({
            url: $($this).attr('action'), // /admin/packet_list_item/create
            type: 'POST',
            data: formData,
            dataType: "JSON",
            success: function (rsp) {
                console.log(rsp);
                if (typeof(rsp.status) == 'string'){
                    $('#item-data').append(`  <div class="alert alert-warning alert-dismissible fade show alert-item-list" role="alert">
                    DATA <strong> GAGAL </strong> DITAMBAH `+ rsp.status +` 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>`)
                }

                new loadcreateItem(rsp);
                $($this).find('label.custom-file-label').html('Pilih file')
                $($this)[0].reset();

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $("form#item-dataUP").submit(function (e) { 
        e.preventDefault();

        if ($('.alert-item-list')[0] != undefined) {
            $('.alert-item-list').remove();
        }

        const $this = $(this);
        const formData = new FormData(this);   
        $.ajax({
            url: $($this).attr('action'), // /admin/packet_list_item/update
            type: 'POST',
            data: formData,
            dataType: "JSON",
            success: function (rsp) {
                $($this).parents('.modal').modal('hide');    

                if (typeof(rsp.status) == 'string'){
                    $('#item-data').append(`  <div class="alert alert-warning alert-dismissible fade show alert-item-list" role="alert">
                    DATA <strong> GAGAL </strong> DITAMBAH `+ rsp.status +` 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>`)
                }

                if ( rsp.update == true ) {
                    $('#itemModal').modal('toggle');  
                    new loadcreateItem(rsp);
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    //* used for loading item list
    $("a.bitem").click(function (e) { 
        e.preventDefault();
        const type = $(this).data('type');

        $.ajax({
            url: $url+'admin/packet_list_item/getAll',
            type: 'POST',
            data:{type:type},      
            dataType: "JSON",
            success: function (rsp) {
                
                //? get data untuk form create item
                if (type === 'create') new loadcreateItem(rsp);
                //? get data untuk form create packet-list
                if (type === 'use') new loaduseItem(rsp);
                
            },
        });

    });
});

function trashItem(id) {

    $.ajax({
        type: 'POST',
        url: $url+'admin/packet_list_item/delete',
        data: {id:id},
        cache: false,
        dataType: "JSON",
        success: function (rsp) {

            new loadcreateItem(rsp);
        }
    });    

}

function updateItem(id) {

    $('#itemModalUP').modal('toggle');
    $('#itemModalUP form input[name=id]').val(id);

    $.ajax({
        type: "POST",
        url: $url+"admin/packet_list_item/getSingle",
        data: {id:id},
        dataType: "JSON",
        success: function (rsp) {
            $('#itemModalUP form input[name=name]').val(rsp.item.name);
            $('#itemModalUP form input[name=old_itemPath]').val(rsp.item.path);
            $('#itemModalUP form input[name=old_itemImage]').val(rsp.item.img);
            $('#itemModalUP img.preview').attr('src',$url+rsp.item.path);
            $('#itemModalUP label.custom-file-label').html('Pilih Gambar ...');
            
        }
    });

}

function updateItemPacket(id) {
    
    const $id = id;
    $('#modalJenisPaket').find('.modal-title').html('Update Packet Item');
    $('#modalJenisPaket').find('form').attr('action',$url+'/admin/packet_list/update');
    $('#modalJenisPaket').find('form').append('<input name="id" type="hidden" value="'+id+'"></input>');

    $.ajax({
        method: "POST",
        url: $url+"admin/packet_list/getSingle",
        data: {id:id},
        dataType: "JSON",
        success:function(rsp){
            const array = rsp;
            let   htmlNew;
            
            $('select.category-pick').empty();
            $('div.checkbox-item-list').empty();
            // $('select.category-pick').append('<option disabled selected hidden>Pilih</option>');

            const htmlOptions = '<option value="ID">CATEGORY</option>';
            const htmlOptionsSelected = '<option selected value="ID">CATEGORY</option>';
            
            for (const ix in array.category) {
                
                if (array.category[ix].category_id == array.packet_item.category_id) {
                    
                    htmlNew = htmlOptionsSelected.replace("ID",array.category[ix].id);
                    htmlNew = htmlNew.replace("CATEGORY",array.category[ix].title);
            
                    $('select.category-pick').append(htmlNew);

                    continue;
                }

                htmlNew = htmlOptions.replace("ID",array.category[ix].id);
                htmlNew = htmlNew.replace("CATEGORY",array.category[ix].title);
        
                $('select.category-pick').append(htmlNew);
            }

            $('input.packet-list-title').val(array.packet_item.title);

            const htmlCheckbox =  
            `<div>
            <input class="form-check-input" type="checkbox" name="item[]" value="ID" id="FOR" >
            <label class="form-check-label" for="FOR">NAME</label>
            </div>`;
            const htmlCheckedbox =  
            `<div>
            <input checked class="form-check-input" type="checkbox" name="item[]" value="ID" id="FOR" >
            <label class="form-check-label" for="FOR">NAME</label>
            </div>`;

            const itemIds = JSON.parse(array.packet_item.items)
            let number;
            for (const ix in array.items) {
                number = 0

                let itemId = array.items[ix].id;
                let itemName = array.items[ix].name;

                    for (const ix in itemIds) {
                        if (itemId == itemIds[ix]) {

                            htmlNew = htmlCheckedbox.replace("ID",itemId);
                            htmlNew = htmlNew.replace("FOR",'defaultCheck'+itemId);
                            htmlNew = htmlNew.replace("NAME",itemName);
                    
                            $('div.checkbox-item-list').append(htmlNew);
                            number++;
                        }
                        
                    }
                if (number > 0) continue;

                htmlNew = htmlCheckbox.replace("ID",itemId);
                htmlNew = htmlNew.replace("FOR",'defaultCheck'+itemId);
                htmlNew = htmlNew.replace("NAME",itemName);
        
                $('div.checkbox-item-list').append(htmlNew);
            }
        }
    })

}

function loadcreateItem(json) {

    let syntax_new;
    let syntax =  
    '<div class="mx-1">'+
    '<img class="img-items" src="URL" height="100rem" alt="">'+
    '<p>NAME</p>'+
    '<button onclick="trashItem(IDX)" class="btn btn-danger mr-1"> X </button>'+
    '<button onclick="updateItem(IDU)" class="btn btn-warning"  data-dismiss="modal"><i class="fa fa-arrow-up"></button>'
    '</div>'
    ; 
    $('div.item-list').empty();
    const array = json.items;

    for (const ix in array){
        syntax_new = syntax.replace("URL",$url+array[ix].path);
        syntax_new = syntax_new.replace("NAME",array[ix].name);
        syntax_new = syntax_new.replace("IDX",array[ix].id);
        syntax_new = syntax_new.replace("IDU",array[ix].id);

        $('div.item-list').append(syntax_new);
    }

}

function loaduseItem(json) {
    
    const array = json;  
    let htmlNew;

    $('#modalJenisPaket').find('form').attr('action',$url+'/admin/packet_list/create');
    $('#modalJenisPaket').find('.modal-title').html('Buat Packet Item');
    $('input.packet-list-title').val('');
    $('select.category-pick').empty();
    $('div.checkbox-item-list').empty();
    $('select.category-pick').append('<option disabled selected hidden>Pilih</option>');
    
    const htmlOptions = '<option value="ID">CATEGORY</option>';
    for (const ix in array.category) {

        htmlNew = htmlOptions.replace("ID",array.category[ix].id);
        htmlNew = htmlNew.replace("CATEGORY",array.category[ix].title);

        $('select.category-pick').append(htmlNew);
    }

    const htmlCheckbox =  
    `<div>
    <input class="form-check-input" type="checkbox" name="item[]" value="ID" id="FOR">
    <label class="form-check-label" for="FOR">NAME</label>
    </div>`;
    for (const ix in array.items) {
        htmlNew = htmlCheckbox.replace("ID",array.items[ix].id);
        htmlNew = htmlNew.replace("FOR",'defaultCheck'+array.items[ix].id);
        htmlNew = htmlNew.replace("NAME",array.items[ix].name);

        $('div.checkbox-item-list').append(htmlNew);
    }
}
//? end packet

//? for team
function createTeam() {
    $('#TeamModal form').attr('action', $url+'admin/team/create');
    $('#TeamModal form').find('input[name=name]').val('');
    $('#TeamModal form').find('input[name=title]').val('');
    $('#TeamModal').find('.modal-title').html('Tambah Team');
    $('.preview').attr('src','https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg');

}
function updateTeam(id) {
    $('#TeamModal form').attr('action', $url+'admin/team/update');
    $('#TeamModal').find('.modal-title').html('Ubah Service');
    $.ajax({
        type: "POST",
        url: $url+"admin/team/getSingle",
        data: {id:id},
        dataType: "JSON",
        success: function (rsp) {

            $('#TeamModal form').find('input[name=id]').val(id);
            $('#TeamModal form').find('input[name=name]').val(rsp.get_team.name);
            $('#TeamModal form').find('input[name=old_image]').val(rsp.get_team.img);
            $('#TeamModal form').find('input[name=old_path]').val(rsp.get_team.path);
            $('#TeamModal form').find('input[name=title]').val(rsp.get_team.title);
            $('#TeamModal').find('.modal-title').html('Tambah Team');
            $('.preview').attr('src',$url+rsp.get_team.path);
        }
    });
}

function teamLinkUpdate(id) {

    $('input.team-link-input').val(null);
    $('#staticBackdropLinkLabel.modal-title').html('Team Sosmed');
    $('input.team-link-input[name=id_team]').val(id);
    $.ajax({
        type: 'POST',
        url: $url+'admin/team/getLink',
        data: {id:id},
        dataType: "JSON",
        success: function (rsp) {
            const array = rsp.get_link;
            
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
}
//? end team

//? for Service
function createService() {
    $('#modalService form').attr('action', $url+'admin/service/create');;
    $('#modalService form').find('input[name=icon]').val('');
    $('#modalService form').find('input[name=title]').val('');
    $('#modalService form').find('textarea[name=desc]').val('');
    $('#modalService').find('.modal-title').html('Tambah Service');

}
function updateService(id) {
    $('#modalService form').attr('action', $url+'admin/service/update');
    $('#modalService').find('.modal-title').html('Ubah Service');
    $.ajax({
        type: "POST",
        url: $url+"admin/service/getSingle",
        data: {id:id},
        dataType: "JSON",
        success: function (rsp) {
            
            $('#modalService form').append('<input type="hidden" name="id" value="'+id+'">');
            $('#modalService form').find('input[name=id]').val(id);
            $('#modalService form').find('input[name=icon]').val(rsp.icon);
            $('#modalService form').find('input[name=title]').val(rsp.title);
            $('#modalService form').find('textarea[name=desc]').val(rsp.descrb);
        }
    });
}

function deleteService(id) {
    $('#service-delete input[name=id_packet_list]').val(id);

    $('#service-delete').submit();
}
//? end Service

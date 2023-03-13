$(function () {
    //* For Packet-List
    $('button#packet-list-show').click(function (e) { 
        e.preventDefault();
        let id_pkg = $(this).data('id-packet');
        let url = $(this).data('url');
        let name_pkg = $(this).data('packet-name');
        let syntax;
        let array;

        $('div.accordion.packet-list').empty();
        
        $('h5.packet-title').html(name_pkg);
        $.ajax({
            type: "POST",
            url: url+'home/getPacketList',
            data: {id_pkg:id_pkg},
            success: function (rsp) {
                let new_syntax;
                rsp = JSON.parse(rsp);
                array = rsp['packet_list'];
                syntax = 
                '<div class="accordion-item"><h2 class="accordion-header" id="headingOne">'+
                '<button class="accordion-button btn-packet-items collapsed" type="button" data-items-id="IDS" data-bs-toggle="collapse" data-bs-target="#collapseID" aria-expanded="false" aria-controls="collapseOne">TITLE_LP</button></h2>'+
                '<div id="FOR_ID" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample"><div class="accordion-body">'+
                '<div class="d-flex align-items-stretch packet-items service-list NUM">'+

                '</div>'+
                '</div></div></div></div>';

                let new_syntax_items;           
                let syntax_items =             
                '<div class="container flex-fill text-center">'+
                '<img width="100rem" src="IMG" alt=""><div>'+
                '<p class="text-center bg-warning"><strong>TITLE_PI</strong> </p>'+
                '</div>';
                let num = 0;
                for (const ix in array) {
                    let array_items;
                    num++;
                    new_syntax = syntax.replace('TITLE_LP',array[ix].title)
                    new_syntax = new_syntax.replace('#collapseID','#collapseID'+array[ix].id)
                    new_syntax = new_syntax.replace('FOR_ID','collapseID'+array[ix].id)
                    new_syntax = new_syntax.replace('NUM','item'+num)

                    $('div.accordion.packet-list').append(new_syntax);
                    $.ajax({
                        type: "POST",
                        url: url+'home/getPacketListItems',
                        data: {ids:array[ix].items},
                        success: function (rsp) {
                            array_items = JSON.parse(rsp)['item_list'];
                            let i = 0;
                            for (const ix in array_items) {
                                i++
                                new_syntax_items = syntax_items.replace('IMG',url+array_items[ix].path);
                                new_syntax_items = new_syntax_items.replace('TITLE_PI',array_items[ix].name);
                                $('div.packet-items.item'+i).append(new_syntax_items);
                            }
                        }
                    });
                    

                }
                
            }
        });


    });
    
    

});
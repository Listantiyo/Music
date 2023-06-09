$(function () {
    const $url = $('body').data('url');
    const $location = $('body').data('location').toLowerCase();
    
    //* For Packet-List
    $('button#packet-list-show').click(function (e) { 
        e.preventDefault();
        let id_pkg = $(this).data('id-packet');
        let name_pkg = $(this).data('packet-name');
        let syntax;
        let array;

        $('div.accordion.packet-list').empty();
        
        $('h5.packet-title').html(name_pkg);
        $.ajax({
            type: "POST",
            url: $url+'home/getPacketList',
            data: {id_pkg:id_pkg},
            success: function (rsp) {
                
                let new_syntax;
                rsp = JSON.parse(rsp);
                array = rsp['packet_list'];
                
                if (array.length === 0) {
                    $('div.accordion.packet-list').append(
                    `<div class="d-flex justify-content-center">
                        <h2> No Record </h2>
                    </div>`);
                }

                syntax = 
                '<div class="accordion-item"><h2 class="accordion-header" id="headingOne">'+
                '<button  class="accordion-button btn-packet-items collapsed" type="button" data-items-id="000" data-bs-toggle="collapse" data-bs-target="#collapseID" aria-expanded="false" aria-controls="collapseOne">TITLE_LP</button></h2>'+
                '<div id="FOR_ID" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionPacket"><div class="accordion-body">'+    
                '<div class="d-flex flex-wrap justify-content-evenly packet-items service-list NUM">'+
                    // space for items
                '</div>'+
                '</div></div></div></div>';
 
                let num = 0;
                
                for (const ix in array) {
                    num++;

                    new_syntax = syntax.replace('TITLE_LP',array[ix].title)
                    new_syntax = new_syntax.replace('#collapseID','#collapseID'+array[ix].id)
                    new_syntax = new_syntax.replace('FOR_ID','collapseID'+array[ix].id)
                    new_syntax = new_syntax.replace('NUM','item'+num)

                    itemsList(array[ix].items , 'item'+num , $url) 
                    
                    $('div.accordion.packet-list').append(new_syntax);

                }
            }
        });
    });

    //* Navbar Active
    $(window).on('load',function(e) {
        $('#navbar ul li a').removeClass('active');
        $('#navbar ul li a.nav-'+$location).addClass('active');
    })

    $('#contact-us div button').click(function (e) { 
        e.preventDefault();
        let first_name = $('#contact-us input[name=first-name]').val();
        let last_name = $('#contact-us input[name=last-name]').val();
        let subject = $('#contact-us input[name=subject]').val();
        let message = $('#contact-us textarea[name=message]').val();

        let to_email = $('#contact div div div:nth-child(2) div:nth-child(2) p').html();

        let mail = `mailto:`+to_email+`?subject=`+first_name+` `+last_name+`_`+subject+`&body=`+message;

        $('#contact-us').attr('action', mail);
        $('#contact-us').submit();
    });
    
});

// ? FUNCTION LIST

//* For Packet-List-Item
function itemsList(ids,iclass,url) 
{
    
    let syntax_items =             
    '<div class="text-center">'+
    '<img width="100rem" src="IMG" alt=""><div>'+
    '<p class="text-center "><strong>TITLE_PI</strong> </p>'+
    '</div>';

    let array_items;
    let new_syntax_items = '';

    $.ajax({
        type: "POST",
        url: url+'home/getPacketListItems',
        data: {ids:ids},
        success: function (rsp) {
            
            array_items = JSON.parse(rsp)['item_list'];
            for (const ix in array_items) {
                new_syntax_items = syntax_items.replace('IMG',url+array_items[ix].path);
                new_syntax_items = new_syntax_items.replace('TITLE_PI',array_items[ix].name);                                
                
                $('div.packet-items.'+iclass).append(new_syntax_items);
            }

        }
    });
    
}

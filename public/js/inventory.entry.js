/** 
 * Orders scripts
 */


/*
 * Inventory Entry
 */

$( document ).ready(function() {
    //  Selectize initialization
    $('#select-orders').selectize({
        maxOptions: 5,
        valueField: 'id',
        labelField: 'serie',
        searchField: ['folio', 'serie', 'making'],
        render: {
            option: function(item, escape) {
                return  '<div class="selectize-row">' +
                            // '<span class="selectize-label">' + escape(item.serie) + '</span>' +

                            '<table class="table table-bordered selectize-table">' +
                                '<tbody>' +
                                    '<tr>' +
                                        '<td class="col-md-1">' +
                                            '<table class="table  selectize-table">' +
                                                '<tbody>' +
                                                    '<tr>' +
                                                        '<td class="bkg-gray col-md-1"><span class="left-header">Serie</span></td>' + 
                                                        '<td class="col-md-1">' + escape(item.serie) +'</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td class="bkg-gray col-md-1"><span class="left-header">Folio</span></td>' +
                                                        '<td class="col-md-1">'+escape(item.folio)+'</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td class="bkg-gray col-md-1"><span class="left-header">Factura</span></td>' +
                                                        '<td class="col-md-1">'+escape(item.created_at)+'</td>' +
                                                    '</tr>' +
                                                '</tbody>' +
                                            '</table>' +
                                        '</td>' +
                                        '<td class="col-md-2">'+
                                            '<p>' + escape(item.user.name) + '</p>' +
                                            '<p>' + escape(item.ordertype.label) + '</p>' +
                                        '</td>'+
                                    '</tr>' +
                                '</tbody>' +
                            '</table>' +

                        '</div>';
            }
        },

        // Get info from ajax when user is typing
        load: function(query, callback) {
            
            if (!query.length) return callback();
            $.ajax({
                url: '/ordenes/buscar/' + encodeURIComponent(query),
                type: 'GET',
                dataType: 'json',
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },

        // Set users to vuejs data when user
        // onChange:function(value) {
        //     // Get the selected item object to get full info
        //     // and assign it to vuejs data
        //     product = this.options[value];
        //     Order.product = product;
        // }
       
    });
  
});


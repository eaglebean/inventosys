/** 
 * Orders scripts
 */


/*
 * Inventory Entry
 */

$( document ).ready(function() {

    var Inventory = new Vue({
        el:'#app',
        data:{
            // Temporary values
            qty:1,

            product:{},
            order:{},
            items:[]
        },

        /**
         * Custom methods
         */
        methods:{
            isClosed:function(status){
                return true;
                console.log(status)
                // return (status == 'Abierto');
            }
        },

        computed: {
        },
        // ready:function(){
            
        // }
    });


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
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Serie</span></td>' + 
                                        '<td class="col-md-1">' + escape(item.serie) +'</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Folio</span></td>' +
                                        '<td class="col-md-1">'+escape(item.folio)+'</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Fecha</span></td>' +
                                        '<td class="col-md-1">'+escape(item.created_at)+'</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Tipo</span></td>' +
                                        '<td class="col-md-1">'+escape(item.ordertype.label)+'</td>' +
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
        onChange:function(value) {
            // Get the selected item object to get full info
            // and assign it to vuejs data
            Inventory.order = this.options[value];
        }
       
    });
  
});


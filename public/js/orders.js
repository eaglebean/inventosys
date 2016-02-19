/** 
 * Orders scripts
 */


/*
 * Orders Purchase
 */

$( document ).ready(function() {
    //  Selectize initialization
    $('#select-products').selectize({
        maxOptions: 5,
        valueField: 'id',
        labelField: 'style',
        searchField: 'style',
        render: {
            option: function(item, escape) {
                return  '<div class="selectize-row">' +
                            '<span class="selectize-label">' + escape(item.style) + '</span>' +
                            '<table class="table table-bordered selectize-table">' +
                                '<tbody>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Calzado</span></td>' + 
                                        '<td>' + escape(item.footweartype) +'</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Color</span></td>' +
                                        '<td>'+escape(item.color)+'</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                        '<td class="bkg-gray col-md-1"><span class="left-header">Talla</span></td>' +
                                        '<td>'+escape(item.size)+'</td>' +
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
                url: '/productos/buscar/' + encodeURIComponent(query),
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
            product = this.options[value];
            Order.product = product;
        }
       
    });


    // Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');

    var Order = new Vue({
        el:'#purchase_app',
        data:{
            // Temporary values
            qty:1,
            description:'',

            product:{},
            order:{
                serie:'',
                folio:'',
                making:'',
                description:'',
                order_type_id:1, //Compra table:orders_type
                user_id: user_id
            },
            items:[]
        },

        /**
         * Custom methods
         */
        methods:{
            addItems:function(){
                this.items.push({
                    'style':this.product.style,
                    'product_id':this.product.id,
                    'contpaq_id':this.product.contpaq_id,
                    'color':this.product.color,
                    'size':this.product.size,
                    'footweartype':this.product.footweartype,
                    'qty':this.qty,
                    'description':this.description,
                    'user_id':user_id,
                    'status_id':1 // Abierto
                });
            },

            deleteItem:function(key){
                // Since there is no order item id, when the order is created the first time,
                // the array index is used instead.
                if(typeof this.items[key] === 'undefined') {
                    bootbox.alert("El articulo que desea remover no existe!");
                }
                else {
                    var item = this.items[key];

                    bootbox.confirm("Esta seguro de borrar este articulo " + item.style + "?", function(result) {
                        if (result) {
                            Order.items.$remove(item);
                        }
                    }); 
                }
            },

            /**
             * API calls
             */
            createOrder:function(){
                if (this.items.length > 0) {
                    data = {'order':this.order, 'items':this.items};

                    this.$http.post('/api/v1/orden', data).then(function(response){
                        if (response.data.status){
                            Splash.show('success', 'Muy bien!', response.data.message);
                        } else {
                            Splash.show('error', 'Ups!', response.data.message);
                            
                        }
                    });
                } else {
                    bootbox.alert("Antes de crear la orden, asegurese de agregar articulos a la lista!");
                }

            }
        },

        computed: {
            errors: function() {
                return (!this.order.serie || !this.order.folio || !this.order.making);
            },
            allowAddArticles: function() {
                return (!this.order.serie );
            }
        },
        // ready:function(){
            
        // }
    });

// Update vue
$('#select-products').change(function(){
    Order.model = this.value;
});
  
});


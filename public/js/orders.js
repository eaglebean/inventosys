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
        labelField: 'model',
        searchField: 'model',
        render: {
            option: function(item, escape) {
                
                return '<div data-name="' + item.name + '" data-model="' + item.model + '>' +
                        '<span class="label">' + escape(item.name) + '</span>' +
                        (item.model ? '<span class="caption">' + escape(item.model) + '</span>' : '') +
                        '</div>';
            }
        },
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
        onChange:function(value) {
            $.each(this.options, function( index, item ) {
              if(item.id == value) 
                Order.product = item;
            });
        }
       
    });


    // Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');

    var Order = new Vue({
        el:'#purchase_app',
        data:{
            // temporary variables
            model:null,
            qty:null,
            description:null,
            product:{},
            order:{
                serie:null,
                folio:null,
                making:null,
                description:null,
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
                    'model':this.model,
                    'qty':this.qty,
                    'description':this.description,
                    'user_id':user_id
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

                    bootbox.confirm("Esta seguro de borrar este articulo " + item.model + "?", function(result) {
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
                        if (response.ok){
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


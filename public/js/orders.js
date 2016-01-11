/** 
 * Orders scripts
 */


/*
 * Orders Purchase
 */

$( document ).ready(function() {

    // Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');

    var Order = new Vue({
        el:'#purchase_app',
        data:{
            // temporary variables
            model:null,
            qty:null,
            description:null,

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
        }
        // ready:function(){
           
        // }
    });
});

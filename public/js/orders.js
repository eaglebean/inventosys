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
                type:1 //Compra table:orders_type
            },
            items:[]
        },
        methods:{
            /**
             * Items
             */
            addItems:function(){
                this.items.push({
                    'model':this.model,
                    'qty':this.qty,
                    'description':this.description,
                    'user_id':1
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
                data = {'order':this.order, 'items':this.items};

                this.$http.post('/api/v1/orden', data).then(function(response){
                    if (response.ok){
                        console.log(response.data);
                    } else {
                        console.log('Spmething went wrong')
                    }

                });

                // this.$http.post('/api/v1/orden', data, function(order){
                //     console.log(order);
                // });
            }
        },

        computed: {
            errors: function() {
                if (!this.order.serie || !this.order.folio || !this.order.making) 
                    return true;
                else
                    return false;
            }
        }
        // ready:function(){
           
        // }
    });
});

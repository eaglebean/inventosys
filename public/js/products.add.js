/** 
 * Products scripts
 */
$( document ).ready(function() {

    // Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('value');

    var vueProduct = new Vue({
        el:'#products_app',
        data:{
            // temporary variables
            action:'create',
            modalTitle:'Agregar Productos',
            selected_boxes:[],

            product:{}
        },


        
        /*
        |--------------------------------------------------------------------------
        | Methods
        |--------------------------------------------------------------------------
        */
        methods:{
            resetData:function (){
                this.product.style = '';
                this.product.contpaq_id = '';
                this.product.description = '';
                this.product.active = true;
                this.product.barcode = '';
                $('#prodcut_style').focus();
            },

            /* 
             * In order to use the same form to create and update products
             * this functions check what kind of action will be executed on save 
             */
            saveAction:function (){
                if (!this.errors) {
                    if (this.action == 'create') {
                        this.createProduct();
                    }

                    if (this.action == 'update') {
                        this.updateProduct();
                    }
                } else {
                    bootbox.alert("Asegurese de llenar los campos requeridos!");
                }
            },

            /**
             * API calls
             */
            createProduct:function(){
                data = {'product':this.product};

                this.$http.post('/productos', data).then(function(response){
                    if (response.data.status == true){
                        Splash.show('success', 'Excelente!', response.data.message);
                        vueProduct.resetData();
                    } else {
                        Splash.show('error', 'Ups!', response.data.message);
                    }
                });
            },

            updateProduct:function(){
                data = {'product':this.product};
                id = this.product.id;

                this.$http.post('/productos/' + id, data).then(function(response){
                    if (response.data.status == true){
                        Splash.show('success', 'Excelente!', response.data.message);
                    } else {
                        Splash.show('error', 'Ups!', response.data.message);
                    }
                });
            },

            getProduct:function(id){
                this.$http.get('/productos/'+id).then(function(response){
                    
                    if (response.ok == true){
                        vueProduct.product = response.data;
                        // console.log(response.data);
                    } else {
                        console.log('Ups!')
                    }
                });
            },

            deleteProduct:function(ids){
                data = {'slected_ids':this.selected_boxes};

                this.$http.delete('/productos', data).then(function(response){
                    
                    if (response.ok == true){
                        Splash.show('success', 'Excelente!', response.data.message);
                        $('.checkbox-selection:checked').closest('tr').fadeOut("normal").remove();
                    } else {
                        Splash.show('error', 'Ups!', response.data.message);
                    }
                });
            }
        },

        /*
        |--------------------------------------------------------------------------
        | Compute methods
        |--------------------------------------------------------------------------
        */
        computed: {
            isStyle: function() {
                return (!this.product.style);
            }
        },
        ready:function(){
            // 
        }
    });
    
    // Set modal title
    $('#action-create').click(function(){
        vueProduct.action = 'create';
        vueProduct.modalTitle = 'Agregar Productos';
        vueProduct.resetData();

    });

    $('.button-edit').click(function(){
        product_id = $(this).closest('tr').data('id');
        vueProduct.action = 'update';
        vueProduct.modalTitle = 'Editar Producto';
        vueProduct.getProduct(product_id);
    });

    $('#checkall').click(function(){
        checked = $(this).prop('checked');

        // Set/unset all checkbox
        $('.checkbox-selection').prop('checked', checked);
    });

    $('#action-delete').click(function(){
        selected_boxes = $('.checkbox-selection:checked');
        ids=[];

        selected_boxes.each(function(index, element){
            ids[index] = $(element).closest('tr').data('id');
        });
        count = ids.length;

        if (count > 0 ) {
            bootbox.confirm("Estas seguro de borrar la cantidad de " + count + " producto(s)?", function(result) {
                if (result) {
                    vueProduct.selected_boxes = ids;
                    vueProduct.deleteProduct();
                }
            }); 
        } else {
            bootbox.alert('Selecciona al menos 1 producto a borrar!');
        }
    });
});
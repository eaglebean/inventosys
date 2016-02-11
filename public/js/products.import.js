/**
 * Products scripts
 */
$( document ).ready(function() {

    var vueImport = new Vue({
        el:'#products_app',
        data:{
            rawlist:null,
            header:[
                "contpaq_id",
                "barcode",
                "style",
                "footwear_type_id",
                "unit_id",
                "description",
                "color_id",
                "size_id",
                "qty_container",
                "active"
            ],
            products:[]
        },

        /*
        |--------------------------------------------------------------------------
        | Methods
        |--------------------------------------------------------------------------
        */
        methods:{
            formatData:function (){
                var arrayOfLines = this.rawlist.split('\n');

                var header_validation = true;
                var data_validation = true;
                var index_failed = null;
                var index_data_failed = null;

                var allowed_headers = this.header; // Allowed header
                var products = this.products; // Global
                var header = arrayOfLines[0].split(','); // Header passed

                $.each(header, function(index, item) {
                   if ($.inArray(item.trim(), allowed_headers ) === -1 ){
                    header_validation = false;
                    index_failed = index;
                    return false;
                   }
                });

                // If header has allowed columns
                if(header_validation){

                    arrayOfLines.splice(0,1); // Remove header

                    $.each(arrayOfLines, function(index, item) {

                        // Skip data (lines) if it is empty
                        if(item.length > 0) {

                            product = item.split(',');

                            // Check product length and header length match
                            if(product.length === header.length)
                            {
                                var data = {};
                                $.each(header, function(i, attribute) {
                                   data[attribute.trim()] = product[i].trim();
                                });

                                products.push(data); // Add product ot json main array

                            } else {
                                index_data_failed = index;
                                data_validation = false;
                                return false;
                            }

                        }

                    });

                    // Check data validation
                    if(data_validation) {
                        return true;
                        console.log('PASSED');
                    } else {
                        bootbox.alert('La fila ' + arrayOfLines[index_data_failed] + ' no tiene la misma cantidad de columnas que el encabezado!')
                    }

                } else {
                    bootbox.alert('La columna <strong>' + header[index_failed] + '</strong> no es permitida! Asegurate que todas las columnas que estas pasado sean permitidas.');
                }

            },

            importdata:function(){
                if(this.formatData()) {
                    data = {'products':this.products};
                    this.$http.post('/productos', data).then(function(response){
                        if (response.data.status == true){
                            Splash.show('success', 'Excelente!', response.data.message);
                            vueImport.resetData();
                        } else {
                            Splash.show('error', 'Ups!', response.data.message);
                        }
                    });

                }
                
            },

            resetData:function (){
                this.rawlist = null;
                this.products = [];
            },

        },

        /*
        |--------------------------------------------------------------------------
        | Compute methods
        |--------------------------------------------------------------------------
        */
        computed: {
            allowImport: function() {
                return (this.rawlist !== null && (this.rawlist.trim().length > 0));
            }
        }
    });


});

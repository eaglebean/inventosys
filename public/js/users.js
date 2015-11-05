/** 
 * Users scripts
 */


var user_form = 
'<div class="row">  ' +
    '<div class="col-md-12"> ' +
        '<form class="form-horizontal"> ' +
            '<div class="form-group"> ' +

                '<label class="col-md-4 control-label" for="name">Nombre</label> ' +
                '<div class="col-md-6 margin-bottom"> ' +
                    '<input id="name" name="name" type="text" placeholder="Nombre Completo" class="form-control input-md"> ' +
                '</div> ' +

                
                
                '<label class="col-md-4 control-label" for="email">Email</label> ' +
                '<div class="col-md-6 margin-bottom"> ' +
                    '<input id="email" name="email" type="email" placeholder="jorge@email.com" class="form-control input-md"> ' +
                '</div> ' +

                '<br>' +

                '<label class="col-md-4 control-label" for="password">Password</label> ' +
                '<div class="col-md-6 margin-bottom"> ' +
                    '<input id="password" name="password" type="password" placeholder="Contrasena" class="form-control input-md"> ' +
                '</div> ' +

                '<br>' +

                '<label class="col-md-4 control-label" for="rol">Rol</label> ' +
                '<div class="col-md-6 margin-bottom"> ' +
                    '<select id="role" name="role" type="password" placeholder="Selecciona un rol" class="form-control input-md"> ' +
                        '<option value="1">Admin</option>' +
                    '</select>' +
                '</div> ' +

                          
            '</div> ' +
        '</form>' + 
    '</div>' + 
'</div>';



// create user button
$('#action_user_create').click(function(){
    bootbox.dialog({
        title: "Crear Usuario",
        message: user_form,
        buttons: {
            success: {
                label: "Guardar",
                className: "btn-success",
                callback: function () {
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var role = $('#role').val();


                    console.log(name + ' - ' + email + ' - ' + password + ' - ' + role);
                }
            }
        }
    }
    );
})

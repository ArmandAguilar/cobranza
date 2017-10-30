function buscar_operaciones()
{
   var losdatos = {cboUsuario:$('#cboUsuario').val(),cboIdMaestro:$('#cboMaestro').val()};
    /*$.ajax({
           		url:'./scripts/oper_relacionar_lider.php?o=1',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
                           $.niftyNoty({
                             type: 'success',
                             icon : 'fa fa-check',
                             message : '<strong>Oka</strong> relación creada',
                             container : 'floating',
                             timer : 3000
                           });
          		       },
          		error:function(req,e,er) {
                        $.niftyNoty({
                					type: 'danger',
                					icon : 'fa fa-minus',
                					message : 'oh! a ocurrido un error.',
                					container : 'floating',
                					timer : 3000
                				});
              }
           });*/

}

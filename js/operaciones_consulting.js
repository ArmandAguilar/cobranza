function buscar_operaciones()
{
   var losdatos = {txtSearch:$('#cboUsuario').val()};
    $.ajax({
           		url:'./scripts/oper_operaciones_consulting.php?o=1',
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
                           $("#CTable").empty();
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
           });

}

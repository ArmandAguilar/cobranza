function buscar_facturas()
{
  $("#CTable").empty();
   var losdatos = {txtSearch:$('#txtSearch').val()};
    $.ajax({
           		url:'./scripts/oper_facturacion.php?o=3',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
                           $.niftyNoty({
                             type: 'success',
                             icon : 'fa fa-check',
                             message : 'Procesando  .............',
                             container : 'floating',
                             timer : 5000
                           });
                           $("#CTable").append(data);
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

function sel_factura(Id,Factura)
{
  $("#Id").val(Id);
  $("#txtId").empty();
  $("#txtFactura").empty();
  $("#txtId").append(Id);
  $("#txtFactura").append(Factura);
}

function Eliminar()
{
  alert('Eliminada');
}

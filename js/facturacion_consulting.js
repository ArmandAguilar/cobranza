function buscar_facturas()
{
  $("#CTable").empty();
   var losdatos = {txtSearch:$('#txtSearch').val()};
    $.ajax({
           		url:'./scripts/oper_facturacion.php?o=1',
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
function setValoreMsj(Id,FacturaForta,OperacionAbono)
{
  $("#Id").val(Id);
  $("#FacturaForta").val(FacturaForta);
  $("#OperacionAbono").val(OperacionAbono);
  $("txtId").append(Id);
  $("txtFactura").append(FacturaForta);
  $("txtOperacion").append(OperacionAbono);
}

function Cancelar()
{
  var losdatos = {
    Id:$("#Id").val(),
    FacturaForta:$("#FacturaForta").val(),
    OperacionAbono:$("#OperacionAbono").val(),
  }
  $.ajax({
            url:'./scripts/oper_facturacion.php?o=2',
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
                         $("#CTable").empty();
                         $('#txtSearch').val();

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

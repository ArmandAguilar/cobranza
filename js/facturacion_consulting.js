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
                             timer : 9000
                           });
                           $("#CTable").append(data);
                           $.niftyNoty({
                             type: 'success',
                             icon : 'fa fa-check',
                             message : 'Imprimiendo datos..',
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
           });

}
function setValoreMsj(Id,FacturaForta,OperacionAbono)
{
  $("#Id").val(Id);
  $("#FacturaForta").val(FacturaForta);
  $("#OperacionAbono").val(OperacionAbono);
}

function Cancelar()
{
  alert('Cacelada');
}

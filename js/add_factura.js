function sumar_iva()
{
  var iva = $("#cboIva").val()
  var newIva = iva * $("#txtCantidad").val()
   $("#txtImporteTotal").val(newIva.toFixed(2))

}
function datos_empresa()
{
  var {idEmpresa = $("#cboEmpresa").val()
  var losdatos = {idEmpresa:idEmpresa};
    $.ajax({
           		url:'./scripts/oper_add_factura.php?o=1',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
          	            var dataJson = eval(data);
                        $("#txtRasonSocial").val(dataJson[0].RazonSocial);
                        $("#txtRFC").val(dataJson[0].RFC);
                        $("#txtDir").val(dataJson[0].DireccionFiscal);
          		       },
          		error:function(req,e,er) {
          			alert('error!' + er);
          		}
           });
}
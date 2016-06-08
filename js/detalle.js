function detalles_empresa(id)
{

  var losdatos = {id:id};
    $.ajax({
           		url:'./scripts/oper_detalles.php?o=1',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
          	             var dataJson = eval(data);
                        $("#lblEmpresa").append(dataJson[0].Empresa);
                        $("#lblRasonSocial").append(dataJson[0].RazonSocial);
                        $("#lblRFC").append(dataJson[0].RFC);
                        $("#lblGiro").append(dataJson[0].Giro);
                        $("#lblWeb").append(dataJson[0].Web);
                        $("#lblTipoCuenta").append(dataJson[0].TipoCuenta);
                        $("#lblOrigenCliente").append(dataJson[0].OrigenCliente);
                        $("#lblRevenue").append(dataJson[0].Revenue);
                        $("#lblTamanoCliente").append(dataJson[0].TamanoCliente);
                        $("#lblDir").append(dataJson[0].DireccionFiscal);
          		       },
          		error:function(req,e,er) {
          			alert('error!' + er);
          		}
           });
}

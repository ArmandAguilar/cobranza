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
function detalles_cliente(id)
{
  var losdatos = {id:id};
    $.ajax({
              url:'./scripts/oper_detalles.php?o=2',
              type:'POST',
              data:losdatos,
              success:function(data)
                     {
                         var dataJson = eval(data);
                        $("#lblCliente").append(dataJson[0].Nombre);
                        $("#lblTelefono").append(dataJson[0].Telefono);
                        $("#lblCelular").append(dataJson[0].Celular);
                        $("#lblEmail").append(dataJson[0].Email);
                        $("#lblPuesto").append(dataJson[0].Puesto);
                     },
              error:function(req,e,er) {
                alert('error!' + er);
              }
           });
}
function cambiaEstado(Estado)
{
  $("#txtEstado").val(Estado);
}
function agregar_comentario()
{
  var losdatos = {txtFactura:$("#txtFactura").val(),txtProyecto:$("#txtProyecto").val(),txtUsuario:$("#txtUsuario").val(),txtEstado:$("#txtEstado").val()};
    $.ajax({
              url:'./scripts/oper_detalles.php?o=3',
              type:'POST',
              data:losdatos,
              success:function(data)
                     {
                        alert(data);
                     },
              error:function(req,e,er) {
                alert('error!' + er);
              }
           });
}

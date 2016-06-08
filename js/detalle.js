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
          		       },
          		error:function(req,e,er) {
          			alert('error!' + er);
          		}
           });
}

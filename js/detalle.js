function detalles_empresa(id)
{

  var losdatos = {id:id};
    $.ajax({
           		url:'./scripts/oper_detalles.php?o=1',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
                       alert(data);
          	             var dataJson = eval(data);
                        $("#lblEmpresa").val(dataJson[0].Empresa);

          		       },
          		error:function(req,e,er) {
          			alert('error!' + er);
          		}
           });
}

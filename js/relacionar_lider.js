function relacionar_lider()
{
   var losdatos = {cboUsuario:$('#cboUsuario').val(),cboIdMaestro:$('#cboMaestro').val()};
    $.ajax({
           		url:'./scripts/oper_relacionar_lider.php?o=1',
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

function load_enbudo()
{
  $('#DEnvudo').show();
  $("#DLista").hide();
  $("#DCronograma").hide();
  $("#rows-enbudo").empty();
  $("#load_enbudo").show();
  $.ajax({
            url:'./scripts/data.php?v=enbudo',
            type:'POST',
            success:function(data)
            {
                 $("#rows-enbudo").append(data);
                 $("#load_enbudo").hide();
            },
            error:function(req,e,er) {
              alert(er);
            }
          });

}
function load_lista()
{
  $('#DEnvudo').hide();
  $("#DLista").show();
  $("#DCronograma").hide();

}

function load_view(Factura,NoProyecto,Proyecto,Importe,Estado)
{
  $("#txtFactura").val(Factura);
  $("#txtNoProyecto").val(NoProyecto);
  $("#txtProyecto").val(Proyecto);
  $("#txtImporte").val(Importe);
  $("#txtEstado").val(Estado);
  document.forms["frmDetalle"].submit();
}
function order(col)
{
    switch (col)
    {
          case 'Provisionada':
                                $("#divcolProvisionada").empty();
                                $("#divcol2L").show();
                                var losdatos = {Orden:$("#txthProvisionadaOrder").val()};
                                var filtroOrden = $("#txthProvisionadaOrder").val();
                                $.ajax({
                                          url:'./scripts/data.php?v=Provisionada',
                                          type:'POST',
                                          data:losdatos,
                                          success:function(data)
                                          {
                                             $("#divcol2L").hide();
                                              $("#divcolProvisionada").append(data);
                                              if(filtroOrden == "asc")
                                              {
                                                $("#txthProvisionadaOrder").val('desc')
                                              }
                                              else{
                                                if(filtroOrden == "desc")
                                                {
                                                  $("#txthProvisionadaOrder").val('asc')
                                                }
                                              }

                                          },
                                          error:function(req,e,er) {
                                            alert(er);
                                          }
                                        });
           break;

    }

}

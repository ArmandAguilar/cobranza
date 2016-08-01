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
function load_enbudo_liders(IdUsuario,Perfil)
{
  $('#DEnvudo').show();
  $("#DLista").hide();
  $("#DCronograma").hide();
  $("#rows-enbudo").empty();
  $("#load_enbudo").show();
  var losdatos = {IdUsuario:IdUsuario,Perfil:Perfil};
  $.ajax({
            url:'./scripts/data.php?v=enbudoUser',
            type:'POST',
            data:losdatos,
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
function load_add_factura(NoProyecto)
{

    window.location.href='add_factura.php?NoProyecto=' + NoProyecto

}
function order(col)
{
    switch (col)
    {
          case 'Provisionada':
                                $("#divcolProvisionada").empty();
                                $("#divcol2L").show();
                                var losdatos = {Orden:$("#txthProvisionadaOrder").val(),IdUsuario:$("txtIdUsuario").val()};
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
           case 'Elaborada':
                                 $("#divcolElaborada").empty();
                                 $("#divcol3L").show();
                                 var losdatos = {Orden:$("#txthElaboradaOrder").val(),IdUsuario:$("#txtIdUsuario").val()};
                                 var filtroOrden = $("#txthElaboradaOrder").val();
                                 $.ajax({
                                           url:'./scripts/data.php?v=Elaborada',
                                           type:'POST',
                                           data:losdatos,
                                           success:function(data)
                                           {
                                              $("#divcol3L").hide();
                                               $("#divcolElaborada").append(data);
                                               if(filtroOrden == "asc")
                                               {
                                                 $("#txthElaboradaOrder").val('desc')
                                               }
                                               else{
                                                 if(filtroOrden == "desc")
                                                 {
                                                   $("#txthElaboradaOrder").val('asc')
                                                 }
                                               }

                                           },
                                           error:function(req,e,er) {
                                             alert(er);
                                           }
                                         });
            break;
            case 'Recibida':
                                  $("#divcolRecibida").empty();
                                  $("#divcol4L").show();
                                  var losdatos = {Orden:$("#txthRecibidaOrder").val(),IdUsuario:$("#txtIdUsuario").val()};
                                  var filtroOrden = $("#txthRecibidaOrder").val();
                                  $.ajax({
                                            url:'./scripts/data.php?v=Recibida',
                                            type:'POST',
                                            data:losdatos,
                                            success:function(data)
                                            {
                                               $("#divcol4L").hide();
                                                $("#divcolRecibida").append(data);
                                                if(filtroOrden == "asc")
                                                {
                                                  $("#txthRecibidaOrder").val('desc')
                                                }
                                                else{
                                                  if(filtroOrden == "desc")
                                                  {
                                                    $("#txthRecibidaOrder").val('asc')
                                                  }
                                                }

                                            },
                                            error:function(req,e,er) {
                                              alert(er);
                                            }
                                          });
             break;
             case 'Aprobada':
                                   $("#divcolAprobada").empty();
                                   $("#divcol5L").show();
                                   var losdatos = {Orden:$("#txthAprobadaOrder").val(),IdUsuario:$("#txtIdUsuario").val()};
                                   var filtroOrden = $("#txthAprobadaOrder").val();
                                   $.ajax({
                                             url:'./scripts/data.php?v=Aprobada',
                                             type:'POST',
                                             data:losdatos,
                                             success:function(data)
                                             {
                                                $("#divcol5L").hide();
                                                 $("#divcolAprobada").append(data);
                                                 if(filtroOrden == "asc")
                                                 {
                                                   $("#txthAprobadaOrder").val('desc')
                                                 }
                                                 else{
                                                   if(filtroOrden == "desc")
                                                   {
                                                     $("#txthAprobadaOrder").val('asc')
                                                   }
                                                 }

                                             },
                                             error:function(req,e,er) {
                                               alert(er);
                                             }
                                           });
              break;
              case 'EnEsperaDePago':
                                    $("#divcolEnEsperaDePago").empty();
                                    $("#divcol6L").show();
                                    var losdatos = {Orden:$("#txthEsdepagoOrder").val(),IdUsuario:$("#txtIdUsuario").val()};
                                    var filtroOrden = $("#txthEsdepagoOrder").val();
                                    $.ajax({
                                              url:'./scripts/data.php?v=EnEsperaDePago',
                                              type:'POST',
                                              data:losdatos,
                                              success:function(data)
                                              {
                                                 $("#divcol6L").hide();
                                                  $("#divcolEnEsperaDePago").append(data);
                                                  if(filtroOrden == "asc")
                                                  {
                                                    $("#txthEsdepagoOrder").val('desc')
                                                  }
                                                  else{
                                                    if(filtroOrden == "desc")
                                                    {
                                                      $("#txthEsdepagoOrder").val('asc')
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

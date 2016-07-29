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
  $("#xbtnEstado").empty();
  $("#xbtnEstado").append(Estado);
  var losdatos = {Estado:$("#txtEstado").val(),IdFacturacion:$("#txtIdFacturacion").val()};
    $.ajax({
              url:'./scripts/oper_detalles.php?o=6',
              type:'POST',
              data:losdatos,
              success:function(data)
                     {

                        $.niftyNoty({
                          type: 'success',
                          icon : 'fa fa-check',
                          message : '<strong>Oka</strong> modificacion realizada ',
                          container : 'floating',
                          timer : 3000
                        });
                        registra_evento();

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
function agregar_comentario()
{

  if($("#txtMensaje").val() ==  "")
  {
    $("#lblErroMensaje").show(1000);
  }
  else{
        $("#lblErroMensaje").hide();
        var losdatos = {IdFactura:$("#txtIdFacturacion").val(),txtProyecto:$("#txtProyecto").val(),txtUsuario:$("#txtUsuario").val(),txtEstado:$("#txtEstado").val(),txtMensaje:$("#txtMensaje").val()};
          $.ajax({
                    url:'./scripts/oper_detalles.php?o=3',
                    type:'POST',
                    data:losdatos,
                    success:function(data)
                           {
                              timeline();
                              $.niftyNoty({
                                type: 'success',
                                icon : 'fa fa-check',
                                message : '<strong>Oka</strong> comentario agregado ',
                                container : 'floating',
                                timer : 3000
                              });
                              $("#txtMensaje").val('')
                           },
                    error:function(req,e,er) {
                      alert('error!' + er);
                    }
                 });
      }
}
function timeline()
{
  $("#lblTimeline").empty();
  var losdatos = {IdFactura:$("#txtIdFacturacion").val()};
  $.ajax({
            url:'./scripts/oper_detalles.php?o=4',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                      $("#lblTimeline").append(data);
                   },
            error:function(req,e,er) {
              alert('error!' + er);
            }
         });
}
function sumar_iva_modificar()
{
  var iva = $("#cboIvaModificar").val();
  var newIva = iva * $("#txtCantidadModificar").val();
   $("#txtImporteTotalModificar").val(newIva);
}
function modificar_datos()
{
  var losdatos = {
                    IdFacturacion : $("#txtIdFacturacion").val(),
                    Factura : $("#txtFacturaModificar").val(),
                    FacturaNoModificar : $("#txtFacturaNoModificar").val(),
                    cboTipoFactura : $("#cboTipoFactura").val(),
                    Monto : $("#txtCantidadModificar").val(),
                    IVA : $("#txtImporteTotalModificar").val(),
                    Trimestre : $("#cboTrimestre").val(),
                    Concepto : $("#txtConceptoModificar").val()
                };
  $.ajax({
            url:'./scripts/oper_detalles.php?o=5',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                     $("#msjModalModificarOk").show();
                     $("#msjModalModificarOk").hide(8000);
                     $("#txtMensaje").val(data);
                     $.niftyNoty({
                       type: 'success',
                       icon : 'fa fa-check',
                       message : '<strong>Oka</strong> modificacion realizada ',
                       container : 'floating',
                       timer : 3000
                     });
                     setTimeout ("redireccionar()", 4000);

                   },
            error:function(req,e,er) {
              //alert('error!' + er);
              $("#msjModalModificarError").show();
              $("#msjModalModificarError").hide(8000);
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
function cancelar_factura()
{
  var losdatos = {
                    IdFacturacion : $("#txtIdFacturacion").val(),
                    Factura : $("#txtFactura").val(),
                    Motivo : $("#txtMotivoCancelacion").val(),
                };
  $.ajax({
            url:'./scripts/oper_detalles.php?o=7',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                     //$("#txtMensaje").val(data);
                     $.niftyNoty({
                       type: 'success',
                       icon : 'fa fa-check',
                       message : '<strong>Oka</strong> modificacion realizada ',
                       container : 'floating',
                       timer : 3000
                     });
                     setTimeout ("redireccionar()", 4000);

                   },
            error:function(req,e,er) {
              //alert('error!' + er);

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
function relacionar_factura()
{
     var losdatos = {
       FacturaForta:$("#txtFactura").val(),
       OperacionAbono:$("#cboOperacionAbono").val(),
       ImporteOperacion:$("#txtCantidadRelacionar").val()
     };
     $.ajax({
               url:'./scripts/oper_detalles.php?o=8',
               type:'POST',
               data:losdatos,
               success:function(data)
                      {

                        $.niftyNoty({
                          type: 'success',
                          icon : 'fa fa-check',
                          message : '<strong>Oka</strong> relación creada ',
                          container : 'floating',
                          timer : 3000
                        });

                      },
               error:function(req,e,er) {
                 //alert('error!' + er);

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
function cambiar_fechas()
{
  var losdatos = {
    txtIdFacturacion:$("#txtIdFacturacion").val(),
    txtDateFactura:$("#txtDateFactura").val(),
    txtDateTentativa:$("#txtDateTentativa").val(),
    txtDateRecepcion:$("#txtDateRecepcion").val()
  };
  $.ajax({
            url:'./scripts/oper_detalles.php?o=9',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                     $.niftyNoty({
                       type: 'success',
                       icon : 'fa fa-check',
                       message : '<strong>Oka</strong> modificacion realizada ',
                       container : 'floating',
                       timer : 3000
                     });
                     registra_evento();

                   },
            error:function(req,e,er) {
              //alert('error!' + er);

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
function redireccionar()
{
  window.location.href='panel.php';

}
function EnviarNotificacion(idusuario,email)
{
  var losdatos ={idusuario:idusuario,email:email,IdFacturacion:$("#txtIdFacturacion").val(),Factura:$("#txtFactura").val() };
  $.ajax({
            url:'./scripts/EnviarNotificacion.php',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {

                   },
            error:function(req,e,er) {
              //alert('error!' + er);

              $.niftyNoty({
               type: 'danger',
               icon : 'fa fa-minus',
               message : 'oh! a ocurrido un error al notificar al usuario.',
               container : 'floating',
               timer : 3000
             });
            }
         });
}
$("#btnComentar").click(function()
  {
    if($("#txtMensaje").val() ==  "")
    {
      $("#lblErroMensaje").show(1000);
      $.niftyNoty({
       type: 'danger',
       icon : 'fa fa-minus',
       message : 'oh! a ocurrido un error el comentario no puede estar vacio.',
       container : 'floating',
       timer : 3000
     });
    }
    else {
            agregar_comentario();
            $("#lblErroMensaje").hide();
            $("input[type=checkbox]:checked").each(function()
              {
                EnviarNotificacion($("#txtIdUsuario").val(),$(this).val())
              }
            );

       }
    });
function datos_empresa()
{
  var idEmpresa = $("#cboEmpresa").val();
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
function editar_empresa()
{

    var idEmpresa = $("#cboEmpresa  option:selected").val();
    var losdatos = {
      IdEmpresa:$("#cboEmpresa  option:selected").val(),
      IdFacturacion: $("#txtIdFacturacion").val(),
      RasonSocial:$("#txtRasonSocial").val(),
      RFC:$("#txtRFC").val(),
      Dir:$("#txtDir").val()
    };
    $.ajax({
           		url:'./scripts/oper_detalles.php?o=10',
          		type:'POST',
          		data:losdatos,
          		success:function(data)
          	         {
                           $.niftyNoty({
                             type: 'success',
                             icon : 'fa fa-check',
                             message : '<strong>Oka</strong> datos modificados',
                             container : 'floating',
                             timer : 3000
                           });
                           redireccionar();
          		       },
          		error:function(req,e,er) {
          			alert('error!' + er);
          		}
           });
}
function registra_evento()
{
   var losdatos = {IdFacturacion:$("#txtIdFacturacion").val(),IdUsuario:$("#txtIdUsuario").val(),FechaFacturacion:$("#txtDateFactura").val(),FechaTentativa:$("#txtDateTentativa").val(),Estado:$("#txtEstado").val()};
   $.ajax({
             url:'./scripts/oper_detalles.php?o=11',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {

                        leer_registro();
                    },
             error:function(req,e,er) {
               alert('error!' + er);
             }
          });
}
function leer_registro()
{
  $("#DivMovimientos").empty();
  var losdatos = {IdFacturacion:$("#txtIdFacturacion").val()};
  $.ajax({
            url:'./scripts/oper_detalles.php?o=12',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                      $("#DivMovimientos").append(data);
                   },
            error:function(req,e,er) {
              alert('error!' + er);
            }
         });
}
function QuienFactura()
{
  $("#lblQuienFactura").empty();
  $("#lblEmpresaSolicitante").empty();
  $("#lblSeFacturaA").empty();
  $("#lblRFCS").empty();
  $("#lblDir").empty();
  var losdatos = {IdFacturacion:$("#txtIdFacturacion").val()};
  $.ajax({
            url:'./scripts/oper_detalles.php?o=13',
            type:'POST',
            data:losdatos,
            success:function(data)
                   {
                     alert(data);
                     /*var dataJson = eval(data);
                      $("#lblQuienFactura").val(dataJson[0].QuienFactura);
                      $("#lblEmpresaSolicitante").val(dataJson[0].EmpresaSolicitante);
                      $("#lblSeFacturaA").val(dataJson[0].SeFactura);
                      $("#lblRFCS").val(dataJson[0].RFC);
                      $("#lblDir").val(dataJson[0].DirFiscal);*/
                   },
            error:function(req,e,er) {
              alert('error!' + er);
            }
         });
}

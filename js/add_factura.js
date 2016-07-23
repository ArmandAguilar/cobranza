function sumar_iva()
{
  var iva = $("#cboIva").val();
  var newIva = iva * $("#txtCantidad").val();
   $("#txtImporteTotal").val(newIva);
}
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
function validar_datos()
{

     var txtNoProyecto_=$('#txtNoProyecto').val();
     var txtFactura_=$('#txtFactura').val();
     var txtFacturaNo_=$('#txtFacturaNo').val();
     var cboTipoFactura_=$('#cboTipoFactura').val();
     var txtCantidad_=$('#txtCantidad').val();
     var cboIva_=$('#cboIva').val();
     var txtConcepto_=$('#txtConcepto').val();
     var cboEmpresa_=$('#cboEmpresa').val();
     var txtRasonSocial_=$('#txtRasonSocial').val();
     var txtRFC_=$('#txtRFC').val();
     var txtDir_=$('#txtDir').val();

    if(txtFactura_ == "")
     {
       $('#DivtxtFactura').addClass('has-error');
       $('#msjError').show();
       $('#msjError').hide(9000);
     }
     else{
            $('#DivtxtFactura').removeClass('has-error');

            if (txtFacturaNo_ == "")
             {

                 $('#DivtxtFacturaNo').addClass('has-error');
                 $('#msjError').show();
                 $('#msjError').hide(9000)
             }
             else
                {
                    $('#DivtxtFacturaNo').removeClass('has-error');
                    if (cboTipoFactura_ == 0)
                    {
                          $('#msjError').empty();
                          $('#msjError').append('[Error]: Tipo de factura no definida ');
                          $('#msjError').show();
                          $('#msjError').hide(11000)
                    }
                    else
                        {
                           $('#DivtxtFacturaNo').removeClass('has-error');
                            if (txtCantidad_ == "")
                             {
                                 $('#DivtxtCantidad').addClass('has-error');
                                 $('#msjError').show();
                                 $('#msjError').hide(9000)
                             }
                             else
                                {
                                    $('#DivtxtCantidad').removeClass('has-error');
                                    if (cboIva_ == 2)
                                      {
                                        $('#msjError').empty();
                                        $('#msjError').append('[Error]: Tipo de iva no definida ');
                                        $('#msjError').show();
                                        $('#msjError').hide(11000)
                                      }
                                    else
                                        {
                                            if (txtConcepto_ == "")
                                              {

                                                $('#DivtxtConcepto').addClass('has-error');
                                                $('#msjError').show();
                                                $('#msjError').hide(9000)
                                              }
                                            else{
                                                    $('#DivtxtConcepto').removeClass('has-error');
                                                    if (cboEmpresa_ == 0)
                                                     {
                                                       $('#msjError').empty();
                                                       $('#msjError').append('[Error]: Tipo de Empresa no definida ');
                                                       $('#msjError').show();
                                                       $('#msjError').hide(11000)
                                                    }
                                                    else
                                                        {
                                                            if (txtRasonSocial_ == "")
                                                              {
                                                                $('#DivtxtRasonSocial').addClass('has-error');
                                                                $('#msjError').show();
                                                                $('#msjError').hide(9000)
                                                              }
                                                             else{
                                                                    $('#DivtxtRasonSocial').removeClass('has-error');
                                                                    if (txtRFC_ == "")
                                                                      {
                                                                        $('#DivtxtRFC').addClass('has-error');
                                                                        $('#msjError').show();
                                                                        $('#msjError').hide(9000)
                                                                      }
                                                                  else {
                                                                          $('#DivtxtRFC').removeClass('has-error');
                                                                          if (txtDir_ == "")
                                                                             {
                                                                               $('#DivtxtDir').addClass('has-error');
                                                                               $('#msjError').show();
                                                                               $('#msjError').hide(9000)
                                                                            }
                                                                          else {
                                                                                  $('#DivtxtDir').removeClass('has-error');
                                                                                  guardar_factura()
                                                                              }
                                                                       }
                                                                }
                                                        }
                                            }
                                         }
                                }
                        }
                }
         }

}
function guardar_factura()
{
    $('#msjError').hide();
    $('#msjOk').hide();
    var losdatos = {
        txtNoProyecto:$('#txtNoProyecto').val(),
        txtFactura:$('#txtFactura').val(),
        txtFacturaNo:$('#txtFacturaNo').val(),
        cboTipoFactura:$('#cboTipoFactura').val(),
        txtCantidad:$('#txtCantidad').val(),
        cboIva:$('#cboIva').val(),
        txtImporteTotal:$('#txtImporteTotal').val(),
        txtConcepto:$('#txtConcepto').val(),
        cboEmpresa:$('#cboEmpresa').val(),
        txtRasonSocial:$('#txtRasonSocial').val(),
        txtRFC:$('#txtRFC').val(),
        txtDir:$('#txtDir').val(),
        txtDateFactura:$('#txtDateFactura').val(),
        txtDateTentativa:$('#txtDateTentativa').val(),
        txtDateRecepcion:$('#txtDateRecepcion').val()
      };
      $.ajax({
             		url:'./scripts/oper_add_factura.php?o=2',
            		type:'POST',
            		data:losdatos,
            		success:function(data)
            	         {

                          $('#msjOk').show();
                          $('#msjOk').hide(9000);
                          /* aqui procesamos el envio*/
                          window.location.href='panel.php';
            		       },
            		error:function(req,e,er) {
            			alert('error!' + er);
                  $('#msjError').show();
                  $('#msjError').hide(8000);
            		}
             });

}
function EnviarCorreo()
{
  $("input[type=checkbox]:checked").each(function()
    {
      alert($(this).val())
    }
  );
}

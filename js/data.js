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

function load_view(Factura,NoProyecto,Proyecto,Importe)
{
  $("#txtFactura").val(Factura);
  $("#txtNoProyecto").val(NoProyecto);
  $("#txtProyecto").val(Proyecto);
  $("#txtImporte").val(Importe);
  document.forms["frmDetalle"].submit();
}

function load_enbudo()
{
  $('#DEnvudo').show();
  $("#DLista").hide();
  $("#DCronograma").hide();
  $("#rows-enbudo").empty();
  $.ajax({
            url:'./scripts/data.php?v=enbudo',
            type:'POST',
            success:function(data)
            {
                 $("#rows-enbudo").append(data);
                 
            },
            error:function(req,e,er) {
              alert(er);
            }
          });

}

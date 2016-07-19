function crear_maestro()
{

    var losdatos = {txtNoMaestro:$('#txtNoMaestro').val(),txtMaestro:$('#txtMaestro').val()};
    $.ajax({
             url:'./scripts/oper_relacionar_maestroproyecto.php?o=1',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                        alert(data);
                          $.niftyNoty({
                            type: 'success',
                            icon : 'fa fa-check',
                            message : '<strong>Oka</strong> maestro creado',
                            container : 'floating',
                            timer : 3000
                          });
                    },
             error:function(req,e,er) {
                       $.niftyNoty({
                         type: 'danger',
                         icon : 'fa fa-minus',
                         message : 'oh! a ocurrido un error.',
                         container : 'floating',
                         timer : 3000
                       });
                       alert(req,e,er);
             }
          });

}
function relacionar_maestroproyecto()
{
  var losdatos = {cboProyecto:$('#cboProyecto').val(),cboMaestro:$('#cboMaestro').val()};
  $.ajax({
           url:'./scripts/oper_relacionar_maestroproyecto.php?o=2',
           type:'POST',
           data:losdatos,
           success:function(data)
                  {
                      alert(data);
                        $.niftyNoty({
                          type: 'success',
                          icon : 'fa fa-check',
                          message : '<strong>Oka</strong> relacion creada',
                          container : 'floating',
                          timer : 3000
                        });
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

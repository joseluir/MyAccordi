
<script type="text/javascript">
$(function () {
    $('#grafica').highcharts({
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Las 10 mas Vistas'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
                      
        },
        xAxis: {
            categories: [
	
			
			
				<?php
				//$sql=mysql_query("select cancion.id, cancion.nombre, count(cancion_id) as visitas from visita inner join cancion on visita.cancion_id = cancion.id group by cancion.id order by visitas desc limit 10");
				
				 foreach ($visitas as $key):
			    ?>
				

				['<?php echo ($key->nombre); ?>'],
				<?php
				endforeach;
				?>
			
		    ]
        },
        yAxis: {
            title: {
                text: 'Numero de visitas'
            }
        },
        series: [{
            name: 'Vistas',
            data: 
			[	
			<?php
				//$sql=mysql_query("select cancion.id, cancion.nombre, count(cancion_id) as visitas from visita inner join cancion on visita.cancion_id = cancion.id group by cancion.id order by visitas desc limit 10");
				 foreach ($visitas as $key):
			?>
			[<?php  echo($key->visitas); ?>],
			<?php
				endforeach;
			?>
			
			]
        }]
    });
});
		</script>




<div id="grafica" style="height: 400px"> </div>

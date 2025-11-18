<!DOCTYPE html>
<html>
<head>
	<title>Grafik Statistik Data Pekerjaan </title>

	<?php
        foreach($data as $data){
            $kategori[] = $data->kategori;
            $jumlah[] = (float) $data->jumlah;
        }
    ?>
</head>
<body>
   Grafik Pekerjaan
</br>

	<canvas id="canvas" width="1000" height="280"></canvas>

	<!--Load chart js-->
	<script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
	<script>

            var lineChartData = {
                labels : <?php echo json_encode($kategori);?>,
                datasets : [
                    
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($jumlah);?>
                    }

                ]
                
            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
        
   	</script>
</body>
</html>
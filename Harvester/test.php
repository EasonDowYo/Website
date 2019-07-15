<!DOCTYPE html>
<html>
    
<head>
    

<title>NCKU SNAME Lab611</title>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	google.charts.load('current', {'packages':['corechart']});
    	google.charts.setOnLoadCallback(drawChart);
	    
	    function drawChart(ES_data) {
		    var data = new google.visualization.DataTable();
		    data.addColumn('string', 'time');
		    data.addColumn('number', 'Voltage');

		    var chartdata=JSON.parse(ES_data);
		    var t = chartdata[1];
		  	var vol_js = chartdata[0];
		  	
		  	var i;
	  		for(i = 0; i < t.length; i++)
	    		data.addRow( [ t[i], vol_js[i] ] );

	        //---------介面修改-----------
	     	var options = {
		        hAxis: {  //xlabel
		          title: 'Time',
		          textStyle: {
		            color: '#01579b',
		            fontSize: 0,
		            fontName: 'Arial',
		            bold: true,
		            italic: false
		          },
		          titleTextStyle: {
		            color: '#01579b',
		            fontSize: 30,
		            fontName: 'times new roman',
		            bold: true,
		            italic: false
		          }
		        },
		        vAxis: {  //ylabel
		          title: 'Voltage',
		          textStyle: {
		            color: '#1a237e',
		            fontSize: 16,
		            bold: true,
		            italic: false
		          },
		          titleTextStyle: {
		            color: '#1a237e',
		            fontName: 'times new roman',
		            fontSize: 36,
		            bold: true,
		            italic: false
		          }
		        },
		        colors: ['#000000']  //line color
		    };//end of options
	        var chart = new google.visualization.LineChart(document.getElementById('my_chart'));

	        chart.draw(data, options);
        }//end of drawchart
    </script>

	<script>
		var myVar = setInterval(showHint, 1000);

		function showHint() {

		    var xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		        var str = this.responseText;
		        var jjs=JSON.parse(str);
		        document.getElementById("txtHint").innerHTML=jjs;
		        drawChart(str);

		      }
		    };
		    xmlhttp.open("GET", "http://localhost/test/ajaxcall.php" , true); //抓mysql資料
		    xmlhttp.send();

		}



	</script>

	<script>
		var myVar = setInterval(myTimer, 1000);

		function myTimer() {
		  var d = new Date();
		  var t = d.toLocaleTimeString();
		  document.getElementById("demo").innerHTML = t;
		}
	</script>




</head>








<!-- body  body body body body body body body body body body body body body body -->
<body>

<p id="demo"></p>

<p id="aa">lllllllllllllllllllllllllll</p>



<p>MySQL data:
 	<span id="txtHint" name="hp"></span>   
</p>


<div id="my_chart" style= "width: 800px; height:500px"></div>

<div>End</div>





<!-- <table  border="1">

	<tr>

	<td>number</td>

	<td>voltage</td>

	<td>time</td>
	</tr>

	<?php for ($i=0;$i<$total_records;$i++)
	 {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   ?>

		<tr>

			<td><?php echo $row['number'];   ?></td>       

			<td><?php echo $row['voltage'];   ?></td> 

			<td><?php echo $row['time'];   ?></td>

		</tr>

	<?php    }   ?>

</table> -->








</body>
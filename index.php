<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$mysqli = mysqli_connect('127.0.0.1','peter','anhduong123','countDowntTime');
 $query = "SELECT * FROM timer ORDER BY id DESC LIMIT 1";
 $result = mysqli_query($mysqli,$query);

while($res = mysqli_fetch_array($result)) { 
 $date = $res['date'];

 $h = $res['h'];

$m = $res['m'];
$s = $res['s'];
}


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<div id="demo"></div>
 </body>
 </html>
 <?php
 echo "gio database ".date ('d/m/Y - H:i:s',strtotime("$date $h:$m:$s" )) ."<br>";
 echo "gio hien tai ".date('d/m/Y - H:i:s')."<br>"; 

 //echo date_format('d/m/Y - H:i:s',strtotime("$date $h:$m:$s" ))  ?>
 <script>
		var countDownDate = <?php 
		echo strtotime("$date $h:$m:$s" ) ?> * 1000; // doi ve ms
		var now = <?php echo time() ?> * 1000;		

		// Update the count down every 1 second
		var x = setInterval(function() {
		now = now + 1000;

		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		// Time calculations for days, hours, minutes and seconds
		// a % b = x
		// quy luật số dư Kết quả x chia lấy dư luôn nằm trong khoảng từ 0 -> b - 1

		// mặc định ta sẽ quy đổi hết về giây 
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		// ta sẽ chia cho 3600s nó sẽ chạy từ thì là max là 59 minutes mà muốn được đưn vị minute thì phải đổi từ giây sang phút thì phải chia cho 60 nữa 
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

		// ta sẽ chia cho 60 vì s chạy từ 0 -> 60
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);


		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
		minutes + "m " + seconds + "s ";
		// If the count down is over, write some text 
		if (distance < 0) {
		clearInterval(x);
		 document.getElementById("demo").innerHTML = "EXPIRED";
		}
		    
		}, 1000);

  </script>


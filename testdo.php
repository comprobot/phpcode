<?php 
			$videouser = 'bblinux';
			$query = "SELECT * FROM  customer_access ca, customers cc   WHERE ca.advid = '$videouser' and ca.customerid = cc.username" ;
			$resultsofyou = mysqli_query($db, $query); 			
			if (mysqli_num_rows($results) == 1) {
			?>
			 
 			
			<table border="1">
			<thead>
				<tr>
					<th>title</th>
					<th>age</th>					
					<th>time</th>			
				</tr>
			</thead>
	
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
					<td><?php echo $row['title']; ?></td>					
					<td><?php echo $row['age']; ?></td>	
					<td><?php echo $row['tm']; ?></td>						
			</tr>
			<?php } ?>
			</table>
			 
			<?php
			}
			?>

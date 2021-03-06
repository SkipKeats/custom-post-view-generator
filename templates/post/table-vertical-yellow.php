<style type="text/css">
	.cpvg-table{
		margin-top:10px;
		border: 1px solid #CECE1C;
		border-collapse: collapse;
		color: #6D6D6D;		
	}
	.cpvg-table td {
		border: 1px solid #CECE1C;
		padding: 2px;
	}
	.cpvg-table tr {
		border: 1px solid #CECE1C;
	}
	.cpvg-table th {
		border: 1px solid #CECE1C;
		background-color: #FFFF00;
		padding: 2px;		
	}
	.cpvg-table td ul {
		border: 1px solid #CECE1C;
	}
</style>

<?php
	$processed_data = array();
	$output = "";
	foreach($record_data as $record){
		if(!isset($record['label'])){
			//if there is no label then it is a heading or horizontal line or a similar element
			//this finishes the table and prints the element			
			if(!empty($processed_data)){
				$output.="<table class='cpvg-table'>".implode("",$processed_data)."</table>";
				$processed_data = array();
			}
			$output.=$record['value'];
		}else{
			$processed_data[]="<tr><th>".$record['label']."</th><td>".$record['value']."</td>";
		}
	}
	
	if(!empty($processed_data)){
		$output.="<table class='cpvg-table'>".implode("",$processed_data)."</table>";
		$processed_data = array();
	}		
	echo $output;
?>

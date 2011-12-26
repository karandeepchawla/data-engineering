<?php
#print sys_get_temp_dir();

$value = true;
while($value)
{
	#check to see if file is available:
	if(!(is_uploaded_file($_FILES['upload']['tmp_name'])))
			{
				echo 'file was not uploaded';
				$value = false;
			}
			
			{
				$value = true;
			}



		#set file name
		$fileName = $_FILES['upload']['name'];
		
		
		#check for .tab extension
		#get file extension using pathinfo
		
		$fileExtension = pathinfo($fileName,PATHINFO_EXTENSION);
		if($fileExtension!='tab')
			{
				 echo 'file type was incorrect';
				 $value = false;
				 
			}
	



		if($value)
		{
			#set path
			$newPath = "files/".$fileName;
			#copy th efile over
			$copyFile = move_uploaded_file($_FILES['upload']['tmp_name'], $newPath);
			echo 'file has been copied successfully<br>';
			$file = fopen($newPath,r);
			fgets($file,4096);
			$i = 1;
			$delete = "DELETE FROM data";
			mysql_query($delete);
			while(!feof($file))
			{
			  $line = preg_split('/[\t,]+/',fgets($file));
			  $sql = 'INSERT INTO data (id, purchaser_name, item_description, item_price, purchase_count, merchant_address, merchant_name) VALUES("'.$i.'","'.$line[0].'","'.$line[1].'","'.$line[2].'","'.$line[3].'","'.$line[4].'","'.$line[5].'")';
			  
			 			  
			  if(!mysql_query($sql))
			  {
			  echo  $line[0].'&nbsp&nbsp&nbsp'.$line[1].'&nbsp&nbsp&nbsp'.$line[2].'&nbsp&nbsp&nbsp'.$line[3].'&nbsp&nbsp&nbsp'.$line[4].'&nbsp&nbsp&nbsp'.$line[5];
			  echo '<br>';
			  echo $i;
			  echo 'query failed';
			  echo '<br>';
			  die(mysql_error());
			  }
			  
			
			
			
						$i++;
			}
		
					$value = false;

		}
}
?>
<?
function add_photo($file){
	if(move_uploaded_file($file[tmp_name],$file[name])){
		echo "Файл успешно загружен!";		
	}	
	else{
		echo "Возникла ошибка при загрузке файла!";			
	}
}

function gallery(){
	$arr = array(
		array("id"=>1,"type"=>"jpg"),
		array("id"=>2,"type"=>"jpg"),
		array("id"=>3,"type"=>"jpg"),
		array("id"=>4,"type"=>"jpg"),
	);	
	return $arr;
}

function photo($id){
	return array("id"=>$id,"type"=>"jpg");	
}


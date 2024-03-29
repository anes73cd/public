<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelPengguna
 *
 * @author andreas
 */
require_once __DIR__ . "/../utility/database/mysql_db.php";

class modelData extends mysql_db {

     //put your code here
     public function insertData($data,$tableName) {
          $id = $data['id'];
          $judul = $data['judul'];
          
          $waktu = $data['waktu'];
          $waktu_2 = $data['waktu_2'];
          if($waktu_2=="" ){
             $waktu_2="0000-00-00 00:00:00" ; 
          }
               
          $sub_judul = $data['sub_judul'];
          $content = $data['content'];
          $short_content = $data['short_content'];
          $image= $data['image'];
          $kategori= $data['kategori'];
          $kategori_2= $data['kategori_2'];
          $status_display= $data['status_display'];
          $longitude= $data['longitude'];
          $latitude= $data['latitude'];
          $language= $data['language'];
          
          $user_id=$_SESSION['user_id'];
                   
          if($tableName=="attraction")
          $query = "Insert into $tableName   
                         set judul='$judul',
                         sub_judul='$sub_judul',
                               waktu='$waktu',
                                      waktu_2='$waktu_2',
                         content='$content',
                         short_content='$short_content',   
                         image='$image',
                         kategori='$kategori',
                         kategori_2='$kategori_2',
                        status_display='$status_display',
                        latitude='$latitude',
                        longitude='$longitude',
                        language='$language',"
                  . "user_id=$user_id";
          else
               $query = "Insert into $tableName   
                         set judul='$judul',
                         sub_judul='$sub_judul',
                               waktu='$waktu',
                          content='$content',
                         short_content='$short_content',   
                         image='$image',
                         kategori='$kategori',
                         kategori_2='$kategori_2',
                        status_display='$status_display',
                        latitude='$latitude',
                        longitude='$longitude',
                        language='$language',"
                  . "user_id=$user_id";
//echo $query;
          //Execute query
            $result = $this->query($query);

          return $result;
     }

     public function updateData($data,$tableName) {
          $id = $data['id'];
          $judul = $data['judul'];
          $waktu = $data['waktu'];
             $waktu_2 = $data['waktu_2'];
          if($waktu_2=="" ){
             $waktu_2="0000-00-00 00:00:00" ; 
          }
          $sub_judul = $data['sub_judul'];
          $content = $data['content'];
          $short_content = $data['short_content'];
          $image= $data['image'];
          $kategori= $data['kategori'];
          $kategori_2= $data['kategori_2'];
          $status_display= $data['status_display'];
          $longitude= $data['longitude'];
          $latitude= $data['latitude'];
          $language= $data['language'];

           if($tableName=="attraction")
         $query = "update  $tableName   
                         set judul='$judul',
                         sub_judul='$sub_judul',
                         waktu='$waktu',
                                waktu_2='$waktu2',
                         content='$content',
                         short_content='$short_content',   
                         image='$image',
                         kategori='$kategori',
                         kategori_2='$kategori_2',
                        status_display='$status_display',
                        latitude='$latitude',
                        longitude='$longitude',
                        language='$language' where id='$id'";
    else {
          $query = "update  $tableName   
                         set judul='$judul',
                         sub_judul='$sub_judul',
                         waktu='$waktu',
                     
                         content='$content',
                         short_content='$short_content',   
                         image='$image',
                         kategori='$kategori',
                         kategori_2='$kategori_2',
                        status_display='$status_display',
                        latitude='$latitude',
                        longitude='$longitude',
                        language='$language' where id='$id'";
    }
          //Execute query
          $result = $this->query($query);

          return $result;
     }

     public function deleteData($id,$tableName) {
          $query = "delete from $tableName where id='$id'";
          //Execute query
          $result = $this->query($query);

          return $result;
     }
     
       public function publishData($id,$tableName,$value) {
          $query = "update $tableName set status_display=$value where id='$id'";
          //Execute query
           $result = $this->query($query);

          return $result;
     }

     public function readData($data,$tableName) {
          $parameter = "";
          $count = 0;
          foreach ($data as $key => $value) {
               if ($count == 0)
                    $paramater = "where $key='$value'";
               else
                    $paramater.=" AND $key='$value'";
               $count++;
          }
          $query = "select * from $tableName $paramater";
          //Execute query
          $result = $this->query($query);
        //  echo $result;
          //Wrap Output Query
          $data=$this->fetch_object($result);
        
          return $data;
     }
     
     public function readDataFull($data,$tableName) {
          $parameter = "";
          $count = 0;
          foreach ($data as $key => $value) {
               if ($count == 0)
                    $paramater = "where $key='$value'";
               else
                    $paramater.=" AND $key='$value'";
               $count++;
          }
          $query = "select * from $tableName $paramater";
          //Execute query
          $result = $this->query($query);
        //  echo $result;
          //Wrap Output Query
          $data=$this->fetch_object($result);
          
          return $data;
     }

}

?>

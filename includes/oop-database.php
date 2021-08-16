<?php
session_start();
  class DB{
      function db_connect(){
        $db_connect = mysqli_connect('localhost', 'root', '', 'lion');
        return $db_connect;
      }

      function table_all($table_name){
          
          $select_query = "SELECT * FROM $table_name";
          $from_db = mysqli_query($this->db_connect(), $select_query);
          return $from_db;
      }

      function count_all($count_table){
          
          $count_query = "SELECT COUNT(*) as total FROM $count_table";
          $from_db = mysqli_fetch_assoc(mysqli_query($this->db_connect(), $count_query));
          return $from_db;
      }

      function insert($table_name, $insert_datas){        
        $field_name_str = "";
        $values_str = "";
        foreach($insert_datas as $field_name => $insert_data){
          $field_name_str = $field_name_str.",".$field_name;
          $values_str = $values_str.",'".$insert_data."'";
        }
        $ready_field_name_str = substr($field_name_str, 1);
        $ready_values_str = substr($values_str, 1);        
        $insert_query = "INSERT INTO $table_name ($ready_field_name_str) VALUES ($ready_values_str)";
        $from_db = mysqli_query($this->db_connect(), $insert_query);
        $_SESSION['skill_added_status'] = "New skill Added successfully";
        header('location: skill.php');
        return $from_db;
      }
      
  }
  $object_db = new DB;

//   foreach($object_db->table_all("contacts") as $table_info){
//     print_r($table_info);
//     echo "<br>";
//   }

// print_r($object_db->count_all("users")['total']);
  
?>
<?php
class Nguoio{
  public $table;
  
  function __construct()
  {
      global $DB_PHONGTRO_PEOPLE;
      $this->table = $DB_PHONGTRO_PEOPLE;
  }

  public function getList($ma){
    $sql = "SELECT `cmnd`, `phongtro_ma`, `hoten`, `namsinh`, `quequan`, `nghenghiep`, `dienthoai`, `khac`, `ngaythue`, `vaitro`
    FROM `$this->table` WHERE `phongtro_ma` = '{$ma}'";
    return db_get_list($sql);
  }

  public function getListTong(){
    $sql = "SELECT `cmnd`, `phongtro_ma`, `hoten`, `namsinh`, `quequan`, `nghenghiep`, `dienthoai`, `khac`, `ngaythue`, `vaitro`
    FROM `$this->table`";
    return db_get_list($sql);
  }

  public function getRow($id){
    $sql = "SELECT `cmnd`, `phongtro_ma`, `hoten`, `namsinh`, `quequan`, `nghenghiep`, `dienthoai`, `khac`, `ngaythue`, `vaitro`
    FROM `$this->table` WHERE `cmnd` = '{$id}'";
    return db_get_row($sql);
  }

  public function count($ma){
      return db_count($this->table,'cmnd',array('phongtro_ma' => $ma));
  }

  // delete
  public function delete($id){
      $sql = "DELETE FROM `$this->table` WHERE `cmnd` = '{$id}'";
      return db_execute($sql);
  }

  //get list
  public function getListTT($type = 0){
    global $start;
    global $limit;
    $sqll = "";
    if($type == 0){
      $sqll = "SELECT `cmnd`, `phongtro_ma` , `hoten`, `namsinh` , `quequan` , `nghenghiep` , 
      `vaitro` , `dienthoai`, `ngaythue` , `khac` FROM `$this->table`
      ORDER BY `hoten` ASC LIMIT $start, $limit";
    }
    elseif($type == 1){
      $sqll = "SELECT `cmnd`, `phongtro_ma` , `hoten`, `namsinh` , `quequan` , `nghenghiep` , 
      `vaitro` , `dienthoai`, `ngaythue` , `khac` FROM `$this->table`
      WHERE `vaitro` = '0'
      ORDER BY `hoten` ASC LIMIT $start, $limit";
    }
    elseif($type == 2){
      $sqll = "SELECT `cmnd`, `phongtro_ma` , `hoten`, `namsinh` , `quequan` , `nghenghiep` , 
      `vaitro` , `dienthoai`, `ngaythue` , `khac` FROM `$this->table`
      WHERE `vaitro` = '1'
      ORDER BY `hoten` ASC LIMIT $start, $limit";
    }
    else {
      $sqll = "SELECT `cmnd`, `phongtro_ma` , `hoten`, `namsinh` , `quequan` , `nghenghiep` , 
      `vaitro` , `dienthoai`, `ngaythue` , `khac` FROM `$this->table`
      ORDER BY `hoten` ASC LIMIT $start, $limit";
    }
    return db_get_list($sqll);
  }
 //check if exists
  static function checkMa($code){
    global $DB_PHONGTRO_PEOPLE;
    return db_count($DB_PHONGTRO_PEOPLE, 'cmnd', array('cmnd' => $code));
  }

//search nguoi o
  public function searchnguoio($tukhoa){
    $sql = "SELECT * FROM `$this->table` 
    WHERE `hoten` LIKE '%". $tukhoa ."%' ";
    return db_get_list($sql);
  }

 //status
 static function status($int){
  if($int == 0){
    echo '<span class="text-success bold">Người Thuê Chung</span>';
  }
  elseif($int == 1){
    echo '<span class="text-danger bold">Chủ Phòng</span>';
  }
  else{
    echo '<span class="bold">N/A</span>';
  }
 }
}
?>

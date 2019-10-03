<?php


Class Connection {
  private  $server;
  private  $user;
  private  $pass;
  private  $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
  protected $con;

  public function __construct(){

    $config = $this->baca_dbconfig('dbconfig.ini');

    $this->user=$config['USER_NAME'];
    $this->pass=$config['PASSWORD'];
    $this->server=$config['DBMS'].":host=".$config['HOST'].";port=".$config['PORT'].";dbname=".$config['DB_NAME'];
  }

  // public function __destruct(){
  //   closeConnection();
  // }

  public function baca_dbconfig($nama_file){
    // $file = file_get_contents($nama_file);
     
    // $decoded = json_decode($file, true);

    // return $decoded;
    // read parameters in the ini configuration file
    $params = parse_ini_file($nama_file);
    if ($params === false) {
        throw new \Exception("Error reading database configuration file");
    }
    return $params;
  }
   
  public function openConnection(){
   try{
      $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
      return $this->con;
      }
   catch (PDOException $e)
     {
         echo "There is some problem in connection: " . $e->getMessage();
     }
  }

  public function closeConnection() {
     $this->con = null;
  }
}

?>
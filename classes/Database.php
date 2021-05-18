<?php
include './../autoload.php';

class Database
{
   private $hostname;
   private $username;
   // private $password;
   private $name;
   private $port;

   public function setHostname($hostname)
   {
      $this->hostname = $hostname;
   }

   public function getHostname()
   {
      return $this->hostname;
   }

   public function setUsername($username)
   {
      $this->username = $username;
   }

   public function getUsername()
   {
      return $this->username;
   }

   public function setName($name)
   {
      $this->name = $name;
   }

   public function getName()
   {
      return $this->name;
   }

   public function setPort($port)
   {
      $this->port = $port;
   }

   public function getPort()
   {
      return $this->port;
   }

   function database()
   {
      echo "Starting DB";
      try {
         $this->hostname =  env('DB_HOST');
         $this->username =  env('DB_USERNAME');
         // $this->password =  env('DB_PASSWORD');
         $this->name =  env('DB_NAME');
         $this->port =  env('DB_PORT');
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

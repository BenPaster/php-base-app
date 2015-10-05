<?php
class Database {

  private static $db;
  private static $connection;
  private static $isConnected;

  public static function connectMock() {
    static::$isConnected = true;
  } // connectMock

  public static function connect($db) {
    $uri  = 'mongodb://something';
    $mongo = new MongoClient($uri, [
      'username' => 'user',
      'password' => 'password',
      'ssl' => true,
      'w' => true
    ]);

    static::$db = $mongo->{$db};
    static::$connection = $mongo;
    static::$isConnected = static::$connection->connected;

  } // connect

  public static function isConnected() {
    return static::$isConnected;
  } // isConnected

  public static function collection($collection) {
    return static::$db->{$collection};
  } // collection

}

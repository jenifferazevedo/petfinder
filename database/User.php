<?php
if (!file_exists('./bd.php')) {
  require('./database/bd.php');
} else if (file_exists('./bd.php')) {
  require('./bd.php');
}
class User extends Conn
{
  public $user_id;
  public $name;
  public $email;
  public $password;
  public $image;
  public $contact;
  public $adress;
  public $post_code;
  public $city;
  public $tipo;
  public $status;
  public $create_at;
  public $update_at;
  public $sql;
  public $stmt;
  public $e;

  /*function __construct()
  {
    $arguments = func_get_args();

    if (method_exists($this, $function = '__construct1')) {
      call_user_func_array(array($this, $function), $arguments);
    };
  }

  function __construct1($user_id = '', $name, $email, $password, $image = '', $contact, $adress, $post_code, $tipo = '', $status = '', $create_at = '', $update_at = '')
  {
    $this->user_id = $user_id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->image = $image;
    $this->contact = $contact;
    $this->adress = $adress;
    $this->post_code = $post_code;
    $this->tipo = $tipo;
    $this->status = $status;
    $this->create_at = $create_at;
    $this->update_at = $update_at;
  }*/

  public function create()
  {
    $this->connect();
    if (isset($_POST['user_name'], $_POST['email'], $_POST['password']) && $this->conn != null) {
      try {
        $this->user_name = $_POST['user_name'];
        $this->user_email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->image = strlen($_POST['user_foto']) == 0 ? 'n/a' : $_POST['user_foto'];
        $this->contact = $_POST['contact'];
        $this->adress = $_POST['adress'];
        $this->user_cep = $_POST['user_cep'];
        $this->user_city = $_POST['user_city'];
        $this->tipo = $_POST['user_type'];
        $this->sql = "INSERT INTO users (name, email, password, image, contact, adress, post_code, city, tipo) VALUES (:user_name, :user_email, :password, :image, :contact, :adress, :user_cep, :user_city, :tipo);";

        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindValue(':user_name', $this->user_name);
        $this->stmt->bindValue(':user_email', $this->user_email);
        $this->stmt->bindValue(':password', $this->password);
        $this->stmt->bindValue(':image', $this->image);
        $this->stmt->bindValue(':contact', $this->contact);
        $this->stmt->bindValue(':adress', $this->adress);
        $this->stmt->bindValue(':user_cep', $this->user_cep);
        $this->stmt->bindValue(':user_city', $this->user_city);
        $this->stmt->bindValue(':tipo', $this->tipo);
        $this->stmt->execute();
      } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
          window.location.href = '../index.php?p=Cadastro'; 
          </script>";
      }
    } else {
      "<script>window.location.href = '../index.php?p=Cadastro';</script>";
    }
  }
  public function selectAllInFrontEnd($table)
  {
    $this->connectInFrontEnd();
    try {
      $this->stmt = $this->conn->prepare("SELECT * FROM $table");
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
      window.location.href = '../index.php'; 
      </script>";
    }
  }
  public function selectWhereInFrontEnd($table, $column, $value)
  {
    $this->connectInFrontEnd();
    try {
      $this->stmt = $this->conn->prepare("SELECT * FROM $table WHERE $column=:value");
      $this->stmt->bindValue(':value', $value);
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php'; 
      </script>";
    }
  }
  public function delete($table, $column, $value)
  {
    $this->connect();
    try {
      $this->stmt = $this->conn->prepare("DELETE FROM $table WHERE $column=:value");
      $this->stmt->bindValue(':value', $value);
      $this->stmt->execute();
    } catch (PDOException $e) {
      echo "<script>alert('Erro ao deletar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php?pg=TableUser'; 
        </script>";
    }
  }
}

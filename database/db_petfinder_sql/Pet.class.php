<?php
if (!file_exists('./bd.php')) {
  require('./database/bd.php');
} else if (file_exists('./bd.php')) {
  require('./bd.php');
}
class Pet extends Conn
{
  public $pet_id;
  public $pet_name;
  public $pet_image;
  public $user_id;
  public $status;
  public $pet_type;
  public $description;
  public $create_at;
  public $update_at;
  public $sql;
  public $stmt;
  public $e;

  

  public function create()
  {
    $this->connect(); //colocar session no is set?
    if (isset($_POST['pet_name'], $_POST['pet_image'], $_POST['pet_type'], $_POST['description']) && $this->conn != null) {
      try {
        $this->pet_name = $_POST['pet_name'];
        $this->user_email = $_POST['email'];
        $this->pet_type = $_POST['pet_type'];
        //Ver se o nome do form consta mesmo como pet_foto!!!
        $this->pet_image = strlen($_POST['pet_image']) == 0 ? 'n/a' : $_POST['pet_image'];
        $this->description = $_POST['description'];
        $this->sql = "INSERT INTO pet (pet_name, pet_image, user_id, pet_type ,description) VALUES (:pet_name, :pet_image, :user_id, :pet_type, :description);";

        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindValue(':pet_name', $this->pet_name);
        $this->stmt->bindValue(':pet_image', $this->pet_image);
        //verificar como fazer a ligação do $user_id com a $session
        $this->stmt->bindValue(':user_id', $this->user_id);
        $this->stmt->bindValue(':pet_typer', $this->pet_type);
        $this->stmt->bindValue(':description', $this->description);
        $this->stmt->execute();
      } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
          window.location.href = '../index.php?p=Cadastro'; 
          </script>";
      }
    } else {
      "<script>window.location.href = '../index.php?p=Cadastro';</script>";
    }
  } //como alterar esse método? precisa?
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
  } //como vai aparecer no frontend?
  // fazer os selects!!!
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
  // fake delete apaga o pet para os usuários, sem apagá-lo da database - tentativa
  public function fakeDelete($table, $column, $value){

    $this->connect();
    try {  // A column deve ser o user_id ou pet_id e o value o valor
      $this->stmt = $this->conn->prepare("UPDATE $table SET $status='inativo' WHERE $column=$value");
      $this->stmt->bindValue(':value', $value); //Não precisa do bind column?
      $this->stmt->execute();
    } catch (PDOException $e) {
      echo "<script>alert('Erro ao deletar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php?pg=TableUser'; 
        </script>";
    }
  }
}

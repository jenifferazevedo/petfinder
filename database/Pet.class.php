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
  public $sexo;
  public $description;
  public $create_at;
  public $update_at;
  public $sql;
  public $stmt;
  public $e;

  public function create($id)
  {
    if (isset($_POST['pet_name'], $_POST['sexo'], $_POST['pet_type'], $_POST['description']) && $this->conn != null) {
      try {
        $this->pet_name = $_POST['pet_name'];
        $this->pet_image = strlen($_POST['pet_image']) == 0 ? 'n/a' : $_POST['pet_image'];
        $this->user_id = $id;
        $this->sexo = $_POST['sexo'];
        $this->pet_type = $_POST['pet_type'];
        $this->description = $_POST['description'];
        $this->sql = "INSERT INTO pet (pet_name, pet_image, user_id, pet_type, sexo, description) VALUES (:pet_name, :pet_image, :user_id, :pet_type, :sexo, :description);";

        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindValue(':pet_name', $this->pet_name);
        $this->stmt->bindValue(':pet_image', $this->pet_image);
        $this->stmt->bindValue(':user_id', $this->user_id);
        $this->stmt->bindValue(':pet_type', $this->pet_type);
        $this->stmt->bindValue(':sexo', $this->sexo);
        $this->stmt->bindValue(':description', $this->description);
        $this->stmt->execute();
      } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar o Pet!' ERRO - {$e->getMessage()});
        window.location.reload(); 
        </script>";
      }
    } else {
      "<script>window.location.href = '../index.php';</script>";
    }
  } //como alterar esse método? precisa?
  public function selectAllInFrontEnd()
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT * FROM pet");
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
      window.location.href = '../index.php'; 
      </script>";
    }
  }
  public function selectAllAtivosInFrontEnd()
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT p.*, u.name as user_name, u.email, u.contact, u.city, t.type_name FROM pet p JOIN users u ON p.user_id=u.user_id JOIN type_pet t ON p.pet_type=t.type_id WHERE p.status='ativo' ORDER BY create_at DESC");
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
      window.location.href = '../index.php'; 
      </script>";
    }
  }
  public function selectWhereInFrontEnd($column, $value)
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT p.*, u.name as user_name, u.email, u.city,  t.type_name FROM pet p JOIN users u ON p.user_id=u.user_id JOIN type_pet t ON p.pet_type=t.type_id WHERE p.$column=:value ORDER BY create_at DESC");
      $this->stmt->bindValue(':value', $value);
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php'; 
      </script>";
    }
  }
  public function delete($column, $value)
  {
    try {
      $this->stmt = $this->conn->prepare("DELETE FROM pet WHERE $column=:value");
      $this->stmt->bindValue(':value', $value);
      $this->stmt->execute();
    } catch (PDOException $e) {
      echo "<script>alert('Erro ao deletar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php?pg=TableUser'; 
        </script>";
    }
  }
  public function changeStatus($column, $value)
  {
    try {  // A column deve ser o user_id ou pet_id e o value o valor
      $this->stmt = $this->conn->prepare("UPDATE pet SET status='inativo' WHERE $column=$value");
      $this->stmt->bindValue(':value', $value); //Não precisa do bind column?
      $this->stmt->execute();
    } catch (PDOException $e) {
      echo "<script>alert('Erro ao deletar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php?pg=TableUser'; 
        </script>";
    }
  }
  public function filterUser($column, $value, $order)
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT p.*, u.name as user_name, u.email, u.city FROM pet p JOIN users u ON p.user_id=u.user_id WHERE $column LIKE :value ORDER BY $column $order");
      $this->stmt->bindValue(':value', "%" . $value . "%", PDO::PARAM_STR);
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php'; 
      </script>";
    }
  }
}

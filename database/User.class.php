<?php
if (!file_exists('./bd.php')) {
  require_once('./database/bd.php');
} else if (file_exists('./bd.php')) {
  require_once('./bd.php');
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
  public $search;

  public function create()
  {
    if (isset($_POST['user_name'], $_POST['email'], $_POST['password']) && $this->conn != null) {
      try {
        $this->user_name = ucwords(strtolower($_POST['user_name']));
        $this->user_email = strtolower($_POST['email']);
        $this->password = $_POST['password'];
        $this->image = strlen($_POST['user_foto']) == 0 ? 'n/a' : $_POST['user_foto'];
        $this->contact = ucwords(strtolower($_POST['contact']));
        $this->adress = ucwords(strtolower($_POST['adress']));
        $this->user_cep = $_POST['user_cep'];
        $this->user_city = ucwords(strtolower($_POST['user_city']));
        $this->tipo = isset($_POST['user_type']) ? $_POST['user_type'] : '0';

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
  public function modifyUser($id)
  {
    if (isset($_POST['id'], $_POST['user_name'], $_POST['email'], $_POST['password'], $_POST['contact']) && $this->conn != null && isset($_SESSION['petfinder-user']) || isset($_SESSION['petfinder-admin'])) {
      try {
        $this->user_name = ucwords(strtolower($_POST['user_name']));
        $this->user_email = strtolower($_POST['email']);
        $this->password = $_POST['password'];
        $this->image = strlen($_POST['user_foto']) == 0 ? 'n/a' : $_POST['user_foto'];
        $this->contact = ucwords(strtolower($_POST['contact']));
        $this->adress = ucwords(strtolower($_POST['adress']));
        $this->user_cep = $_POST['user_cep'];
        $this->user_city = ucwords(strtolower($_POST['user_city']));
        $this->tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '0';
        $this->status = isset($_POST['status']) ? $_POST['status'] : 'ativo';
        $this->sql = "UPDATE users SET name=:user_name, email=:user_email, password=:password, 
        image=:image, contact=:contact, adress=:adress, post_code=:user_cep, city=:user_city, tipo=:tipo, status=:status WHERE user_id=:id";

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
        $this->stmt->bindValue(':status', $this->status);
        $this->stmt->bindValue(':id', $id);
        $this->stmt->execute();
      } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
        window.location.reload();
          </script>";
      }
    } else {
      "<script>window.location.href = '../index.php';</script>";
    }
  }
  public function selectAllInFrontEnd()
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT * FROM users");
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
      $this->stmt = $this->conn->prepare("SELECT * FROM users WHERE $column=:value");
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
    $this->connect();
    try {
      $this->stmt = $this->conn->prepare("DELETE FROM users WHERE $column=:value");
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
    if (isset($_POST['id']) && $this->conn != null) {
      try {
        $this->sql = "UPDATE users SET status='inativo' WHERE $column=:value";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindValue(':value', $value);
        $this->stmt->execute();
      } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
          window.history.go(-1);
          </script>";
      }
    } else {
      "<script>window.location.href = '../index.php';</script>";
    }
  }
  public function filterUser($column, $value, $order)
  {
    try {
      $this->stmt = $this->conn->prepare("SELECT * FROM users WHERE $column LIKE :value ORDER BY $column $order");
      $this->stmt->bindValue(':value', "%" . $value . "%", PDO::PARAM_STR);
      $this->stmt->execute();
    } catch (Exception $e) {
      echo "<script>alert('Erro ao listar!' ERRO - {$e->getMessage()});
        window.location.href = '../index.php'; 
      </script>";
    }
  }
}

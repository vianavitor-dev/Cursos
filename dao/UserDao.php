<?php 

require_once "../models/User.php" ;
require_once "../connection/Connection.php" ;

/** 
 * Classe com as funções que o usuário poderá executar no site.
 * Como: 
 * - Cadastrar-se: **register**
 * - Matricular-se num curso: **inscribe**
 * - Entrar/ Logar no site: **login**
 * - Deslogar do site: **sign out**
 * - Buscar por Email: **search by email**
 * - Buscar pelo Id: **search by id**
 */
class UserDao {
    public function register(User $user): mixed {
        try {

            $SQL = 'INSERT INTO usuario (cpf, nome, email, senha, data_nascimento) VALUES(:cpf, :nome, :email, :senha, :dataN)';
            $conn = Connection::getConexao()->prepare($SQL);

            $cpf = $user->getCpf();

            $conn->bindValue(':cpf', $user->getCpf(), PDO::PARAM_INT);
            $conn->bindValue(':nome', $user->getName());
            $conn->bindValue(':email', $user->getEmail());
            $conn->bindValue(':senha', $user->getPassword());
            $conn->bindValue(':dataN', $user->getDt()->format('Y/m/d'));

            $conn->execute();

            return json_encode(['error' => 0, 'message' =>'Usuário cadastrado com sucesso']);
        }
        catch (Exception $e) {
            return json_encode(['error' => 1, 'message' => "Erro ao inserir usuário {$e}"]);
        }
    }

    public function login(User $current): mixed {
        try {
            $user = $this->searchByEmail($current->getEmail());

            if ($user == []) {
                return json_encode(['error' => 1, 'message' =>'Email incorreto']);
            }

            if ($user['senha'] != $current->getPassword()) {
                return json_encode(['error' => 1, 'message' =>'Email ou senha incorreto']);
            }

            return json_encode(['error' => 0, 'message' =>'Usuário logado com sucesso']);
        }
        catch (Exception $e) {
            return json_encode(['error' => 1, 'message' =>"Erro ao inserir usuário {$e}"]);  
        }
    }

    public function signOut(User $current): mixed {
        return json_encode(['error' => 0, 'message' =>'Usuário deslogado']);
    }

    public function inscribe(User $current): mixed {
        return json_encode(['error' => 0, 'message' =>'Matricula feita com sucesso']);
    }

    public function searchByEmail(String $email): Array {
        $SQL = 'SELECT * FROM usuario WHERE email = :email';
        $conn = Connection::getConexao()->prepare($SQL);

        $conn->bindValue(':email', $email);

        return $conn->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchById(int $id): Array {
        $SQL = 'SELECT * FROM usuario WHERE id = :id';
        $conn = Connection::getConexao()->prepare($SQL);

        $conn->bindValue(':id', $id);

        return $conn->fetchAll(PDO::FETCH_ASSOC);
    }
}

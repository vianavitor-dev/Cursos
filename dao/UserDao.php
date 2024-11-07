<?php 

require_once "../models/User.php" ;

/** 
 * Classe com as funções que o usuário poderá executar no site.
 * Como: 
 * - Cadastrar-se: **register**
 * - Matricular-se num curso: **inscribe**
 * - Entrar/ Logar no site: **login**
 */
class UserDao {
    public function register(User $user): mixed {
        return json_encode(['error' => 0, 'message' =>'Usuário cadastrado com sucesso']);
    }
}

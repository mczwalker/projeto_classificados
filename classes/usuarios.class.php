<?php
	class Usuarios{

		public function getTotalUsuarios(){
			global $pdo;
			$sql = $pdo->query("SELECT * FROM usuarios");

			return $sql->rowCount();

		}


		public function cadastrar($nome, $email, $senha, $telefone){
			global $pdo;
			$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
			$sql->bindValue(":email", $email);
			$sql->execute();

			if($sql->rowCount() == 0){
				$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
				$sql->bindValue(":nome", $nome);
				$sql->bindValue(":email", $email);
				$sql->bindValue(":senha", md5($senha));
				$sql->bindValue(":telefone", $telefone);
				$sql->execute();

				return true;
			}else{
				return false;
			}
		}


		public function login($email, $senha){
			global $pdo;
			$sql = $pdo->prepare("SELECT id from usuarios WHERE email = :email AND senha = :senha");
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", $senha);
			$sql->execute();

			if($sql->rowCount() > 0){

				$dado = $sql->fetch();
				$_SESSION['clogin'] = $dado['id'];

						
				return true;
			}else{
				return false;
			}
		}

		public function exibirNome($id){
			global $pdo;
			$sql = $pdo->prepare("SELECT nome from usuarios WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$dado = $sql->fetch();
				$nome = $dado['nome'];

				return $nome;
			}else{
				return false;
			}
		}



	}


	?>
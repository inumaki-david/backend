package br.senai.estoque.gerenciamento_estoque.Repository;

import br.senai.estoque.gerenciamento_estoque.Model.Funcionario;
import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;

public interface FuncionaryRepository extends JpaRepository<Funcionario, Long> {
   Optional<Funcionario> findByNif(String nif);

   boolean existsByNif(String nif);
}

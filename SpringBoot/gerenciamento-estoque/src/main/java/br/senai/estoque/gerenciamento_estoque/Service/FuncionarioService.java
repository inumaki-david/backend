package br.senai.estoque.gerenciamento_estoque.Service;

import br.senai.estoque.gerenciamento_estoque.Model.Funcionario;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioAutenticadoRepository;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionaryRepository;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class FuncionarioService {
   @Autowired
   private FuncionaryRepository funcionaryRepository;
   @Autowired
   private FuncionarioAutenticadoRepository autenticadoRepository;

   public FuncionarioService() {
   }

   public boolean completarCadastro(String nif, String nome, String senha) {
      boolean autorizado = this.autenticadoRepository.existsByNifAndNomeAndAtivoTrue(nif, nome);
      if (!autorizado) {
         return false;
      } else if (this.funcionaryRepository.existsByNif(nif)) {
         return false;
      } else {
         Funcionario novo = new Funcionario();
         novo.setNome(nome);
         novo.setNif(nif);
         novo.setSenha(senha);
         this.funcionaryRepository.save(novo);
         return true;
      }
   }

   public boolean validarLogin(String nif, String senha) {
      Optional<Funcionario> func = this.funcionaryRepository.findByNif(nif);
      return func.isPresent() && ((Funcionario)func.get()).getSenha().equals(senha);
   }
}

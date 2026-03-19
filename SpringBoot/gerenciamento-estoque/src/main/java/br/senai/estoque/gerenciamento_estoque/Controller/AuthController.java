package br.senai.estoque.gerenciamento_estoque.Controller;

import br.senai.estoque.gerenciamento_estoque.Service.FuncionarioService;
import jakarta.servlet.http.HttpSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class AuthController {
   @Autowired
   private FuncionarioService funcionarioService;

   public AuthController() {
   }

   @GetMapping({"/login"})
   public String loginPage() {
      return "auth/login";
   }

   @PostMapping({"/login"})
   public String login(@RequestParam String nif, @RequestParam String senha, HttpSession session, Model model) {
      boolean credenciaisOk = this.funcionarioService.validarLogin(nif, senha);
      if (!credenciaisOk) {
         model.addAttribute("erro", "NIF ou senha inválidos.");
         return "auth/login";
      } else {
         session.setAttribute("usuarioLogado", true);
         session.setAttribute("nif", nif);
         return "redirect:/app";
      }
   }

   @GetMapping({"/cadastro"})
   public String cadastroPage() {
      return "auth/cadastro";
   }

   @PostMapping({"/cadastro"})
   public String cadastro(@RequestParam String nome, @RequestParam String nif, @RequestParam String senha, Model model) {
      boolean sucesso = this.funcionarioService.completarCadastro(nif, nome, senha);
      if (sucesso) {
         return "redirect:/login?cadastrado=true";
      } else {
         model.addAttribute("erro", "NIF não encontrado para pré-cadastro ou já ativo.");
         return "auth/cadastro";
      }
   }

   @GetMapping({"/logout"})
   public String logout(HttpSession session) {
      session.invalidate();
      return "redirect:/login";
   }
}

package br.senai.estoque.gerenciamento_estoque.Controller;

import jakarta.servlet.http.HttpSession;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class AppController {
   public AppController() {
   }

   @GetMapping({"/app"})
   public String appHome(HttpSession session, Model model) {
      Object usuarioLogado = session.getAttribute("usuarioLogado");
      if (usuarioLogado != null && (Boolean)usuarioLogado) {
         model.addAttribute("nif", session.getAttribute("nif"));
         return "app/index";
      } else {
         return "redirect:/login";
      }
   }
}

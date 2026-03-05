package com.example.escola_xyz.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;

import com.example.escola_xyz.Model.Administrador;
import com.example.escola_xyz.Repository.AdministradorRepository;
import com.example.escola_xyz.Repository.VerificaCadastroAdmRepository;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class AdministradorController {
    
    //permite a transformação de um obj-java em entidade do bd
    //cada obj criado, vira uma linha do bd
    @Autowired
    AdministradorRepository ar;

    @Autowired
    VerificaCadastroAdmRepository vcar;

    //verificar acesso e cadastro
    boolean acessoAdm = false;

    //métodos
    //para navegar na página de cadastro
    @GetMapping("/cadastrar-adm")
    public String acessoCadastroAdmPage() {
        return "cadastro/cadastro-adm";
    }
    
    //para enviar o cadastro do Adm
    @PostMapping("/cadastrar-adm")
    public ModelAndView cadastrarAdmBD(Administrador adm, RedirectAttributes attributes) {
        boolean verificarCpf = vcar.existsById(adm.getCpf()); //se existir, retorna true, caso contrário, retorna false
        ModelAndView mv = new ModelAndView("redirect:/login-adm"); //assim que cadastrado, redireciona para tela de login
        if (verificarCpf) {
            //obj adm => pega as informações do formulário e cria um obj da classe adm
            ar.save(adm); //salva no bd
            //criar uma mensagem para o usuário
            String mensagem = "Cadastro Realizado com Sucesso";
            //log para o sistema
            System.out.println(mensagem);
            attributes.addFlashAttribute("msg",mensagem); //leva a mensagem para a tela de view
            attributes.addFlashAttribute("classe","verde");
        } else {
            //deu errado, pessoa não pode se cadastrar (caso o cpf não esteja no pré-cadastro)
            String mensagem = "Cadastro não Permitido";
            System.out.println(mensagem);
            attributes.addFlashAttribute("msg",mensagem);
            attributes.addFlashAttribute("classe","vermelho");
        }
        return mv;
    }

    //método para acessar (get) página para login do adm
    @GetMapping("/login-adm")
    public String acessoLoginPageAdm() {
        return "login/login-adm";
    }

    //método para carregar a página interna após o login
    @PostMapping("acesso-adm")
    public ModelAndView acessoAdm(@RequestParam String cpf, @RequestParam String senha, RedirectAttributes attributes) {
        
        ModelAndView mv = new ModelAndView("redirect:/interna-adm");
        boolean verificarCpf = ar.existsById(cpf); //verifica se o cpf está cadastrado
        boolean verificarSenha = ar.findByCpf(cpf).getSenha().equals(senha); //pego o cpf, solicito a senha e comparo com a senha digitada

        if (verificarCpf && verificarSenha) {
            acessoAdm = true;
        } else {
            String mensagem = "CPF ou Senha Incorreta";
            System.out.println(mensagem);
            attributes.addFlashAttribute("msg", mensagem);
            attributes.addFlashAttribute("classe","vermelho");
            mv.setViewName("redirect:/login-adm");
        }
        return mv;
    }

    //método para acessar a página interna 
    @GetMapping("/interna-adm")
    public ModelAndView acessoInternaPageAdm(RedirectAttributes attributes) {
        String vaiPara = ""; //endereço do redirecionamento
        if (acessoAdm) { //verifica se o usuário está logado
            vaiPara = "/interna/interna-adm"; //se estiver, vai para página interna
        } else { //caso contrário, nega o acesso e redireciona para o login
            String mensagem = "Acesso não Permitido";
            System.out.println(mensagem);
            attributes.addFlashAttribute("msg",mensagem);
            attributes.addFlashAttribute("classe", "vermelho");
            vaiPara = "redirect:/login-adm";
        }
        ModelAndView mv = new ModelAndView(vaiPara); //modelandview, vai direcionar a navegação
        return mv;
    }
    
}

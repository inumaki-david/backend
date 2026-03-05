package com.example.escola_xyz.Model;

import java.io.Serializable; //converte para binário

import jakarta.persistence.Entity;
import jakarta.persistence.Id;

//classe para conectar com o BD - Entidade do Banco
//coloca a anotação de Entity
@Entity
public class Administrador implements Serializable {
    //atributos
    @Id
    private String cpf;
    private String nome;
    private String email;
    private String senha;

    //métodos (getters and setters)
    public String getCpf() {
        return cpf;
    }
    public void setCpf(String cpf) {
        this.cpf = cpf;
    }
    public String getNome() {
        return nome;
    }
    public void setNome(String nome) {
        this.nome = nome;
    }
    public String getEmail() {
        return email;
    }
    public void setEmail(String email) {
        this.email = email;
    }
    public String getSenha() {
        return senha;
    }
    public void setSenha(String senha) {
        this.senha = senha;
    }
}

package br.senai.estoque.gerenciamento_estoque.Model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import java.io.Serializable;

@Entity
@Table(
   name = "funcionarios"
)
public class Funcionario implements Serializable {
   @Id
   @GeneratedValue(
      strategy = GenerationType.IDENTITY
   )
   private Long id;
   @Column(
      nullable = false
   )
   private String nome;
   @Column(
      nullable = false,
      unique = true,
      length = 20
   )
   private String nif;
   @Column(
      nullable = false
   )
   private String senha;
   @Column(
      nullable = false
   )
   private boolean ativo = true;

   public Funcionario() {
   }

   public Long getId() {
      return this.id;
   }

   public void setId(Long id) {
      this.id = id;
   }

   public String getNome() {
      return this.nome;
   }

   public void setNome(String nome) {
      this.nome = nome;
   }

   public String getNif() {
      return this.nif;
   }

   public void setNif(String nif) {
      this.nif = nif;
   }

   public String getSenha() {
      return this.senha;
   }

   public void setSenha(String senha) {
      this.senha = senha;
   }

   public boolean isAtivo() {
      return this.ativo;
   }

   public void setAtivo(boolean ativo) {
      this.ativo = ativo;
   }
}

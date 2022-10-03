package br.com.pedro.ECW.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;
import lombok.ToString;

@ToString
@AllArgsConstructor
@Getter
@Setter
@Entity(name = "usuario")
public class Usuario {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(length = 128, nullable = false)
    private String email;

    @Column(length = 5, nullable = false)
    private String callsign;

    @Column(length = 64, nullable = false)
    private String senha;

    @Column(length = 64, nullable = false)
    private String salt;

    public Usuario(String email, String senha) {
        this.email = email;
        this.senha = senha;
    }
}
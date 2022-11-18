package br.com.pedro.ECW.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.UniqueConstraint;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@ToString
@AllArgsConstructor
@NoArgsConstructor
@Getter
@Setter
@Entity(name = "usuario")
@Table(name = "usuario", uniqueConstraints = @UniqueConstraint(columnNames = { "email" }))
public class Usuario {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(length = 128, nullable = false)
    private String email;

    @Column(length = 5, nullable = true)
    private String callsign;

    @Column(length = 64, nullable = false)
    private String senha;

    @Column(length = 64, nullable = true)
    private String salt;

    public Usuario(String email, String senha) {
        this.email = email;
        this.senha = senha;
    }
}
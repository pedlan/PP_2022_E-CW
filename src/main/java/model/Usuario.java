package model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import lombok.Getter;
import lombok.AllArgsConstructor;
import lombok.Setter;

@AllArgsConstructor
@Getter
@Setter
@Entity (name = "Usuario")
public class Usuario {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @Column(name = "email", length = 128, nullable = false)
    private String  email;

    @Column(name = "callsign", length = 5, nullable = false)
    private String callsign;

    @Column(name = "senha", length = 256, nullable = false)
    private String senha;

    @Column(name = "salt", length = 256, nullable = false)
    private String salt;
}

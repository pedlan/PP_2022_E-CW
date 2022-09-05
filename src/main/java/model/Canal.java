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
@Entity (name = "Canal")
public class Canal {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @Column(name = "descricao", length = 64, nullable = false)
    private String  descricao;

    @Column(name = "wpm", nullable = false)
    private int wpm;
}

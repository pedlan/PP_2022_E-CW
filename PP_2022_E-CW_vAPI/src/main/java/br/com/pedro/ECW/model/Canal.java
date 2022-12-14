package br.com.pedro.ECW.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

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
@Entity(name = "canal")
public class Canal {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(length = 64, nullable = false)
    private String descricao;

    @Column(nullable = false)
    private int wpm;

    @Column
    private int tx;

    public Canal(String descricao, int wpm) {
        this.descricao = descricao;
        this.wpm = wpm;
    }

    public Canal(Canal canal, int tx) {
        this.id = canal.getId();
        this.descricao = canal.getDescricao();
        this.wpm = canal.getWpm();
        this.tx = tx;
    }

    public int txOn() {
        return tx++;
    }

    public int txOff() {
        if (tx == 0) {
            return 0;
        }

        return tx--;
    }
}
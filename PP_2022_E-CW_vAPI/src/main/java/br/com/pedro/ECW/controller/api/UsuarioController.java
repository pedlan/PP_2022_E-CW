package br.com.pedro.ECW.controller.api;

import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.util.List;
import java.util.Optional;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.server.ResponseStatusException;

import br.com.pedro.ECW.model.Usuario;
import br.com.pedro.ECW.service.UsuarioService;

@Controller
@RequestMapping("api/v1/usuario")
public class UsuarioController {

    private static UsuarioService usuarioService;
    final MessageDigest digest;

    public UsuarioController(UsuarioService usuarioService) throws Exception {
        this.usuarioService = usuarioService;
        this.digest = MessageDigest.getInstance("SHA3-256");
    }

    @GetMapping("/{id}")
    public ResponseEntity<Usuario> getUsuario(@PathVariable Long id) {
        Optional<Usuario> usuarioOp = usuarioService.findById(id);
        if (usuarioOp.isPresent()) {
            return ResponseEntity.ok().body(usuarioOp.get());
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @GetMapping("/")
    public ResponseEntity<List<Usuario>> getUsuarios() {
        List<Usuario> usuarioList = usuarioService.findALl();
        if (usuarioList.size() > 0) {
            return ResponseEntity.ok().body(usuarioList);
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @PutMapping("/")
    public ResponseEntity<Usuario> update(@RequestBody Usuario usuario) {
        if (usuario.getId() == null) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "Invalid Usuario id = null");
        }
        usuario = usuarioService.save(usuario);
        return ResponseEntity.ok().body(usuario);
    }

    @PostMapping("/")
    public ResponseEntity<Usuario> create(@RequestBody Usuario usuario) {
        if (usuario.getId() != null) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "New Usuario can't exist id");
        }

        if (usuario.getCallsign() != null) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "New Usuario can't exist callsign");
        }

        usuario.setCallsign(genCallsign());
        usuario.setSalt(genSalt());
        usuario.setSenha(sha256(usuario.getSenha() + usuario.getSalt()));

        Usuario result = usuarioService.save(usuario);
        return ResponseEntity.ok().body(usuario);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteUsuario(@PathVariable Long id) {
        usuarioService.delete(id);
        return ResponseEntity.noContent().build();
    }

    private String genCallsign() {
        String[] alphabet = { "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
                "S", "T", "U", "V", "W", "X", "Y", "Z" };
        String callsign = "";
        int position;
        int digito;

        // formato callign: A#AA#

        // char
        position = (int) Math.floor(Math.random() * 26);
        callsign = callsign + alphabet[position];

        // dígito
        digito = (int) Math.floor(Math.random() * 10);
        callsign = callsign + digito;

        // char
        position = (int) Math.floor(Math.random() * 26);
        callsign = callsign + alphabet[position];
        position = (int) Math.floor(Math.random() * 26);
        callsign = callsign + alphabet[position];

        // dígito
        digito = (int) Math.floor(Math.random() * 10);
        callsign = callsign + digito;

        return callsign;
    }

    private String genSalt() {
        String[] base64charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/".split("");
        String salt = "";
        int position;

        for (int i = 0; i < 64; i++) {
            position = (int) Math.floor(Math.random() * 64);
            salt = salt + base64charset[position];
        }

        return salt;
    }

    private static String sha256(final String base) {
        try {
            final MessageDigest digest = MessageDigest.getInstance("SHA-256");
            final byte[] hash = digest.digest(base.getBytes("UTF-8"));
            final StringBuilder hexString = new StringBuilder();
            for (int i = 0; i < hash.length; i++) {
                final String hex = Integer.toHexString(0xff & hash[i]);
                if (hex.length() == 1)
                    hexString.append('0');
                hexString.append(hex);
            }
            return hexString.toString();
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}

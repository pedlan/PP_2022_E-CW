package br.com.pedro.ECW.controller.api;

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

import br.com.pedro.ECW.model.Canal;
import br.com.pedro.ECW.service.CanalService;

@Controller
@RequestMapping("api/v1/canal")
public class CanalController {

    private static CanalService canalService;

    public CanalController(CanalService canalService) {
        this.canalService = canalService;
    }

    @GetMapping("/{id}")
    public ResponseEntity<Canal> getCanal(@PathVariable Long id) {
        Optional<Canal> canalOp = canalService.findById(id);
        if (canalOp.isPresent()) {
            return ResponseEntity.ok().body(canalOp.get());
        }
        else {
            return ResponseEntity.notFound().build();
        }
    }

    @GetMapping("/")
    public ResponseEntity<List<Canal>> getCanais() {
        List<Canal> canalList = canalService.findALl();
        if (canalList.size() > 0) {
            return ResponseEntity.ok().body(canalList);
        }
        else {
            return ResponseEntity.notFound().build();
        }
    }

    @PutMapping("/")
    public ResponseEntity<Canal> update(@RequestBody Canal canal) {
        if (canal.getId() == null) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "Invalid Canal id = null");
        }
        canal = canalService.save(canal);
        return ResponseEntity.ok().body(canal);
    }

    @PostMapping("/")
    public ResponseEntity<Canal> create(@RequestBody Canal canal) {
        if (canal.getId() != null) {
            throw new ResponseStatusException(HttpStatus.BAD_REQUEST, "New Canal can't exist id");
        }
        Canal result = canalService.save(canal);
        return ResponseEntity.ok().body(canal);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteUsuario(@PathVariable Long id) {
        canalService.delete(id);
        return ResponseEntity.noContent().build();
    }
    
}


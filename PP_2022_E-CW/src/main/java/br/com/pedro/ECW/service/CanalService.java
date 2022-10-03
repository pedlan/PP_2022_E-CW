package br.com.pedro.ECW.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.pedro.ECW.model.Canal;
import br.com.pedro.ECW.repository.CanalRepository;

@Service
public class CanalService {

    @Autowired
    CanalRepository canalRepository;

    public Optional<Canal> findById(Long id) {
        return canalRepository.findById(id);
    }

    public List<Canal> findALl() {
        return canalRepository.findAll();
    }

    public void delete(Long id) {
        canalRepository.deleteById(id);
    }

    public Canal save(Canal usuario) {
        return canalRepository.save(usuario);
    }
    
}

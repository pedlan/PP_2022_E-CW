package br.com.pedro.ECW.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import br.com.pedro.ECW.model.Canal;

@Repository
public interface CanalRepository extends JpaRepository<Canal, Long> {

}
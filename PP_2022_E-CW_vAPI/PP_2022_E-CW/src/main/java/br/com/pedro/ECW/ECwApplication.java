package br.com.pedro.ECW;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.ApplicationArguments;
import org.springframework.boot.ApplicationRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import br.com.pedro.ECW.model.Usuario;
import br.com.pedro.ECW.repository.CanalRepository;
import br.com.pedro.ECW.repository.UsuarioRepository;
import br.com.pedro.ECW.service.UsuarioService;

@SpringBootApplication
public class ECwApplication implements ApplicationRunner{

	@Autowired
	UsuarioRepository usuarioRepository;

	@Autowired
	CanalRepository canalRepository;

	@Autowired
	UsuarioService usuarioService;

	public static void main(String[] args) {
		SpringApplication.run(ECwApplication.class, args);
	}

	@Override
	public void run(ApplicationArguments args) {
		Usuario u = new Usuario("augustus@gmail.com", "senha1");

		usuarioService.save(u);	//erro ao salvar usuário ("Error starting ApplicationContext")
	}
	
}
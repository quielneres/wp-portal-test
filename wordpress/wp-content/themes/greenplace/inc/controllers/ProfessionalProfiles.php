<?php

class ProfessionalProfiles
{

	public function list_profiles($category)
	{
		switch ($category) {
			case 'alta_pataforma':
				$profiles = [
					1 => 'Analista de sistemas Mainframe',
					2 => 'Programador COBOL',
					3 => 'Programador NATURAL',
					4 => 'Programador COBOL/NATURAL',
				];
				break;
			case 'baixa_plataforma_mobile':

				$profiles = [
					5 => 'Analista de sistemas (Baixa plataforma e Mobile)',
					6 => 'Programador Baixa Plataforma',
					7 => 'Programador Mobile',
					8 => 'Programador Baixa Plataforma Fullstack',
					9 => 'Analista de Integração usando Tibco BW',
				];

				break;
			case 'cloud_computing':
				$profiles = [
					10 => 'Desenvolvedor Cloud',
					11 => 'Desenvolvedor e suporte CI/CD'
				];
				break;
			case 'blockchain':

				$profiles = [
					12 => 'Desenvolvedor Blockchain'
				];

				break;
			case 'itsm_csm':
				$profiles = [
					13 => 'Desenvolvedor de Workflows No Code/Low Code/ITSM'
				];
				break;
			case 'testes':
				$profiles = [
					14 => 'Analista de Testes / QA Mobile',
					15 => 'Analista de Testes / QA WEB',
					16 => 'Analista de Testes / QA Testes não funcionais',
					17 => 'Testes de integração com foco em Microsserviços'
				];
				break;
			case 'atendimento_geral':
				$profiles = [
					18 => 'Scrum Master',
					24 => 'Arquiteto de Soluções'
				];

				break;
			case 'ux':
				$profiles = [
					19 => 'Analista de UX',
					20 => 'UX Designer',
					21 => 'Analista de UI'
				];
				break;
			case 'gestao_dados':
				$profiles = [
					1 => 'Engenheiro Devops IA',
					2 => 'Especialista em Machine Learning e Deep Learning',
					3 => 'Curadores de Bots',
					4 => 'Especialista em NLP, análise de texto, e soluções de busca',
					5 => 'Especialistas em Tomada de Decisão: Agentes inteligentes e Sistema de busca',
					6 => 'Especialista em Representação e raciocínio do conhecimento (semântica/ontologia) e NLP',
					7 => 'AIOps',
					8 => 'Especialista em Percepção e ambientes inteligentes',
					9 => 'Sistemas inteligentes de automação e robótica',
					10 => 'Desenvolvedor IA Fullstack',
					11 => 'Gestor técnico de dados',
					12 => 'DBA de aplicação',
					13 => 'Arquiteto de Integração de dados',
					14 => 'Cientista de Dados',
					15 => 'Engenheiro de Dados',
					16 => 'Engenheiro de Big Data'
				];
				break;
		}

		return $profiles;
	}
}

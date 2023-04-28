<?php

class ProfessionalProfiles
{

	public function list_profiles($category)
	{
		switch ($category) {
			case 'atendimento_geral':
				$profiles = [
					25 => 'Arquiteto Especialista/Principal Engineer/Staff Engineer',
				];
				break;
			case 'alta_pataforma':
				$profiles = [
					26 => 'Analista/Programador Alta Plataforma',
				];
				break;
			case 'baixa_plataforma_mobile':

				$profiles = [
					27 => 'Analista/Programador Baixa Plataforma',
					9  => 'Analista de Integração usando Tibco BW',
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
					28 => 'Analista de Testes / QA Mobile, Web ou Testes não funcionais'
				];
				break;
			case 'ux':
				$profiles = [
					29 => 'UX Designer, Analista de UX ou UI'
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

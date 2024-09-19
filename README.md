Projeto de Desenvolvimento de Conteúdos Web:

Descrição:

Este projeto consiste na criação de um site dinâmico usando HTML, PHP, Bootstrap e MySQL, com integração ao phpMyAdmin para gestão de base de dados. O sistema possui um processo de autenticação que inclui perfis de administrador e utilizadores normais, permitindo diferentes níveis de acesso às funcionalidades de gestão de eventos, como criar, modificar e eliminar eventos.

Funcionalidades Principais:

->Autenticação de Utilizador: Sistema de login seguro com perfis diferenciados (administrador e utilizadores normais). 
->Gestão de Eventos: Administradores podem criar, modificar e eliminar eventos. Utilizadores normais podem visualizar e interagir com os eventos. 
->Integração com Base de Dados: Todos os dados de utilizadores e eventos são armazenados e geridos numa base de dados MySQL. 
->Interface Responsiva: Uso do framework Bootstrap para garantir uma experiência de utilizador otimizada em dispositivos móveis e desktop.

Requisitos do Projeto:

Software Necessário:

->Servidor Web: Recomenda-se o uso do XAMPP (ou similar) para gerir o Apache e o MySQL. 
->Editor de Código: Qualquer editor pode ser utilizado, mas recomenda-se o Visual Studio Code ou NetBeans. 
->Base de Dados: MySQL gerido via phpMyAdmin. 
->PHP: Versão 7.4 ou superior.

Instalação e Configuração:

-Passo 1: Configuração do Ambiente:

->Instale o XAMPP ou software similar para configurar o servidor local (Apache e MySQL). 
->Certifique-se de que o Apache e o MySQL estão ativos no painel de controlo do XAMPP.

-Passo 2: Configuração da Base de Dados:

->Acesse o phpMyAdmin (geralmente acessível em http://localhost/phpmyadmin). 
->Crie uma base de dados (exemplo: meu_site). 
->Importe o ficheiro SQL fornecido na pasta /db do projeto para a base de dados criada.

-Passo 3: Configuração do Projeto:

->Extraia o conteúdo da pasta do projeto na pasta htdocs do XAMPP (exemplo: C:/xampp/htdocs/meu_site). 
->Verifique e edite as credenciais de base de dados no ficheiro config.php na raiz do projeto, caso necessário:

Ex.:

->No navegador, abra http://localhost/meu_site para acessar o site.

-Passo 4: Funcionalidades de Login:

->Utilize as credenciais fornecidas para os diferentes perfis:

-Administrador:

->Utilizador: admin 
->Password: admin123

-Utilizador Normal:

->Utilizador: user 
->Password: user123

Estrutura do Projeto:

->index.php: Página principal. 
->login.php: Página de login. 
->admin/: Diretório contendo todas as páginas acessíveis apenas pelo administrador, como criação, edição e remoção de eventos. 
->user/: Diretório contendo páginas acessíveis aos utilizadores normais. 
->config.php: Ficheiro de configuração da base de dados. 
->db/: Contém o ficheiro SQL para criar a estrutura da base de dados.

Funcionalidades por Perfil:

-Administrador:

->Acesso completo às funções do site. 
->Possibilidade de criar, modificar e eliminar eventos.

-Utilizador Normal:

->Pode visualizar eventos criados pelo administrador. 
->Acesso restrito às funções de gestão de eventos.

-Considerações Finais:

->Certifique-se de que o servidor Apache e o MySQL estão sempre ativos ao utilizar o projeto. 
->Não modifique a estrutura das pastas ou ficheiros críticos sem conhecimento prévio, pois isso pode comprometer o funcionamento do site.

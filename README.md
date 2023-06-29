## Sistema de Logins em PHP
Este projeto tem como objetivo implementar um sistema de logins em PHP. A aplicação irá permitir que os utilizadores registarem uma conta, façam login e, dependendo de sua função (utilizador ou administrador), sejam direcionados para páginas diferentes.

## Funcionalidades implementadas
- Registo de novo utilizador (insert no banco de dados)
- Login do utilizador
- Direcionamento do utilizador para página principal ou página de administração, dependendo da função

## Modelação da Base de Dados
A base de dados foi modelada utilizando o diagrama E-R, modelo relacional e modelo físico (script). Os arquivos .png e .sql estão disponíveis na pasta "database".

## Planeamento
O planeamento do projeto, incluindo a identificação das tarefas, previsão de tempo e responsáveis, está disponível no arquivo "planeamento.pdf".

## Repositório
O código-fonte da aplicação, devidamente formatado e comentado, está disponível na pasta "src". Além disso, o arquivo "README.md" contém uma descrição do projeto, enquanto o arquivo "relatorio.pdf" apresenta um relatório completo do projeto, incluindo a modelação da base de dados e o planeamento das tarefas. Todos os commits realizados estão descritos com uma breve descrição.

## Tecnologias utilizadas
PHP
MySQL
HTML
CSS

## Como executar o projeto
- Clone o repositório na sua máquina
- Importe o arquivo "database/login.sql" para seu banco de dados MySQL
- Configure as informações de conexão do banco de dados no arquivo "src/config.php"
- Abra o arquivo "src/index.php" no navegador web

## Observação
Este projeto foi desenvolvido apenas para fins educacionais e não deve ser utilizado em produção. O código foi completamente testado mas pode conter vulnerabilidades de segurança.

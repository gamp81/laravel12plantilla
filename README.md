# Laravel Pro AdminLTE

Este projeto é uma aplicação web desenvolvida com o framework [Laravel](https://laravel.com), utilizando o template [AdminLTE](https://adminlte.io/) para o painel administrativo. O objetivo é fornecer uma base robusta para sistemas administrativos, com autenticação, gerenciamento de usuários, permissões, notificações e muito mais.

## Funcionalidades

- Autenticação de usuários (login, registro, recuperação de senha)
- Gerenciamento de usuários e permissões
- Painel administrativo com interface moderna (AdminLTE)
- Sistema de notificações
- Integração com banco de dados SQLite
- Suporte a múltiplos idiomas
- Logs de atividades
- Proteção contra vulnerabilidades comuns (CSRF, XSS)
- Sistema de filas e jobs
- Envio de e-mails
- Testes automatizados com PHPUnit
- Configuração via arquivos `.env`
- Docker para ambiente de desenvolvimento

## Tecnologias Utilizadas

- **Laravel 11/12**: Framework principal
- **AdminLTE**: Template para o painel administrativo
- **PHP**: Linguagem de programação
- **Composer**: Gerenciador de dependências PHP
- **Docker**: Ambiente de desenvolvimento
- **SQLite**: Banco de dados padrão
- **PHPUnit**: Testes automatizados
- **Fortify**: Autenticação e segurança
- **Faker**: Geração de dados fake para testes
- **Monolog**: Sistema de logs
- **Mail**: Envio de e-mails
- **Vite**: Gerenciador de assets front-end

## Estrutura de Pastas

- `app/`: Código principal da aplicação (Models, Controllers, Providers, Policies)
- `bootstrap/`: Arquivos de inicialização do Laravel
- `config/`: Arquivos de configuração
- `database/`: Migrations, seeds e banco SQLite
- `public/`: Arquivos públicos (index.php, assets)
- `resources/`: Views, arquivos de tradução e assets
- `routes/`: Definição de rotas
- `storage/`: Logs, cache e arquivos gerados
- `tests/`: Testes automatizados
- `vendor/`: Dependências instaladas via Composer

## Como Executar o Projeto

1. **Clone o repositório**
   ```sh
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale as dependências**
   ```sh
   composer install
   npm install
   ```

3. **Configure o ambiente**
   - Copie o arquivo `.env.example` para `.env` e ajuste as variáveis conforme necessário.
   - Gere a chave da aplicação:
     ```sh
     php artisan key:generate
     ```

4. **Execute as migrations**
   ```sh
   php artisan migrate
   ```

5. **Inicie o servidor**
   ```sh
   php artisan serve
   ```

6. **Acesse no navegador**
   - [http://localhost:8000](http://localhost:8000)

## Testes

Para rodar os testes automatizados:
```sh
php artisan test
```

## Contribuição

Contribuições são bem-vindas! Veja o [guia de contribuição](https://laravel.com/docs/contributions).

## Licença

Este projeto está sob a licença [MIT](https://opensource.org/licenses/MIT).

---

> Projeto desenvolvido para estudos e aprimoramento em Laravel, seguindo o curso "Laravel 11 e 12 Do Básico ao Avançado".

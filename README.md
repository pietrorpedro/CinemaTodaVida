
# Sistema de Venda de Ingressos

Este é um sistema de venda de ingressos para filmes desenvolvido com Laravel. A aplicação consome dados da API The Movie Database (TMDb) para listar filmes, exibir detalhes, permitir a criação de contas de usuários e possibilitar a compra de ingressos.

## Funcionalidades

- **Listagem de Filmes**: A aplicação consome a API TMDb para listar filmes disponíveis.
- **Detalhes do Filme**: Visualize informações detalhadas de cada filme, como sinopse, elenco, duração, e classificação.
- **Autenticação de Usuários**: Criação de contas, login e logout.
- **Compra de Ingressos**: Usuários autenticados podem comprar ingressos para os filmes disponíveis.

## Requisitos

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL ou outro banco de dados compatível
- Conta na API The Movie Database (para obter a chave de API)

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/sistema-venda-ingressos.git
   cd sistema-venda-ingressos
   ```

2. Instale as dependências do projeto:

   ```bash
   composer install
   ```

3. Configure as variáveis de ambiente no arquivo `.env`:

   - Substitua o valor da variável `API_KEY="${TMDB_API_KEY}"` pela sua chave da API do The Movie Database:

     ```env
     TMDB_API_KEY=sua_chave_api
     ```

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

5. Execute as migrações do banco de dados:

   ```bash
   php artisan migrate
   ```

6. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

## Uso

1. Acesse `http://localhost:8000` em seu navegador.
2. Navegue pelos filmes, veja os detalhes de cada um e crie uma conta.
3. Compre ingressos para o filme desejado após fazer login.

## Contribuição

Contribuições são bem-vindas! Por favor, envie um pull request para melhorias, correções de bugs ou novas funcionalidades.

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para obter mais informações.

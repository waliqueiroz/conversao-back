# API REST para cadastro e usuários

## 1. Pré-requisitos

- [PHP 7.2 ou superior](https://www.php.net/)
- [Composer](https://getcomposer.org/)

##  2. Instalação

### 2.1 Baixar dependências

Execute o comando abaixo pelo terminal dentro do diretório raiz da aplicação.

```
composer install
```
O composer criará a pasta `Vendor` dentro do diretório raiz com todas as bibliotecas necessárias para o funcionamento da API.

### 2.2 Configurar ambiente

Dentro do diretório raiz temos o arquivo `.env.example` que serve como base para as configurações padrão do sistema. Você deve criar uma cópia desse arquivo com nome `.env` e editar conforme às necessidades do servidor/aplicação.

A primeira configuração que você deve fazer é a de gerar a chave da aplicação, digitando o comando:

```
php artisan key:generate
```
Após executar esse comando, no arquivo `.env` teremos a variável APP_KEY configurada com a chave gerada.

Crie uma base de dados para a aplicação e configure o acesso ao banco através das variáveis de ambiente `DB_CONNECTION`, `DB_PORT`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`:

```
DB_CONNECTION=mysql // pgsql para o postgres
DB_PORT=3306 // 5432 para o postgres
DB_HOST=localhost
DB_DATABASE=NomeDoBancoDeDados
DB_USERNAME=NomeDeUsuario
DB_PASSWORD=SenhaDoUsuario
```

Outra configuração que deve ser feita é o preenchimento das variáveis para envio de emails pela aplicação:

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Para realização de testes, recomendo o uso do [Mailtrap](https://mailtrap.io/). Ao enviar um e-mail utilizando os dados do mailtrap.io, no próprio painel da ferramenta é possível analisar os dados do e-mail, como por exemplo remetente, destinatário, corpo do e-mail, assunto, etc. É uma ferramenta de testes, o e-mail não é efetivamente enviado para o destinatário, ela dá uma visão geral de como será feita a entrega.

Com a base de dados e o servidor de emails configurado, execute o comando abaixo para a aplicação gerar as tabelas:

```
php artisan migrate
```

Feitas essas configurações, o servidor estará pronto para processar e responder as requisições.

### 2.3 Inicializar servidor de desenvolvimento

Após baixar as dependências, configurar a base de dados e o servidor de emails, execute o comando abaixo no diretório raiz.

```
php artisan serve
```

A aplicação iniciará um servidor local que escuta a porta 8000.


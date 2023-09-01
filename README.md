# Backend CateProd

O Projeto é um pequeno sistema de cadastro de produtos e categorias de produtos. O sistema faz uso do Laravel versão 10.21.0 e PHP versão 8.2.4.

##  I - EXECUTE OS PASSOS ABAIXO ANTES DE EXECUTAR O PROJETO 

#### 1 - Realize o composer install para instalar os pacotes;

```bash
    composer install
```

#### 2 -  Crie um banco de dados Mysql com o nome de **cateprod**

**Execute APENAS UMA das opções abaixo**

#### 3 - [OPÇÃO 1] CRIAR AS TABELAS POR MIGRAÇÃO 

Execute o comando abaixo para poder realizar migração e assim criar as tabelas necessárias

```bash
    php artisan migrate
```

#### 3 - [OPÇÃO 2] CRIAR TABELAS PELO SCRIPT SQL

Execute o script que (está dentro do arquivo em **mysql/createTables.sql**) no banco de dados criado anteriormente (**cateprod**) para assim criar as tabelas através o script sql.

#### 4 - Povoar o Banco de Dados com dados predefinidos
```bash
    php artisan db:seed
```

## II - COMO EXECUTAR O PROJETO 

#### 1 - Execute o seguinte comando no diretório raiz do projeto php artisan serve

#### 2 - O endereço para acessar o backend aparecerá no terminal, porém, por padrão deve ser o http://127.0.0.1:8000

## III - COMO REALIZAR TESTES

Execute o comando abaixo para poder executar os testes de funcionamento de cada rota. Lembre-se de checar se o sistema está connectado ao banco

```bash
    php artisan test
```

## IV - ROTAS DA API

### ROTAS DE PRODUTOS

##### Listar todos os produtos [GET]

```bash
http://127.0.0.1/products
```

##### Listar um determinado produto (modifique o id pelo id do produto) [GET]

```bash
http://127.0.0.1/products/id
```

##### Inserir um determinado produto [POST]

```bash
http://127.0.0.1/products
```


##### Remover um determinado produto (modifique o id pelo id do produto) [DELETE]

```bash
http://127.0.0.1/products/id
```

##### Atualizar um determinado produto (modifique o id pelo id do produto) [PUT]

```bash
http://127.0.0.1/products/id
```
### ROTAS DE CATEGORIAS


##### Listar todas as categorias [GET]

```bash
http://127.0.0.1/categories
```

##### Listar uma determinada categoria (modifique o id pelo id da categoria) [GET]

```bash
http://127.0.0.1/categories/id
```

##### Inserir uma determinada categoria [POST]

```bash
http://127.0.0.1/categories
```

##### Remover uma determinada categoria (modifique o id pelo id da categoria) [DELETE]

```bash
http://127.0.0.1/categories/id
```

##### Atualizar uma determinada categoria (modifique o id pelo id da categoria) [PUT]

```bash
http://127.0.0.1/categories/id
```
# Backend CateProd

O Projeto é um pequeno sistema de cadastro de produtos e categorias de produtos. O sistema faz uso do Laravel versão 10.21.0 e PHP versão 8.2.4.

##  ANTES DE EXECUTAR O PROJETO 

1 - Realize o composer install para instalar os pacotes;

```bash
    composer install
```

[OPÇÃO 1] CRIAR AS TABELAS POR MIGRAÇÃO 

2.1 - Crie um banco de dados Mysql com o nome cateprod

2.2 - Execute migração para criar as tabelas necessárias php artisan migrate

```bash
    php artisan migrate
```

[OPÇÃO 2] CRIAR TABELAS PELO SCRIPT SQL

2 - Execute o arquivo sql que está dentro do projeto em mysql/createDB.sql no banco de dados para criar as tabelas pelo script sql.

3 - Povoar o Banco de Dados com dados predefinidos
```bash
    php artisan db:seed
```

## COMO EXECUTAR O PROJETO 

1 - Execute o seguinte comando no diretório raiz do projeto php artisan serve

2 - O endereço para acessar o backend aparecerá no terminal, porém, por padrão deve ser o http://127.0.0.1:8000

## ROTAS DA API

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
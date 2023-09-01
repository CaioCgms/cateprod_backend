# Backend CateProd

##OBS: O Projeto faz uso do Laravel versão 10.21.0 e PHP versão 8.2.4

## --- ANTES DE EXECUTAR O PROJETO ----
<br />
1 - Realize o **composer  install** para instalar os pacotes;
<br />
<br />
--- [OPÇÃO 1] CRIAR AS TABELAS POR MIGRAÇÃO ---
<br />
2.1 - Crie um banco de dados **Mysql** com o nome **cateprod**
<br />
2.2 - Execute migração para criar as tabelas necessárias **php artisan migrate**
<br />
<br />
--- [OPÇÃO 2] CRIAR BANCO E TABELAS PELO SCRIPT SQL---
<br />
2- Execute o arquivo sql que está dentro do projeto em **mysql/createDB.sql** no banco de dados para crciar o banco e as tabelas

## ---COMO EXECUTAR O PROJETO ----
<br />
1 - Execute o seguinte comando no diretório raiz do projeto **php artisan serve**
<br />
2 - O endereço para acessar o backend aparecerá no terminal, porém, por padrão deve ser o **http://127.0.0.1:8000**

## ---- ROTAS DA API -----
<br />

### PRODUTOS

<br />
#### Listar todos os produtos [GET]
**/products**
<br />
#### Listar um determinado produto (modifique o id pelo id do produto) [GET]
**/products/id**
<br />
#### Inserir um determinado produto [POST]
**/products**
<br />
#### Remover um determinado produto (modifique o id pelo id do produto) [DELETE]
**/products/id**
<br />
#### Atualizar um determinado produto (modifique o id pelo id do produto) [PUT]
**/products/id**


### CCATEGORIAS

<br />
#### Listar todas as categorias [GET]
**/categories**
<br />
#### Listar uma determinada categoria (modifique o id pelo id da categoria) [GET]
**/categories/id**
<br />
#### Inserir uma determinada categoria [POST]
**/categories**
<br />
#### Remover uma determinada categoria (modifique o id pelo id da categoria) [DELETE]
**/categories/id**
<br />
#### Atualizar uma determinada categoria (modifique o id pelo id da categoria) [PUT]
**/categories/id**

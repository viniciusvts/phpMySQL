#Processo Seletivo HCN Automação
##Desafio:
Realizar o desenvolvimento de um sistema simples de cadastro de produto onde seja possível criar, editar, visualizar (todos os produtos de uma vez e de forma individual) e remover produtos. 

    1) O sistema deverá ser desenvolvido em PHP e os produtos criados devem ser armazenados em um banco de dados MySQL.
    
    2) A modelagem do modelo Produto poderá ser realizada como bem desejar, mas as informações de nome e valor do produto deverão constar na modelagem.
    
    3)O sistema deverá ser enviado para esse email contendo a pasta do projeto e o esquema do banco de dados.

##Parte1:
A aplicação roda em "localhost/"
O código da aplicação php está em: "./php/" 
Arquivo de modelagem do banco de dados está em: "./sql/"

##Parte2:
A modelagem do produto seguiu as informações básicas pedidas: nome e valor.
O arquivo de modelagem se encontra em "./sql/"

##Parte3:
Enviar aplicação por email

###Configuração com o docker:
Com o docker instalado isso irá criar a aplicação php e o banco:
<code>docker-compose up</code>

Para acessar o container mysql e ganhar linha de comando:
<code>docker exec -it mysqlapp bash</code>

Para acessar e criar a tabela produto:
<code>mysql -h localhost -u stark -p</code>
<code>senha: iAmIronMan</code>

E  criar tabela com o conteúdo de "./sql/MySql.sql
No docker, a aplicação irá atender no endereço: localhost:8080/
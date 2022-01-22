# API TEST


## Objetivo
Estudar API REST Feita com Laravel

## Instalação do Projeto

### 1. Clonar o projeto e logo após entre na pasta criada

### 2. No diretório, execute o comando

```bash
docker-compose up --build
```


### 4. Instalando as dependências
4.1 Instale as dependências do Laravel executando o comando
```bash
docker exec <CONTAINER_NAME> composer install
```
Para verificar o container do php basta digitar

```bash
docker ps
```

4.2 Corriga as permissões dos diretórios, executando os comandos abaixo no diretório:

```bash
sudo chown -R www-data:www-data storage && sudo chown -R www-data:www-data bootstrap/cache
```

4.3 Crie o arquivo .env, utilizando o .env.example como base:

```bash
cp .env.example .env
```


***Obs:** Certique-se de preencher corretamente os valores contidos no .env do Laravel, usando como base o .env do Docker. O valor da variável DB_HOST deve ser o mesmo do IP setado na configuração do container do Mysql, no arquivo docker-compose.yml. O valor padrão é 100.10.0.11*

4.4 Gere a chave do projeto executando o comando:

```bash
docker exec <CONTAINER_NAME> php artisan key:generate
```

APIs Funcionando atualmente

Criação de usuario
```bash
POST http://100.10.0.12:80/api/create
```
Payload

```json
{
  "name": "nome",
	"email": "mail@mail.com",
	"document":12341212412131,
	"password":1234567,
	"company":0
}
```

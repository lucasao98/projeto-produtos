# Projeto de Produtos
## Projeto simples feito com o framework Laravel com o Inertiajs, para facilitar na integração com o Vuejs, framework utilizado para criar as telas.
Para executar o projeto primeiro faça clone:
```
git clone
```
Após isso, dentro da pasta clonada do github, execute o comando abaixo para baixar as dependências que foram utilizadas no projeto
```
composer install
```
E por fim mas não menos importante, execute o comando abaixo para instalar as dependências do javascript
```
npm install ou npm i
```
Para armazenar os dados não é necessário configurar o mysql ou postgres, pois o banco de dados utilizado é o sqlite e está na pasta database.
Agora com tudo pronto execute o comando abaixo para gerar uma key no seu projeto Laravel.
```
php artisan key:generate
```
E por fim podemos executar:
```
php artisan serve
```
E o servidor está funcionando, mas precisamos que o frontend também esteja executando para visualizar as telas feitas com o Vuejs.
Para isso em outro terminal,(caso você esteja utilizando linux) execute o comando:
```
npm run dev
```
![Captura de Tela_Área de Seleção_20230713083439](https://github.com/lucasao98/projeto-produtos/assets/53714997/ee76a591-327f-47e3-81f7-b5979be2b553)
E pronto, o projeto está rodando.
***Obs: Lembrar de entrar no link do php artisan serve***



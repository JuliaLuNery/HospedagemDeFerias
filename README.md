## Website Hospedagem de Férias



Este projeto foi desenvolvido utilizando **Laravel 12**, com **MySQL (MariaDB)** como banco de dados, **Breeze** para autenticação e **Blade** para renderização de interfaces. O objetivo principal é desenvolver um website de locações de hospedagens simples e intuitivo para o usuário.

## 🚀 Tecnologias Utilizadas
- **Laravel 12** - Framework PHP moderno e robusto
- **MySQL (MariaDB)** - Banco de dados relacional
- **Breeze** - Implementação simples de autenticação em Laravel
- **Blade** - Sistema de templates do Laravel
- **Tailwind CSS, Material Tailwind e TW Elements** - Estilização moderna e responsiva

📚 Para mais detalhes sobre o framework: [Documentação](https://laravel.com/docs/)

## 🎯 Funcionalidades
✔ Autenticação de usuários e criação de nova conta
✔ Busca por meio de filtro para localização, data de início e de fim de estadia e número de hospedes 
✔ Realização de reservas de hospedagem
✔ Visualização do resumo da reserva e do preço detalhado antes do pagamento
✔ Três formas principais de pagamento (cartão bancário e Paypal ainda em processo de implementação)
✔ Interface limpa e responsiva  
✔ Visualização do histórico de reservas do usuário no próprio website
✔ Histórico de users e de reservas armazenado no banco de dados  

## 🛠 Requisitos para a Instalação
Antes de clonar o projeto, certifique-se de ter:
- **Git** → Controle de versões e clonagem do repositório  
- **PHP 8.2+** → Requisito mínimo para Laravel 12
- **MySQL ou MariaDB** → Banco de dados relacional  
- **Laravel CLI** → Facilita linha de comando para Laravel
- **Node.js e NPM** → Para build de assets com Vite


## 🔧 Instalação
Clonar repositório e configurar o projeto:
```bash
git clone https://github.com/JuliaLuNery/HospedagemDeFerias.git
cd chat
composer install
composer update
npm install
cp .env.example .env 
# Configure  as suas credenciais no arquivo .env

php artisan key:generate
php artisan migrate

# Inicie os serviços em terminais diferentes:
npm run dev
php artisan serve

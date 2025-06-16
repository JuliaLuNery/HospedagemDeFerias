Website Hospedagem de Férias
## 🎯 Funcionalidades

# 💬 Módulo de Chat em Laravel 12

Este projeto foi desenvolvido utilizando **Laravel 12**, com **MySQL (MariaDB)** como banco de dados, **Breeze** para autenticação e **Blade** para renderização de interfaces. O objetivo principal é **criar um sistema de mensagens em tempo real** entre utilizadores, facilitando a comunicação de forma intuitiva e eficiente.

Também temos uma integração com o Open AI.
Para informações sobre como implementar, consulte os `.md`:
- Broadcast.md
- Integracao_Open_IA.md 

## 🚀 Tecnologias Utilizadas
- **Laravel 12** - Framework PHP moderno e robusto
- **MySQL (MariaDB)** - Banco de dados relacional
- **Breeze** - Implementação simples de autenticação em Laravel
- **Blade** - Sistema de templates do Laravel
- **Tailwind CSS** - Estilização moderna e responsiva
- **Pusher** - Envio de mensagens em tempo real
- **Laravel Echo + Reverb** – Gerenciamento de WebSockets e eventos em tempo real.
- **Eventos em broadcast** – Comunicação assíncrona entre utilizadores.
- **AJAX** – Envio assíncrono de dados ao backend.
- **JavaScript (DOM)** – Manipulação dinâmica da interface para adicionar mensagens.
- **JavaScript (Scroll automático)** – Garantia de experiência fluida ao utilizador.


📚 Para mais detalhes sobre o framework: [Documentação](https://laravel.com/docs/)
Sobre o Brodcasting: [Documentação] https://laravel.com/docs/11.x/broadcasting#introduction
Sobre o Reverb: [Documentação] https://laravel.com/docs/11.x/reverb


## 🎯 Funcionalidades
✔ Autenticação de utilizadores  
✔ Envio e recebimento de mensagens em tempo real  
✔ Interface limpa e responsiva  
✔ Adição de contatos para facilitar a comunicação  
✔ Histórico de mensagens armazenado no banco de dados  


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
git clone https://github.com/AnaAredes/ChatSWD.git
cd chat
composer install
composer update
npm install
cp .env.example .env 
# Configure  as suas credenciais no arquivo .env


php artisan key:generate
php artisan migrate

# Popular o banco de dados com utilizadores e chats de exemplo
php artisan db:seed --class=UserSeed
php artisan db:seed --class=ChatSeed

# Inicie os serviços em terminais diferentes:
npm run dev
php artisan serve
php artisan reverb:start --host=127.0.0.1 --port=6001 ## as flags são úteis para garantir as portas
```

📌 Se no `.env` estiver configurado `QUEUE_CONNECTION=database`, também é preciso rodar:
```bash
php artisan queue:work
```


## 🛠 Contribuição
Contribuições são bem-vindas! Para colaborar:
- Faça um fork do projeto.
- Crie uma nova branch com suas alterações.
- Submeta um Pull Request.

## 📄 Licença
Sinta-se à vontade para usá-lo e melhorá-lo!

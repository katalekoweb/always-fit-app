# Always Fit - App
Sistema de acompanhamento de treinos e plano nutricional para clientes de ginásios.

## Tecnologias usadas
- Laravel
- Vuejs- Inertiajs
- Mysql
- Docker com Sail

## Funcionalidades
### Admin
- Login
- Cadastro de refeições para clientes
- Cadastro de treinos para clientes

### Cliente
- Login
- Dashboard para ver estatísticas de treinos.
- Tela de treinos com botão de concluir treino
- Tela de refeições
- Tela de progresso de treinos
- Página para alterar os dados do perfil

## Como instalar na sua máquina

Note: Para rodar este projeto tenha certeza que você tem o docker instalado e a rodar em sua máquina.

### clone o repositório
```bash
git clone https://github.com/katalekoweb/always-fit-app.git
cd always-fit-app
```

### Copie o ficheiro .env
```bash
cp .env.example .env
```

### Instale as dependencias
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### Rode os containers com o Laravel sail
```bash
./vendor/bin/sail up -d
```

### Gere a chave do programa
```bash
./vendor/bin/sail artisan key:generate
```

### Rode as migrations e os seeders
```bash
./vendor/bin/sail artisan migrate --seed
```

### Instale as dependencias npm
```bash
./vendor/bin/sail npm i
```

### Faça o build das libs npm
```bash
./vendor/bin/sail npm run build
```

### Abrir o projeto
http://locathost
Login: 
Admin - username:admin@admin.com, senha: password
Cliente - username:client@client.com, senha: password

## My email: juliofeli78@gmail.com
## Linkedin: https://www.linkedin.com/in/juliaokataleko/

![Dashboard](https://raw.githubusercontent.com/katalekoweb/always-fit-app/refs/heads/main/public/assets/images/show1.png)
![Login](https://raw.githubusercontent.com/katalekoweb/always-fit-app/refs/heads/main/public/assets/images/show2.png)
![Página de Treinos](https://raw.githubusercontent.com/katalekoweb/always-fit-app/refs/heads/main/public/assets/images/show5.png)

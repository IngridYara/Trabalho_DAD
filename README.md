# 💻 API DE TRANSPORTE

> É uma API que permite a leitura, o cadastro, edição e deleção das formas de transporte do usuário 

---

## 🛠️ Tecnologias Utilizadas

Liste as principais linguagens, frameworks e ferramentas que sustentam o projeto:
* **Backend:** Node.js (Express)
* **Frontend:** CSS
* **Banco de Dados:** MySQL
* **Infraestrutura:** XAMPP

---

## 🚀 Como Começar

Siga estas instruções para obter uma cópia do projeto e executá-lo em sua máquina local para fins de desenvolvimento e teste.

### Pré-requisitos
O que você precisa instalar antes de rodar o projeto:
* Node
* MySql2
* Banco de dados
* XAMPP

### Instalação e Configuração

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/IngridYara/Trabalho_DAD.git
   cd Trabalho_DAD
   ```

2. **Configure as variáveis de ambiente:**
   Copie o arquivo de exemplo e preencha com as suas credenciais locais: (renomei o arquivo para .env)
   ```bash
   cp env.example
   ```

3. **Instale as dependências:**
   ```bash
   npm install  #vai instalar os pacotes necessários
   npm install mysql2 #caso não tenha instalado no comando anterior
   npm install dotenv #caso não tenha instalado no comando anterior

   ```

4. **Inicie o servidor de desenvolvimento:**
   ```bash
   node server.js
   ```
   O sistema estará disponível em: `http://localhost:3000`

---

## 🧪 Executando os Testes

Instruções sobre como rodar os testes automatizados do sistema:

    Execute o XAMPP rodando o servidor APACHE e o MYSQL
    Utilize o liveServer para visualizar a página da API, instale a extensão no VSCODE.
    Após instalar o liveServer vai aparecer na parte inferior do seu VS CODE o icone "GO Live", clique nele e ele vai abrir a página da API

    
---

## 📐 Estrutura do Projeto

Uma visão macro de como os arquivos estão organizados:

```text
├── Trabalho_DAD/
├── assets/  
│     ├── delete.svg
│     ├── edit.svg
├── index.php 
├── package-lock.json
├── package.json     
├── proximaPagina.php   
├── server.json
├── Transporte.sql
├── .env 
└── README.md        
```

---

## 🤝 Como Contribuir

1. Faça um **Fork** do projeto.
2. Crie uma **Branch** para sua funcionalidade (`git checkout -b feature/NovaFeature`).
3. Faça o **Commit** de suas alterações (`git commit -m 'Adiciona nova feature'`).
4. Envie para o repositório remoto (`git push origin feature/NovaFeature`).
5. Abra um **Pull Request**.

---

## 📄 Licença

Este projeto está sob a licença [MIT] - veja o arquivo `LICENSE` para mais detalhes.

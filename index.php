<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transporte</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a1a1a, #2d0b1f);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #ffffff;
        }

        .container {
            background-color: #111111;
            width: 100%;
            max-width: 650px;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0px 0px 25px rgba(255, 105, 180, 0.25);
            border: 2px solid #ff4fa3;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #ff7db8;
            font-size: 2rem;
        }

        .info {
            background-color: #1f1f1f;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid #ff4fa3;
            line-height: 1.8;
        }

        .campo {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffd1e6;
        }

        input {
            padding: 14px;
            border: 2px solid #ff4fa3;
            border-radius: 10px;
            background-color: #1c1c1c;
            color: white;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #ff9ac7;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.5);
        }

        .botoes {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            gap: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .guardar {
            background-color: #2e2e2e;
            color: white;
            border: 2px solid #ff4fa3;
        }

        .guardar:hover {
            background-color: #444444;
        }

        .enviar {
            background-color: #ff4fa3;
            color: white;
        }

        .enviar:hover {
            background-color: #ff70b8;
        }

        .erro {
            color: #ff9ac7;
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
        }

        .grupo {
            text-align: center;
            margin-bottom: 25px;
            color: #ffd1e6;
            font-size: 15px;
            background-color: #1f1f1f;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ff4fa3;
        }

        img {

            margin-top: 25px;
            width: 35px;
            height: 35px;
        }

        @media(max-width: 600px) {

            .container {
                padding: 25px;
            }

            .botoes {
                flex-direction: column;
            }

        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Formulário de Transporte</h1>

        <p class="grupo">
            Grupo: Ana Flávia, Ingrid Yara e João Felipe
        </p>

        <?php

        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];

        ?>

        <form id="formulario" action="http://192.168.0.103" method="post">

   
            <p class="grupo">
                <?php echo $nome?>
                <?php echo $matricula?></p>

            <input name="nome" id="nome" type="hidden" value=<?php echo $nome?>>
            <input name="matricula" id="matricula" type="hidden" value=<?php echo $matricula?>>

            <div class="campo">
                <label for="meioLocomocao">
                    Qual é o meio principal de locomoção?
                </label>

                <input type="text" name="meioLocomocao" id="meioLocomocao" required>
            </div>

            <div class="campo">

                <label for="tempoFaculdade">
                    Qual é o tempo de deslocamento até a faculdade?
                </label>

                <input type="text" name="tempoFaculdade" id="tempoFaculdade" required>
            </div>

            <div class="campo">

                <label for="veiculoProprio">
                    Quantos veículos próprios você tem?
                </label>

                <input type="number" name="veiculoProprio" id="veiculoProprio" required>
            </div>

            <div class="campo">

                <label for="tempoDestino">
                    Quanto tempo você fica no transporte até o destino?
                </label>

                <input type="text" name="tempoDestino" id="tempoDestino" required>
            </div>

            <div class="botoes">

                <button type="button" class="guardar" onclick="Guardar()">
                    Guardar
                </button>

                <button type="submit" class="enviar">
                    Enviar
                </button>

            </div>

            <p class="erro" id="mensagemErro"></p>

        </form>

        <br><br>

        <h1>Dados Recebidos:</h1>

        <div class="cards" id="dadosRecebidos">

        </div>

    </div>

    <script>
        const formulario = document.getElementById("formulario");
        const mensagemErro = document.getElementById("mensagemErro");

        async function Guardar() {

            let formularioValido = validarFormulario();

            // if (!formularioValido) {
            //     return;
            // }

            const meioLocomocao = document.getElementById("meioLocomocao").value;
            const tempoFaculdade = document.getElementById("tempoFaculdade").value;
            const veiculoProprio = document.getElementById("veiculoProprio").value;
            const tempoDestino = document.getElementById("tempoDestino").value;
            const nome = document.getElementById("nome").value;
            const matricula = document.getElementById("matricula").value;

            console.log(matricula)

            const dados = {
                matricula: matricula,
                nome: nome,
                meioLocomocao: meioLocomocao,
                tempoFaculdade: tempoFaculdade,
                veiculoProprio: veiculoProprio,
                tempoDestino: tempoDestino
            };

            const res = await fetch("http://localhost:3000/transporte", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(dados)
            });

            if (res) {

                alert("Dados guardados com sucesso!");
                location.reload();
            } else {

                alert("Erro ao guardar os dados.");
            }

        };

        async function ListaDados() {

            const res = await fetch("http://localhost:3000/transporte");
            const data = await res.json();

            const containerDados = document.getElementById("dadosRecebidos");

            data.forEach(function(item) {

                const card = document.createElement("div");
                card.classList.add("info");

                card.innerHTML = `
                    <p><strong>Nome:</strong> ${item.nome}</p>
                    <p><strong>Matricula:</strong> ${item.matricula}</p>
                    <p><strong>Meio de Locomoção:</strong> ${item.meioLocomocao}</p>
                    <p><strong>Tempo de Deslocamento até a Faculdade:</strong> ${item.tempoFaculdade}</p>
                    <p><strong>Veículos Próprios:</strong> ${item.veiculoProprio}</p>
                    <p><strong>Tempo no Transporte até o Destino:</strong> ${item.tempoDestino}</p>
                    <img src="assets/delete.svg" alt="" srcset="" onclick="Excluir(${item.matricula})">
                    <img src="assets/edit.svg" alt="" srcset="" onclick="Editar(${item.matricula})">
                `;

                containerDados.appendChild(card);
            });

        }

        ListaDados();

        function Excluir(matricula) {

            fetch(`http://localhost:3000/transporte/${matricula}`, {
                method: "DELETE"
            }).then(function(res) {

                if (res.ok) {
                    alert("Dados excluídos com sucesso!");
                    location.reload();
                } else {
                    alert("Erro ao excluir os dados.");
                }
            });
        }

        function Editar(matricula) {

            const novoMeioLocomocao = prompt("Digite o novo meio de locomoção: ");
            const novoTempoFaculdade = prompt("Digite o novo tempo de deslocamento até a faculdade: ");
            const novoVeiculoProprio = prompt("Digite a nova quantidade de veículos próprios: ");
            const novoTempoDestino = prompt("Digite o novo tempo no transporte até o destino: ");

            const dadosAtualizados = {

                nome: nome,
                meioLocomocao: novoMeioLocomocao,
                tempoFaculdade: novoTempoFaculdade,
                veiculoProprio: novoVeiculoProprio,
                tempoDestino: novoTempoDestino
            };

            fetch(`http://localhost:3000/transporte/${matricula}`, {

                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(dadosAtualizados)

            }).then(function(res) {

                if (res.ok) {

                    alert("Dados atualizados com sucesso!");
                    location.reload();

                } else {

                    alert("Erro ao atualizar os dados.");
                }
            });
        }

        function validarFormulario() {

            mensagemErro.innerText = "";

            const inputs = formulario.querySelectorAll("input");

            let formularioValido = true;

            inputs.forEach(function(input) {

                if (input.value.trim() === "") {
                    formularioValido = false;
                }

            });

            if (!formularioValido) {

                event.preventDefault();
                mensagemErro.innerText = "Preencha todos os campos antes de continuar.";
            }

            return formularioValido;

        }

        formulario.addEventListener("submit", function(event) {

            validarFormulario();
        });
    </script>

</body>

</html>
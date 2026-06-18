const express = require('express');
const cors = require('cors');
const mysql = require('mysql2/promise');
require('dotenv').config();
const app = express();

app.use(cors());
app.use(express.json());

const pool = mysql.createPool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASS,
    database: process.env.DB_NAME,
    port: process.env.DB_PORT,
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
});

app.get('/', (req, res) => {
    res.json({ message: 'Bem-vindo à API Express!' });

});

app.get('/transporte', async (req, res) => {
    
    try{

        const [linhas] = await pool.query('SELECT * FROM transporte');
        res.json(linhas);

    } catch (error) {
        console.error('Erro ao buscar transporte:', error);
        res.status(500).json({ message: 'Erro interno do servidor' });
    }
});

app.get('/transporte/:matricula', async (req, res) => {

    try{

        const matricula = parseInt(req.params.matricula);
        const [linhas] = await pool.query('SELECT * FROM transporte WHERE matricula = ?', [matricula]);
    
        if (linhas.length === 0) {
            return res.status(404).json({ message: 'Transporte não encontrado' });
        }

        res.json(linhas[0]);
    
    } catch (error) {
        console.error('Erro ao buscar transporte:', error);
        res.status(500).json({ message: 'Erro interno do servidor' });
    }
});

app.post('/transporte', async (req, res) => {

    try{

        const { matricula, nome, meioLocomocao, tempoFaculdade, veiculoProprio, tempoDestino } = req.body;
        const [result] = await pool.query('INSERT INTO transporte (matricula, nome, meioLocomocao, tempoFaculdade, veiculoProprio, tempoDestino) VALUES (?, ?, ?, ?, ?, ?)', [matricula, nome, meioLocomocao, tempoFaculdade, veiculoProprio, tempoDestino]);
        
        const novoUsuario = {
            matricula,
            nome,
            meioLocomocao,
            tempoFaculdade,
            veiculoProprio,
            tempoDestino
        };

        res.status(201).json(novoUsuario);
    
    } catch (error) {
        console.error('Erro ao criar transporte:', error);
        res.status(500).json({ message: 'Erro interno do servidor' });
    }
});

app.put('/transporte/:id', async (req, res) => {

    try{

        const matricula = parseInt(req.params.matricula);
        const { nome, meioLocomocao, tempoFaculdade, veiculoProprio, tempoDestino } = req.body;
        const [result] = await pool.query('UPDATE transporte SET nome = ?, meioLocomocao = ?, tempoFaculdade = ?, veiculoProprio = ?, tempoDestino = ? WHERE matricula = ?', [nome, meioLocomocao, tempoFaculdade, veiculoProprio, tempoDestino, matricula]);
        
        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Transporte não encontrado' });
        }
        
        res.json({ message: 'Transporte atualizado com sucesso' });

    } catch (error) {
        console.error('Erro ao atualizar transporte:', error);
        res.status(500).json({ message: 'Erro interno do servidor' });
    }
});

app.delete('/transporte/:matricula', async (req, res) => {

    try{

        const matricula = parseInt(req.params.matricula);
        const [result] = await pool.query('DELETE FROM transporte WHERE matricula = ?', [matricula]);

        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Transporte não encontrado' });
        }

        res.json({ message: 'Transporte deletado com sucesso' });

    } catch (error) {
        console.error('Erro ao deletar transporte:', error);
        res.status(500).json({ message: 'Erro interno do servidor' });
    }
});

app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
});
const API = 'http://localhost:8080/api';

async function carregarProdutos() {
    const response = await fetch(`${API}/read.php`);
    const produtos = await response.json();

    const tbody = document.getElementById('produtos');
    tbody.innerHTML = '';

    produtos.forEach(produto => {
        tbody.innerHTML += `
            <tr>
                <td>${produto.id}</td>
                <td>${produto.nome}</td>
                <td>${produto.quantidade}</td>
                <td>R$ ${produto.preco}</td>
                <td>
                    <button onclick="deletarProduto(${produto.id})">
                        Excluir
                    </button>
                </td>
            </tr>
        `;
    });
}

async function deletarProduto(id) {
    await fetch(`${API}/delete.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    });

    carregarProdutos();
}

document.getElementById('produto-form')
.addEventListener('submit', async (e) => {
    e.preventDefault();

    const produto = {
        nome: document.getElementById('nome').value,
        quantidade: document.getElementById('quantidade').value,
        preco: document.getElementById('preco').value
    };

    await fetch(`${API}/create.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(produto)
    });

    e.target.reset();
    carregarProdutos();
});

carregarProdutos();

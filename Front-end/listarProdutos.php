<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Produtos</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Listagem de Produtos</h1>
    <!-- Botão Inserir -->
    <a href="inserir_produto.php" class="btn btn-primary mb-3">Inserir Produto</a>
    <table class="table" id="tabelaProdutos">
      <thead>
        <tr>
          <th>Código</th>
          <th>Descrição</th>
          <th>Status</th>
          <th>Tempo de Garantia</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <!-- Os produtos serão listados aqui via JavaScript -->
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function() {
      // Função para listar os produtos ao carregar a página
      listarProdutos();

      function listarProdutos() {
        $.ajax({
          url: 'produtosController.php?action=listar', // URL da sua função no backend para listar os produtos
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            // Limpa a tabela de produtos
            $('#tabelaProdutos tbody').empty();

            // Preenche a tabela com os produtos retornados pelo backend
            $.each(data, function(index, produto) {
              $('#tabelaProdutos tbody').append(
                '<tr>' +
                '<td>' + produto.codigo + '</td>' +
                '<td>' + produto.descricao + '</td>' +
                '<td>' + produto.statusProduto + '</td>' +
                '<td>' + produto.tempo_garantia + '</td>' +
                '<td>' +
                '<a href="atualizar_produto.php?id=' + produto.id + '" class="btn btn-primary">Atualizar</a> ' +
                '<button onclick="excluirProduto(' + produto.id + ')" class="btn btn-danger">Excluir</button>' +
                '</td>' +
                '</tr>'
              );
            });
          }
        });
      }

      // Função para excluir um produto
      function excluirProduto(id) {
        if (confirm('Tem certeza que deseja excluir este produto?')) {
          $.ajax({
            url: 'produtosController.php', // URL da sua função no backend para excluir o produto
            type: 'POST',
            data: { id: id, action: 'excluir' },
            dataType: 'json',
            success: function(response) {
              // Exibe uma mensagem de sucesso ou erro
              if (response.success) {
                alert('Produto excluído com sucesso!');
                // Atualiza a lista de produtos após excluir o produto
                listarProdutos();
              } else {
                alert('Erro ao excluir o produto: ' + response.error);
              }
            }
          });
        }
      }
    });
  </script>
</body>
</html>

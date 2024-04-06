<nav class="navbar navbar-expand-lg round-bt-corner navbar-bg navbar-dark justify-content-end">
  <div class="container-fluid">
    <a class="navbar-brand opacity-100" href="home.php">
      <!-- <h1 style="font-family: verdana; margin-right: 5%;" class="nav-text">Ordem de Serviço</h1> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item h5">
          <a class="nav-link active " aria-current="page" href="/api-ordem-de-servico/Front-end/index.php">Home</a>
        </li>
        <li>
          <span class="navbar-text">
            <li class="nav-item dropdown" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Produto/incluirProduto.php" style="color: black;">Incluir</a></li>
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Produto/listarProdutos.php" style="color: black;">Listar</a></li>
              </ul>
            </li>
          </span>
        </li>
        <li>
          <span class="navbar-text">
            <li class="nav-item dropdown" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clientes</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Cliente/incluirCliente.php" style="color: black;">Incluir</a></li>
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Cliente/listarClientes.php" style="color: black;">Listar</a></li>
              </ul>
            </li>
          </span>
        </li>
        <li>
          <span class="navbar-text">
            <li class="nav-item dropdown" style="list-style-type: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ordem de Serviço</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Ordem de Servico/incluirOrdemDeServico.php" style="color: black;">Incluir</a></li>
                <li><a class="dropdown-item" href="/api-ordem-de-servico/Front-end/Ordem de Servico/listarOrdensDeServico.php" style="color: black;">Listar</a></li>
              </ul>
            </li>
          </span>
        </li>
      </ul>
    </div>
  </div>
</nav>
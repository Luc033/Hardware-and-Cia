-- Criação do banco de dados para o cenário de E-commerce
-- drop database ecommerce;
create database ecommerce;
use  ecommerce;
show tables;

-- Criar tabela Cartão Crédito;
create table cartao_credito(
	idCartaoCredito int auto_increment primary key,
    nomeCompletoTitular varchar(45) not null,
    numeroCartao char(16) not null,
    bandeiraCartao varchar(15) not null,
    dataValidadeCartao date not null,
    cpf_cnpjTitular char(15) not null,
    constraint unique_nome_completo_titular unique (nomeCompletoTitular),
    constraint unique_numero_cartao unique (numeroCartao),
    constraint unique_bandeira_cartao unique (bandeiraCartao),
    constraint unique_validade_cartao unique (dataValidadeCartao),
    constraint unique_cpf_cnpj_titular unique (cpf_cnpjTitular)
);
alter table cartao_credito auto_increment=1;

-- Criar tabela pagamento;
create table pagamento(
	idPagamento int auto_increment primary key,
    pix char(32),
    boleto varchar(45),
    cartaoCredito_idCartaoCredito int,
    constraint fk_pagamento_cartao_credito foreign key (cartaoCredito_idCartaoCredito) references cartao_credito (idCartaoCredito) on update cascade
);
alter table pagamento auto_increment=1;

-- Criar tabela cliente;
create table cliente(
	idCliente int auto_increment primary key,
    primeiroNome varchar(45) not null,
    nomeDoMeioInicial varchar(3),
    sobrenome varchar(45) not null,
    dataNascimento date not null unique,
    endereco varchar(45),
    rua varchar(45) not null,
    numero varchar(6) not null,
    complemento varchar(45),
    bairro varchar(45) not null,
    cidade varchar(45) not null,
    estado varchar(2) not null,
    cep varchar(8) not null,
    cpf_cnpj char(14) not null,
    telefone char(11) not null,
    email varchar(45) not null,
    senha varchar(45) not null,
    pagamento_idPagamento int,
    constraint cpf_cnpj_cliente unique (cpf_cnpj),
    constraint fk_cliente_pagamento foreign key (pagamento_idPagamento) references pagamento(idPagamento) on update cascade
    );
    alter table cliente auto_increment=1;
    
    
-- Criar tabela funcionário;
create table funcionario(
	idFuncionario int auto_increment primary key,
    primeiroNomeFunc varchar(45) not null,
    nomeDoMeioInicialFunc varchar(3),
    sobrenomeFunc varchar(45) not null,
    emailFunc varchar(45) not null,
    senhaFunc varchar(45) not null
    );
    alter table funcionario auto_increment=1;
    
-- Criar tabela administrador;
create table administrador(
	idAdm int auto_increment primary key,
    primeiroNomeAdm varchar(45) not null,
    nomeDoMeioInicialAdm varchar(3),
    sobrenomeAdm varchar(45) not null,
    emailAdm varchar(45) not null,
    senhaAdm varchar(45) not null
    );
    alter table administrador auto_increment=1;
    
    -- Criar tabela produto;
    create table produto(
		idProduto int primary key auto_increment,
        nomeProduto varchar(50) not null,
        categoria enum('Headset', 'Mouse', 'Teclado', 'Notebook', 'Monitor', 'SSD', 'RAM') not null,
        valor float not null unique
	);
    alter table produto auto_increment=1;

-- Criar tabela Empresa Frete;
create table empresa_frete(
	idEmpresaFrete int auto_increment primary key,
    razaoSocialEmpresaFrete varchar(45) not null,
    cnpjEmpresaFrete char(15) not null,
    nomeFantasiaEmpresaFrete varchar(45),
    responsavelEmpresaFrete varchar(45),
    telefoneEmpresaFrete char(11) not null,
    emailEmpresaFrete varchar(45) not null,
	constraint unique_razao_social_empresa_frete unique (razaoSocialEmpresaFrete),
	constraint unique_cnpj_empresa_frete unique (cnpjEmpresaFrete)
);
alter table empresa_frete auto_increment=1;

-- Criar tabela Entrega;
create table entrega(
	idEntrega int auto_increment primary key,
    statusEntrega enum('Despachada','Em trânsito') not null,
    empresaFrete_idEmpresaFrete int,
    constraint fk_entrega_empresa_frete foreign key (empresaFrete_idEmpresaFrete) references empresa_frete(idEmpresaFrete) on update cascade
);
alter table entrega auto_increment=1;

 -- Criar tabela pedido;
 create table pedido(
	idPedido int auto_increment primary key,
    statusPedido enum('Cancelado','Confirmado','Em processamento') default 'Em processamento',
    descricao varchar(255),
    frete float default 10,
    cliente_idCliente int,
    pagamento_idPagamento int,
    entrega_idEntrega int,
    funcionario_idFuncionario int,
    administrador_idAdm int,
    constraint fk_pedido_cliente foreign key (cliente_idCliente) references cliente(idCliente) on update cascade,
    constraint fk_pedido_pagamento foreign key (pagamento_idPagamento) references pagamento(idPagamento) on update cascade,
    constraint fk_pedido_entrega foreign key (entrega_idEntrega) references entrega(idEntrega) on update cascade,
	constraint fk_pedido_funcionario foreign key (funcionario_idFuncionario) references funcionario(idFuncionario) on update cascade,
	constraint fk_pedido_administrador foreign key (administrador_idAdm) references administrador(idAdm) on update cascade
);
alter table pedido auto_increment=1;
    
-- Criar tabela estoque;
create table estoque(
	idEstoque int auto_increment primary key,
    quantidadeEstoque int default 0,
    funcionario_idFuncionario int,
	constraint fk_estoque_funcionario foreign key (funcionario_idFuncionario) references funcionario(idFuncionario) on update cascade
);
alter table estoque auto_increment=1;

-- Criar tabela fornecedor;
create table fornecedor(
	idFornecedor int auto_increment primary key,
    razaoSocial varchar(45) not null,
    nomeFantasia varchar(45),
    CNPJ char(15) not null,
    contato char(11) not null,
	constraint unique_fornecedor unique (CNPJ)
);
alter table fornecedor auto_increment=1;

-- Criar tabela Produtos em estoque;
create table produtos_em_estoque(
	produto_idProduto int,
    estoque_idEstoque int,
    primary key (produto_idProduto, estoque_idEstoque),
    constraint fk_produtos_estoque_produto foreign key (produto_idProduto) references produto (idProduto) on update cascade,
    constraint fk_produtos_estoque_estoque foreign key (estoque_idEstoque) references estoque (idEstoque) on update cascade
);

-- Criar tabela Produtos_Fornecedor;
create table produtos_fornecedor(
	fornecedor_idFornecedor int,
    produto_idProduto int,
    quantidadeProdutosFornecedor int default 0,
    primary key (fornecedor_idFornecedor, produto_idProduto),
    constraint fk_produtos_fornecedor_fornecedor foreign key (fornecedor_idFornecedor) references fornecedor (idFornecedor) on update cascade,
    constraint fk_produtos_fornecedor_produto foreign key (produto_idProduto) references produto (idProduto) on update cascade
);

-- Criar tabela Relação Produto/Pedido
create table relacao_produto_pedido(
	produto_idProduto int,
    pedido_idPedido int,
    quantidadeProdutoPedido int not null,
    primary key (produto_idProduto, pedido_idPedido),
    constraint fk_relacao_produto_pedido_produto foreign key (produto_idProduto) references produto (idProduto) on update cascade,
    constraint fk_relacao_produto_pedido_pedido foreign key (pedido_idPedido) references pedido (idPedido) on update cascade
);
    
    
    
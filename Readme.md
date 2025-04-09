# **CGV COMPETITION**

- [x] **Barra de Navegação** (com 4 ícones)  
    - Ícone de menu: Exibe informações adicionais ao ser clicado.  
    - Ícone de barra de pesquisa: Para procurar produtos.  
    - Ícone de carrinho: Exibe os produtos adicionados ao carrinho.  
    - Ícone de login: Acessa a conta do usuário, com opções de login e cadastro.  

<br>  

- [x] **Sessão de Produtos**  
    - Título: "Produtos em Destaque"  
    - Exibição de três colunas com cards de produtos, clicáveis, redirecionando para a página de detalhes do produto.  
    - Cada card de produto inclui um botão para adicionar ao carrinho.  

<br>  

- [x] **Seção de Envio**  
    - Título: "Envio Imediato!"  
    - Texto explicativo sobre o envio rápido de produtos.  

<br>  

- [x] **Seção "Sobre Nós"**  
    - Título: "Sobre Nós"  
    - Texto breve sobre a empresa e a loja.  

<br>  

- [x] **Rodapé**  
    - Botões de redes sociais (Facebook, Instagram e Gmail).  
    - Informações de suporte ao cliente (Gmail, número de telefone e WhatsApp).  
    - Links importantes (Política de Privacidade, Termos de Uso, Política de Devolução e Troca).  
    - Seção para notícias e atualizações da loja (com opção de cadastro de e-mail para receber notificações).  

<br>  

- [x] **Tela de Login/Validação**  
    - Ícone de seta para voltar à tela inicial (localizado à esquerda).  
    - Formulário de email (com validação de formato correto e email cadastrado).  
    - Formulário de senha (com validação de senha correta).  
    - Ícone de login via Google (redireciona para a tela de contas Google).  
    - Ícone de login via Facebook (redireciona para a tela de contas Facebook).  

<br>  

- [x] **Tela de Cadastro/Validação** (tela-cadastro.php)  
    - Ícone de seta para voltar à tela inicial (localizado à esquerda).  
    - Formulário de nome e sobrenome (validação para permitir apenas letras).  
    - Formulário de email (validação de formato correto).  
    - Formulário de senha (validação de senha forte: mínimo 8 caracteres, 1 letra maiúscula, 1 caractere especial).  
    - Formulário de telefone (validação de número de telefone válido com máscara).  
    - Formulário de CEP (validação de CEP válido com máscara).  
    - Formulário de cidade (validação para cidade existente).  
    - Formulário de rua (validação de comprimento máximo de caracteres).  
    - Formulário de número da casa (apenas números).  
    - Formulário de complemento.  
    - Botão "Cadastrar" (habilitado apenas quando todos os campos estiverem preenchidos corretamente).  

<br>  

- [x] **Tela do Usuário**  
    - Ícone de seta para voltar à tela inicial (localizado à esquerda).  
    - Formulário de nome e sobrenome (validação para permitir apenas letras).  
    - Formulário de email (validação de formato correto).  
    - Formulário de senha (validação de senha correta).  
    - Formulário de telefone (validação de número de telefone válido).  
    - Formulário de cidade (validação para cidade existente).  
    - Formulário de rua (validação de rua existente).  
    - Formulário de CEP (validação de correspondência com outros campos).  
    - Botão "Salvar Mudanças" (habilitado apenas se houver alterações nos formulários).  

<br>  

- [x] **Tela de Produto**  
    - Exibição de 4 colunas com cards de produtos, clicáveis, redirecionando para a página de detalhes de cada produto.  
    - Cada card possui um botão para adicionar ao carrinho.  

<br>  

- [x] **Tela de Cadastro de Produtos**  
    - Formulário de nome do produto (validação para garantir que não haja caracteres especiais).  
    - Formulário de preço (validação para garantir que não haja letras).  
    - Formulário de parcelamento (validação para garantir quantidade máxima de parcelas).  
    - Formulário de versão do produto.  
    - Formulário de descrição do produto.  
    - Botão "Cadastrar Produto" (habilitado quando todos os campos estiverem preenchidos corretamente).  

<br>

- [x] **Tela de Informações do Produto**  
    - 3 imagens clicáveis que mudam conforme a seleção.  
    - Nome do item.  
    - Preço do item.  
    - Versão do item.  
    - Opções de parcelamento do item.  
    - Botão de "Adicionar ao Carrinho".  
    - Menu de descrição com mais informações sobre o produto.

<br>

- [x] **Área de Usuário**  
    - A área do usuário irá listar as informações do usuário cadastrado.  
    - Também haverá a opção de sair da conta cadastrada.  
    - E uma opção para editar as informações.

<hr>
<BR>

 # c#
Tela login: 

Adicionar nome de usuário:  validação para ver se tem algum caractere e validação no campo senha e usuário com duas opções de limpar campo e mostrar senha. 

  

Tela administração/menu:  

Bom nessa tela tem duas opções:  gerenciar cliente e gerenciar produto. 

 

listar produto:    

No listar produto temos um botão de pesquisar cliente e apagar cliente e temos um campo onde o nome dele é “DataGridView” ele é o responsável por listar todos os produtos cadastrados no banco de dados, e uma dica: As informações do banco de dados no campo de “descricao” no banco era de blob porem estava dando erro no “DataGridView” pois ele não estava aguentando tantos caracteres para listar nele, por causa da descrição ela estava passando dos cinco mil caracteres, por causa disso tive que optar por mudar o campo de “Blob” para “text” pois é mais viável por ter muitos caracteres e não dar conflito com o “DataGridView” e com isso se eu optasse por continuar usando o “blob” ainda sim continuaria dando erro pois o DataGridView estava entendendo que era uma imagem e estava tentando ler, porem na verdade era caracteres de textos, com isso tirei a conclusão que era mais viável usar o text . 

 

 

 

 

Listar clientes:   

Bom no listar cliente é a mesma função do listar do produto, temos um botão onde lista os clientes e apaga e temos um campo onde o nome dele é “DataGridView” ele é o responsável por listar todos os clientes cadastrados no banco de dados. 

 

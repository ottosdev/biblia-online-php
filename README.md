# Iniciando Projeto
```composer create-project laravel/laravel nome-projeto```

# Iniciar o servidor
```php artisan serve```

# Criando os models via CLI
```php artisan make:model nome-model-singular --migration```

# Criando as migrations via CLI
```php artisan migration```

# Criando controllers via CLI
```php artisan make:controllers nome-controller --api``` --api serve para criar ja com uma estrutura basica.

# Comando para listar todas as rotas
```php artisan route:list```


# Conceitos

# PHP
- fillable - é usada dentro do modelo. Cuida de definir quais campos devem ser considerados quando o usuário for inserir ou atualizar dados. 
- Somente os campos marcados como preenchíveis são usados na atribuição em massa. Isso é feito para evitar ataques de atribuição em massa de dados quando o usuário envia dados da solicitação HTTP.

# Service Pattern
- O Service é um conceito introduzido no Service Pattern. Ele tem como objetivo abstrair regras de negócio das rotas, além de tornar nosso código mais reutilizável.
- Cada service deve ser único e bem descritivo, com apenas um único método que executara uma regra de negocio associada ao mesmo.
- A funcionalidade de um service seria  reduzir a complexidade das rotas da nossa aplicação e deixá-las responsáveis apenas pelo que realmente devem fazer: receber uma requisição, repassar os dados da requisição a outro arquivo e devolver uma resposta.

# Repository Pattern
- O Repository é um conceito introduzido no Data Mapper Pattern ou Repository Pattern que consiste em uma ponte entre nossa aplicação e a fonte de dados, seja ela um banco de dados, um arquivo físico ou qualquer outro meio de persistência de dados da aplicação.
- Visa em abstrair as logicas comuns dos bancos de dados. Por exemplo
    - Geralmente o Repository possui os métodos comuns de comunicação com uma fonte de dados como listagem, busca, criação, edição, remoção, mas conforme a aplicação cresce o desenvolvedor tende a encontrar outras operações repetitíveis e, com isso, popula o repositório com mais funcionalidades


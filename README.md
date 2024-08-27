
# Monster Burguer API Documentation (v1)

**Nota:** Esta API ainda está em fase de construção. Alguns recursos e endpoints podem ser adicionados ou alterados.

## Base URL
`https://api.monsterburguer.com/v1`

## Autenticação
### Login
**Endpoint:** `POST /costumer/login`

**Request Body:**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "id": 1,
  "name": "John Doe",
  "email": "user@example.com",
  "phone_number": "123456789",
  "address": "123 Main St",
  "meta": {
    "Access_Token": "jwt_token",
    "Token_Type": "Bearer"
  }
}
```

## Endpoints

1. **Pão**

   **Descrição:** Lista todos os pães disponíveis.

   **Endpoint:** `GET /bread`

   **Response:**
    ```json
    [
      {
        "id": 1,
        "name": "Integral"
      },
      {
        "id": 2,
        "name": "Francês"
      }
    ]
    ```

2. **Carne**

   **Descrição:** Lista todas as carnes disponíveis.

   **Endpoint:** `GET /meat`

   **Response:**
    ```json
    [
      {
        "id": 1,
        "name": "Bovina"
      },
      {
        "id": 2,
        "name": "Frango"
      }
    ]
    ```

3. **Opcional**

   **Descrição:** Lista todos os opcionais disponíveis.

   **Endpoint:** `GET /optional`

   **Response:**
    ```json
    [
      {
        "id": 1,
        "name": "Queijo Cheddar"
      },
      {
        "id": 2,
        "name": "Bacon"
      }
    ]
    ```

## Pedidos

1. **Lista de Pedidos**

   **Descrição:** Lista todos os pedidos.

   **Endpoint:** `GET /orders`

   **Response:**
    ```json
    [
      {
        "order": {
          "id": 1,
          "bread": "Integral",
          "meat": "Bovina",
          "optional": "Queijo Cheddar",
          "note": "Sem salada",
          "status": "Pendente",
          "created_at": "2024-08-26T12:34:56.000000Z",
          "updated_at": "2024-08-26T12:34:56.000000Z",
          "customer": {
            "id": 1,
            "name": "John Doe",
            "phone_number": "123456789",
            "address": "123 Main St",
            "created_at": "2024-08-26T12:34:56.000000Z",
            "updated_at": "2024-08-26T12:34:56.000000Z"
          }
        }
      }
    ]
    ```

2. **Criar Pedido**

   **Descrição:** Cria um novo pedido.

   **Endpoint:** `POST /orders`

   **Request Body:**
    ```json
    {
      "note": "Com salada",
      "customer_id": 1,
      "bread_id": 1,
      "meat_id": 2,
      "optional_id": 1,
      "status": "Pendente"
    }
    ```

   **Response:**
    ```json
    {
      "order": {
        "id": 2,
        "bread": "Integral",
        "meat": "Frango",
        "optional": "Queijo Cheddar",
        "note": "Com salada",
        "status": "Pendente",
        "created_at": "2024-08-26T13:45:30.000000Z",
        "updated_at": "2024-08-26T13:45:30.000000Z",
        "customer": {
          "id": 1,
          "name": "John Doe",
          "phone_number": "123456789",
          "address": "123 Main St",
          "created_at": "2024-08-26T12:34:56.000000Z",
          "updated_at": "2024-08-26T12:34:56.000000Z"
        }
      }
    }
    ```

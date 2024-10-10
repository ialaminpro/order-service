# E-commerce Microservices with Event-Driven Architecture

This repository is part of a **modular microservices architecture** built with Laravel, showcasing how **Event-Driven Architecture (EDA)** is applied to an e-commerce platform. Each microservice independently handles a core function of the platform, allowing for scalability, resilience, and real-time communication.

# Order Service

This is the **Order Service** of an event-driven e-commerce platform built with Laravel. It processes orders, communicates with other microservices using RabbitMQ for real-time event handling, and manages order data with MySQL.

## 🛠️ Tech Stack

- **Laravel** (PHP Framework)
- **RabbitMQ** (Message Broker for Event Communication)
- **Docker** (Containerization of Microservices)
- **MySQL** (Database for each service)
- **Redis** (Queue management)
- **Nginx** (Web server)

## Features

- **Order Management**: Create and store orders.
- **Event-Driven**: Emits `OrderPlaced` events when a new order is created.
- **Dockerized**: Easy setup with Docker for local development.



## Running Locally

1. Clone the repository:
   ```bash
   git clone https://github.com/ialaminpro/order-service.git
   ```

2. Run Docker containers:
   ```bash
   docker-compose down -v
   docker-compose up -d
   ```

3. Migrate the database:
   ```bash
   docker exec -it order-service-app php artisan migrate
   ```

4. Run the Laravel queue worker for processing:
   ```bash
   docker exec -it order-service-app php artisan queue:work
   ```

5. Open your browser and go to the order service endpoints `http://localhost:9000` .

## API Endpoints

### Create Order
```
POST /api/orders
```

**Payload**:
```json
{
  "customer_name": "Al Amin",
  "product": "Mac M1",
  "quantity": 1,
  "total_price": 1200.00
}
```

### Event Handling

- **Event**: `OrderPlaced`
- Triggered when a new order is created, notifying other services (e.g., Inventory, Fraud Detection).

## Author

- **Al Amin** - [LinkedIn](https://www.linkedin.com/in/ialaminpro) | [Portfolio](https://al-amin.xyz)

Feel free to reach out to me if you'd like to collaborate or discuss job opportunities in backend development, microservices, or cloud architecture.

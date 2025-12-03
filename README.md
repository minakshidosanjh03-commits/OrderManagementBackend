# Real-Time Order Tracking Backend  
A Laravel API backend with Sanctum authentication, Pusher real-time broadcasting, and order management.

---

# 🚀 Features
- User Signup & Login using Sanctum token
- Protected APIs using middleware
- Order Create / List / Update
- Real-time order updates using Laravel Echo + Pusher
- API consumed by React frontend
- Event broadcasting for instant UI updates

---

# 🛠️ Requirements
- PHP 8.1+
- Composer
- Laravel 10+
- MySQL or PostgreSQL
- Pusher account (free)

---

# 📦 Installation & Setup

## 1️⃣ Clone the project
```bash
git clone <your-backend-repo>
cd backend

2️⃣ Install dependencies
composer install

3️⃣ Configure environment

Copy .env.example → .env

cp .env.example .env


Update the following in .env:

Database
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=


Pusher settings
PUSHER_APP_ID=your-id
PUSHER_APP_KEY=your-key
PUSHER_APP_SECRET=your-secret
PUSHER_APP_CLUSTER=mt1
BROADCAST_DRIVER=pusher

🗄️ Database Migration

Run:

php artisan migrate

▶️ Start the server
php artisan serve


API will run at:

http://localhost:8000/api


🔄 How to Test Real-Time Order Status Updates

You can trigger Pusher real-time events by updating the order status.

📌 API Endpoint
PATCH http://localhost:8000/api/orders/{order_id}/status

Example to test:
PATCH http://localhost:8000/api/orders/2/status

Body:
{
  "status": "confirmed"
}

✔ What happens when you hit this endpoint?

Order status is updated in DB

A Pusher event is fired

Frontend receives the event instantly → order status updates in real-time
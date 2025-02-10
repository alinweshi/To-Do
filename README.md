# 🛍️ Task Management API

A Laravel-based API for managing tasks, including CRUD operations, soft deletion, and restoration.

---

## 🚀 Features
- 🔐 Authentication using Laravel Sanctum  
- 📂 Task management (Create, Read, Update, Delete)  
- 🗑️ Soft delete & restore tasks  
- 🛠 API endpoints with proper validation  
- 📄 Postman collection for API testing  

---
## 🛠 Tech Stack
- **Backend:** Laravel 11, PHP 8.2.27.x  
- **Database:** MySQL  
- **Authentication:** Laravel Sanctum  
- **API Documentation:** Postman  

---
## 📌 Setup Instructions

### **1️⃣ Clone the Repository**
```bash
git clone https://github.com/username/task-management-api.git
cd task-management-api

2️⃣ Install Dependencies
bash
Copy
Edit
composer install
npm install

3️⃣ Configure Environment Variables
bash
Copy
Edit
cp .env.example .env
php artisan key:generate

4️⃣ Set Up Database
bash
Copy
Edit
php artisan migrate --seed

5️⃣ Start the Server
bash
Copy
Edit
php artisan serve
API will be available at: http://127.0.0.1:8000/api

🔑 Authentication
This project uses Laravel Sanctum for authentication.
To obtain an access token, send a POST request to /api/login with:
json
Copy
Edit
{
  "email": "admin@example.com",
  "password": "password"
}
Use the token in Authorization headers as:
css
Copy
Edit
Authorization: Bearer {token}

📌 API Endpoints
Method	Endpoint	Description	Auth
POST	/api/register	Register a new user	❌
POST	/api/login	Authenticate user	❌
GET	/api/tasks	Get all tasks	✅
POST	/api/tasks	Create a task	✅
PUT	/api/tasks/{id}	Update a task	✅
DELETE	/api/tasks/{id}	Soft delete a task	✅
GET	/api/tasks/trashed	Get all trashed tasks	✅
PUT	/api/tasks/restore/{id}	Restore a soft-deleted task	✅

📄 API Testing with Postman
Import the Postman Collection: 
Use the environment variable for API URL.https://documenter.getpostman.com/view/29067821/2sAYX9oLpw




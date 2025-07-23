# 📁 Laravel File Sharing System

A simple yet powerful file-sharing platform built with **Laravel** and **Tailwind CSS**. Users can upload files, receive a unique code, and share it with others to allow downloading. Files are stored in **Supabase Storage**, and their public URLs are saved in the database.

## 🚀 Features

- 🔐 Upload any file type via a simple UI
- ☁️ Files stored securely on [Supabase Storage](https://supabase.com/storage)
- 🔗 A unique download code is generated per file
- 📥 Anyone with the code can download the file
- 🎨 Responsive and clean UI with Tailwind CSS

## 🛠️ Tech Stack

- **Backend**: Laravel 11+
- **Frontend**: Tailwind CSS
- **Storage**: Supabase Storage
- **Database**: MySQL / PostgreSQL (configurable)

## ⚙️ Installation

1. **Clone the repository**


git clone https://github.com/NuhaSam/File-Sharing.git 
cd File-Sharing

2. **Install dependencies**

3. **Setup environment**
cp .env.example .env
php artisan key:generate


4. **Configure Supabase**

In .env, add your Supabase credentials:

SUPABASE_URL=https://your-project.supabase.co
SUPABASE_KEY=your-supabase-api-key
SUPABASE_BUCKET=your-bucket-name

5. **Run migrations**
php artisan migrate


6. ** Serve the application**
php artisan serve

## 📄 License
This project is open-source under the MIT License.

## 🤝 Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.



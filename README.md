# Dynamic Page Builder (Laravel - Elementor-like)

This project allows users to build dynamic pages using a drag-and-drop interface, similar to WordPress's Elementor. It’s built using **Laravel**, with **GrapesJS** for page building and **SQLite** for data storage.

## Features

- **Drag-and-Drop Page Builder**: The intuitive page builder allows users to easily add various components like text, images, forms, videos, etc.
- **Customization**: Each element can be customized (fonts, colors, spacing).
- **Dynamic Pages & Links**: Every created page gets a unique URL (e.g., `/pages/{slug}`). The pages are accessible through these dynamic links without manual routing.
- **CRUD Operations**: Users can create, edit, update, and delete pages, including modifying the page’s slug.

## Requirements

1. **Backend (Laravel)**
    - **Page Storage**: Pages are stored in the database, and their content is saved dynamically.
    - **Dynamic Slug**: Slugs are auto-generated based on the page title, but users can customize them.
    - **Version Control**: The project uses Git to manage changes. Regular commits with meaningful messages ensure easy tracking and collaboration.

2. **Frontend**
    - **Page Building**: The page-building interface uses **GrapesJS** to allow users to drag-and-drop components onto their pages.
    - **Customization**: Elements can be customized (text styling, colors, alignment, etc.) to give users full control over their design.

3. **Dynamic Links**
    - After a page is created, it’s automatically assigned a unique URL (`/pages/{slug}`).
    - Pages are accessible via these dynamic URLs, and routing is handled automatically without manual configuration.

4. **Reusable Structure**
    - The page structure is reusable, meaning users can create different types of pages using pre-built elements, which can be updated or deleted.

## Setup and Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/mrhitss/storefront.git
cd storefront
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Set up the Environment

```bash
cp .env.example .env
```

### Step 4: Migrate the Database

```bash
php artisan migrate
```

### Step 5: Serve the Application
```bash
php artisan serve
```

## References (Screenshots)

<img width="500" alt="Home Page" src="https://github.com/user-attachments/assets/d481eb27-f919-420c-a29e-2045b63fa12a">
<img width="500" alt="Dynamic Page Builder" src="https://github.com/user-attachments/assets/7bf173cb-ecdd-472d-b8cb-823e85ed2453">



Thank you for checking out the Dynamic Page Builder project!

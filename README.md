# Article Summarization Service
A service that accepts either a URL or raw text of an article, using GPT API to generate a concise summary, and then stores both the original text (or URL) and the summary on a local database.

## Project

- Built with [Laravel 12](https://laravel.com)

## Installation and Setup

1. **Clone this repository**
    ```bash
    git clone https://github.com/codejutsu1/article-summarization.git
    ```

2. **Install Dependencies**
    ```bash
    composer install --ignore-platform-req=ext-intl
    ```

3. **Set up environmental variables**
    - copy `.env.example` to `.env` and update the database credentials.
    - Generate an app key
    ```bash
    php artisan key:generate
    ```
    - Add your OpenAi key OPENAI_API_KEY
    ```bash
    OPENAI_API_KEY=
    ```

5. **Run the development server**
    ```bash
    php artisan serve
    ```
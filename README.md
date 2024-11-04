# ICI IT Codespace PHP/MySQL/phpMyAdmin

This project sets up a development environment using GitHub Codespaces with MySQL, phpMyAdmin, and Apache. It includes a sample PHP script to demonstrate the database connection.

## Setup

1. **Create a GitHub repository** and add the files from this project.
2. **Open the repository in GitHub Codespaces**:
    - Click on the `Code` button and select `Open with Codespaces`.
    - Select `New codespace` to create a new Codespace.

## Features

- **MySQL**: A MySQL server is set up with a sample database and user.
- **phpMyAdmin**: phpMyAdmin is installed and configured for database management.
- **Apache**: Apache is set up to serve PHP files from the `htdocs` directory and enable directory listing.
- **Live Share**: The Live Share extension from Microsoft is included for real-time collaboration.

## Usage

- **Upload Work**: Students should upload their work to the `htdocs` directory.
- **Access phpMyAdmin**: Navigate to the `Ports` tab in this codespace.
- **Run the sample PHP script**: The `htdocs/index.php` file demonstrates a database connection.

## Export Database

To export the database, run the "Export Database" task:

1. Open the Command Palette in VS Code (Ctrl+Shift+P or Cmd+Shift+P).
2. Type "Tasks: Run Task" and select it.
3. Choose "Export Database" from the list of tasks.

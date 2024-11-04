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

## What's Needed to Run

- **GitHub Account**: You need a GitHub account to create a repository and use GitHub Codespaces.
- **GitHub Codespaces**: Ensure you have access to GitHub Codespaces. This may require a subscription or access granted by your organization.
- **Web Browser**: A modern web browser to access GitHub Codespaces.

## Do's and Don'ts

### Do's

- **Do** upload your work to the `htdocs` directory.
- **Do** use phpMyAdmin for database management.
- **Do** collaborate using Live Share for real-time coding sessions.
- **Do** follow the instructions for exporting the database.

### Don'ts

- **Don't** modify the configuration files unless you know what you're doing.
- **Don't** store sensitive information in the repository.
- **Don't** share your Codespace URL publicly.

## Usage

- **Upload Work**: Students should upload their work to the `htdocs` directory.
- **Access phpMyAdmin**: Navigate to the `Ports` tab in this codespace.
- **Run the sample PHP script**: The `htdocs/index.php` file demonstrates a database connection.

## Export Database

To export the database, run the "Export Database" task:

1. Open the Command Palette in VS Code (Ctrl+Shift+P or Cmd+Shift+P).
2. Type "Tasks: Run Task" and select it.
3. Choose "Export Database" from the list of tasks.

## Next Steps

1. **Customize Your Environment**: Modify the `Dockerfile` and `devcontainer.json` to add any additional tools or configurations you need.
2. **Add Your Code**: Start adding your PHP code to the `htdocs` directory.
3. **Collaborate**: Use Live Share to collaborate with your team in real-time.
4. **Test and Debug**: Use the integrated terminal and debugging tools in VS Code to test and debug your application.
5. **Deploy**: Once your application is ready, consider deploying it to a production environment.

## Troubleshooting

- **Codespace Not Starting**: Ensure you have the necessary permissions and resources to create a Codespace.
- **Database Connection Issues**: Check the MySQL server status and ensure your credentials are correct.
- **Permission Errors**: Ensure the `htdocs` directory has the correct permissions set.

## Support

If you encounter any issues or have questions, please open an issue in the GitHub repository or contact your instructor for assistance.
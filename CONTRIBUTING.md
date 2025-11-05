# Contributing to Brandology Inventory System

Thank you for considering contributing to the Brandology Inventory System! This document provides guidelines for contributing to this project.

## Code of Conduct

By participating in this project, you agree to abide by our code of conduct:
- Be respectful and inclusive
- Welcome newcomers and help them learn
- Focus on constructive feedback
- Respect different viewpoints and experiences

## How to Contribute

### Reporting Bugs

Before submitting a bug report:
1. Check if the issue has already been reported
2. Ensure you're using the latest version
3. Test with a clean installation

When submitting a bug report, please include:
- Clear description of the issue
- Steps to reproduce
- Expected vs actual behavior
- Screenshots if applicable
- Environment details (PHP version, OS, etc.)

### Suggesting Features

Feature suggestions are welcome! Please:
1. Check existing feature requests first
2. Provide clear use cases
3. Explain how it benefits users
4. Consider implementation complexity

### Development Setup

1. Fork the repository
2. Clone your fork locally
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Copy environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Set up database:
   ```bash
   php artisan migrate --seed
   ```

### Making Changes

1. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
2. Make your changes
3. Follow coding standards (PSR-12)
4. Write/update tests
5. Update documentation if needed
6. Commit with clear messages

### Coding Standards

- Follow PSR-12 coding standard
- Use meaningful variable and function names
- Add comments for complex logic
- Keep functions small and focused
- Use type hints where possible

### Testing

- Write tests for new features
- Ensure all tests pass:
  ```bash
  php artisan test
  ```
- Aim for good test coverage
- Test both happy path and edge cases

### Pull Request Process

1. Update documentation if needed
2. Ensure all tests pass
3. Update CHANGELOG.md if applicable
4. Submit pull request with:
   - Clear title and description
   - Link to related issues
   - Screenshots for UI changes

### Review Process

- Maintainers will review PRs promptly
- Address feedback constructively
- Be patient during the review process
- PRs may require multiple iterations

## Development Guidelines

### Database Changes

- Always create migrations for schema changes
- Update seeders if needed
- Consider backwards compatibility
- Test migration rollbacks

### Frontend Changes

- Follow existing design patterns
- Ensure responsive design
- Test on multiple browsers
- Optimize for performance

### Security

- Never commit sensitive information
- Validate all user inputs
- Use CSRF protection
- Follow Laravel security best practices

## Getting Help

If you need help:
- Check the documentation
- Search existing issues
- Ask questions in discussions
- Contact maintainers directly

## Recognition

Contributors will be recognized in:
- README.md contributors section
- Release notes for significant contributions
- Project documentation

Thank you for contributing to making this project better!

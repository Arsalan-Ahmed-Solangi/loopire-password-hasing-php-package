# 🔐 loopire-password-hashing-php-package

A lightweight PHP package for secure password hashing using SHA-256 with multiple iterations and a custom secret key. Ideal for projects that require a simple, consistent, and dependency-free way to hash and verify passwords.

---

## 📦 Installation

Clone or download the repository and include the class in your PHP project:

```php
require_once 'PasswordHelper.php';
```

---

## 🚀 Features

- 🔁 Configurable iteration count for added security (default: 500)
- 🔒 SHA-256 based hashing with secret key
- ⚖️ Secure password comparison
- 🧱 Dependency-free

---

## 🧪 Usage

### ✅ Hash a Password

```php
require_once 'PasswordHelper.php';

$hashedPassword = PasswordHelper::hashPassword('your_password', 'your_secret_key');
echo "Hashed Password: " . $hashedPassword;
```

### 🔍 Compare Passwords

```php
require_once 'PasswordHelper.php';

$plainPassword = 'your_password';
$hashedPassword = PasswordHelper::hashPassword($plainPassword, 'your_secret_key');

$isValid = PasswordHelper::comparePassword($plainPassword, $hashedPassword, 'your_secret_key');

if ($isValid) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
```

---

## 🧠 Behind the Scenes

The `PasswordHelper` class works by combining your password and secret key, then running it through the SHA-256 hashing algorithm 500 times by default:

```php
$hash = $secretKey . $password . $secretKey;
for ($i = 0; $i < 500; $i++) {
    $hash = hash('sha256', $hash);
}
```

This helps to strengthen the hash and reduce the risk of brute-force attacks.

---

## ⚠️ Security Notice

> While this custom method adds basic security, it is **highly recommended** to use PHP's built-in `password_hash()` and `password_verify()` functions for production environments. These are battle-tested and offer protections against common security vulnerabilities including timing attacks.

---

## 📄 License

MIT License

---

## 🙌 Contributing

Pull requests are welcome! If you have suggestions or improvements, feel free to contribute.

---

## 👨‍💻 Author

Developed by [Arsalan Ahmed].  
For any questions or support, reach out via GitHub Issues.
https://github.com/Arsalan-Ahmed-Solangi

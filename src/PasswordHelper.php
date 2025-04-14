<?php
class PasswordHelper
{
    private $iterations;
    public function __construct()
    {
        $this->iterations = 500;
    }

    public static function hashPassword($password  = "", $secretKey = "")
    {
        try {
            if (empty($password) || empty($secretKey)) {
                throw new Error('Password and secret key are required');
            }

            $passwordHelper = new self();
            return $passwordHelper->encryptPassword($password, $secretKey);
        } catch (Exception $e) {

            throw new Error($e->getMessage());
        }
    }

    public static function  comparePassword($password  = "", $hashedPassword, $secretKey)
    {
        try {

            if (empty($password) || empty($secretKey)) {
                throw new Error('Password and secret key are required');
            }

            $passwordHelper = new self();
            $comparePassword = $passwordHelper->encryptPassword($password, $secretKey);
            return ($hashedPassword == $comparePassword) ? true :  false;
        } catch (Exception $e) {

            throw new Error($e->getMessage());
        }
    }

    private function encryptPassword($password, $secretKey)
    {
        $hashPassword = $secretKey . $password . $secretKey;
        for ($i = 0; $i < $this->iterations; $i++) {
            $hashPassword  = hash('sha256', $hashPassword);
        }
        return  $hashPassword;
    }
}

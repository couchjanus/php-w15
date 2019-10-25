<?php
/**
 * class User
 */
class User extends Model
{
    protected static $table = 'users';
    protected static $primaryKey = 'id';

    /**
     * Проверка на существовние введенных данных при ааторизации
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUser($email, $password){
        $condition['email'] = $email;
        $user = self::getOne($condition);
        if (password_verify($password, $user->password)) {
            return $user->id;
        }
        return false;
    }
}

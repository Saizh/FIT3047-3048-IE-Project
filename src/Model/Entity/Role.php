<?php
/**
 * Created by PhpStorm.
 * User: charlespinzhuozhao
 * Date: 5/9/18
 * Time: 11:57 PM
 */
namespace App\Model\Entity;
class Role
{
    const STUDENT = "student";
    const TEACHER = "teacher";
    const ADMIN = "admin";
    const UNVERIFIED = "unverified";

    public static function isAdmin($roleId) {
        return $roleId == Role::ADMIN;
    }
    public static function isTeacher($roleId) {
        return $roleId == Role::TEACHER;
    }
    public static function isStudent($roleId) {
        return $roleId == Role::STUDENT;
    }
    public static function isUnverified($roleId) {
        return $roleId == Role::UNVERIFIED;
    }
}
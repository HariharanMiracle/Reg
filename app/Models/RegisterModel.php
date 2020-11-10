<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class RegisterModel extends Model
{
    protected $table = 'register';

    protected $allowedFields = ['courseid','email', 'name', 'nic', 'number', 'age', 'district', 'divisional_secretariat', 'occupation', 'workplace', 'workplace_address', 'highest_education_qualifications', 'file_nic', 'file_birth_certificate', 'file_ol', 'file_al', 'file_payment', 'student_number'];

    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    // protected function beforeInsert(array $data) {
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }
    
    // protected function beforeUpdate(array $data) {
    //     if (isset($data['password'])) {
    //         $data = $this->passwordHash($data);
    //     }
    //     return $data;
    // }

    // protected function passwordHash(array $data) {
    //     if (isset($data['password'])) {
    //         $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    //     }

    //     return $data;
    // }
}
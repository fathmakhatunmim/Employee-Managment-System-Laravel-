<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'emplist';  // এখানে table নাম explicit দিলাম

    protected $fillable = ['name', 'Email', 'position', 'department']; // mass assignment safeguard
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\projects;
class Category extends Model
{
    public function projects()
    {
        return $this->hasMany(Project::class);

    }
}

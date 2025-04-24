<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'pageName'
    ];

    public function Page_Sections(){
        return $this->hasMany(Page_Section::class);
    }
    
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;
}

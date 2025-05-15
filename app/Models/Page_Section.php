<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page_Section extends Model
{
    protected $fillable=[
        'page_id',
        'subpage',
        'indicator',
        'elemType',
        'content',
        'imagePath',
        'alt',
        'description',
        'archived',
    ];

    protected $table = 'page_sections';

    public function page_section(){
        return $this->belongsTo(Page::class);
    }
    
    /** @use HasFactory<\Database\Factories\PageSectionFactory> */
    use HasFactory;
}

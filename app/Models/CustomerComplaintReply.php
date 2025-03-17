<?php
namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerComplaintReply extends Model
{
    use HasFactory;
    protected $table   = 'customer_complaints_replies';
    protected $guarded = [];

    /**
     * علاقة الرد بالشكوى
     */
    public function complaint()
    {
        return $this->belongsTo(CustomerComplaint::class, 'customer_complaint_id');
    }

    /**
     * علاقة الرد بالمستخدم
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsignmentRequest extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $table = 'consignment_requests';

    protected $fillable = ['id_request', 'partner_id', 'status_id', 'type', 'created_at', 'processed_at', 'description', 'path_surat_permohonan_klinik', 'pic_cancel', 'alasan_cancel', 'path_cancel'];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function status(): BelongsTo
    {   
        return $this->belongsTo(Status::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'consignment_request_details', 'consignment_request_id', 'item_id')->withPivot(['quantity', 'quantity_send', 'sender_id', 'sender_pic', 'request_date', 'deliver_date', 'deleted_at'])->withTimestamps()->wherePivot('deleted_at', null);
    }

    /**
     * Get the prunable model query.
     */
    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subMonths(6));
    }
}

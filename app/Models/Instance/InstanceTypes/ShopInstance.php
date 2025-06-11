<?php

namespace App\Models\Instance\InstanceTypes;

use App\Models\Admin;
use App\Models\Instance\Asset;
use App\Models\Instance\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopInstance extends Model
{
    protected $primaryKey = 'instance_id';

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(ShopPost::class);
    }

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}

<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fidelity_points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class)->constrained('clients');
            $table->integer('balance')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fidelity_points');
    }
};

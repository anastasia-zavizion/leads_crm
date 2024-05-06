<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Lead;
use App\Models\LeadStatus;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('postcode');
            $table->string('city');
            $table->string('country');
            $table->enum('gender',Lead::$gender);
            $table->text('description')->nullable();
            $table->foreignIdFor(LeadStatus::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

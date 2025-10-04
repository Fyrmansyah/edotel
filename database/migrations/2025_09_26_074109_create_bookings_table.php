<?php

use App\Models\Booking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique()->default('-');
            $table->string('name');
            $table->string('no_tlp');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->unsignedInteger('jml_orang');
            $table->string('status')->default(Booking::STATUS_PENDING);
            $table->text('client_note')->nullable();
            $table->text('admin_note')->nullable();
            $table->boolean('is_present')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

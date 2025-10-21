<?php

use App\Models\Booking;
use App\Models\Kamar;
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
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedInteger('jml_orang');
            $table->string('jenis_kamar');
            $table->unsignedInteger('harga_kamar');
            $table->unsignedInteger('extra_kasur')->nullable();
            $table->unsignedInteger('extra_kasur_price')->nullable();
            $table->unsignedInteger('extra_makan')->nullable();
            $table->unsignedInteger('extra_makan_price')->nullable();
            $table->string('status')->default(Booking::STATUS_PENDING);
            $table->text('client_note')->nullable();
            $table->text('admin_note')->nullable();
            $table->boolean('is_present')->default(false);
            $table->foreignIdFor(Kamar::class)->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // 1. Tabel Unit
        Schema::create('unit', function (Blueprint $table) {
            $table->id('id_unit');
            $table->string('nama_unit')->unique();
            $table->string('logo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // 2. Tabel Users
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_unit');
            $table->string('username')->unique();
            $table->string('nik_name')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('jabatan_user');
            $table->enum('role', ['staff', 'admin', 'manager', 'asmen']);
            $table->enum('status_user', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
        });

        // 3. Tabel Aset
        Schema::create('aset', function (Blueprint $table) {
            $table->id('id_aset');
            $table->unsignedBigInteger('id_unit');
            $table->string('form_bast')->nullable();
            $table->string('serial_number')->unique()->nullable();
            $table->string('no_aset')->unique();
            $table->text('desc_aset');
            $table->string('lokasi');
            $table->unsignedBigInteger('id_user');
            $table->string('foto_aset')->nullable();
            $table->year('tahun_perolehan');
            $table->integer('usia');
            $table->string('status_aset');
            $table->string('kategori_aset');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });

        // 4. Tabel PFI
        Schema::create('pfi', function (Blueprint $table) {
            $table->id('id_pfi');
            $table->unsignedBigInteger('id_unit')->nullable();
            $table->date('tanggal_pfi')->nullable();
            $table->string('no_pfi')->nullable();
            $table->string('prioritas')->nullable();
            $table->string('type')->nullable();
            $table->string('pengguna')->nullable();
            $table->string('dept')->nullable();
            $table->text('alasan_kebutuhan')->nullable();
            $table->string('nama_staff')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
        });

        // 5. Tabel Barang
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->unsignedBigInteger('id_pfi')->nullable();
            $table->date('tanggal_barang');
            $table->string('jenis_barang')->nullable();
            $table->string('nama_barang');
            $table->string('merk_tipe')->nullable();
            $table->integer('jumlah_barang');
            $table->string('satuan');
            $table->decimal('harga_barang', 15, 2);
            $table->decimal('total_barang', 15, 2);
            $table->string('gambar')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('no_pp')->nullable();
            $table->string('no_ppm')->nullable();
            $table->string('no_po')->nullable();
            $table->string('file_penawaran')->nullable();
            $table->string('file_pfi')->nullable();
            $table->string('file_pp')->nullable();
            $table->string('file_ppm')->nullable();
            $table->string('file_po')->nullable();
            $table->string('file_surat_jalan')->nullable();
            $table->string('file_serah_terima')->nullable();
            $table->string('file_bukti_pembayaran')->nullable();
            $table->string('progres')->default('Proses TTD');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_pfi')->references('id_pfi')->on('pfi')->onDelete('set null');
        });

        // 6. Tabel Email
        Schema::create('email', function (Blueprint $table) {
            $table->id('id_email');
            $table->unsignedBigInteger('id_unit');
            $table->string('no_email')->unique();
            $table->date('tanggal_email');
            $table->string('nama_pemohon');
            $table->string('jabatan_email');
            $table->string('dept_email');
            $table->string('jenis_email');
            $table->string('pemohon_email');
            $table->string('perangkat_user')->nullable();
            $table->string('keperluan_email')->nullable();
            $table->string('alamat_email')->unique();
            $table->text('keterangan')->nullable();
            $table->string('status')->default('pending');
            $table->string('file_email')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
        });

        // 7. Tabel Perbaikan
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->id('id_perbaikan');
            $table->unsignedBigInteger('id_unit');
            $table->string('no_perbaikan')->unique();
            $table->date('tanggal_perbaikan');
            $table->string('nama_pemohon');
            $table->string('jabatan_pemohon');
            $table->string('dept_pemohon');
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->text('masalah');
            $table->string('file_pdf')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('id_teknisi')->nullable();
            $table->decimal('biaya_perbaikan', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('set null');
            $table->foreign('id_teknisi')->references('id_user')->on('users')->onDelete('set null');
        });

        // 8. Tabel Downtime
        Schema::create('downtime', function (Blueprint $table) {
            $table->id('id_downtime');
            $table->unsignedBigInteger('id_unit');
            $table->date('tanggal_input');
            $table->dateTime('down_awal');
            $table->dateTime('down_akhir');
            $table->integer('durasi_downtime')->comment('Durasi dalam menit');
            $table->text('penyebab_downtime')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_unit')->references('id_unit')->on('unit')->onDelete('cascade');
        });

        // 9. Tabel Surat Peminjaman Barang
        Schema::create('surat_peminjaman_barang', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_aset');
            $table->unsignedBigInteger('id_peminjam');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->text('keperluan');
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_aset')->references('id_aset')->on('aset')->onDelete('cascade');
            $table->foreign('id_peminjam')->references('id_user')->on('users')->onDelete('cascade');
        });

        // 10. Tabel Ping Server (Identik dengan surat_peminjaman_barang)
        Schema::create('ping_server', function (Blueprint $table) {
            $table->id('id_ping');
            $table->unsignedBigInteger('id_aset');
            $table->unsignedBigInteger('id_peminjam');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->text('keperluan');
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_aset')->references('id_aset')->on('aset')->onDelete('cascade');
            $table->foreign('id_peminjam')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ping_server');
        Schema::dropIfExists('surat_peminjaman_barang');
        Schema::dropIfExists('downtime');
        Schema::dropIfExists('perbaikan');
        Schema::dropIfExists('email');
        Schema::dropIfExists('barang');
        Schema::dropIfExists('pfi');
        Schema::dropIfExists('aset');
        Schema::dropIfExists('users');
        Schema::dropIfExists('unit');
    }
};

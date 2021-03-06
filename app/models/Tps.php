<?php

class Tps extends Eloquent {

	/**
	  * @author : Noviyanto Rachmady ['novay@otaku.si']
	  **/

	// Ambil tabel dari database
	protected $table = 'tps';

	// Field yang boleh di input
	protected $fillable = ['nama', 'id_kelurahan', 'id_kecamatan', 'id_kabupaten'];

	// Field yang jadi patokan
	protected $guarded = ['id'];

	# Validasi
	public static $rules = ['nama'=>'required|max:50|min:3', 'id_kelurahan'=>'required'];

	/**
	 * Relasi
	 */
	public function Kabupaten()
	{
		return $this->belongsTo('Kabupaten', 'id_kabupaten');
	}

	/**
	 * Relasi
	 */
	public function Kecamatan()
    {
        return $this->belongsTo('Kecamatan', 'id_kecamatan');
    }

    /**
	 * Relasi
	 */
	public function Kelurahan()
    {
        return $this->belongsTo('Kelurahan', 'id_kelurahan');
    }

	/**
	 * Tambah data ke database
	 */
	public static function tambah($nama, $id_kelurahan, $id_kecamatan, $id_kabupaten)
	{
		Tps::create(compact('nama', 'id_kelurahan', 'id_kecamatan', 'id_kabupaten'));
	}

	/**
	 * Ganti data dalam database
	 */
	public static function ganti($id, $nama, $id_kelurahan, $id_kecamatan, $id_kabupaten)
	{
		$temp = Tps::find($id);
		$temp->nama			= $nama;
		$temp->id_kelurahan	= $id_kelurahan;
		$temp->id_kecamatan	= $id_kecamatan;
		$temp->id_kabupaten	= $id_kabupaten;
		$temp->save();
	}

	/**
	 * Hapus data dalam database
	 */
	public static function hapus($id) 
	{
		Tps::destroy($id);
	}

}
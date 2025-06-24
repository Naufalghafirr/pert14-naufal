<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'jk' => $this->jk,
            'tgl_lahir' => $this->tgl_lahir,
            'jurusan' => $this->jurusan,
            'alamat' => $this->alamat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'status' => true,
            'message' => 'Data mahasiswa berhasil diambil',
        ];
    }
}

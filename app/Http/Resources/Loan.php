<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Loan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rekening' => $this->rekening,
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'plafon' => $this->plafon,
            'tipe_pinjaman' => $this->tipe_pinjaman,
            'kmk' => $this->kmk,
            'dsc' => $this->dsc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

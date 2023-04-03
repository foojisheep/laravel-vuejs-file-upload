<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportFile implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $newProduct = Product::where('id', $row['product_id'])->first() === null ? true: false;
        if ($newProduct) {
            $product = [
                'id' => $row['product_id'],
                'type' => $row['types'],
                'model' => $row['model'],
                'brand' => $row['brand'],
                'capacity' => $row ['capacity'],
                'quantity' => $row['status'] === 'Sold' ? 0 : 1,
            ];
            Product::create($product);
        } else {
            $product = Product::find($row['product_id']);
            $product->type = $row['types'];
            $product->model = $row['model'];
            $product->brand = $row['brand'];
            $product->capacity = $row ['capacity'];
            $product->quantity = $row['status'] === 'Sold' ? $product->quantity - 1 : $product->quantity + 1;
            $product->save();
            
        }
    }
}

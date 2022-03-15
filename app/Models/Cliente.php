<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Jobs\jobNovoCliente;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'endereco','status', 'image'];

    public static function notificarNovoCliente($nome, $email)
    {
        jobNovoCliente::dispatch($nome, $email);
        return "notificado";
    }

    public static function fotoDePerfil($request, $cliente)
    {
        if ($request->hasFile('image') && $request->image->isValid()) {

            dd($cliente->image);
            
            if (is_file($cliente->image)) {
                // 1. possibility
                // Storage::delete($file);
                // 2. possibility
                unlink(storage_path('app/folder/'.$file));
            } else {
                dd("File does not exist");
            }

            

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/userfoto'), $imageName);
        }
        return $imageName;
    }
}

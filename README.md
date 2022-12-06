# php_tortura_preparacion

Creo proyecto con `composer create-project laravel/laravel $nombre`

para arrancar el servidor de php tenemos `php artisan serve`

Instalamos breeze con los siguientes comandos , `cd $nombreProyecto`

`composer require laravel/breeze --dev`

`php artisan breeze:install`

`php artisan migrate`

He creado las tablas usando la siguiente convencion `create_$nombre_table`

El comando que he usado para crear la migracion de la tabla de cartas es `php artisan make:migration create_carta_table`

Crearemos los modelos con el comando `php artisan make:model $nombreModel -cf`

Crearemos los atributos y relaciones siguiendo el siguiente criterio , si una relacion tiene `belongsTo($nombreClase)` en $nombreClase tendra que ser un `hasMany($otraClase)`, si tiene un`belongsToMany($nombreClase)`en $nombreClase tendra que ser un `belongsToMany($otraClase)`

ej Model y su migracion

```PHP
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'texto',
        'rareza',
        'id-ex',
        'id-deck'
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    public function expansion()
    {
        return $this->belongsTo(Expansion::class);
    }
}

```

```PHP
<?php

use App\Models\Deck;
use App\Models\Expansion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->double('precio');
            $table->string('texto');
            $table->string('rareza');
            $table->foreignIdFor(Deck::class);
            $table->foreignIdFor(Expansion::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carta');
    }
};

```

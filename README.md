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

    protected $table = 'carta';

    public $timestamps = false;

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

Crear los seeders con el somando `php artisan make:seeder $nombreSeeder`

Crear el seeder de forma que quede algo así.

```PHP
<?php

namespace Database\Seeders;

use App\Models\Deck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deck::factory(2)->create();
    }
}
```

Modificar los Factory para que tenga los parametros para generar los seeders. de forma que quede algo así:

```PHP
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expansion>
 */
class ExpansionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->realTextBetween(1.10),
            'precio' => 110.00,
            'fecha' => fake()->date(),
            'descripcion' => fake()->realTextBetween(1, 10),
            'cantidad-cartas' => 121,
            'id-ex' => fake()->realTextBetween(1, 10)
        ];
    }
}
```

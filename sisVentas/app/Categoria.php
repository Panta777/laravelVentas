<?ph

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //MANEJO DE FUNCIONES DE TABLA CATEGORIA 

    protected $table = 'categoria';

    protected $primaryKey = 'idcategoria';

    public $timestamps = false;


protected $fillable = [
	'nombre',
	'descripcion'
	'condicion'
};

protected $guarded =  [
];
